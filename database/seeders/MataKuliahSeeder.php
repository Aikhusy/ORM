<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $matkul = 
        [
            [
                'nama_matkul'=>'PBO',
                'sks'=>3,
                'jam'=>6,
                'semester'=>4,
            ],
            [
                'nama_matkul'=>'PWL',
                'sks'=>3,
                'jam'=>6,
                'semester'=>4,
            ],
            [
                'nama_matkul'=>'BDL',
                'sks'=>3,
                'jam'=>4,
                'semester'=>4,
            ],
            [
                'nama_matkul'=>'PBDL',
                'sks'=>3,
                'jam'=>6,
                'semester'=>4,
            ],
        ];
        DB::table('matakuliah')->insert($matkul);
    }
}
