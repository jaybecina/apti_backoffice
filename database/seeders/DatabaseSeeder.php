<?php

namespace Database\Seeders;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(ProductType::class);
        $this->call(AboutSeeder::class);
        $this->call(ContactUsSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(CategoryNewsSeeder::class);
        $this->call(RoleSeeder::class);

        Model::reguard();
    }
}
