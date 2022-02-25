<?php

namespace App\Http\Controllers\Admin\ServiceCenter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\UpdateServiceCenterRequest;
use App\Services\ServiceCenterService;

class UpdateController extends Controller
{
    private $service;

    public function __construct(ServiceCenterService $service)
    {
        $this->service = $service;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateServiceCenterRequest $request, $id)
    {
        try {
            $this->service->update($id, $request->only('region_id', 'location', 'address', 'office_hours', 'map_link'));
            return redirect()->back()->with('success', 'Service Center was successfully update!');
        } catch (\Throwable $th) {
            \Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Ops! Something went wrong. Error Message: ' . $th->getMessage());
        }
    }
}
