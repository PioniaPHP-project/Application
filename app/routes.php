<?php


use JetPhp\Core\Routing\JetRouter;

$router = new JetRouter();

/**
 * Routes are grouped under one api. The default below
 */
$router->addGroup('Jet\JetFramework\Controller\ApiController')
    ->post('api_v1', 'api_version_one');

//...rest of your routes


// please do not tamper with this line :)
return $router->getRoutes();