<?php

error_reporting(E_ALL);
date_default_timezone_set('Europe/London');

include_once 'autoload.php';

$ba = new MyBankAccount(2.50);
Debug::dump($ba->getBalance(), 'balance');
$ba->depositFunds(10);
Debug::dump($ba->getBalance(), 'balance');
$ba->withdrawFunds(10);
Debug::dump($ba->getBalance(), 'balance');
$ba->setOverdraft(5);
$ba->withdrawFunds(6.50);
Debug::dump($ba->getBalance(), 'balance');
$ba->closeAccount();
Debug::dump($ba->getBalance(), 'balance');
try{
	$ba->withdrawFunds(1);
} catch (Exception $ex) {
	Debug::dump($ex->getMessage(), 'EXCEPTION');
}

try{
	$ba->depositFunds(2);
} catch (Exception $ex) {
	Debug::dump($ex->getMessage(), 'EXCEPTION');
}

$ba->openAccount();
$ba->depositFunds(2);
Debug::dump($ba->getBalance(), 'balance');

