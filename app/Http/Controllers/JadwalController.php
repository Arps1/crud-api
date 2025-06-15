<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'hari' => 'required|string',
            'jam_mulai' => 'required|string',
            'jam_selesai' => 'required|string',
            'makul_id' => 'required|exists:makuls,id',
            'dosen_id' => 'required|exists:dosens,id',
            'ruangan_id' => 'required|exists:ruangans,id',
        ]);

        $jadwal = Jadwal::create($request->all());

        return response()->json(['message' => 'Jadwal berhasil ditambahkan', 'data' => $jadwal]);
    }

    public function read()
    {
        return response()->json(Jadwal::with(['makul', 'dosen', 'ruangan'])->get());
    }

    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::find($id);
        if (!$jadwal) return response()->json(['message' => 'Jadwal tidak ditemukan'], 404);

        $jadwal->update($request->all());

        return response()->json(['message' => 'Jadwal berhasil diperbarui', 'data' => $jadwal]);
    }

    public function delete($id)
    {
        $jadwal = Jadwal::find($id);
        if (!$jadwal) return response()->json(['message' => 'Jadwal tidak ditemukan'], 404);

        $jadwal->delete();
        return response()->json(['message' => 'Jadwal berhasil dihapus']);
    }
}
