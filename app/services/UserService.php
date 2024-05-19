<?php

namespace application\services;


use Pionia\request\BaseRestService;
use Pionia\response\BaseResponse;

class UserService extends BaseRestService
{

     protected function login($data, $files): BaseResponse
    {
        $email = $data['email'];
        $password = $data['password'];

        // these are validations here
        $this->asEmail($email);
        $this->asPassword($password);


       return BaseResponse::JsonResponse(0, "We reached well", [$data,$files]);
    }

}