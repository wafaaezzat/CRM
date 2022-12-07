<?php

namespace Database\Seeders;

use App\Models\actionResult;
use Illuminate\Database\Seeder;

class ActionResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ActionResult::factory()->count(10)->create();

    }
}
