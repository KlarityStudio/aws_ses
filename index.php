<?php

include('mail.php');

$mailer = new EmailAWSClient();

$body = '<html><body>I wrestled a bear once</body></html>';

$cc_array = array (
    'kurvin@klarity.co.za',
    'kurvindroid@gmail.com',
    'kurvin@twitter.com'
);

$status = $mailer->SendEmailToClient('kurvinhendricks@gmail.com', 'thisisatestmailerhere', $body, $cc_array);

if($status === 0) {
    echo 'Good to go';
}else {
    echo 'An error has occured';
}