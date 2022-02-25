<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();
        \DB::table('permissions')->delete();
        \DB::table('role_has_permissions')->delete();

        $super_permissions = collect([
            ['name' => 'can create'],
            ['name' => 'can read'],
            ['name' => 'can update'],
            ['name' => 'can dealete'],
        ]);

        $super_admin_role = Role::create(['name' => 'Super Admin']);
        $admin_role = Role::create(['name' => 'Admin']);
        $view_role = Role::create(['name' => 'Viewer']);
        $content_creator_role = Role::create(['name' => 'Content Creator']);


        $permission_create  = Permission::create(['name' => 'can create']);
        $permission_read    = Permission::create(['name' => 'can read']);
        $permission_update  = Permission::create(['name' => 'can update']);
        $permission_delete  = Permission::create(['name' => 'can delete']);

        // Super Admin
        $permission_create->assignRole($super_admin_role);
        $permission_read->assignRole($super_admin_role);
        $permission_update->assignRole($super_admin_role);
        $permission_delete->assignRole($super_admin_role);

        // Admin
        $permission_create->assignRole($admin_role);
        $permission_read->assignRole($admin_role);
        $permission_update->assignRole($admin_role);
        $permission_delete->assignRole($admin_role);

        // Viewer
        $permission_read->assignRole($view_role);

        // Content Creator
        $permission_create->assignRole($content_creator_role);
        $permission_read->assignRole($content_creator_role);
        $permission_update->assignRole($content_creator_role);

        $super_admin_user = User::where('email', 'admin@admin.com')->first();

        $super_admin_user->assignRole($super_admin_role->name);
        $super_admin_user->givePermissionTo($permission_create->name);
        $super_admin_user->givePermissionTo($permission_read->name);
        $super_admin_user->givePermissionTo($permission_update->name);
        $super_admin_user->givePermissionTo($permission_delete->name);


    }
}
