<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TransactionReportRepository;

class TransactionReportController extends Controller
{
    public function __construct(
        private TransactionReportRepository $transactionReportRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('reports.transactions.index');
    }
}
