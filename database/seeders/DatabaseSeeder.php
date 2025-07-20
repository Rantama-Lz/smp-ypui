<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kelas;
use App\Models\MapelMaster;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            // SiswaSeeder::class,
            // GuruSeeder::class,
            MapelMasterSeeder::class,
            TingkatKelasSeeder::class,
            TahunAjaranSeeder::class,
            SppSeeder::class,
            KelasSeeder::class,
            // MataPelajaranSeeder::class,
            // SiswaKelasSeeder::class
        ]);
    }
}
