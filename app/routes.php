<?php


use Pionia\core\routing\PioniaRouter;

$router = new PioniaRouter();

/**
 * Routes are grouped under one api. The default below, is api_v1 resolving to '/api/v1/'
 * Normally this is all you might need
 */
$router->addGroup('application\controller\Controller')
    ->post('apiV1', 'api_version_one');

//...rest of your routes

// please do not tamper with this line :)
return $router->getRoutes();
