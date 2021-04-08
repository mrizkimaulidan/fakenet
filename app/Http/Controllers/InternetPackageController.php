<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInternetPackageRequest;
use App\Http\Requests\UpdateInternetPackageRequest;
use App\Models\InternetPackage;
use Illuminate\Http\Request;

class InternetPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $internet_packages = InternetPackage::select('id', 'name', 'price')->orderBy('price')->get();

        return view('internet_packages.index', compact('internet_packages'));
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
    public function store(StoreInternetPackageRequest $request)
    {
        InternetPackage::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->route('paket-internet.index')->with('success', 'Data berhasil ditambahkan!');
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
    public function update(UpdateInternetPackageRequest $request, $id)
    {
        $internet_package = InternetPackage::findOrFail($id);

        $internet_package->update([
            'name' => $request->name,
            'price' => $request->price
        ]);

        return redirect()->route('paket-internet.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $internet_package = InternetPackage::findOrFail($id);

        if ($internet_package->clients->isNotEmpty()) {
            return redirect()->route('paket-internet.index')->with('warning', 'Data yang masih memiliki relasi tidak dapat dihapus!');
        }

        return redirect()->route('paket-internet.index')->with('success', 'Data berhasil dihapus!');
    }
}
