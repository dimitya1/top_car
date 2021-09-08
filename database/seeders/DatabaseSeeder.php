<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\Review;
use App\Models\User;
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
        User::factory(30)->create();
        CarBrand::factory(20)->create();
        CarModel::factory(100)->create();
        Review::factory(350)->create();
    }
}
