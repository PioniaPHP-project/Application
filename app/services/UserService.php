<?php

namespace application\services;


use Exception;
use Pionia\Request\BaseRestService;
use Pionia\Response\BaseResponse;
//use Porm\Porm;

class UserService extends BaseRestService
{
    /**
     * @throws Exception
     */
    protected function login($data): BaseResponse
    {
        //  you can handle your login logic here
        //  $todos = Porm::from('todos')->all(); // fetches everythiing from todos table.
        return BaseResponse::JsonResponse(0, "We reached well", $data);
    }

}
