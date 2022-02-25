<?php

namespace App\Services;

use App\Services\BaseService;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use App;

class UserManagementService extends BaseService
{

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function generatePassword()
    {
        $generated_password = Str::random(8);
        $hashedPassword = $this->hashPassword($generated_password);

        return [
            'generated_password'    =>  $generated_password,
            'hashedPassword'        =>  $hashedPassword,
        ];
    }

    public function hashPassword($generated_password)
    {
        return Hash::make($generated_password);
    }

    public function concatinateName(array $data)
    {
        return $data['first_name'] . ' ' . $data['middle_name'] .' '.  $data['last_name'];
    }

    public function addUserDetails(array $data, User $user)
    {
        $data['user_id'] = $user->id;
        if(array_key_exists('profile_picture', $data)){
            $data['profile_picture'] = 'storage/' . $data['profile_picture']->store('uploads/users/profile_picture', 'public');
        }
        $userDetails = UserDetail::create($data);
        $this->assignRole($userDetails->user_id, $data);


        return true;
    }

    public function updateUserDetails(array $data, User $user)
    {
        $data['user_id'] = $user->id;
        if(array_key_exists('profile_picture', $data)){
            $data['profile_picture'] = 'storage/' . $data['profile_picture']->store('uploads/users/profile_picture', 'public');
        }
        $userDetails = App::make(UserDetail::class)->where('user_id', $user->id)->first();
        $userDetails->fill($data);
        $userDetails->save();
        $this->assignRole($userDetails->user_id, $data);


        return true;
    }

    public function assignRole($user_id, $data)
    {
        $role = App::make(Role::class)->where('name', $data['role'])->with('permissions')->first();
        $permissions = $role->permissions->pluck('name');

        $user = App::make(User::class)->findOrFail($user_id);
        $user->syncRoles(array($data['role']));
        $user->syncPermissions($permissions);

        return true;
    }

    public function statusUpdate($user_id)
    {
        $user = App::make(User::class)->findOrFail($user_id);
        $user->status = !$user->status;
        $user->save();
        return true;
    }

}
