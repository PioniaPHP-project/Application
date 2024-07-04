<?php

namespace application\services;


use Pionia\Request\BaseRestService;
use Pionia\Response\BaseResponse;

class UserService extends BaseRestService
{
    public function login(?array $data): BaseResponse
    {
        // you can start here
        return BaseResponse::JsonResponse(0, "You reached login action", $data);
    }
}
