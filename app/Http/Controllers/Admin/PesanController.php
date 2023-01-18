<?php

namespace App\Http\Controllers\Admin;

use App\Models\pesan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PesanController extends Controller
{
    //Berikut adalah functionn yang mengelola data pesan 
    //Ini adalah function untuk mengambil data pesan di database sewa-mobil pada tabel pesan dan sekaligus menampilkan halaman index daftar pesan
    public function index()
    {
        $pesan = pesan::latest()->get();

        return view('admin.pesan.index', compact('pesan'));
    }

    //Ini adalah function untuk menghapus data pesan dan menampilkan notifikasi pada web admin di halaman daftar pesan
    public function destroy(pesan $pesan)
    {
        $pesan->delete();

        return redirect()->back()->with([
            'massage' => 'Data Pesan Berhasil Dihapus',
            'alert-type' => 'danger'
        ]);
    }
}
