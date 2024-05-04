<?php


use jetPhp\core\config\CoreKernel;
use jetPhp\request\Request;

define('BASEPATH', __DIR__);

// set our settings globally
define('SETTINGS', BASEPATH . '/settings.ini');


require_once BASEPATH . '/vendor/autoload.php';


$routes = require BASEPATH . '/app/routes.php';


$kernel = new CoreKernel($routes);


$request = Request::createFromGlobals();

$response = $kernel
    ->registerMiddleware([]) // add here your middlewares
    ->registerAuthBackends([]) // add your authentication backends here
    ->handle($request);

