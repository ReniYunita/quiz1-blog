@extends('layout.app')
@section('breadcrumb')
<nav aria-label="braedcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item active" aria-current="page"> <a href="{{ route('album.index') }}"></a></li>
<li class="breadcrumb-item active" aria-current="page">Edit Data</li>
</ol>
</nav>
@endsection
@section('content')
    <div class="container">
    <div class="row">
    <div class="col">
    <h1 class="text-center">Edit Data<h1>
    </div>
    </div>
    <div class="row">
        <div class="col-8 offset-2">
        <form action="{{ route('album.update', $data->id) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control"name="nama" value="{{ $data->nama }}">
        </div>
        <div class="form-group">
        <label>Poto</label>
        <input type="text" class="form-control"name="poto" value="{{ $data->poto }}">
        </div>
        <div class="form-group">
        <label>Keterangan</label>
        <input type="text" class="form-control"name="keterangan" value="{{ $data->keterangan }}">
        </div>
        <input type="submit" class="btn btn-success" value="Update">
        </form>
    
        </div>
    </div>
    </div>
@endsection
