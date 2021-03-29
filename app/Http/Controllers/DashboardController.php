<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\InternetPackage;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        private TransactionRepository $transactionRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_client = Client::count();
        $total_internet_package = InternetPackage::count();

        $sum_per_months = $this->transactionRepository->sumByAllMonths();
        $sum_this_month = indonesian_currency($this->transactionRepository->sumAmount(month: date('m')));
        $sum_this_year = indonesian_currency($this->transactionRepository->sumAmount(year: date('Y')));

        return view('dashboard', compact('total_client', 'total_internet_package', 'sum_per_months', 'sum_this_month', 'sum_this_year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
