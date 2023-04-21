<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //roles de usuarios
        $role1 = Role::create(['name' => 'Admin','description' => 'Administrador del Sistema']);
        $role2 = Role::create(['name' => 'User', 'description' => 'Usuario Generico']);

        //permisos dashboard
        Permission::create(['name' => 'dash',
                            'description' => 'Dashboard del Usuario'])->syncRoles([$role1, $role2]);

        //permisos usuarios
        Permission::create(['name' => 'admin.users.index',
                            'description' => 'Listado de Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.create',
                            'description' => 'Crear Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit',
                            'description' => 'Editar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.destroy',
                            'description' => 'Eliminar Usuarios'])->syncRoles([$role1]);
        //permisos roles
        Permission::create(['name' => 'admin.roles.index',
                            'description' => 'Listado de Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.create',
                            'description' => 'Crear Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit',
                            'description' => 'Editar Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.destroy',
                            'description' => 'Eliminar Rol'])->syncRoles([$role1]);
        //permisos permisos
        Permission::create(['name' => 'admin.permission.index',
                            'description' => 'Listado de Permisos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.permission.create',
                            'description' => 'Crear Permisos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.permission.edit',
                            'description' => 'Editar Presmisos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.permission.destroy',
                            'description' => 'Eliminar Permisos'])->syncRoles([$role1]);



    }
}
