@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Daftar Mobil</h1>
            <a href="{{ route('admin.mobil.create') }}" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mobil</th>
                            <th>Gambar Mobil</th>
                            <th>Harga Sewa</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cars as $mobil)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mobil->nama_mobil }}</td>
                                <td>
                                    <img src="{{ Storage::url($mobil->gambar) }}" width="200">
                                </td>
                                <td>{{ $mobil->harga_sewa }}</td>
                                <td>{{ $mobil->status }}</td>
                                <td>
                                    <a href="{{ route('admin.mobil.edit', $mobil->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form onclick="return confirm('Anda Yakin ingin Menghapus Data?');" action="{{ route('admin.mobil.destroy', $mobil->id) }}" class="d-inline" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="bth btn-sm btn-danger" type="submit">Del</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection