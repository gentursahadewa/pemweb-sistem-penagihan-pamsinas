<?php

namespace App\Http\Controllers;

use App\Models\JenisPengguna;
use Illuminate\Http\Request;

class JenisPenggunaController extends Controller
{
    public function index()
    {
        $jenisPenggunas = JenisPengguna::all();

        return view('jenis_penggunas.index', compact('jenisPenggunas'));
    }

    public function create()
    {
        return view('jenis_penggunas.create');
    }

    public function store(Request $request)
    {
        $jenisPengguna = JenisPengguna::create($request->all());

        return redirect()->route('jenis_penggunas.index')
            ->with('success', 'Jenis Pengguna created successfully.');
    }

    public function show($id)
    {
        $jenisPengguna = JenisPengguna::findOrFail($id);

        return view('jenis_penggunas.show', compact('jenisPengguna'));
    }

    public function edit($id)
    {
        $jenisPengguna = JenisPengguna::findOrFail($id);

        return view('jenis_penggunas.edit', compact('jenisPengguna'));
    }

    public function update(Request $request, $id)
    {
        $jenisPengguna = JenisPengguna::findOrFail($id);
        $jenisPengguna->update($request->all());

        return redirect()->route('jenis_penggunas.index')
            ->with('success', 'Jenis Pengguna updated successfully.');
    }

    public function destroy($id)
    {
        JenisPengguna::findOrFail($id)->delete();

        return redirect()->route('jenis_penggunas.index')
            ->with('success', 'Jenis Pengguna deleted successfully.');
    }
}
