<?php
namespace Jet\JetFramework\Controller;

use Jet\JetFramework\MainSwitch;
use jetPhp\core\BaseApiController;
use jetPhp\request\Request;
use jetPhp\response\BaseResponse;

/**
 * This is the only controller we need here
 *
 * It is where all requests are pointing
 */
class ApiController extends BaseApiController
{

    /**
     * This is where the entire magic happens
     * @param Request $request
     * @return void
     */
    public function api_v1(Request $request): BaseResponse
    {
        $data = $request->getData();
        $service = $data["SERVICE"];
        $action = $data["ACTION"];

        if (!$service){
            throw new \Exception("No service was provided for this request");
        }

        if (!$action){
            throw new \Exception("No action was provided for this request");
        }

        try {
            $switch = new MainSwitch();
            return $switch->runAction($service, $request);
        } catch (\Exception $e) {
            return BaseResponse::JsonResponse(400, $e->getMessage());
        }
    }
}