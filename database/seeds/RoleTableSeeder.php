<?php

use Illuminate\Database\Seeder;
use App\Role;

       

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = "superAdmin";
        $role->save();

        $role = new Role();
        $role->name = "Ingeniero";
        $role->save();

        $role = new Role();
        $role->name = "personalMedico";
        $role->save();
    }
}
