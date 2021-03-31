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

        $month = Carbon::createFromFormat('m', $transaction->month)->isoFormat('MMMM');

        $data = [
            'client_name' => $transaction->client->name,
            'client_ip' => $transaction->client->ip_address,
            'user_name' => $transaction->user->name,
            'day' => $transaction->day,
            'month' => $month,
            'year' => $transaction->year,
            'amount' => indonesian_currency($transaction->amount),
            'is_paid' => get_is_paid_status($transaction->is_paid),
            'note' => $transaction->note
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

        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Berhasil mengambil data!',
            'data' => $transaction
        ]);
    }

    public function clientDetail(string $id)
    {
        $transaction = Client::with('internet_package')->findOrFail($id);

        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Berhasil mengambil data!',
            'data' => $transaction
        ]);
    }
}
