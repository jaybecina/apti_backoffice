<?php // Code within app\Helpers\Helper.php

namespace App;

use App\Models\User;

class Helper
{
    public static function user_role_count($role)
    {
        $users = User::role($role)->get();

        return count($users);
    }
}
