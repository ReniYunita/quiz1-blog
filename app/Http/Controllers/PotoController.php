<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\poto;

class PotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $data = poto::all();
            return view('potoolahdata.index', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            return view('potoolahdata.create');
        }
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
            'tanggal' => 'required',
            'id_pos' => 'required',
            'judul' => 'required',
            'keterangan' => 'required',

        ]);

        poto::create([
            'tanggal'=>$request->tanggal,
            'id_pos'=>$request->id_pos,
            'judul'=>$request->judul,
            'keterangan'=>$request->keterangan

        ]);

        return redirect(route('post.index'))->with('success', 'Data Berhasil Ditambahkan');
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
        $data = poto::find($id);
        return view('potoolahdata.edit', compact('data'));
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
        $Upd = poto::find($id);
        $this->validate($request, [
            'tanggal' => 'required',
            'id_pos' => 'required',
            'judul' => 'required',
            'keterangan' => 'required',

        ]);

        $Upd->update([
            'tanggal'=>$request->tanggal,
            'id_pos'=>$request->id_pos,
            'judul'=>$request->judul,
            'keterangan'=>$request->keterangan

        ]);

        return redirect(route('poto.index'))->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d = poto::find($id);
        $d->delete();
        return redirect(route('poto.index'))->with('success', 'Data Berhasil Dihapus');
    }
}
