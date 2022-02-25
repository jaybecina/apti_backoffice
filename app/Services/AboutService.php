<?php

namespace App\Services;

use App\Services\BaseService;
use App\Models\About;
class AboutService extends BaseService
{

    public function __construct(About $about)
    {
        $this->model = $about;
    }

    public function updateValue(About $about, $value)
    {
        return $this->transaction(function () use ($about, $value){
            $about->value = $value;
            $about->save();
            return $about;
        });
    }
}
