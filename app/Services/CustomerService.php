<?php

namespace App\Services;

use App\Services\BaseService;
use App\Models\Customer;

use URL;

class CustomerService extends BaseService
{

    public function __construct(Customer $customer)
    {
        $this->model = $customer;
    }

    public function updateCustomerImage(Customer $customer, $request)
    {
        $this->transaction(function() use ($customer, $request) {
            $base_url = URL::to('/');
            $image_path = $request['image']->store('uploads/customer', 'public');

            $customer->image = $image_path;
            $customer->image_url_path = $base_url ."/storage/". $image_path;
            $customer->save();
            return $customer;
        });
    }
}
