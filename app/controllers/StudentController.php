<?php
/**
 * StudentController.php - Manages students
 */
class StudentController extends BaseController {
    public function index($slug) {
        AuthMiddleware::protect(['school_admin', 'principal', 'teacher', 'management']);

        $db = DB::getInstance();
        $schoolId = $this->getSchoolId();

        $stmt = $db->prepare("SELECT s.*, u.email FROM students s LEFT JOIN users u ON s.user_id = u.id WHERE s.school_id = ?");
        $stmt->execute([$schoolId]);
        $students = $stmt->fetchAll();

        require 'app/views/students/index.php';
    }

    public function create($slug) {
        AuthMiddleware::protect(['school_admin', 'principal', 'management']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = trim($_POST['first_name'] ?? '');
            $lastName = trim($_POST['last_name'] ?? '');
            $admNo = trim($_POST['admission_no'] ?? '');
            $dob = $_POST['dob'] ?? '';
            $gender = $_POST['gender'] ?? 'male';
            $schoolId = $this->getSchoolId();

            $db = DB::getInstance();
            try {
                $db->beginTransaction();

                // Create student record
                $stmt = $db->prepare("INSERT INTO students (school_id, admission_no, first_name, last_name, dob, gender) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([$schoolId, $admNo, $firstName, $lastName, $dob, $gender]);

                $db->commit();
                $this->flash("Student enrolled successfully!");
                $this->redirect("/{$slug}/students");
            } catch (Exception $e) {
                $db->rollBack();
                $_SESSION['error'] = "Enrollment failed: " . $e->getMessage();
                $this->redirect("/{$slug}/students/create");
            }
        }
        require 'app/views/students/create.php';
    }
}
