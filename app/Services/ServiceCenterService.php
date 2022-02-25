<?php

namespace App\Services;

use App\Services\BaseService;
use App\Models\ServiceCenter;

class ServiceCenterService extends BaseService
{

    public function __construct(ServiceCenter $serviceCenter)
    {
        $this->model = $serviceCenter;
    }
}
