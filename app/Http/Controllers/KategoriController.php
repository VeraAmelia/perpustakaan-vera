<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::latest()->get();
        return view('kategori.index', compact('kategoris'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('kategori.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_kategori' => 'required|string|max:20',
            'nama_kategori' => 'required',
        ]);

        $kategoris = Kategori::create([
            'kode_kategori' => $request->kode_kategori,
            'nama_kategori' => $request->nama_kategori,
        ]);

        if ($kategoris) {
            return redirect()
                ->route('kategori.index')
                ->with([
                    'success' => 'Data Kategori Berhasil ditambahkan'
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

    public function show(Kategori $kategori)
    {
        //
    }

    public function edit($id)
    {
        $kategoris = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategoris'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_kategori' => 'required|string|max:20',
            'nama_kategori' => 'required',
        ]);

        $kategoris = Kategori::findOrFail($id);

        $kategoris->update([
            'kode_kategori' => $request->kode_kategori,
            'nama_kategori' => $request->nama_kategori,
        ]);

        if ($kategoris) {
            return redirect()
                ->route('kategori.index')
                ->with([
                    'success' => 'Data Kategori Berhasil diperbaharui'
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
        $kategoris = Kategori::findOrFail($id);
        $kategoris->delete();

        if ($kategoris) {
            return redirect()
                ->route('kategori.index')
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
