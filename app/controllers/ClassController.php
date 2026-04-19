<?php
/**
 * ClassController.php - Manages school classes
 */
class ClassController extends BaseController {
    public function index($slug) {
        AuthMiddleware::protect(['school_admin', 'principal', 'management']);

        $db = DB::getInstance();
        $schoolId = $this->getSchoolId();

        $stmt = $db->prepare("SELECT * FROM classes WHERE school_id = ? ORDER BY numeric_level ASC");
        $stmt->execute([$schoolId]);
        $classes = $stmt->fetchAll();

        require 'app/views/classes/index.php';
    }

    public function create($slug) {
        AuthMiddleware::protect(['school_admin', 'principal', 'management']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['class_name'] ?? '');
            $level = (int)($_POST['numeric_level'] ?? 0);
            $schoolId = $this->getSchoolId();

            $db = DB::getInstance();
            $stmt = $db->prepare("INSERT INTO classes (school_id, class_name, numeric_level) VALUES (?, ?, ?)");
            $stmt->execute([$schoolId, $name, $level]);

            $this->flash("Class created successfully!");
            $this->redirect("/{$slug}/classes");
        }
        require 'app/views/classes/create.php';
    }

    public function delete($slug, $id) {
        AuthMiddleware::protect(['school_admin', 'principal', 'management']);

        $schoolId = $this->getSchoolId();
        $db = DB::getInstance();

        // Verify ownership
        $stmt = $db->prepare("SELECT id FROM classes WHERE id = ? AND school_id = ?");
        $stmt->execute([$id, $schoolId]);

        if ($stmt->fetch()) {
            $stmt = $db->prepare("DELETE FROM classes WHERE id = ?");
            $stmt->execute([$id]);
            $this->flash("Class deleted.");
        }

        $this->redirect("/{$slug}/classes");
    }
}
