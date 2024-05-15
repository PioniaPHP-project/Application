<?php
namespace application;

use Exception;
use application\MainApiSwitch;
use Pionia\core\BaseApiController;
use Pionia\request\Request;
use Pionia\response\BaseResponse;

/**
 * This is the only controller we need here
 *
 * It is where all requests are pointing
 *
 * It accepts only two request formats, that is GET and POST
 *
 * Get return the internal ping that just tells you that everything is running smooth
 */
class Controller extends BaseApiController
{

    /**
     * This is where the only action we need for our controller.
     *
     * It will map all post request targeting /api/v1/ to responsible services.
     *
     * @param Request $request
     * @return BaseResponse
     */
    public function api_v1(Request $request): BaseResponse
    {
        try {
            return MainApiSwitch::processServices($request);
        } catch (Exception $e) {
            return BaseResponse::JsonResponse(400, $e->getMessage());
        }
    }
}