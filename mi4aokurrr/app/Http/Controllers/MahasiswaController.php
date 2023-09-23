<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $mahasiswas = Mahasiswa::with('prodi.fakultas')->get();
        return $this->sendSuccess($mahasiswas, 'Data Mahasiswa', 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $prodi = Prodi::all();
        return view('mahasiswa.create') -> with ('prodi', $prodi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validasi = $request->validate([
            'npm' => 'required|unique:mahasiswas',
            'nama' => 'required',
            'tanggal' => 'required',
            'foto' => 'required|file|image',
            'prodi_id' => 'required'
        ]);

        $ext = $request ->foto->getClientOriginalExtension();
        
        // rename
        $file_baru = $request->npm.".".$ext;
        
        // upload
        $file = $request->file('foto');
        $file->move('public', $file_baru);
        $validasi['foto'] = $file_baru;
        $result = Mahasiswa::create($validasi);
        return $this ->sendSuccess($result, 'Ditambah', 201);
        // $mahasiswa = new Mahasiswa();
        // $mahasiswa->npm = $validasi['npm'];
        // $mahasiswa->nama = $validasi['nama'];
        // $mahasiswa->tanggal = $validasi['tanggal'];
        // $mahasiswa->prodi_id = $validasi['prodi_id'];

        // upload foto

        // $ext = $request -> foto -> getClientOriginalExtension();
        // $new_filename = $validasi['npm'] . '.' . $ext;
        // $request -> foto -> storeAs('public', $new_filename);

        // $mahasiswa -> foto = $new_filename;
        // $mahasiswa -> save();
        // $fileName = time() . '.' . $request->image->extension();
        // $request->image->storeAs('public/images', $fileName);
        
        // $mahasiswa = new Mahasiswa;
        // $mahasiswa->npm = $request->input('npm');
        // $mahasiswa->nama = $request->input('nama');
        // $mahasiswa->tanggal = $request->input('tanggal');
        // if($request->hasfile('foto'))
        // {
        //     $file = $request->file('foto');
        //     $extention = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extention;
        //     $file->move('public/images/', $filename);
        //     $mahasiswa->foto = $filename;
        // }
        // $mahasiswa->prodi_id = $request-> input('prodi_id');
        // $mahasiswa->save();
        
        // return redirect() -> route ('mahasiswa.index') -> with('success', 'Data berhasil disimpan' . $validasi['nama']);  
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
        $prodi = Prodi::orderBy('nama_prodi', 'ASC') -> get();
        return view('mahasiswa.edit')
        ->with('mahasiswa', $mahasiswa)
        ->with('prodi', $prodi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
        $validasi = $request->validate([
            'npm' => 'required',
            'nama' => 'required',
            'tanggal' => 'required',
            'foto' => 'required|file|image',
            'prodi_id' => 'required'
        ]);
        // upload foto

        $ext = $request -> foto -> getClientOriginalExtension();
        $new_filename = $validasi['npm'] . '.' . $ext;
        $request -> foto -> storeAs('public', $new_filename);

        $validasi['foto']= $new_filename;
        
        Mahasiswa::where('id', $mahasiswa->id) -> update($validasi);
        $mahasiswa -> foto = $new_filename;
        $mahasiswa -> save();
        return redirect() -> route ('mahasiswa.index') -> with('success', 'Data berhasil disimpan' . $validasi['nama']);  

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
        $this->authorize('delete', $mahasiswa);
        $mahasiswa->delete();
        return back();
    }
}