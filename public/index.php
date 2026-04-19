<?php
require_once '../core/Router.php';
require_once '../core/DB.php';
require_once '../core/Auth.php';
require_once '../app/middleware/AuthMiddleware.php';
session_start();

$router = new Router();

// Landing Page
$router->add('/', function() {
    require '../app/views/landing.php';
});

// Onboarding
require_once '../app/controllers/OnboardingController.php';
$onboarding = new OnboardingController();
$router->add('/onboarding', function() use ($onboarding) {
    $onboarding->index();
});
$router->add('/onboarding/register', function() use ($onboarding) {
    $onboarding->register();
});

// Auth
require_once '../app/controllers/AuthController.php';
$auth = new AuthController();
$router->add('/logout', function() use ($auth) {
    $auth->logout();
});

// Core Modules
require_once '../core/WhatsAppService.php';
require_once '../app/controllers/BaseController.php';
require_once '../app/controllers/ClassController.php';
require_once '../app/controllers/StudentController.php';
require_once '../app/controllers/FeeController.php';
require_once '../app/controllers/NotificationController.php';
require_once '../app/controllers/SettingsController.php';
require_once '../app/controllers/DashboardController.php';

$classCtrl = new ClassController();
$studentCtrl = new StudentController();
$feeCtrl = new FeeController();
$notiCtrl = new NotificationController();
$settingsCtrl = new SettingsController();
$dashCtrl = new DashboardController();

// 404 Page
$router->add('404', function() {
    http_response_code(404);
    echo "404 Not Found";
});

$url = $_SERVER['REQUEST_URI'];
$path = parse_url($url, PHP_URL_PATH);

// Handle dynamic slug routing
if (preg_match('/^\/([^\/]+)\/(.+)$/', $path, $matches)) {
    $slug = $matches[1];
    $action = $matches[2];

    if ($action === 'login') {
        $auth->login($slug);
    } elseif ($action === 'dashboard') {
        $dashCtrl->index($slug);
    } elseif ($action === 'classes') {
        $classCtrl->index($slug);
    } elseif ($action === 'classes/create') {
        $classCtrl->create($slug);
    } elseif (preg_match('/^classes\/delete\/(\d+)$/', $action, $idMatch)) {
        $classCtrl->delete($slug, $idMatch[1]);
    } elseif ($action === 'students') {
        $studentCtrl->index($slug);
    } elseif ($action === 'students/create') {
        $studentCtrl->create($slug);
    } elseif ($action === 'fees') {
        $feeCtrl->index($slug);
    } elseif ($action === 'fees/create') {
        $feeCtrl->create($slug);
    } elseif (preg_match('/^fees\/pay\/(\d+)\/(\d+)$/', $action, $payMatch)) {
        $feeCtrl->pay($slug, $payMatch[1], $payMatch[2]);
    } elseif ($action === 'fees/verify') {
        $feeCtrl->verify($slug);
    } elseif ($action === 'settings') {
        $settingsCtrl->index($slug);
    } elseif ($action === 'settings/save') {
        $settingsCtrl->save($slug);
    } elseif (preg_match('/^notify\/fee\/(\d+)\/(\d+)$/', $action, $notiMatch)) {
        $notiCtrl->sendFeeAlert($slug, $notiMatch[1], $notiMatch[2]);
    } else {
        $router->dispatch('404');
    }
} else {
    $controller = $router->dispatch($path);
    if ($controller) {
        $controller();
    } else {
        $router->dispatch('404');
    }
}
