<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DashboardChartController extends Controller
{
    public function __construct(
        private TransactionRepository $transactionRepository
    ) {
    }

    public function chartMonthly()
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Berhasil mengambil data!',
            'data' => $this->transactionRepository->sumByAllMonths()
        ], Response::HTTP_OK);
    }
}
