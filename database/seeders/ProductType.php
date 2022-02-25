<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('product_types')->delete();

        \DB::table('product_types')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Desktop',
                'description' => 'Desktop',
                'image' => null,
                'image_url_path' => null,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Laptops and Notebooks',
                'description' => 'Laptops and Notebooks',
                'image' => null,
                'image_url_path' => null,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Smartphones',
                'description' => 'Smartphones',
                'image' => null,
                'image_url_path' => null,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Tables',
                'description' => 'Tables',
                'image' => null,
                'image_url_path' => null,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Speakers',
                'description' => 'Speakers',
                'image' => null,
                'image_url_path' => null,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Accessories',
                'description' => 'Accessories',
                'image' => null,
                'image_url_path' => null,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'Printers and Scanners',
                'description' => 'Printers and Scanners',
                'image' => null,
                'image_url_path' => null,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'Pc Parts',
                'description' => 'Pc Parts',
                'image' => null,
                'image_url_path' => null,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'Others',
                'description' => 'Others',
                'image' => null,
                'image_url_path' => null,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
