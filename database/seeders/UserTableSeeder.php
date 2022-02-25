<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
