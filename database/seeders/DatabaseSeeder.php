<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Api\V1\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Api\V1\UserPassword;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        UserPassword::factory(40)->create();
        User::factory(40)->create();
    }
}
