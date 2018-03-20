<?php

use Illuminate\Database\Seeder;
use App\Entities\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //inicio
        Permission::create([
            'name'=>'Dashboard',
            'slug'=>'dashboard.index',
        ]);

        //USUARIOS
        Permission::create([
            'name'=>'Usuários',
            'slug'=>'users.index',
        ]);

        //CLINICAS
        Permission::create([
            'name'=>'Clínicas',
            'slug'=>'clinics.index',
        ]);

        //SPECIALTIES
        Permission::create([
            'name'=>'Especialidades',
            'slug'=>'specialties.index',
        ]);

        //PESSOAS
        Permission::create([
            'name'=>'Pessoas',
            'slug'=>'people.index',
        ]);

        //PROCEDIMENTOS
        Permission::create([
            'name'=>'Pessoas',
            'slug'=>'procedures.index',
        ]);

        //PESSOAS
        Permission::create([
            'name'=>'Clintes',
            'slug'=>'custumers.index',
        ]);
    }
}
