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

        User::Create([
            'name' => 'Dr. Idham Jaya Ganda. Sp.A(K)',
            'golongan' => 'IV',
            'division_id' => 2,
            'username' => 'idhamjaya',
            'password' => bcrypt('12345'),
            'rekening' => '0219903867',
            'bank' => 'BNI',
            'role' => 'dosen'
        ]);
        User::Create([
            'name' => 'Dr. Hadia Angriani M, Sp.A(K)',
            'golongan' => 'IV',
            'division_id' => 2,
            'username' => 'hadiaangriani',
            'password' => bcrypt('12345'),
            'rekening' => '0094580081',
            'bank' => 'BNI',
            'role' => 'dosen'
        ]);
        User::Create([
            'name' => 'dr. Setia budi selekede, Sp.A(K)',
            'golongan' => 'IV',
            'division_id' => 2,
            'username' => 'setiabudi',
            'password' => bcrypt('12345'),
            'rekening' => '082789305',
            'bank' => 'BNI',
            'role' => 'dosen'
        ]);
        User::Create([
            'name' => 'Dr. dr. Martira maddepungeng Sp.A(K)',
            'golongan' => 'IV',
            'division_id' => 2,
            'username' => 'martira',
            'password' => bcrypt('12345'),
            'rekening' => '73127692',
            'bank' => 'BNI',
            'role' => 'dosen'
        ]);
        User::Create([
            'name' => 'Dr. dr. Ema Alasiry, Sp.A(K)',
            'golongan' => 'IV',
            'division_id' => 2,
            'username' => 'emaalasiry',
            'password' => bcrypt('12345'),
            'rekening' => '0223702462',
            'bank' => 'BNI',
            'role' => 'dosen'
        ]);
        User::Create([
            'name' => 'dr. Ratira Dewi Artati, Sp.A(K)',
            'golongan' => 'IV',
            'division_id' => 2,
            'username' => 'ratira',
            'password' => bcrypt('12345'),
            'rekening' => '237120035',
            'bank' => 'BNI',
            'role' => 'dosen'
        ]);
        User::Create([
            'name' => 'dr. Nadira Rasyid Ridha, Sp.A(K)',
            'golongan' => 'III',
            'division_id' => 2,
            'username' => 'nadirarasyid',
            'password' => bcrypt('12345'),
            'rekening' => '0172136570',
            'bank' => 'BNI',
            'role' => 'dosen'
        ]);
        User::Create([
            'name' => 'dr. Amiruddin L, Sp.A(K)',
            'golongan' => 'III',
            'division_id' => 2,
            'username' => 'amiruddin',
            'password' => bcrypt('12345'),
            'rekening' => '64500758',
            'bank' => 'BNI',
            'role' => 'dosen'
        ]);

        Division::Create([
            'name' => 'none'
        ]);
        Division::Create([
            'name' => 'ilmu kesehatan anak'
        ]);

        Category::Create([
            'name' => 'Honorarium mengajar',
            'type' => 'semester',
        ]);

        Category::Create([
            'name' => 'Honorarium dosen tidak tetap',
            'type' => 'bulan',
        ]);

        Category::Create([
            'name' => 'Honorarium membimbing',
            'type' => 'kegiatan',
        ]);

        Category::Create([
            'name' => 'Honorarium menguji',
            'type' => 'kegiatan',
        ]);

        Category::Create([
            'name' => 'Honorarium kegiatan',
            'type' => 'tertentu',
        ]);
    }
}
