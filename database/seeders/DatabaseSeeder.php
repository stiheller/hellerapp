<?php

namespace Database\Seeders;


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
        //roles
        /* $this->call(RoleSeeder::class); */
        //usuarios
        /* $this->call(UserSeeder::class); */

        /* Para Inventario Descomentar */
        /* $this->call(SectorSeeder::class); */
        /* $this->call(RackSeeder::class); */
        /* $this->call(ConmutadorSeeder::class); */
        /* $this->call(EquipamientoSeeder::class); */
        /* $this->call(CpuSeeder::class); */
        /* $this->call(MonitorSeeder::class); */
        /* $this->call(IpSeeder::class); */
        /* $this->call(ConexionSeeder::class); */
        $this->call(PuestoSeeder::class);
    }
}
