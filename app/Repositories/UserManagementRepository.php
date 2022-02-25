<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\User;
use App\Models\UserDetails;
use App;

class UserManagementRepository extends BaseRepository
{

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getUsersExceptCurrentUser()
    {
        return $this->model->where('id','<>',auth()->id())
        ->with('userDetails', 'roles', 'permissions')
        ->latest()->paginate(5);
    }

}
