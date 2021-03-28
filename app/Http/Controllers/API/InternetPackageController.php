<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\InternetPackage;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InternetPackageController extends Controller
{
    public function show(string $id): Response
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Data berhasil diambil!',
            'data' => InternetPackage::findOrFail($id)
        ], Response::HTTP_OK);
    }
}
