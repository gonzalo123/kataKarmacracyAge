<?php

include __DIR__ . "/../vendor/autoload.php";

use Guzzle\Http\Client;
use G\Kcy\UserInfo;
use G\Kcy\AgeInfo;

$user = 'gonzalo123';

$client = new Client('http://karmacracy.com');
$response = $client->get('/api/v1/user/' . $user)->send()->getBody();

$facade = new AgeInfo(new UserInfo($response));
$age = $facade->getAge();

echo "{$user} is {$age} year/s old";