<?php
/**
 * ApiAuth.php - Token-based authentication for API
 */
class ApiAuth {
    public static function authenticate() {
        $headers = apache_request_headers();
        $token = $headers['Authorization'] ?? '';

        if (!$token || !str_starts_with($token, 'Bearer ')) {
            ApiResponse::error('Unauthorized: Missing or invalid token', 401);
        }

        $jwt = str_replace('Bearer ', '', $token);

        // In a production system, we would validate a JWT or a database token.
        // For this architectural phase, we simulate token validation.
        if ($jwt === 'mock-token-123') {
            return ['user_id' => 1, 'school_id' => 1, 'role' => 'school_admin'];
        }

        ApiResponse::error('Unauthorized: Invalid token', 401);
    }
}
