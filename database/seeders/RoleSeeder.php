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
        //
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Capturista']);
        $role3 = Role::create(['name' => 'Alumno']);
        $role4 = Role::create(['name' => 'Profesor']);
        $role5 = Role::create(['name' => 'Verificador']);

        Permission::create(['name' => 'home'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'userAdmin'])->syncRoles([$role1]);
        Permission::create(['name'=> 'userProyecto'])->syncRoles([$role3,$role4,$role5]);
        Permission::create(['name' => 'registroUsuario'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'registroProyecto'])->syncRoles([$role1,$role4]);
        Permission::create(['name' => 'edicionProyecto'])->syncRoles([$role1,$role3,$role4,$role5]);
        Permission::create(['name' => 'listaProyectos'])->syncRoles([$role1,$role3,$role4,$role5]);
        Permission::create(['name' => 'authProyectos'])->syncRoles([$role1,$role5]);
        Permission::create(['name' => 'listUsuarios'])->syncRoles([$role2]);

    }
}
