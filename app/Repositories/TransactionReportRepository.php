<?php

namespace App\Repositories;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class TransactionReportRepository extends Controller
{
    public function __construct(
        private Transaction $model
    ) {
    }

    /**
     * Ambil data transaksi berdasarkan bulan atau tahun.
     *
     * @param string $month
     * @param string $year
     * @return Object
     */
    public function getTransactionsBy(string $month = null, string $year = null): Object
    {
        $transactions = $this->model->with('client', 'user')->where('is_paid', 1);

        if ($month !== null) {
            return $transactions->where('month', $month)->where('year', date('Y'))->latest()->get();
        }

        return $transactions->where('year', $year)->latest()->get();
    }
}
