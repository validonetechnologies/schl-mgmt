<?php
/**
 * Auth.php - Handles authentication and session management
 */
class Auth {
    public static function login($email, $password, $schoolId) {
        $db = DB::getInstance();
        $stmt = $db->prepare("SELECT u.*, r.role_name FROM users u JOIN roles r ON u.role_id = r.id WHERE u.email = ? AND u.school_id = ? AND u.status = 'active'");
        $stmt->execute([$email, $schoolId]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['school_id'] = $user['school_id'];
            $_SESSION['role'] = $user['role_name'];
            $_SESSION['user_name'] = $user['name'];
            return true;
        }
        return false;
    }

    public static function logout() {
        session_destroy();
        $_SESSION = [];
    }

    public static function check() {
        return isset($_SESSION['user_id']);
    }

    public static function user() {
        return $_SESSION;
    }

    public static function hasRole($allowedRoles) {
        return isset($_SESSION['role']) && in_array($_SESSION['role'], (array)$allowedRoles);
    }
}
