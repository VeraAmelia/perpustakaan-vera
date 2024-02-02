<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::latest()->get();
        return view('buku.index', compact('bukus'));
    }

    public function create()
    {
        $bukus = Buku::all();
        return view('buku.create', compact('bukus'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_buku' => 'required|string|max:20',
            'judul' => 'required',
            'kategori_id' => 'required',
            'penerbit_id' => 'required',
            'isbn' => 'required',
            'pengarang' => 'required',
            'jumlah_halaman' => 'required',
            'tahun_terbit' => 'required',
            'sinopsis' => 'required',
            'gambar' => 'required',
        ]);

        $bukus = Buku::create([
            'kode_buku' => $request->kode_buku,
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'penerbit_id' => $request->penerbit_id,
            'isbn' => $request->isbn,
            'pengarang' => $request->pengarang,
            'jumlah_halaman' => $request->jumlah_halaman,
            'tahun_terbit' => $request->tahun_terbit,
            'sinopsis' => $request->sinopsis,
            'gambar' => $request->gambar,
        ]);

        if ($bukus) {
            return redirect()
                ->route('buku.index')
                ->with([
                    'success' => 'Data Buku Berhasil ditambahkan'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi kesalahan, Tolong ulangi kembali'
                ]);
        }
    }

    public function show(Buku $buku)
    {
        //
    }

    public function edit($id)
    {
        $bukus = Buku::findOrFail($id);
        return view('buku.edit', compact('bukus'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_buku' => 'required|string|max:20',
            'judul' => 'required',
            'kategori_id' => 'required',
            'penerbit_id' => 'required',
            'isbn' => 'required',
            'pengarang' => 'required',
            'jumlah_halaman' => 'required',
            'tahun_terbit' => 'required',
            'sinopsis' => 'required',
            'gambar' => 'required',
        ]);

        $bukus = Buku::findOrFail($id);

        $bukus->update([
            'kode_buku' => $request->kode_buku,
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'penerbit_id' => $request->penerbit_id,
            'isbn' => $request->isbn,
            'pengarang' => $request->pengarang,
            'jumlah_halaman' => $request->jumlah_halaman,
            'tahun_terbit' => $request->tahun_terbit,
            'sinopsis' => $request->sinopsis,
            'gambar' => $request->gambar,
        ]);

        if ($bukus) {
            return redirect()
                ->route('buku.index')
                ->with([
                    'success' => 'Data Buku Berhasil diperbaharui'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi kesalahan, Tolong ulangi kembali'
                ]);
        }
    }

    public function destroy($id)
    {
        $bukus = Buku::findOrFail($id);
        $bukus->delete();

        if ($bukus) {
            return redirect()
                ->route('buku.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi kesalahan, Tolong ulangi kembali'
                ]);
        }
    }
}