<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            Transaction::create([
                'client_Id' => $i,
                'user_id' => 1,
                'day' => date('d'),
                'month' => date('m'),
                'year' => date('Y'),
                'amount' => 100000,
                'is_paid' => 1
            ]);
        }
    }
}
