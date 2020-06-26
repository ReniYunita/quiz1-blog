@extends ('layout.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col">
    <h1 class="text-center">Data Poto</h1>
    </div>
    </div>
    <div class="row">
    <a href="{{ route('poto.create')}}" class="btn btn-info btn-block">Tambah Data</a>
    </div>
    <div class="row">
    <div class="col">
    <table class="table table-scriped">
    <thead>
        <th>No</th>
        <th>Tanggal</th>
        <th>ID Pos</th>
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
    <form method="POST" id="{{ $i }}" action="{{ route('poto.destroy', $d->id) }}">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    </form>
    <tr>
        <td>{{ $i }}</td>
        <td>{{ $d->tanggal }}</td>
        <td>{{ $d->id_pos }}</td>
        <td>{{ $d->judul }}</td>
        <td>{{ $d->keterangan }}</td>
        <td>{{ $d->created_at }}</td>
        <td>

        <div class="btn-group">
        <a href="{{ route('poto.edit', $d->id) }}" class="btn btn -sm btn-info">Edit</a>
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