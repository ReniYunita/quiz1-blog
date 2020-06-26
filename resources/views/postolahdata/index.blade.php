@extends ('layout.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col">
    <h1 class="text-center">Data Pos</h1>
    </div>
    </div>
    <div class="row">
    <a href="{{ route('post.create')}}" class="btn btn-info btn-block">Tambah Data</a>
    </div>
    <div class="row">
    <div class="col">
    <table class="table table-scriped">
    <thead>
        <th>No</th>
        <th>Kategori</th>
        <th>Tanggal</th>
        <th>Slug</th>
        <th>Judul</th>
        <th>Keterangan</th>
        <th>Dibuat Pada</th>
        <th>Actions</th>
    </thead>
    <tbody>
    @php
    $i = 1;
    @endphp
    @foreach ($data as $d)
    <form method="POST" id="{{ $i }}" action="{{ route('post.destroy', $d->id) }}">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    </form>
    <tr>
        <td>{{ $i }}</td>
        <td>{{ $d->kategori }}</td>
        <td>{{ $d->tanggal }}</td>
        <td>{{ $d->slug }}</td>
        <td>{{ $d->judul }}</td>
        <td>{{ $d->keterangan }}</td>
        <td>{{ $d->created_at }}</td>
        <td>

        <div class="btn-group">
        <a href="{{ route('post.edit', $d->id) }}" class="btn btn -sm btn-info">Edit</a>
        <button type="submit" form="{{ $i }}" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger">Hapus</button>

        </div>
        </td>
    </tr>
    @php
    $i++;
    @endphp
    @endforeach
    </tbody>
    </table>
    </div>

    </div>
    </div>



@endsection