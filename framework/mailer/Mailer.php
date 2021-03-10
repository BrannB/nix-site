<?php

namespace framework\Mailer;

use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Mailer
{
    public function sendMail($purchase_id, $body)
    {
        $subject = "AlexGameShop: Purchase#" . "$purchase_id";
        $emailTo = $_SESSION['email'];

        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
            ->setUsername('php1mailer@gmail.com')
            ->setPassword('phpmailer123');

        $mailer = new Swift_Mailer($transport);

        $message = (new Swift_Message("$subject"))
            ->setFrom(['php1mailer@gmail.com' => 'AlexGameShop'])
            ->setTo(["$emailTo"])
            ->setBody("$body");

        $result = $mailer->send($message);
    }
}