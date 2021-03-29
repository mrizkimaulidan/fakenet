<?php

namespace App\Repositories;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class TransactionRepository extends Controller
{
    public function __construct(
        private Transaction $model
    ) {
    }

    /**
     * Menghitung penjumlahan transaksi di kolom amount pada tabel transaction berdasarkan bulan atau tahun.
     * 
     * Jika $month !== null, maka hitung penjumlahan transaksi pada bulan ini dan tahun ini.
     * Jika $month === null, maka hanya hitung hitung penjumlahan transaksi pada tahun ini saja.
     *
     * @param string $month adalah bulan berbentuk angka, contoh : 01, 02, 03 dst..
     * @param string $year adalah tahun berbentuk angka, contoh : 2019, 2020, 2021 dst..
     * @return Int adalah hasil penghitungan total kolom amount tersebut.
     */
    public function sumAmount(string $month = null, string $year = null): Int
    {
        $transaction_amount = $this->model->where('is_paid', 1);

        if ($month !== null) {
            return $transaction_amount->where('month', $month)->where('year', date('Y'))->sum('amount');
        }

        return $transaction_amount->where('year', $year)->sum('amount');
    }

    /**
     * Menghitung total transaksi setiap bulan di tahun ini.
     *
     * @return array
     */
    public function sumByAllMonths(): array
    {
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

        foreach ($months as $key => $month) {
            $transaction_amount = $this->model->where('is_paid', 1)->where('month', $key)->where('year', date('Y'))->sum('amount');

            $result[$month] = $transaction_amount;
        }

        return $result;
    }
}
