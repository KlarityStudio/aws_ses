<?php

include('mail.php');

$mailer = new EmailAWSClient();

$body = '<html><body>I wrestled a bear once</body></html>';

$status = $mailer->SendEmailToClient('kurvinhendricks@gmail.com', 'thisisatestmailerhere', $body);

if($status === 0) {
    echo 'Good to go';
}else {
    echo 'An error has occured';
}