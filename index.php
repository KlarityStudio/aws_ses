<?php
set_include_path('/usr/local/pear/share/pear');
// Replace sender@example.com with your "From" address.
// This address must be verified with Amazon SES.
define('SENDER', 'kurvin@klarity.co.za');

// Replace recipient@example.com with a "To" address. If your account
// is still in the sandbox, this address must be verified.
define('RECIPIENT', 'kurvinhendricks@gmail.com');

// Replace smtp_username with your Amazon SES SMTP user name.
define('USERNAME','AKIAI2C7PYC3EF6JRL6Q');

// Replace smtp_password with your Amazon SES SMTP password.
define('PASSWORD','AnX3YwqiA+sZgjXIo92h/VPEFiqV4LlChqz45fUeWS96');

// If you're using Amazon SES in a region other than US West (Oregon),
// replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP
// endpoint in the appropriate region.
define('HOST', 'email-smtp.eu-west-1.amazonaws.com');

 // The port you will connect to on the Amazon SES SMTP endpoint.
define('PORT', '587');

// Other message information
define('SUBJECT','Amazon SES test (SMTP interface accessed using PHP)');
define('BODY','baby im a big blue whale');

require_once 'Mail.php';

$headers = array (
    'From' => SENDER,
    'To' => RECIPIENT,
    'Subject' => SUBJECT);

$smtpParams = array (
    'host' => HOST,
    'port' => PORT,
    'auth' => true,
    'username' => USERNAME,
    'password' => PASSWORD
);


 // Create an SMTP client.
$mail = Mail::factory('smtp', $smtpParams);
var_dump($mail);
// Send the email.
$result = $mail->send(RECIPIENT, $headers, BODY);

var_dump($result);

if (PEAR::isError($result)) {
    var_dump('HERE I AM AGAIN');
    echo("Email not sent. " .$result->getMessage() ."\n");
} else {
    var_dump('HERE I AM AGAIN');
    echo("Email sent!"."\n");
}

?>