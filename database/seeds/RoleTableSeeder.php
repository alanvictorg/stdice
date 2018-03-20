<?php

use Illuminate\Database\Seeder;
use  App\Entities\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create([
            'name'=>'Administrador',
            'slug'=>'admin',
        ]);

        Role::create([
            'name'=>'Médico',
            'slug'=>'doctor',
        ]);

        Role::create([
            'name'=>'Financeiro',
            'slug'=>'financial',
        ]);

        Role::create([
            'name'=>'Atendente',
            'slug'=>'clerk',
        ]);
    }
}
