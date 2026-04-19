<?php
/**
 * DashboardController.php - Manages role-based dashboards
 */
class DashboardController extends BaseController {
    public function index($slug) {
        AuthMiddleware::protect(['school_admin', 'principal', 'teacher', 'student', 'parent', 'management']);

        $role = $_SESSION['role'];
        $schoolId = $this->getSchoolId();
        $db = DB::getInstance();

        // Generic Stats for all dashboards
        $stats = [];

        if ($role === 'school_admin' || $role === 'principal' || $role === 'management') {
            // Admin Stats
            $stmt = $db->prepare("SELECT COUNT(*) as total FROM students WHERE school_id = ?");
            $stmt->execute([$schoolId]);
            $stats['total_students'] = $stmt->fetch()['total'];

            $stmt = $db->prepare("SELECT COUNT(*) as total FROM users WHERE school_id = ? AND role_id = 4");
            $stmt->execute([$schoolId]);
            $stats['total_teachers'] = $stmt->fetch()['total'];

            $stmt = $db->prepare("SELECT SUM(amount_paid) as total FROM payments WHERE school_id = ? AND status = 'completed'");
            $stmt->execute([$schoolId]);
            $stats['total_revenue'] = $stmt->fetch()['total'] ?? 0;
        } elseif ($role === 'teacher') {
            // Teacher Stats
            $stmt = $db->prepare("SELECT COUNT(*) as total FROM enrollments e JOIN sections s ON e.section_id = s.id WHERE s.teacher_id = ? AND e.status = 'active'");
            $stmt->execute([$_SESSION['user_id']]);
            $stats['my_students'] = $stmt->fetch()['total'];

            $stats['total_classes'] = 1; // Simplified for demo
        } elseif ($role === 'student' || $role === 'parent') {
            // Student/Parent Stats
            $stmt = $db->prepare("SELECT COUNT(*) as total FROM payments WHERE student_id = (SELECT user_id FROM students WHERE user_id = ?) AND status = 'pending'");
            $stmt->execute([$_SESSION['user_id']]);
            $stats['pending_fees'] = $stmt->fetch()['total'];
        }

        require 'app/views/dashboards/' . $role . '.php';
    }
}
