<?php

namespace App\Http\Controllers\Admin\UserManagement;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Repositories\UserManagementRepository;

class ShowController extends Controller
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
    public function __invoke(Request $request, $id)
    {
        $user = $this->repository->getById($id);
        $roles = Role::all();

        // return $users;
        return view('admin.user_management.show', compact('user', 'roles'));
    }
}
