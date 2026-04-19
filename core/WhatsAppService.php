<?php
/**
 * WhatsAppService.php - Core logic for sending WhatsApp messages
 */
class WhatsAppService {
    private $schoolId;

    public function __construct($schoolId) {
        $this->schoolId = $schoolId;
    }

    private function getApiKey() {
        $db = DB::getInstance();
        $stmt = $db->prepare("SELECT setting_value FROM settings WHERE school_id = ? AND setting_key = 'whatsapp_api_key'");
        $stmt->execute([$this->schoolId]);
        return $stmt->fetchColumn();
    }

    public function send($phone, $message) {
        $apiKey = $this->getApiKey();
        if (!$apiKey) {
            // Fallback: Log that the message couldn't be sent due to missing API key
            error_log("WhatsApp API Key missing for school {$this->schoolId}");
            return false;
        }

        // Implementation for WhatsApp Cloud API / Twilio
        // For this project, we implement a mock request to represent the API call
        $payload = json_encode([
            'messaging_product' => 'whatsapp',
            'to' => $phone,
            'type' => 'text',
            'text' => ['body' => $message]
        ]);

        // Actual CURL implementation would go here
        // $ch = curl_init("https://graph.facebook.com/v17.0/YOUR_PHONE_NUMBER_ID/messages");
        // ... set headers with $apiKey ...

        return true;
    }

    public function sendFeeReminder($studentName, $amount, $dueDate, $phone) {
        $message = "Dear Parent, a fee payment of \${$amount} for {$studentName} is due on {$dueDate}. Please pay online to avoid late charges.";
        return $this->send($phone, $message);
    }
}
