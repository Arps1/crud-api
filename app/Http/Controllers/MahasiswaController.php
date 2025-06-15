<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Tampilkan semua data mahasiswa
    public function index()
    {
        return response()->json(Mahasiswa::all(), 200);
    }

    // Tambah data mahasiswa
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string|unique:mahasiswas,nim',
            'jurusan' => 'required|string'
        ]);
        try {
            $mahasiswa = Mahasiswa::create($request->all());
            return response()->json([
                'message' => 'Data mahasiswa berhasil ditambahkan',
                'data' => $mahasiswa
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Tampilkan data mahasiswa berdasarkan ID
    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($mahasiswa);
    }

    // Update data mahasiswa
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $mahasiswa->update($request->all());

        return response()->json([
            'message' => 'Data mahasiswa berhasil diperbarui',
            'data' => $mahasiswa
        ]);
    }

    // Hapus data mahasiswa
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $mahasiswa->delete();

        return response()->json(['message' => 'Data mahasiswa berhasil dihapus']);
    }
}
