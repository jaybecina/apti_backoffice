<?php

namespace App\Services;

use App\Services\BaseService;
use App\Models\ContactUs;

class ContactUsService extends BaseService
{

    public function __construct(ContactUs $contactUs)
    {
        $this->model = $contactUs;
    }

    public function updateValue(ContactUs $contactUs, $value)
    {
        return $this->transaction(function () use ($contactUs, $value){
            $contactUs->value = $value;
            $contactUs->save();
            return $contactUs;
        });
    }
}
