<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{
    public function show(string $id): Response
    {
        $transaction = Transaction::findOrFail($id);

        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Berhasil mengambil data!',
            'data' => $transaction
        ]);
    }
}
