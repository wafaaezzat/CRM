<?php

namespace Database\Seeders;

use App\Models\role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        role::insert([
            'name'=>'call'
        ]);
        role::insert([
            'name'=>'visit'
        ]);
        role::insert([
            'name'=>'follow up'
        ]);
    }
}
