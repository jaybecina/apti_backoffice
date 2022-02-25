<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\CustomerService;
use App\Http\Requests\StoreCustomerRequest;

class StoreController extends Controller
{
    private $service;

    public function __construct(CustomerService $service)
    {
        $this->service = $service;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreCustomerRequest $request)
    {
        try {
            $customer = $this->service->store($request->only('name', 'type'));
            $this->service->updateCustomerImage($customer, $request->only('image'));
            return redirect()->back()->with('success', 'Customer was successfully saved!');
        } catch (\Throwable $th) {
            \Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Ops! Something went wrong. Error Message: ' . $th->getMessage());
        }
    }
}
