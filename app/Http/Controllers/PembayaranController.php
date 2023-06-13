<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::all();

        return view('pembayarans.index', compact('pembayarans'));
    }

    public function create()
    {
        return view('pembayarans.create');
    }

    public function store(Request $request)
    {
        $pembayaran = Pembayaran::create($request->all());

        return redirect()->route('pembayarans.index')
            ->with('success', 'Pembayaran created successfully.');
    }

    public function show($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        return view('pembayarans.show', compact('pembayaran'));
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        return view('pembayarans.edit', compact('pembayaran'));
    }

    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update($request->all());

        return redirect()->route('pembayarans.index')
            ->with('success', 'Pembayaran updated successfully.');
    }

    public function destroy($id)
    {
        Pembayaran::findOrFail($id)->delete();

        return redirect()->route('pembayarans.index')
            ->with('success', 'Pembayaran deleted successfully.');
    }
}
