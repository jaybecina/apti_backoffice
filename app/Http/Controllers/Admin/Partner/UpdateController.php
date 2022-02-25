<?php

namespace App\Http\Controllers\Admin\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\PartnerService;

use App\Http\Requests\UpdatePartnerRequest;

class UpdateController extends Controller
{
    private $service;

    public function __construct(PartnerService $service)
    {
        $this->service = $service;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdatePartnerRequest $request,$id)
    {
        try {
            $partner = $this->service->update($id, $request->only('name'));
            if($request->hasFile('image')){
                $this->service->updatePartnerImage($partner, $request->only('image'));
            }
            return redirect()->back()->with('success', 'Partner was successfully updated!');
        } catch (\Throwable $th) {
            \Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Ops! Something went wrong. Error Message: ' . $th->getMessage());
        }
    }
}
