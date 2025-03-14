<?php

namespace App\Http\Controllers;

use App\Models\provinsi;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
   
    public function index()
    {
        $provinsi = Provinsi::all();
        return view('provinsi.index',compact('provinsi'));
    }

    
    public function create()
    {
        return view('provinsi.create');
    }

    public function store(Request $request)
    {

         $request->validate([
             'kode_provinsi' => 'required|max:3|unique:provinsis',
             'nama_provinsi' => 'required|unique:provinsis'
         ], [
             'kode_provinsi.required' => 'kode provinsi tidak boleh kosong',
             'kode_provinsi.max' => 'kode maximal 3 karakter',
             'kode_provinsi.unique' => 'kode provinsi sudah terdaftar',
             'nama_provinsi.required' => 'nama provinsi tidak boleh kosong',
             'nama_provinsi.unique' => 'nama provinsi sudah terdaftar'
         ]);

        $provinsi = new Provinsi;
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index');
    }

    public function show($id)
    {
      $provinsi = Provinsi::findOrFail($id);
      return view('provinsi.show', compact('provinsi'));
    }

    public function edit($id)
    {
      $provinsi = Provinsi::findOrFail($id);
      return view('provinsi.edit', compact('provinsi'));
    }


    public function update(Request $request, $id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index');
    }

    
    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id)->delete();
        return redirect()->route('provinsi.index');
    }
}
