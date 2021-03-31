<?php

namespace Database\Seeders;

use App\Models\InternetPackage;
use Illuminate\Database\Seeder;

class InternetPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InternetPackage::create([
            'name' => '3MB',
            'price' => 150000
        ]);

        InternetPackage::create([
            'name' => '5MB',
            'price' => 200000
        ]);

        InternetPackage::create([
            'name' => '7MB',
            'price' => 250000
        ]);
    }
}
