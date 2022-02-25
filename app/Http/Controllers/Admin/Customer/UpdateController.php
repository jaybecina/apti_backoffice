<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\UpdateCustomerRequest;
use App\Services\CustomerService;

class UpdateController extends Controller
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
    public function __invoke(UpdateCustomerRequest $request, $id)
    {
        try {
            $customer = $this->service->update($id, $request->only('name', 'type'));
            if($request->hasFile('image')){
                $this->service->updateCustomerImage($customer, $request->only('image'));
            }
            return redirect()->back()->with('success', 'Customer was successfully updated!');
        } catch (\Throwable $th) {
            \Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Ops! Something went wrong. Error Message: ' . $th->getMessage());
        }
    }
}
