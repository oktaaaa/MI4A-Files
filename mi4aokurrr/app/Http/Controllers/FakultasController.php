<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $fakultas = Fakultas::all();
        // dd($fakultas);
        return view ('fakultas.index') -> with('fakultas', $fakultas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //ini tu untuk liat whether or not the data is inputted
        // dd($request);
        $validasi = $request -> validate([
            'nama_fakultas' => 'required',
            'nama_dekan' => 'required',
            'nama_wakil_dekan' => 'required'
        ]);

        $fakultas = new Fakultas();
        $fakultas-> nama_fakultas = $validasi['nama_fakultas'];
        $fakultas-> nama_dekan  = $validasi['nama_dekan'];
        $fakultas-> nama_wakil_dekan = $validasi['nama_wakil_dekan'];

        $fakultas->save();
        return redirect() -> route('fakultas.index') -> with('success', 'Data berhasil disimpan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fakultas $fakultas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fakultas $fakultas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fakultas $fakultas)
    {
        //
    }
}