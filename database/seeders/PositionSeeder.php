<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create([
            'name' => 'Admin of FAKENET',
        ]);

        Position::create([
            'name' => 'CEO of FAKENET',
        ]);
    }
}
