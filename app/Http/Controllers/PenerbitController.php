<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index()
    {
        $penerbits = Penerbit::latest()->get();
        return view('penerbit.index', compact('penerbits'));
    }

    public function create()
    {
        $penerbits = Penerbit::all();
        return view('penerbit.create', compact('penerbits'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_penerbit' => 'required|string|max:20',
            'nama_penerbit' => 'required',
        ]);

        $penerbits = Penerbit::create([
            'kode_penerbit' => $request->kode_penerbit,
            'nama_penerbit' => $request->nama_penerbit,
        ]);

        if ($penerbits) {
            return redirect()
                ->route('penerbit.index')
                ->with([
                    'success' => 'Data Penerbit Berhasil ditambahkan'
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

    public function show(Penerbit $penerbit)
    {
        //
    }

    public function edit($id)
    {
        $penerbits = Penerbit::findOrFail($id);
        return view('penerbit.edit', compact('penerbits'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_penerbit' => 'required|string|max:20',
            'nama_penerbit' => 'required',
        ]);

        $penerbits = Penerbit::findOrFail($id);

        $penerbits->update([
            'kode_penerbit' => $request->kode_penerbit,
            'nama_penerbit' => $request->nama_penerbit,
        ]);

        if ($penerbits) {
            return redirect()
                ->route('penerbit.index')
                ->with([
                    'success' => 'Data Penerbit Berhasil diperbaharui'
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
        $penerbits = Penerbit::findOrFail($id);
        $penerbits->delete();

        if ($penerbits) {
            return redirect()
                ->route('penerbit.index')
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
