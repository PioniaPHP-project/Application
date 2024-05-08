<?php

namespace Jet\JetFramework;

use Jet\JetFramework\services\UserService;
use jetPhp\core\BaseApiServiceSwitch;

class MainApiSwitch extends BaseApiServiceSwitch
{
    public function registerServices(): array
    {
        return [
            'user' => new UserService(),
        ];
    }
}