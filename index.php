<?php

include('mail.php');

$mailer = new EmailAWSClient();

$body = '<html><body>I wrestled a bear once</body>
        <a href="https://www.thrifty.co.za/images/logo.jpg">I am testing the CC updates to my amazon SES function here</a>
        <img src="https://www.thrifty.co.za/images/logo.jpg">
        </html>';

$recipient = 'kurvintwitter@gmail.com';
$cc = 'kurvindroid@gmail.com, pieter@klarity.co.za, kurvinhendricks@gmail.com';

//setting recipients to cc for now, to allow for mulitple recipients.

$status = $mailer->SendEmailToClient($recipient, 'testing the CC', $body, $cc);

if($status === 0) {
    echo 'Good to go';
}else {
    echo 'An error has occured';
}