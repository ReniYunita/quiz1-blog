<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\album;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = album::all();
       return view('albumolahdata.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albumolahdata.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'poto' => 'required',
            'keterangan' => 'required',

        ]);

        album::create([
            'nama'=>$request->nama,
            'poto'=>$request->poto,
            'keterangan'=>$request->keterangan
        ]);

        return redirect(route('album.index'))->with('success', 'Data Berhasil Ditambahkan');
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
        $data = album::find($id);
        return view('albumolahdata.edit', compact('data'));
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
        $Upd = album::find($id);
        $this->validate($request, [
            'nama' => 'required',
            'poto' => 'required',
            'keterangan' => 'required',


        ]);

        $Upd->update([
            'nama'=>$request->nama,
            'poto'=>$request->poto,
            'keterangan'=>$request->keterangan
        ]);

        return redirect(route('album.index'))->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d = album::find($id);
        $d->delete();
        return redirect(route('album.index'))->with('success', 'Data Berhasil Dihapus');

    }
}
