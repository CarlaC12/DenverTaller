<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Personal;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role0 = Role::create(['name' => 'Superadmin']);
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Secretari@']);
        $role3 = Role::create(['name' => 'Educador']);
        $role4 = Role::create(['name' => 'Auxiliar']);
        $role5 = Role::create(['name' => 'Padre']);
        $role6 = Role::create(['name' => 'Terapeuta']);
        //users y roles
        Permission::Create(['name' => 'ver-rol'])->syncRoles($role0);
        Permission::Create(['name' => 'crear-rol'])->syncRoles($role0);
        Permission::Create(['name' => 'editar-rol'])->syncRoles($role0);
        Permission::Create(['name' => 'borrar-rol'])->syncRoles($role0);

        //personal
        Permission::Create(['name' => 'ver-personal'])->syncRoles([$role1, $role2]);
        Permission::Create(['name' => 'crear-personal'])->syncRoles([$role0, $role1]);
        Permission::Create(['name' => 'editar-personal'])->syncRoles([$role0, $role1, $role2]);
        Permission::Create(['name' => 'borrar-personal'])->syncRoles([$role0, $role1]);

        //infantes
        Permission::Create(['name' => 'ver-infante'])->syncRoles([$role1, $role2]);
        Permission::Create(['name' => 'crear-infante'])->syncRoles([$role0, $role1]);
        Permission::Create(['name' => 'editar-infante'])->syncRoles([$role0, $role1, $role2]);
        Permission::Create(['name' => 'borrar-infante'])->syncRoles([$role0, $role1]);

        //evaluacion
        Permission::Create(['name' => 'ver-evaluacion'])->syncRoles([$role1, $role2, $role4,$role5,$role6]);
        Permission::Create(['name' => 'crear-evaluacion'])->syncRoles([$role0, $role3]);
        Permission::Create(['name' => 'editar-evaluacion'])->syncRoles([$role0, $role3, $role4]);
        Permission::Create(['name' => 'borrar-evaluacion'])->syncRoles([$role0]);

        //Roles
        Permission::Create(['name' => 'evaluar'])->syncRoles([$role3]);

        $user = new User();
        $personal=new Personal();
        $user->name = 'Carla Cruz';  
        $personal->nombre=$user->name;
        $user->email = 'carla.ccc344@gmail.com';       
        $user->password = bcrypt('12345');
        $user->save();
        $personal->direccion='Av.Siempre viva N°8525'; 
        $personal->telefono='74940481'; 
        $personal->ci='8226422'; 
        $personal->cargo='medico gral'; 
        $personal->sala='3'; 
        $personal->userId=$user->id;
        $personal->save();
        
        $user->assignRole('Educador');
        
        
        $user = new User();
        $user->name = 'admin';       
        $user->email = 'admin@gmail.com';       
        $user->password = bcrypt('admin');
        $user->save();
        $user->assignRole('Superadmin');
        
        // $user = new User();
        // $user->name = 'Daniel Maldonado';
        // $user->email = 'daniel@gmail.com';       
        // $user->password = bcrypt('123123');
        // $user->save();
        // $user->assignRole('Secretari@');



    }
}
