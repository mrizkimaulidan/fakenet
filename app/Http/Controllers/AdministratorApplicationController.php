<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdministratorApplicationRequest;
use App\Http\Requests\UpdateAdministratorApplicationRequest;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;

class AdministratorApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $administrator_applications = User::with('position')->select('id', 'position_id', 'name', 'email', 'created_at')->latest()->get();
        $positions = Position::select('id', 'name')->orderBy('name')->get();

        return view('administrator_applications.index', compact('administrator_applications', 'positions'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdministratorApplicationRequest $request)
    {
        User::create([
            'position_id' => $request->position_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('administrator-aplikasi.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdministratorApplicationRequest $request, $id)
    {
        $administrator_application = User::findOrFail($id);

        if ($request->password !== null) {
            $administrator_application->update([
                'password' => bcrypt($request->password)
            ]);
        }

        $administrator_application->update([
            'position_id' => $request->position_id,
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->route('administrator-aplikasi.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('administrator-aplikasi.index')->with('success', 'Data berhasil dihapus!');
    }
}
