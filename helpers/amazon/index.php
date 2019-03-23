<?php

require_once "vendor/autoload.php";

use ApaiIO\Configuration\GenericConfiguration;
use ApaiIO\ApaiIO;

$conf = new GenericConfiguration();
$client = new \GuzzleHttp\Client();
$request = new \ApaiIO\Request\GuzzleRequest($client);

$conf
    ->setCountry('com')
    ->setAccessKey('YOUR ACCESS KEY')
    ->setSecretKey('YOUR SECRET KEY')
    ->setAssociateTag('YOUR ASSOCIATE TAG')
    ->setRequest($request);

$apaiIo = new ApaiIO($conf);



?>