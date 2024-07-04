<?php

use Pionia\Core\Routing\PioniaRouter;

$router = new PioniaRouter();

$router->addSwitchFor("application\switches\MainApiSwitch");

return $router->getRoutes();
