<?php
/**
 * AuthMiddleware.php - Protects routes based on authentication and roles
 */
class AuthMiddleware {
    public static function protect($allowedRoles = []) {
        if (!Auth::check()) {
            header("Location: /" . ($_SESSION['current_slug'] ?? '') . "/login");
            exit;
        }

        if (!empty($allowedRoles) && !Auth::hasRole($allowedRoles)) {
            http_response_code(403);
            die("Access Denied: You do not have permission to access this page.");
        }
    }
}
