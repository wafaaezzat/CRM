<?php

namespace Database\Seeders;

use App\Models\ActionUser;
use Illuminate\Database\Seeder;

class ActionUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ActionUser::factory()->count(10)->create();
    }
}
