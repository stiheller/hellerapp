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
        $this->call(SectorSeeder::class);
    }
}
