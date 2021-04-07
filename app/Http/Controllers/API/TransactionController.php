<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{
    public function detail(string $id): Response
    {
        $transaction = Transaction::with('user', 'client')->findOrFail($id);

        $data = [
            'client_name' => $transaction->client->name,
            'internet_package_name' => $transaction->client->internet_package->name,
            'internet_package_price' => indonesian_currency($transaction->client->internet_package->price),
            'client_ip' => $transaction->client->ip_address,
            'user_name' => $transaction->user->name,
            'day' => $transaction->day,
            'month' => $transaction->month,
            'year' => $transaction->year,
            'amount' => indonesian_currency($transaction->amount)
        ];

        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Berhasil mengambil data!',
            'data' => $data
        ]);
    }

    public function show(string $id): Response
    {
        $transaction = Transaction::with('user', 'client.internet_package', 'client')->findOrFail($id);

        $data = [
            'client_id' => $transaction->client_id,
            'client_name' => $transaction->client->name,
            'internet_package_name' => $transaction->client->internet_package->name,
            'internet_package_price' => indonesian_currency($transaction->client->internet_package->price),
            'day' => $transaction->day,
            'month' => $transaction->month,
            'year' => $transaction->year,
        ];

        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Berhasil mengambil data!',
            'data' => $data
        ]);
    }

    public function clientDetail(string $id)
    {
        $transaction = Client::select('id', 'internet_package_id', 'name')->with('internet_package')->findOrFail($id);

        $data = [
            'internet_package_name' => $transaction->internet_package->name,
            'internet_package_price' => indonesian_currency($transaction->internet_package->price)
        ];

        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Berhasil mengambil data!',
            'data' => $data
        ]);
    }
}
