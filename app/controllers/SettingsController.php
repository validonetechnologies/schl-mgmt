<?php
/**
 * SettingsController.php - Advanced management of per-school configurations
 */
class SettingsController extends BaseController {
    public function index($slug) {
        AuthMiddleware::protect(['school_admin', 'management']);

        $schoolId = $this->getSchoolId();
        $db = DB::getInstance();

        // Fetch current school details
        $stmt = $db->prepare("SELECT * FROM schools WHERE id = ?");
        $stmt->execute([$schoolId]);
        $school = $stmt->fetch();

        // Fetch all current settings as an associative array
        $stmt = $db->prepare("SELECT setting_key, setting_value FROM settings WHERE school_id = ?");
        $stmt->execute([$schoolId]);
        $settingsRows = $stmt->fetchAll();

        $settings = [];
        foreach ($settingsRows as $row) {
            $settings[$row['setting_key']] = $row['setting_value'];
        }

        require 'app/views/settings.php';
    }

    public function save($slug) {
        AuthMiddleware::protect(['school_admin', 'management']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $schoolId = $this->getSchoolId();
            $db = DB::getInstance();

            try {
                $db->beginTransaction();

                // 1. Update School Basic Info
                if (!empty($_POST['school_name'])) {
                    $stmt = $db->prepare("UPDATE schools SET name = ? WHERE id = ?");
                    $stmt->execute([$_POST['school_name'], $schoolId]);
                }

                // 2. Handle Logo Upload
                if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
                    $ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
                    $filename = "logo_{$schoolId}." . $ext;
                    move_uploaded_file($_FILES['logo']['tmp_name'], "storage/uploads/" . $filename);

                    $stmt = $db->prepare("UPDATE schools SET logo = ? WHERE id = ?");
                    $stmt->execute([$filename, $schoolId]);
                }

                // 3. Save Key-Value Settings (Razorpay, WhatsApp, etc.)
                $keysToSave = [
                    'razorpay_key_id' => $_POST['razorpay_key_id'] ?? null,
                    'razorpay_key_secret' => $_POST['razorpay_key_secret'] ?? null,
                    'whatsapp_api_key' => $_POST['whatsapp_api_key'] ?? null,
                    'school_email' => $_POST['school_email'] ?? null,
                    'school_phone' => $_POST['school_phone'] ?? null,
                ];

                foreach ($keysToSave as $key => $value) {
                    if ($value !== null) {
                        $stmt = $db->prepare("INSERT INTO settings (school_id, setting_key, setting_value)
                                             VALUES (?, ?, ?)
                                             ON DUPLICATE KEY UPDATE setting_value = VALUES(setting_value)");
                        $stmt->execute([$schoolId, $key, $value]);
                    }
                }

                $db->commit();
                $this->flash("School settings saved successfully!");
            } catch (Exception $e) {
                $db->rollBack();
                $_SESSION['error'] = "Failed to save settings: " . $e->getMessage();
            }

            $this->redirect("/{$slug}/settings");
        }
    }
}
