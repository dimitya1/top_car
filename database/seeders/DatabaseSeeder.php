<?php

namespace Database\Seeders;

use App\Models\Feedback;
use App\Models\Permission;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //disable logging for test data
        activity()->disableLogging();

        Role::create(['name' => Role::ROLE_ADMIN]);
        Role::create(['name' => Role::ROLE_USER]);

        Permission::create(['name' => Permission::PERMISSION_MANAGE_ADMINS]);
        Permission::create(['name' => Permission::PERMISSION_MODERATE_REVIEWS]);
        Permission::create(['name' => Permission::PERMISSION_MODERATE_CARS]);

        //creating an admin
        $admin = User::factory()->create([
            'name'  => 'Administrator',
            'email' => 'admin@email.com',
        ]);
        $admin->assignRole(Role::ROLE_ADMIN);
        $admin->givePermissionTo([
            Permission::PERMISSION_MANAGE_ADMINS,
            Permission::PERMISSION_MODERATE_REVIEWS,
            Permission::PERMISSION_MODERATE_CARS,
        ]);

        $regularUsers = User::factory(30)->create();
        $regularUsers->each(function ($user) {
            $user->assignRole(Role::ROLE_USER);
        });

        //creating real car brands and models
        Artisan::call('topcar:brands-models:save');

        Review::factory(350)->create();
        Rating::factory(1200)->create();

        Feedback::factory(45)->create();

        activity()->enableLogging();
    }
}
