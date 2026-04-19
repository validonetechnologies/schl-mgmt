<?php
/**
 * ApiResponse.php - Standardized JSON response helper
 */
class ApiResponse {
    public static function send($data, $status = 200, $message = 'Success') {
        header('Content-Type: application/json');
        http_response_code($status);
        echo json_encode([
            'status' => $status === 200 ? 'success' : 'error',
            'message' => $message,
            'data' => $data
        ]);
        exit;
    }

    public static function error($message, $status = 400) {
        self::send(null, $status, $message);
    }
}
