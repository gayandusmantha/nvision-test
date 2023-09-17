<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        $user = User::firstOrCreate([
            'name' => "Admin",
            'email' => 'admin@nvison.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('admin1234'),
            'remember_token' => Str::random(40),
            'created_at' => Carbon::now()
        ]);
    }
}
