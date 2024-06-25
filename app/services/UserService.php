<?php

namespace application\services;


use Exception;
use Pionia\request\BaseRestService;
use Pionia\response\BaseResponse;
use Porm\Porm;

class UserService extends BaseRestService
{
    /**
     * @throws Exception
     */
    protected function login($data, $files): BaseResponse
    {
        //  you can handle your login logic here
        $todos = Porm::from('todos')->all();
        return BaseResponse::JsonResponse(0, "We reached well", $todos);
    }

}