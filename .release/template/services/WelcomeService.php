<?php

namespace Application\Services;

use Pionia\Collections\Arrayable;
use Pionia\Http\Bag\FileBag;
use Pionia\Http\Response\ApiResponse;
use Pionia\Http\Services\Service;

/**
 * @moonlight-summary Welcome to your first moonlight action
 * @moonlight-service welcome
 * @moonlight-version v1
 */
class WelcomeService extends Service
{
    /**
     * @moonlight-action ping
     * @moonlight-summary Application health check
     * @moonlight-example {"service":"welcome","action":"ping"}
     */
    protected function pingAction(Arrayable $data, ?FileBag $files = null): ApiResponse
    {
        return response(0, 'Welcome to ' . appName(), ['app' => appName()]);
    }
}
