<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class MainController extends Controller
{
    
    public function index()
    {
        $data = kategori::all();
       return view('olahdata.index', compact('data'));
    }

    public function create()
    {
        return view('olahdata.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'keterangan' => 'required',

        ]);

        Kategori::create([
            'nama'=>$request->nama,
            'keterangan'=>$request->keterangan
        ]);

        return redirect(route('main.index'))->with('success', 'Data Berhasil Ditambahkan');
        }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $data = Kategori::find($id);
        return view('olahdata.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $Upd = Kategori::find($id);
        $this->validate($request, [
            'nama' => 'required',
            'keterangan' => 'required',

        ]);

        $Upd->update([
            'nama'=>$request->nama,
            'keterangan'=>$request->keterangan
        ]);

        return redirect(route('main.index'))->with('success', 'Data Berhasil Diubah');
    }

 
    public function destroy($id)
    {
        $d = Kategori::find($id);
        $d->delete();
        return redirect(route('main.index'))->with('success', 'Data Berhasil Dihapus');

    }
}
