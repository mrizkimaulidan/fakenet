<?php

namespace App\Repositories;

use App\Http\Controllers\Controller;
use App\Models\Client;

class ClientRepository extends Controller
{
    public function __construct(
        private Client $model
    ) {
    }

    /**
     * Ambil data klien yang baru daftar berdasarkan hari, bulan atau tahun.
     *
     * @param string $day adalah hari dalam bentuk angka dari 01-31.
     * @param string $month adalah bulan dalam bentuk angka dari 01-12.
     * @param string $year adalah tahun seperti 2019, 2020, dst.
     * @return Int
     */
    public function getNewestClientBy(string $day = null, string $month = null, string $year = null): Int
    {
        $count_newest_client = $this->model;

        if ($day !== null) {
            return $count_newest_client->whereDay('created_at', $day)->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
        }

        if ($month !== null) {
            return $count_newest_client->whereMonth('created_at', $month)->whereYear('created_at', date('Y'))->count();
        }

        return $count_newest_client->whereYear('created_at', $year)->count();
    }
}
