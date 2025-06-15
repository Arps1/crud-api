<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    // Tambah ruangan
    public function create(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|unique:ruangans,kode',
            'nama' => 'required|string',
            'kapasitas' => 'required|integer',
        ]);

        $ruangan = Ruangan::create($request->all());

        return response()->json([
            'message' => 'Ruangan berhasil ditambahkan',
            'data' => $ruangan
        ], 201);
    }

    // Tampilkan semua ruangan
    public function read()
    {
        return response()->json(Ruangan::all(), 200);
    }

    // Update ruangan berdasarkan ID
    public function update(Request $request, $id)
    {
        $ruangan = Ruangan::find($id);
        if (!$ruangan) {
            return response()->json(['message' => 'Ruangan tidak ditemukan'], 404);
        }

        $ruangan->update($request->all());

        return response()->json([
            'message' => 'Ruangan berhasil diperbarui',
            'data' => $ruangan
        ]);
    }

    // Hapus ruangan
    public function delete($id)
    {
        $ruangan = Ruangan::find($id);
        if (!$ruangan) {
            return response()->json(['message' => 'Ruangan tidak ditemukan'], 404);
        }

        $ruangan->delete();
        return response()->json(['message' => 'Ruangan berhasil dihapus']);
    }
}
