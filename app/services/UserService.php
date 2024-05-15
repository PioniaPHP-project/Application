<?php

namespace application\services;


use Pionia\request\BaseRestService;
use Pionia\response\BaseResponse;

class UserService extends BaseRestService
{
     protected function login($data, $files): BaseResponse
    {
       return BaseResponse::JsonResponse(0, "We reached well", [$data,$files]);
    }

}