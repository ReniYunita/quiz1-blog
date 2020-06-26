<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = post::all();
        return view('postolahdata.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('postolahdata.create');
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
            'kategori' => 'required',
            'tanggal' => 'required',
            'slug' => 'required',
            'judul' => 'required',
            'keterangan' => 'required',

        ]);

        Post::create([
            'kategori'=>$request->kategori,
            'tanggal'=>$request->tanggal,
            'slug'=>$request->slug,
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
        $data = Post::find($id);
        return view('postolahdata.edit', compact('data'));
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
        $Upd = Post::find($id);
        $this->validate($request, [
            'kategori' => 'required',
            'tanggal' => 'required',
            'slug' => 'required',
            'judul' => 'required',
            'keterangan' => 'required',

        ]);

        $Upd->update([
            'kategori'=>$request->kategori,
            'tanggal'=>$request->tanggal,
            'slug'=>$request->slug,
            'judul'=>$request->judul,
            'keterangan'=>$request->keterangan
        ]);

        return redirect(route('post.index'))->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d = Post::find($id);
        $d->delete();
        return redirect(route('post.index'))->with('success', 'Data Berhasil Dihapus');
    }
}
