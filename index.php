<?php


use Pionia\core\config\CoreKernel;
use Pionia\request\Request;

define('BASEPATH', __DIR__);

// set our settings globally
define('SETTINGS', BASEPATH . '/settings.ini');

require_once BASEPATH . '/vendor/autoload.php';

$routes = require_once BASEPATH . '/app/routes.php';

$kernel = new CoreKernel($routes);


$request = Request::createFromGlobals();


$response = $kernel
    ->handle($request);

