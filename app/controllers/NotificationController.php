<?php
/**
 * NotificationController.php - Handles triggers for WhatsApp alerts
 */
class NotificationController extends BaseController {
    public function sendFeeAlert($slug, $studentId, $feeId) {
        AuthMiddleware::protect(['school_admin', 'principal']);

        $db = DB::getInstance();
        $schoolId = $this->getSchoolId();

        // Fetch Student and Fee details
        $stmt = $db->prepare("SELECT s.first_name, s.phone FROM students s WHERE s.id = ? AND s.school_id = ?");
        $stmt->execute([$studentId, $schoolId]);
        $student = $stmt->fetch();

        $stmt = $db->prepare("SELECT fee_name, amount, due_date FROM fees WHERE id = ? AND school_id = ?");
        $stmt->execute([$feeId, $schoolId]);
        $fee = $stmt->fetch();

        if ($student && $fee) {
            $whatsapp = new WhatsAppService($schoolId);
            $whatsapp->sendFeeReminder($student['first_name'], $fee['amount'], $fee['due_date'], $student['phone']);
            $this->flash("WhatsApp alert sent to {$student['first_name']}!");
        } else {
            $_SESSION['error'] = "Student or Fee not found.";
        }

        $this->redirect("/{$slug}/dashboard");
    }
}
