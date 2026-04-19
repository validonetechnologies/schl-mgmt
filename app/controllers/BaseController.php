<?php
/**
 * BaseController.php - Common functionality for all controllers
 */
class BaseController {
    protected function getSchoolId() {
        if (!isset($_SESSION['school_id'])) {
            header("Location: /logout");
            exit;
        }
        return $_SESSION['school_id'];
    }

    protected function redirect($url) {
        header("Location: $url");
        exit;
    }

    protected function flash($message, $type = 'success') {
        $_SESSION[$type] = $message;
    }
}
