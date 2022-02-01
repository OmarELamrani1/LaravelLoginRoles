<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Roles();
        $role->role = "admin";
        $role->save();
        
        $role = new Roles();
        $role->role = "user";
        $role->save();
        
        $role = new Roles();
        $role->role = "manager";
        $role->save();
    }
}
