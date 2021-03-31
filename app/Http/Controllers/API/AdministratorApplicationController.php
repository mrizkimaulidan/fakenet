<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdministratorApplicationController extends Controller
{
    public function show(string $id): Response
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Data berhasil diambil!',
            'data' => User::with('position:id,name')->findOrFail($id)
        ], Response::HTTP_OK);
    }
}
