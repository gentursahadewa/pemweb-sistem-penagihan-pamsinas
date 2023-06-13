<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function index()
    {
        $administrators = Administrator::all();

        return view('administrators.index', compact('administrators'));
    }

    public function create()
    {
        return view('administrators.create');
    }

    public function store(Request $request)
    {
        $administrator = Administrator::create($request->all());

        return redirect()->route('administrators.index')
            ->with('success', 'Administrator created successfully.');
    }

    public function show($id)
    {
        $administrator = Administrator::findOrFail($id);

        return view('administrators.show', compact('administrator'));
    }

    public function edit($id)
    {
        $administrator = Administrator::findOrFail($id);

        return view('administrators.edit', compact('administrator'));
    }

    public function update(Request $request, $id)
    {
        $administrator = Administrator::findOrFail($id);
        $administrator->update($request->all());

        return redirect()->route('administrators.index')
            ->with('success', 'Administrator updated successfully.');
    }

    public function destroy($id)
    {
        Administrator::findOrFail($id)->delete();

        return redirect()->route('administrators.index')
            ->with('success', 'Administrator deleted successfully.');
    }
}
