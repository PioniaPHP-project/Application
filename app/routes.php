<?php


use Pionia\core\routing\PioniaRouter;

$router = new PioniaRouter();

/**
 * Routes are grouped under one api. The default below
 */
$router->addGroup('application\Controller')
    ->post('api_v1', 'api_version_one');

//...rest of your routes


// please do not tamper with this line :)
return $router->getRoutes();