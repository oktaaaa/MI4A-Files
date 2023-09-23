<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Models\Fakultas;
use Illuminate\Http\Request;
use Spatie\FlareClient\Context\BaseContextProviderDetector;

class FakultasController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $fakultas = Fakultas::all();
        // dd($fakultas);
        // return view ('fakultas.index') -> with('fakultas', $fakultas);
        return $this->sendSuccess($fakultas, 'Data Fakultas', 200);
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
            'nama_fakultas' => 'required|unique:fakultas',
            'nama_dekan' => 'required',
            'nama_wakil_dekan' => 'required'
        ]);
        $result = Fakultas::create($validasi);
        return $this -> sendSuccess($result, 'Fakultas berhasil ditambahkan', 201);
       
        
        // $fakultas = new Fakultas();
        // $fakultas-> nama_fakultas = $validasi['nama_fakultas'];
        // $fakultas-> nama_dekan  = $validasi['nama_dekan'];
        // $fakultas-> nama_wakil_dekan = $validasi['nama_wakil_dekan'];

        // $fakultas->save();
        // return redirect() -> route('fakultas.index') -> with('success', 'Data berhasil disimpan');

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
    public function destroy($id)
    {
        //
        $fakultas = Fakultas::findOrFail($id);
        // jika ada data fakultas dg id = $id
        if($fakultas->delete()){
            return $this->sendSuccess([], 'data terhapus', 303);
        }else{
            return $this->sendError('', 'Data gagal dihapus', 400);
        }
    }
}