<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\InternetPackage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::with('internet_package')->select('id', 'internet_package_id', 'name', 'phone_number', 'ip_address')->get();

        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $internet_packages = InternetPackage::select('id', 'name', 'price')->orderBy('price')->get();

        return view('clients.create', compact('internet_packages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('house_image')) {
            $path = 'images/clients/house-image/';

            $file = $request->file('house_image');
            $file_name = $path . Str::random(10) . $file->getClientOriginalName();

            $file->move($path, $file_name);
        }

        Client::create([
            'internet_package_id' => $request->internet_package_id,
            'name' => $request->name,
            'ip_address' => $request->ip_address,
            'phone_number' => $request->phone_number,
            'house_image' => $request->house_image,
            'address' => $request->address,
        ]);

        return redirect()->route('klien.index')->with('success', 'Data berhasil ditambahkan!');
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