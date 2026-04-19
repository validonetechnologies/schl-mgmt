<?php
require_once 'ApiResponse.php';
require_once 'ApiAuth.php';
require_once 'core/DB.php';

$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Route: /api/v1/login
if ($path === '/api/v1/login' && $method === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $email = $input['email'] ?? '';
    $password = $input['password'] ?? '';
    $slug = $input['slug'] ?? '';

    $db = DB::getInstance();
    $stmt = $db->prepare("SELECT s.id as school_id, u.id as user_id FROM schools s JOIN users u ON s.id = u.school_id WHERE s.slug = ? AND u.email = ?");
    $stmt->execute([$slug, $email]);
    $user = $stmt->fetch();

    if ($user) {
        // This is a simplified check for the demo
        ApiResponse::send([
            'token' => 'mock-token-123',
            'user' => ['email' => $email, 'school_id' => $user['school_id']]
        ]);
    } else {
        ApiResponse::error('Invalid credentials', 401);
    }
    exit;
}

// Protected Routes
$userContext = ApiAuth::authenticate();
$db = DB::getInstance();
$schoolId = $userContext['school_id'];

// Route: /api/v1/students
if ($path === '/api/v1/students' && $method === 'GET') {
    $stmt = $db->prepare("SELECT * FROM students WHERE school_id = ?");
    $stmt->execute([$schoolId]);
    ApiResponse::send($stmt->fetchAll());
}

// Route: /api/v1/fees
if ($path === '/api/v1/fees' && $method === 'GET') {
    $stmt = $db->prepare("SELECT * FROM fees WHERE school_id = ?");
    $stmt->execute([$schoolId]);
    ApiResponse::send($stmt->fetchAll());
}

ApiResponse::error('Endpoint not found', 404);
