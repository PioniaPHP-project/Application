<?php

namespace Jet\JetFramework;

use Jet\JetFramework\services\UserService;
use JetPhp\Request\BaseRestService;
use JetPhp\Request\Request;
use JetPhp\Response\BaseResponse;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class MainSwitch extends BaseRestService
{

    public function runAction(string $action_or_service, Request $request): BaseResponse
    {
        switch ($action_or_service) {
            case 'user':
                $service =  new UserService();
                return $service->process($request->getData()['ACTION'], $request);
            default:
                throw new ResourceNotFoundException('Service not found');
        }
    }

}