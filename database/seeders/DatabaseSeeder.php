<?php

namespace Database\Seeders;

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
        User::Create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'password' => bcrypt('assalamualaikum'),
            'role' => 'super-admin'
        ]);
    }
}
