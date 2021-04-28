<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Client;
use App\Models\InternetPackage;
use App\Models\Transaction;
use App\Repositories\TransactionRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
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
        $transactions = Transaction::with('client', 'user')->select('id', 'client_id', 'user_id', 'day', 'month', 'year')->latest()->get();

        $clients = Client::select('id', 'name', 'ip_address')->orderBy('name')->get();

        $amount_this_month = indonesian_currency($this->transactionRepository->sumAmount(month: date('m')));
        $amount_this_year = indonesian_currency($this->transactionRepository->sumAmount(year: date('Y')));

        return view('transactions.index', compact('transactions', 'clients', 'amount_this_month', 'amount_this_year'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {
        $client = Client::findOrFail($request->client_id);

        Transaction::create([
            'client_id' => $request->client_id,
            'user_id' => auth()->id(),
            'day' => $request->day,
            'month' => $request->month,
            'year' => $request->year,
            'amount' => $client->internet_package->price,
        ]);

        notify()->success('Data berhasil ditambahkan!', 'Berhasil!');

        return redirect()->route('tagihan.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->update([
            'client_id' => $request->client_id,
            'user_id' => auth()->id(),
            'day' => $request->day,
            'month' => $request->month,
            'year' => $request->year,
            'amount' => $transaction->client->internet_package->price
        ]);

        notify()->success('Data berhasil diubah!', 'Berhasil!');

        return redirect()->route('tagihan.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaction::findOrFail($id)->delete();

        notify()->success('Data berhasil dihapus!', 'Berhasil!');

        return redirect()->route('tagihan.index')->with('success', 'Data berhasil dihapus!');
    }
}
