<?php
/**
 * OnboardingController.php - Handles school registration
 */
class OnboardingController {
    public function index() {
        require 'app/views/onboarding.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /onboarding');
            exit;
        }

        $schoolName = trim($_POST['school_name'] ?? '');
        $slug = trim($_POST['slug'] ?? '');
        $adminName = trim($_POST['admin_name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (!$schoolName || !$slug || !$adminName || !$email || !$password) {
            $_SESSION['error'] = "All fields are required.";
            header('Location: /onboarding');
            exit;
        }

        $db = DB::getInstance();

        // 1. Validate Slug Uniqueness
        $stmt = $db->prepare("SELECT id FROM schools WHERE slug = ?");
        $stmt->execute([$slug]);
        if ($stmt->fetch()) {
            $_SESSION['error'] = "School slug is already taken. Please choose another.";
            header('Location: /onboarding');
            exit;
        }

        try {
            $db->beginTransaction();

            // 2. Create School
            $stmt = $db->prepare("INSERT INTO schools (name, slug) VALUES (?, ?)");
            $stmt->execute([$schoolName, $slug]);
            $schoolId = $db->lastInsertId();

            // 3. Create Admin User
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $db->prepare("INSERT INTO users (school_id, role_id, name, email, password) VALUES (?, 2, ?, ?, ?)");
            $stmt->execute([$schoolId, $adminName, $email, $hashedPassword]);

            $db->commit();

            $_SESSION['success'] = "School registered successfully!";
            header("Location: /{$slug}/login");
            exit;
        } catch (Exception $e) {
            $db->rollBack();
            $_SESSION['error'] = "Registration failed: " . $e->getMessage();
            header('Location: /onboarding');
            exit;
        }
    }
}
