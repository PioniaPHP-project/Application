<?php

namespace application\switches;

use application\services\UserService;
use Pionia\core\BaseApiServiceSwitch;

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
