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
            'name' => '5MB',
            'price' => 100000
        ]);

        InternetPackage::create([
            'name' => '10MB',
            'price' => 200000
        ]);

        InternetPackage::create([
            'name' => '15MB',
            'price' => 250000
        ]);
    }
}
