<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    function index()
    {
        $mahasiswa = Mahasiswa::paginate(10);

        return response()->json([
            'data' => $mahasiswa
        ]);
    }

    function store(Request $request)
    {
        $mahasiswa = Mahasiswa::create([
            'nama' => $request->nama,
            'npm' => $request->npm,
            'jurusan' => $request->jurusan
        ]);

        return response()->json([
            'data' => $mahasiswa
        ]);
    }

    function show(Mahasiswa $mahasiswa)
    {
        return response()->json([
            'data' => $mahasiswa
        ]);
    }

    function update(Request $request, Mahasiswa $mahasiswa)
    {
        $mahasiswa->nama = $request->nama;
        $mahasiswa->npm = $request->npm;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->save();

        return response()->json([
            'data' => $mahasiswa
        ]);
    }

    function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return response()->json([
            'message' => 'Data mahasiswa berhasil dihapus'
        ], 204);
    }
}
