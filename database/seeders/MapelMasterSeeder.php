<?php

namespace Database\Seeders;

use App\Models\MapelMaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapelMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         MapelMaster::create([
            'nama_mapel' => 'Pendidikan Agama dan Budi Pekerti',
        ]);
        MapelMaster::create([
            
            'nama_mapel' => 'Pendidikan Pancasila dan Kewarganegaraan (PPKn)',
            
        ]);
        MapelMaster::create([
            
            'nama_mapel' => 'Bahasa Indonesia',
        ]);
        MapelMaster::create([
            'nama_mapel' => 'Bahasa Inggris',
        ]);
        MapelMaster::create([
            'nama_mapel' => 'Matematika',
        ]);
        MapelMaster::create([
            'nama_mapel' => 'Ilmu Pengetahuan Alam (IPA)',

        ]);
          MapelMaster::create([
            'nama_mapel' => 'Ilmu Pengetahuan Sosial (IPS)',
        ]);
        MapelMaster::create([
            'nama_mapel' => 'Seni Budaya',
        ]);
        MapelMaster::create([
            'nama_mapel' => 'Pendidikan Jasmani, Olahraga, dan Kesehatan (PJOK)',
        ]);
        MapelMaster::create([
            'nama_mapel' => 'Teknologi Informasi dan Komunikasi (TIK)',
        ]);
    }
}
