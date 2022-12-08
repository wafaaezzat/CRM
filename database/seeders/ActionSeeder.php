<?php

namespace Database\Seeders;

use App\Models\Action;
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
       Action::insert([
            'name'=>'call'
        ]);
       Action::insert([
            'name'=>'visit'
        ]);
       Action::insert([
            'name'=>'follow up'
        ]);
    }
}
