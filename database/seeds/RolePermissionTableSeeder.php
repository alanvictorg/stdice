<?php

use Illuminate\Database\Seeder;
use App\Entities\RolePermission;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RolePermission::create([
           'role_id' => 1,
           'permission_id' => 1
        ]);

    }
}
