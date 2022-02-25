<?php

namespace App\Http\Controllers\Admin\UserManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



use App\Services\UserManagementService;
use App\Http\Requests\StoreUserManagementRequest;

class StoreController extends Controller
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
    public function __invoke(StoreUserManagementRequest $request)
    // public function __invoke(Request $request)
    {
        // return $request->profile_picture;
        try {
            $data = $request->except('_token');

            if ($request->has('cb_gen_pass')) {
                $data['password'] = $this->service->generatePassword()['hashedPassword'];
            } else {
                $data['password'] = $this->service->hashPassword($data['password']);
            }

            $data['name'] = $this->service->concatinateName($data);
            $user = $this->service->store($data);
            $this->service->addUserDetails($data, $user);

            return redirect()->back()->with('success', 'User Account was successfully registed.');
        } catch (\Throwable $th) {
            \Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Ops! Something went wrong. Error Message: ' . $th->getMessage());
        }
    }
}
