<?php

namespace Database\Seeders;

use App\Models\Api\V1\UserPassword;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPasswordManager extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'website' => 'google.com',
                'username' => 'rabineupane.com.np@gmail.com',
                'password' => 'password123',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'website' => 'google.com',
                'username' => 'rabineupane.com.np@gmail.com',
                'password' => 'password123',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'website' => 'google.com',
                'username' => 'rabineupane.com.np@gmail.com',
                'password' => 'password123',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];
        UserPassword::create($data);
    }
}
