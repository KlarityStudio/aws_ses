<?php

set_include_path('/usr/local/pear/share/pear');

class EmailAWSClient
{
    function __construct() {

    }

    function SendEmailToClient($recipient, $subject, $body, $cc, $bcc)
    {
        // Replace sender@example.com with your "From" address.
        // This address must be verified with Amazon SES.
        define('SENDER', 'kurvin@klarity.co.za');

        // Replace recipient@example.com with a "To" address. If your account
        // is still in the sandbox, this address must be verified.
        define('RECIPIENT',
            $recipient . ','
            . $cc . ','
            . $bcc);

        // Replace smtp_username with your Amazon SES SMTP user name.
        define('USERNAME', '###########');

        // Replace smtp_password with your Amazon SES SMTP password.
        define('PASSWORD', '##########');

        // If you're using Amazon SES in a region other than US West (Oregon),
        // replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP
        // endpoint in the appropriate region.
        define('HOST', 'email-smtp.eu-west-1.amazonaws.com');

        // The port you will connect to on the Amazon SES SMTP endpoint.
        define('PORT', '587');

        // Other message information
        define('SUBJECT', $subject);
        define('BODY', $body);
        define('CONTENT_TYPE', 'text/html;charset=UTF-8');
        define('CC', $cc);
        define('BCC', $bcc);

        require_once 'Mail.php';

        $headers = array(
            'From' => SENDER,
            'To' => $recipient, // adding the recipient here as the to header
            'Subject' => SUBJECT,
            'Content-Type' => CONTENT_TYPE,
            'Cc' => CC,
            'Bcc' => BCC);

        $smtpParams = array(
            'host' => HOST,
            'port' => PORT,
            'auth' => true,
            'username' => USERNAME,
            'password' => PASSWORD
        );


        // Create an SMTP client.
        $mail = Mail::factory('smtp', $smtpParams);

        // Send the email.
        $result = $mail->send(RECIPIENT, $headers, BODY); //adding recipients here, mixed content both the to and cc mailers

        if (PEAR::isError($result)) {
            return 1;
        }

        return 0;
    }

}
