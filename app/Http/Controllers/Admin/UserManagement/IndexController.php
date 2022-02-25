<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use App\Repositories\UserManagementRepository;

class IndexController extends Controller
{
    private $repository;

    public function __construct(UserManagementRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $users = $this->repository->getUsersExceptCurrentUser();
        $roles = Role::all();

        // return $users;
        return view('admin.user_management.index', compact('users', 'roles'));
    }
}
