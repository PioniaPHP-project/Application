<?php

namespace application\authenticationBackends;





use Pionia\core\helpers\ContextUserObject;
use Pionia\core\interceptions\BaseAuthenticationBackend;
use Pionia\request\Request;

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