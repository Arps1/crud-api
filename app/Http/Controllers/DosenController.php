<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function create(Request $request)
    {
    $request->validate([
        'nama' => 'required|string',
        'nidn' => 'required|string|unique:dosens,nidn',
        'email' => 'required|email|unique:dosens,email',
        'prodi' => 'required|string',
    ]);

    $dosen = Dosen::create($request->all());

    return response()->json(['message' => 'Dosen berhasil ditambahkan', 'data' => $dosen]);
    }

    public function read()
    {
        return response()->json(Dosen::all());
    }

    public function update(Request $request, $id)
    {
        $dosen = Dosen::find($id);
        if (!$dosen) return response()->json(['message' => 'Dosen tidak ditemukan'], 404);

        $dosen->update($request->all());
        return response()->json(['message' => 'Dosen berhasil diperbarui', 'data' => $dosen]);
    }

    public function delete($id)
    {
        $dosen = Dosen::find($id);
        if (!$dosen) return response()->json(['message' => 'Dosen tidak ditemukan'], 404);

        $dosen->delete();
        return response()->json(['message' => 'Dosen berhasil dihapus']);
    }
}
