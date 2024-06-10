<?php


use Pionia\core\config\CoreKernel;
//use Pionia\Logging\PioniaLogger;
use Pionia\request\Request;

define('BASEPATH', __DIR__);

// set our settings globally
define('SETTINGS', BASEPATH . '/settings.ini');

//set_exception_handler('exception_handler');

//function exception_handler(Throwable $e): void
//{
//    $logger = PioniaLogger::init();
//    $logger->debug($e->getMessage(), $e->getTrace());
//}

require_once BASEPATH . '/vendor/autoload.php';

$routes = require_once BASEPATH . '/app/Routes.php';

$kernel = new CoreKernel($routes);


$request = Request::createFromGlobals();


$response = $kernel
    ->handle($request);

