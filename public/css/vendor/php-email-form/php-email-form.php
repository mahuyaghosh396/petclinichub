
<?php
class PHP_Email_Form {
    public $to;
    public $from_name;
    public $from_email;
    public $subject;
    public $smtp; // Optional: SMTP configuration if you want to use SMTP for sending emails
    public $messages = array();
    public $ajax = false;

    public function __construct() {

    }

    public function add_message($message, $label, $length = 6) {
        $this->messages[] = array(
            'message' => $message,
            'label' => $label,
            'length' => $length
        );
    }

    public function send() {
        $message_body = '';
        foreach ($this->messages as $message) {
            $message_body .= "{$message['label']}: {$message['message']}\n";
        }

        // Set up email headers
        $headers = "From: {$this->from_email}\r\n";
        $headers .= "Reply-To: {$this->from_email}\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Use mail() function to send email
        $success = mail($this->to, $this->subject, $message_body, $headers);

        if ($success) {
            return 'Email sent successfully';
        } else {
            return 'Error sending email';
        }
    }
}
?>