<?php

namespace application\services;

use Pionia\request\BaseRestService;
use Pionia\response\BaseResponse;

class UserService extends BaseRestService
{
	/**
	 * In the request object, you can hit this service using - {'ACTION': 'loginUser', 'SERVICE':'UserService' ...otherData}
	 */
	protected function loginUser(?array $data, ?array $files): BaseResponse
	{
		return BaseResponse::JsonResponse(0, 'You have reached login action', [$data, $files]);
	}

}
