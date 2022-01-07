<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Division;
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
            'golongan' => 'X',
            'division_id' => 1,
            'username' => 'superadmin',
            'password' => bcrypt('assalamualaikum'),
            'role' => 'super-admin'
        ]);
        User::Create([
            'name' => 'Admin',
            'golongan' => 'X',
            'division_id' => 1,
            'username' => 'admin',
            'password' => bcrypt('12345'),
            'role' => 'admin'
        ]);

        Division::Create([
            'name' => 'none'
        ]);
        Division::Create([
            'name' => 'fakultas kesehatan'
        ]);

        Category::Create([
            'name' => 'Honorarium mengajar',
            'type' => 'semester',
        ]);
    }
}
