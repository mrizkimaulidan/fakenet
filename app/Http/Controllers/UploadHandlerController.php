<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadHandlerController extends Controller
{
    /**
     * Upload handler untuk file.
     *
     * @param Request $request
     * @param string $path adalah path atau lokasi file ini tersimpan.
     * @param string $key adalah key name dari kolom inputan.
     * @return String mereturn nama file untuk disimpan ke dalam tabel.
     */
    public function upload(Request $request, string $path, string $key): String
    {
        if ($request->hasFile($key)) {

            $file = $request->file($key);
            $file_name = $path . Str::random(10) . $file->getClientOriginalName();

            $file->move($path, $file_name);

            return $file_name;
        }
    }
}
