<?php

namespace Jet\JetFramework\middlewares;

use jetPhp\core\interceptions\BaseMiddleware;
use jetPhp\request\Request;
use jetPhp\response\Response;

/**
 * This is a sample middleware, middlewares against every request
 * and every response.
 *
 * You can use middlewares to for example:-
 *      - Decrypt and encrypt every request
 *      - Perform request throttling to block some requests
 *      - Inject headers on requests and responses
 *      - anything you want to do before the action runs and after it has run.
 */
class SampleMiddleware extends BaseMiddleware
{

    public function run(Request $request, ?Response $response)
    {
        // TODO: Implement run() method.
    }
}