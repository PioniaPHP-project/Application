<?php

use Pionia\Core\Config\CoreKernel;
use Pionia\Logging\PioniaLogger;

define('BASEPATH', __DIR__);

define('SETTINGS', BASEPATH . '/settings.ini');

require_once BASEPATH . '/vendor/autoload.php';

set_exception_handler('exception_handler');

function exception_handler(Throwable $e): void
{
    $logger = PioniaLogger::init();
    $logger->debug($e->getMessage(), $e->getTrace());
}

$routes = require_once BASEPATH . '/app/routes.php';

if (!defined('logger')){
    define("logger", PioniaLogger::init());
}

$kernel = new CoreKernel($routes);

$response = $kernel->run();
