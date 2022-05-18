<?php

    // $logFile = fopen('error-log.txt', 'a');

    function sendEmail($userName, $userEmail, $subject, $content, $successMsg, $errorMsg) {

        require_once('./class.phpmailer.php');
        require_once('./class.smtp.php');
        require_once('./PHPMailerAutoload.php');
        require_once('./log-script.php');

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        $adminEmail = 'feedbacksnc2020@gmail.com';
        $adminPaswd = 'Snc@2020';

        // Gmail ID which you want to use as SMTP server
        $mail->Username = $adminEmail; //enter your mail address here
        // Gmail Password
        $mail->Password = $adminPaswd; //enter your mail address password
        $mail->SMTPSecure = 'tls'; //PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($adminEmail, 'S&C Team');
        $mail->isHTML(true);

        $mail->addAddress($userEmail, $userName);
        $mail->Subject = $subject;
        $mail->Body = $content;

        $logMsg = $errorMsg;
        $status = 'error';
        $returnValue = '';
        if ($mail->send() == 1) {
            $logMsg = $successMsg;
            $status = 'success';
            $returnValue = 1;
        }
        saveLog($logMsg, $status);
        return $returnValue;
    }

?>