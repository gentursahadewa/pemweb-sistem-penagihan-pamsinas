<?php

namespace App\Http\Controllers;

use App\Models\PetugasMeteran;
use Illuminate\Http\Request;

class PetugasMeteranController extends Controller
{
    public function index()
    {
        $petugasMeterans = PetugasMeteran::all();

        return view('petugas_meterans.index', compact('petugasMeterans'));
    }

    public function create()
    {
        return view('petugas_meterans.create');
    }

    public function store(Request $request)
    {
        $petugasMeteran = PetugasMeteran::create($request->all());

        return redirect()->route('petugas_meterans.index')
            ->with('success', 'Petugas Meteran created successfully.');
    }

    public function show($id)
    {
        $petugasMeteran = PetugasMeteran::findOrFail($id);

        return view('petugas_meterans.show', compact('petugasMeteran'));
    }

    public function edit($id)
    {
        $petugasMeteran = PetugasMeteran::findOrFail($id);

        return view('petugas_meterans.edit', compact('petugasMeteran'));
    }

    public function update(Request $request, $id)
    {
        $petugasMeteran = PetugasMeteran::findOrFail($id);
        $petugasMeteran->update($request->all());

        return redirect()->route('petugas_meterans.index')
            ->with('success', 'Petugas Meteran updated successfully.');
    }

    public function destroy($id)
    {
        PetugasMeteran::findOrFail($id)->delete();

        return redirect()->route('petugas_meterans.index')
            ->with('success', 'Petugas Meteran deleted successfully.');
    }
}
