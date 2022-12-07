<?php

namespace Database\Seeders;

use App\Models\role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        role::insert([
            'name'=>'admin'
        ]);
         role::insert([
            'name'=>'employee'
        ]);
         role::insert([
            'name'=>'customer'
        ]);    }
}
