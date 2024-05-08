<?php

namespace Jet\JetFramework\authenticationBackends;

use jetPhp\core\helpers\ContextUserObject;
use jetPhp\core\interceptions\BaseAuthenticationBackend;
use jetPhp\request\Request;

/**
 * Implement this to handle web user authentication
 */
class WebAuthBackend extends BaseAuthenticationBackend
{

    public function authenticate(Request $request): ContextUserObject
    {
        // TODO: Implement authenticate() method.
        return new ContextUserObject();
    }
}