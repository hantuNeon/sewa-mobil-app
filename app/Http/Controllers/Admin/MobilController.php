<?php

namespace App\Http\Controllers\Admin;



use App\Models\mobil;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MobilStoreRequest;
use App\Http\Requests\Admin\MobilUpdateRequest;

class MobilController extends Controller
{
    //Berikut adalah function yang mengelola data mobil
    //Ini adalah function untuk mengambil data mobil di database sewa-mobil pada tabel mobil dan sekaligus menampilkan halaman index daftar mobil
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = mobil::latest()->get();
        return view('admin.mobil.index', compact('cars'));
    }

    //Ini adalah function untuk menampilkan halaman create data mobil
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mobil.create');
    }

    //Ini adalah function untuk melakukan validasi data mobil, kemudian melakukan perintah untuk menyimpan gambar pada folder asset/car dan sekaligus memberikan notifikasi pada web admin di halaman daftar mobil
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MobilStoreRequest $request)
    {
        if ($request->validated()) {
            $gambar = $request->file('gambar')->store('asset/car', 'public');
            $slug = Str::slug($request->nama_mobil, '-');
            mobil::create($request->except('gambar') + ['gambar' => $gambar, 'slug' => $slug]);
        }

        return redirect()->route('admin.mobil.index')->with(['massage' => 'Data Sukses Dibuat', 'alert-type' => 'success']);
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

    //Ini adalah function untuk menampilkan halaman edit data mobil
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(mobil $mobil)
    {
        return view('admin.mobil.edit', compact('mobil'));
    }

    //Ini adalah function untuk melakukan validasi data mobil yang telah diedit untuk diupdate dan menampilkan notifikasi pada web admin di halaman daftar mobil
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MobilUpdateRequest $request, mobil $mobil)
    {
        if ($request->validated()) {
            $slug = Str::slug($request->nama_mobil, '-');
            $mobil->update($request->validated() + ['slug' => $slug]);
        }

        return redirect()->route('admin.mobil.index')->with([
            'massage' => 'Data Berhasil Diedit',
            'alert-type' => 'info'
        ]);
    }

    //Ini adalah function untuk menghapus data mobil dan menampilkan notifikasi pada web admin di halaman daftar mobil
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(mobil $mobil)
    {
        if ($mobil->gambar) {
            unlink('storage/' . $mobil->gambar);
        }
        $mobil->delete();

        return redirect()->back()->with([
            'massage' => 'Data Berhasil Dihapus',
            'alert-type' => 'danger'
        ]);
    }


    //Ini adalah fungsi untuk mengubah gambar yang diedit pada halaman edit data
    public function updateImage(Request $request, $mobilId)
    {
        $request->validate([
            'gambar' => 'required|image'
        ]);
        $mobil = mobil::findOrFail($mobilId);
        if ($request->gambar) {
            unlink('storage/' . $mobil->gambar);
            $gambar = $request->file('gambar')->store('asset/car', 'public');

            $mobil->update(['gambar' => $gambar]);
        }

        return redirect()->back()->with([
            'massage' => 'Gambar Berhasil Diubah',
            'alert-type' => 'info'
        ]);
    }
}
