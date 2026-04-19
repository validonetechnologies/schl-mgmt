<?php
/**
 * AuthController.php - Handles login and logout
 */
class AuthController {
    public function login($slug) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            $db = DB::getInstance();
            $stmt = $db->prepare("SELECT id FROM schools WHERE slug = ?");
            $stmt->execute([$slug]);
            $school = $stmt->fetch();

            if (!$school) {
                $_SESSION['error'] = "School not found.";
                header("Location: /{$slug}/login");
                exit;
            }

            if (Auth::login($email, $password, $school['id'])) {
                $_SESSION['current_slug'] = $slug;
                header("Location: /{$slug}/dashboard");
                exit;
            } else {
                $_SESSION['error'] = "Invalid email or password.";
                header("Location: /{$slug}/login");
                exit;
            }
        }
        require 'app/views/auth/login.php';
    }

    public function logout() {
        Auth::logout();
        $slug = $_SESSION['current_slug'] ?? '';
        header("Location: /{$slug}/login");
        exit;
    }
}
