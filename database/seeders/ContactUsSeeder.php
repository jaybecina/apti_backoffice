<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('contact_us')->delete();

        \DB::table('contact_us')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'location',
                'value' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'address',
                'value' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2=>
            array (
                'id' => 3,
                'name' => 'telephone_number',
                'value' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'cellphone_number',
                'value' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'email_address',
                'value' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'website_url',
                'value' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
