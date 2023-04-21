<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador del Sistema',
            'username' => '00000000',
            'email' => 'admin@hhheller.org',
            'password' => bcrypt('6m3v7f58')
        ])->assignRole('Admin');

        User::factory(99)->create();
    }
}
