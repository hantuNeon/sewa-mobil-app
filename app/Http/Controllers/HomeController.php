<?php

namespace App\Http\Controllers;

use App\Models\mobil;
use App\Models\pesan;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;

class HomeController extends Controller
{
    //ini adalah controller yang mengontrol web SEWAANku
    //ini adalah function yang mengontrol route index
    public function index()
    {
        $cars = mobil::latest()->get();
        return view('frontend.homepage', compact('cars'));
    }

    //Ini adalah function yang mengontrol route contact
    public function contact()
    {
        return view('frontend.contact');
    }

    //Ini adalah function yang mengatur notifikasi pesan email apakah pesan telah terkirim atau belum
    public function contactStore(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'subjek' => 'required',
            'isi' => 'required',
        ]);

        pesan::create($data);

        return redirect()->back()->with([
            'massage' => 'Pesan Anda Berhasil Terkirim',
            'alert-type' => 'success'
        ]);
    }

    //Ini adalah function yang mengontrol route detail
    public function detail(mobil $mobil)
    {
        return view('frontend.detail', compact('mobil'));
    }
}
