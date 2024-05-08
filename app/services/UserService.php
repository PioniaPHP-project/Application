<?php

namespace Jet\JetFramework\services;


use jetPhp\request\BaseRestService;
use jetPhp\response\BaseResponse;

class UserService extends BaseRestService
{
     protected function login($data, $files): BaseResponse
    {
       return BaseResponse::JsonResponse(0, "We reached well", [$data,$files]);
    }

}