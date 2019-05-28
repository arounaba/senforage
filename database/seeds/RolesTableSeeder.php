<?php

use Illuminate\Database\Seeder;
use illuminate\Support\Str;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role1=App\Role::firstOrCreate(["name"=>"Agent"],["uuid"=>(string)Str::uuid()]);
        $role2=App\Role::firstOrCreate(["name"=>"Client"],["uuid"=>(string)Str::uuid()]);
        $role3=App\Role::firstOrCreate(["name"=>"Gestionnaire"],["uuid"=>(string)Str::uuid()]);
        $role4=App\Role::firstOrCreate(["name"=>"Comptable"],["uuid"=>(string)Str::uuid()]);
        $role5=App\Role::firstOrCreate(["name"=>"Administrateur"],["uuid"=>(string)Str::uuid()]);

    }
}
