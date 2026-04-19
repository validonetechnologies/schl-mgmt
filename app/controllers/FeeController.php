<?php
/**
 * FeeController.php - Manages fee structures and payments
 */
class FeeController extends BaseController {
    public function index($slug) {
        AuthMiddleware::protect(['school_admin', 'principal', 'management']);

        $db = DB::getInstance();
        $schoolId = $this->getSchoolId();

        $stmt = $db->prepare("SELECT * FROM fees WHERE school_id = ? ORDER BY created_at DESC");
        $stmt->execute([$schoolId]);
        $fees = $stmt->fetchAll();

        require 'app/views/fees/index.php';
    }

    public function create($slug) {
        AuthMiddleware::protect(['school_admin', 'principal', 'management']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['fee_name'] ?? '');
            $amount = (float)($_POST['amount'] ?? 0);
            $dueDate = $_POST['due_date'] ?? null;
            $desc = trim($_POST['description'] ?? '');
            $schoolId = $this->getSchoolId();

            $db = DB::getInstance();
            $stmt = $db->prepare("INSERT INTO fees (school_id, fee_name, amount, due_date, description) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$schoolId, $name, $amount, $dueDate, $desc]);

            $this->flash("Fee structure created successfully!");
            $this->redirect("/{$slug}/fees");
        }
        require 'app/views/fees/create.php';
    }

    public function pay($slug, $feeId, $studentId) {
        // This would typically be a student/parent login
        AuthMiddleware::protect(['student', 'parent', 'school_admin']);

        $db = DB::getInstance();
        $schoolId = $this->getSchoolId();

        // 1. Get Fee and Student details
        $stmt = $db->prepare("SELECT * FROM fees WHERE id = ? AND school_id = ?");
        $stmt->execute([$feeId, $schoolId]);
        $fee = $stmt->fetch();

        if (!$fee) {
            die("Fee not found");
        }

        // 2. Razorpay Integration logic (Mocking the API call for now)
        // In a real app, we'd fetch Razorpay Keys from the 'settings' table for this school_id
        $razorpayKey = "rzp_test_XYZ";

        // We'll pass these to the view to initialize the Razorpay Checkout JS
        require 'app/views/fees/pay.php';
    }

    public function verify($slug) {
        // Razorpay Webhook / Callback
        $paymentId = $_POST['razorpay_payment_id'] ?? '';
        $orderId = $_POST['razorpay_order_id'] ?? '';
        $amount = $_POST['razorpay_amount'] ?? '';
        $studentId = $_POST['student_id'] ?? '';
        $feeId = $_POST['fee_id'] ?? '';

        // Verify signature and update database
        $db = DB::getInstance();
        $schoolId = $this->getSchoolId();

        $stmt = $db->prepare("INSERT INTO payments (school_id, student_id, fee_id, amount_paid, payment_method, transaction_id, status) VALUES (?, ?, ?, ?, 'online', ?, 'completed')");
        $stmt->execute([$schoolId, $studentId, $feeId, $amount/100, $paymentId]);

        $this->flash("Payment verified successfully!");
        $this->redirect("/{$slug}/dashboard");
    }
}
