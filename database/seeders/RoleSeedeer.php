<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //creando roles
        $role1 = Role::create(['name' => 'admin']);
        // $role1 = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $role2 = Role::create(['name' => 'instructor']);
        $role3 = Role::create(['name' => 'aprendiz']);


        //permisos seccion usuarios
        Permission::create(["name" => "usuarios"])->syncRoles([$role1]);
        Permission::create(['name' => 'usuarios.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'usuarios.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'usuarios.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'usuarios.destroy'])->syncRoles([$role1]);



    }
}
