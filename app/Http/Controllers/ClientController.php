<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\InternetPackage;

class ClientController extends Controller
{
    private $path = 'images/clients/house-image/';

    public function __construct(
        private UploadHandlerController $uploadHandlerController
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::with('internet_package')->select('id', 'internet_package_id', 'name', 'phone_number', 'ip_address')->latest()->get();

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
    public function store(StoreClientRequest $request)
    {
        Client::create([
            'internet_package_id' => $request->internet_package_id,
            'name' => $request->name,
            'ip_address' => $request->ip_address,
            'phone_number' => $request->phone_number,
            'house_image' => $this->uploadHandlerController->upload($request, $this->path, 'house_image'),
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
        $client = Client::with('internet_package')->findOrFail($id);

        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $internet_packages = InternetPackage::select('id', 'name', 'price')->get();

        return view('clients.edit', compact('client', 'internet_packages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, $id)
    {
        $client = Client::findOrFail($id);

        // Jika gambar ada maka update kolom house_image pada database.
        if ($request->file('house_image') !== null) {

            $client->update([
                'house_image' => $this->uploadHandlerController->upload($request, $this->path, 'house_image')
            ]);
        }

        $client->update([
            'internet_package_id' => $request->internet_package_id,
            'name' => $request->name,
            'ip_address' => $request->ip_address,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect()->route('klien.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        if ($client->internet_package->exists()) {
            return redirect()->route('klien.index')->with('warning', 'Data yang masih memiliki relasi tidak dapat dihapus!');
        }

        $client->delete();

        return redirect()->route('klien.index')->with('success', 'Data berhasil dihapus!');
    }
}
