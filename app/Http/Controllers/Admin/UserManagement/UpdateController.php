<?php

namespace App\Http\Controllers\Admin\UserManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserManagementService;
use App\Http\Requests\UpdateUserManagementRequest;

class UpdateController extends Controller
{
    private $service;

    public function __construct(UserManagementService $service)
    {
        $this->service = $service;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateUserManagementRequest $request, $id)
    {
        try {
            $data = $request->except('_token');
            $user = $this->service->update($id, $data);
            $this->service->updateUserDetails($data, $user);

            return redirect()->back()->with('success', 'User Account was successfully update.');
        } catch (\Throwable $th) {
            \Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Ops! Something went wrong. Error Message: ' . $th->getMessage());
        }
    }
}
