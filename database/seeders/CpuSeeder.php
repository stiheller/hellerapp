<?php

namespace Database\Seeders;

use App\Models\Inventario\Cpu;
use Illuminate\Database\Seeder;

class CpuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<=14 ; $i++) { 
            Cpu::create([
                'macaddress' => 'ABCDEFGH'.$i,
                'procesador' => 'Intel i5',
                'equipamiento_id' => $i,
            ]);
        }
    }
}
