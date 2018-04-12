<?php
/**
 * This file is part of the miBadger package.
 *
 * @author Barry Lagerburg barrytwee@gmail.com
 * @license http://opensource.org/licenses/Apache-2.0 Apache v2 License
 */

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
use miBadger\Website\Controller\Home;
use miBadger\Website\Controller\Component;
use miBadger\Website\Controller\GettingStarted;
Session::start();

$router = new Router();

$router->set('GET', '/', function () {
    return (new Home())->indexAction();
});

$router->set('GET', '/getting-started/', function(){
   return (new GettingStarted())->mibadgerReadmeAction();
});
      
$router->set('GET', '/{name}/', function ($name) {
    return (new Component())->readmeAction($name);
});

 $router->set('GET', '/{name}/{doc}/', function ($name, $doc) {
    return (new Component())->docsAction($name, $doc);
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
