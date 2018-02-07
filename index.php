<?php

define('DEBUG', true);

if (DEBUG) {
	ini_set('display_errors', 'On');
	ini_set('display_startup_errors', 'On');
	ini_set('error_reporting', -1);
}

ini_set('date.timezone', 'Europe/Amsterdam');
ini_set('default_charset', 'UTF-8');
mb_internal_encoding('UTF-8');

require('vendor/autoload.php');

use miBadger\Http\ServerResponseException;
use miBadger\Http\Session;
use miBadger\Mvc\View;
use miBadger\Router\Router;
use miBadger\Settings\Settings;
use miBadger\Boilerplate\Controller\Home;

Session::start();

$router = new Router();

$router->set('GET', '/', function () {
	return (new Home())->indexAction();
});

try {
	echo $router->resolve();
} catch (ServerResponseException $exception) {
	if ($exception->getServerResponse()->getStatusCode() == 404) {
		echo View::get(__DIR__ . '/src/View/404.php');
	} else {
		echo View::get(__DIR__ . '/src/View/Generic.php', ['exception' => $exception]);
	}
} catch (Exception $exception) {
	if (DEBUG) {
		echo View::get(__DIR__ . '/src/View/Debug.php', ['exception' => $exception]);
	} else {
		echo View::get(__DIR__ . '/src/View/Generic.php', ['exception' => $exception]);
	}
}
