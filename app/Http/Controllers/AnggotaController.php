<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
public function index()
    {
        $anggotas = anggota::latest()->get();
        return view('anggota.index', compact('anggotas'));
    }

    public function create()
    {
       
        return view('anggota.create');
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

        $anggotas = anggota::create([
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

    public function show(anggota $anggota)
    {
        //
    }

    public function edit($id)
    {
        
        return view('anggota.edit');
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

        $anggotas = anggota::findOrFail($id);

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
                    'success' => 'Data Anggota Berhasil Diperbaharui'
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
        $anggotas = anggota::findOrFail($id);
        $anggotas->delete();

        if ($anggotas) {
            return redirect()
                ->route('anggota.index')
                ->with([
                    'success' => 'Data Anggota Berhasil dihapuskan'
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