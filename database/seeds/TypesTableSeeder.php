<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Type1=App\Type::firstOrCreate(["name"=>"Cash"],["uuid"=>Str::uuid()]);
        $Type2=App\Type::firstOrCreate(["name"=>"Orange Money"],["uuid"=>Str::uuid()]);
        $Type3=App\Type::firstOrCreate(["name"=>"Visa"],["uuid"=>Str::uuid()]);
        $Type4=App\Type::firstOrCreate(["name"=>"Cheque"],["uuid"=>Str::uuid()]);
        $Type5=App\Type::firstOrCreate(["name"=>"Wari"],["uuid"=>Str::uuid()]);
    }
}
