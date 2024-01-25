<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggotas = Anggota::latest()->get();
        return view('anggota.index', compact('anggotas'));
    }

    public function create()
    {
        $anggotas = Anggota::all();
        return view('anggota.create', compact('anggotas'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_anggota' => 'required|string|max:20',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);

        $anggotas = Anggota::create([
            'kode_anggota' => $request->kode_anggota,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
        ]);

        if ($anggotas) {
            return redirect()
                ->route('anggota.index')
                ->with([
                    'success' => 'Data Anggota Berhasil ditambahkan'
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

    public function show(Anggota $anggota)
    {
        //
    }

    public function edit($id)
    {
        $anggotas = Anggota::findOrFail($id);
        return view('anggota.edit', compact('anggotas'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_anggota' => 'required|string|max:20',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);

        $anggotas = Anggota::findOrFail($id);

        $anggotas->update([
            'kode_anggota' => $request->kode_anggota,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
        ]);

        if ($anggotas) {
            return redirect()
                ->route('anggota.index')
                ->with([
                    'success' => 'Data Anggota Berhasil diperbaharui'
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
        $anggotas = Anggota::findOrFail($id);
        $anggotas->delete();

        if ($anggotas) {
            return redirect()
                ->route('anggota.index')
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
