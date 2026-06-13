<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penulis;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    public function index()
    {
        $penulis = Penulis::latest()->get();
        return view('admin.penulis.index', compact('penulis'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') abort(403);

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'telepon' => 'nullable|string|max:20',
        ]);

        Penulis::create($request->all());
        return redirect()->back()->with('success', 'Penulis berhasil ditambahkan.');
    }

    public function destroy(Penulis $penuli) // Variable naming convention for Route Model Binding of "penulis"
    {
        if (auth()->user()->role !== 'admin') abort(403);
        
        $penuli->delete();
        return redirect()->back()->with('success', 'Penulis berhasil dihapus.');
    }
}
