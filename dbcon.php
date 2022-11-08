<?php
require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
$factory = (new Factory)
->withServiceAccount('ooad-project-36760-firebase-adminsdk-x1f8z-4abe588d73.json')
->withDatabaseUri('https://ooad-project-36760-default-rtdb.firebaseio.com/');
$database = $factory->createDatabase();
$auth = $factory->createAuth();
?>