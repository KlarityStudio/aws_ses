<?php
/**
 * Created by PhpStorm.
 * User: kurvinhendricks
 * Date: 2017/04/25
 * Time: 3:25 PM
 */
require 'vendor/autoload.php';

$s3 = new Aws\S3\S3Client([
    'version' => 'latest',
    'region'  => 'us-east-1'
]);

//http://docs.aws.amazon.com/aws-sdk-php/v3/guide/getting-started/basic-usage.html

var_dump($s3);