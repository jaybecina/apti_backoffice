<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('abouts')->delete();

        \DB::table('abouts')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'header_title',
                'value' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'description',
                'value' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2=>
            array (
                'id' => 3,
                'name' => 'vision',
                'value' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'mission',
                'value' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
