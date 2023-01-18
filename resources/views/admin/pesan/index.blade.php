@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Daftar Pesan</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Pesan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pesan as $pesan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pesan->nama }}</td>
                                <td>{{ $pesan->email }}</td>
                                <td>{{ $pesan->subjek }}</td>
                                <td>{{ $pesan->isi }}</td>
                                <td>
                                    <form onclick="return confirm('Anda Yakin ingin Menghapus Data?');" action="{{ route('admin.pesan.destroy', $pesan->id) }}" class="d-inline" method="post">
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