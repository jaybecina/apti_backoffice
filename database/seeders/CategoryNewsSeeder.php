<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news_categories')->delete();

        \DB::table('news_categories')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'International News',
                'description' => 'International News',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'National News',
                'description' => 'National News',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Local News',
                'description' => 'Local News',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
