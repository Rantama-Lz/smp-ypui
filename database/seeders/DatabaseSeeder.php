<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\MapelMaster;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        User::factory()->create([
            'name' => 'Admin SMP YPUI',
            'email' => 'adminsmpypui@gmail.com',
        ]);
        $this->call([
            SiswaSeeder::class,
            GuruSeeder::class,
            MapelMasterSeeder::class,
            TingkatKelasSeeder::class,
            TahunAjaranSeeder::class,
            KelasSeeder::class,
            MataPelajaranSeeder::class,
            SiswaKelasSeeder::class
        ]);
    }
}
