<?php

namespace Jet\JetFramework;

use Jet\JetFramework\services\UserService;
use jetPhp\core\BaseApiServiceSwitch;

class MainApiSwitch extends BaseApiServiceSwitch
{
    /**
     * Register your services here.
     *
     * @return array
     */
    public function registerServices(): array
    {
        return [
            'user' => new UserService(),
        ];
    }
}