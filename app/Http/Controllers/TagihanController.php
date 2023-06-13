<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    public function index()
    {
        $tagihans = Tagihan::all();

        return view('tagihans.index', compact('tagihans'));
    }

    public function create()
    {
        return view('tagihans.create');
    }

    public function store(Request $request)
    {
        $tagihan = Tagihan::create($request->all());

        return redirect()->route('tagihans.index')
            ->with('success', 'Tagihan created successfully.');
    }

    public function show($id)
    {
        $tagihan = Tagihan::findOrFail($id);

        return view('tagihans.show', compact('tagihan'));
    }

    public function edit($id)
    {
        $tagihan = Tagihan::findOrFail($id);

        return view('tagihans.edit', compact('tagihan'));
    }

    public function update(Request $request, $id)
    {
        $tagihan = Tagihan::findOrFail($id);
        $tagihan->update($request->all());

        return redirect()->route('tagihans.index')
            ->with('success', 'Tagihan updated successfully.');
    }

    public function destroy($id)
    {
        Tagihan::findOrFail($id)->delete();

        return redirect()->route('tagihans.index')
            ->with('success', 'Tagihan deleted successfully.');
    }
}
