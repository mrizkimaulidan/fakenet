<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Repositories\TransactionReportRepository;
use Illuminate\Http\Request;

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
        if ($request->get('month') !== null) {
            $transactions = Transaction::where('month', $request->get('month'))->where('year', $request->get('year'))->get();
        }

        $transactions_this_month = $this->transactionReportRepository->getTransactionsBy(month: date('m'));
        $transactions_this_year = $this->transactionReportRepository->getTransactionsBy(year: date('Y'));

        return view('reports.transactions.index', compact('transactions_this_month', 'transactions_this_year'));
    }
}
