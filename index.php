<?php

include('mail.php');

$mailer = new EmailAWSClient();

$body = '<html><body>I wrestled a bear once</body>
        <a href="https://www.thrifty.co.za/images/logo.jpg">HERE LIES THE THRIFTY LOGO</a>
        <img src="https://www.thrifty.co.za/images/logo.jpg">
        </html>';

$cc = 'kurvinhendricks@gmail.com,kurvintwitter@gmail.com';


//setting recipients to cc for now, to allow for mulitple recipients.

$status = $mailer->SendEmailToClient($cc, 'thisisatestmailerhere', $body, $cc);

if($status === 0) {
    echo 'Good to go';
}else {
    echo 'An error has occured';
}