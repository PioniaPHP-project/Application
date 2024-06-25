<?php


use Pionia\core\routing\PioniaRouter;

$router = new PioniaRouter();


$router->addSwitchFor("application\switches\MainApiSwitch");


return $router->getRoutes();
