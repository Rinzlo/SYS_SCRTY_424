<?php
//error_reporting(E_STRICT);
declare(strict_types=1);
//phpinfo();
//print_r($_SERVER);

ini_set('session.cookie_lifetime', '864000');   // ten days in seconds

use PHPMailer\PHPMailer\PHPMailer;

/**
 * Twig
 */
require_once dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

session_start();

/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('login', ['controller' => 'Accounts', 'action' => 'login']);
$router->add('logout', ['controller' => 'Accounts', 'action' => 'logout']);
$router->add('{controller}/{action}');


$router->dispatch($_SERVER['QUERY_STRING']);