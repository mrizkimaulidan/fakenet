<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\InternetPackage;
use App\Repositories\ClientRepository;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        private TransactionRepository $transactionRepository,
        private ClientRepository $clientRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_new_client_this_day = $this->clientRepository->getNewestClientBy(day: date('d'));
        $count_new_client_this_month = $this->clientRepository->getNewestClientBy(month: date('m'));
        $count_new_client_this_year = $this->clientRepository->getNewestClientBy(year: date('Y'));

        $total_client = Client::count();
        $total_internet_package = InternetPackage::count();
        $internet_packages = InternetPackage::select('name', 'price')->orderBy('price')->take(3)->get();

        $sum_per_months = $this->transactionRepository->sumByAllMonths();
        $sum_this_month = indonesian_currency($this->transactionRepository->sumAmount(month: date('m')));
        $sum_this_year = indonesian_currency($this->transactionRepository->sumAmount(year: date('Y')));

        $transactions_by_limit = $this->transactionRepository->transactionLatestByLimit(5);

        return view('dashboard', compact('count_new_client_this_day', 'count_new_client_this_month', 'count_new_client_this_year', 'total_client', 'total_internet_package', 'internet_packages', 'sum_per_months', 'sum_this_month', 'sum_this_year', 'transactions_by_limit'));
    }
}
