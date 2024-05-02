<?php

namespace Jet\JetFramework\Services;

use JetPhp\Request\BaseRestService;
use JetPhp\Request\Request;
use JetPhp\Response\BaseResponse;

class UserService extends BaseRestService
{

    public function login(Request $request): BaseResponse
    {

        return BaseResponse::JsonResponse(
            0,
            "If you're still seeing, you need to implement the login action",
        );
    }
    /**
     * @inheritDoc
     */
    public function runAction(string $action_or_service, Request $request): BaseResponse
    {
        switch ($action_or_service){
            case 'login':
                return $this->login($request);
            default :
                return BaseResponse::JsonResponse(404, $action_or_service.' not found in the user context');
        }
    }
}