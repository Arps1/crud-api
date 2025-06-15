<?php

namespace App\Http\Controllers;

use App\Models\Makul;
use Illuminate\Http\Request;

class MakulController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|unique:makuls,kode',
            'nama' => 'required|string',
            'sks' => 'required|integer',
        ]);

        $makul = Makul::create($request->all());

        return response()->json(['message' => 'Mata kuliah berhasil ditambahkan', 'data' => $makul]);
    }

    public function read()
    {
        return response()->json(Makul::all());
    }

    public function update(Request $request, $id)
    {
        $makul = Makul::find($id);
        if (!$makul) return response()->json(['message' => 'Mata kuliah tidak ditemukan'], 404);

        $makul->update($request->all());
        return response()->json(['message' => 'Mata kuliah berhasil diperbarui', 'data' => $makul]);
    }

    public function delete($id)
    {
        $makul = Makul::find($id);
        if (!$makul) return response()->json(['message' => 'Mata kuliah tidak ditemukan'], 404);

        $makul->delete();
        return response()->json(['message' => 'Mata kuliah berhasil dihapus']);
    }
}
