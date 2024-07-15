<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\RakBuku;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BukuController extends Controller
{
    public function index(): View
    {
        $buku = Buku::with('rakBuku')->get();
        $rak_buku = RakBuku::all();
        return view('buku.index', [
            'rak_buku' => $rak_buku,
            'buku' => $buku
        ]);
    }

    public function create(): View
    {
        $rak_buku = RakBuku::all();
        return view('buku.create', [
            'rak_buku' => $rak_buku
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun' => 'nullable',
            'isbn' => 'nullable',
            'sinopsis' => 'nullable',
            'stok' => 'nullable',
            'id_rak_buku' => 'required'
        ]);

        Buku::create($data);

        return redirect('/buku');
    }

    public function edit($id): View
    {
        $buku = Buku::with('rakBuku')->findOrFail($id);
        $rak_buku = RakBuku::all();
        return view('buku.edit', [
            'rak_buku' => $rak_buku,
            'buku' => $buku
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->except('_token');

        Buku::where('id', $request->id)->update($data);

        return redirect('/buku');
    }

    public function destroy($id)
    {
        Buku::destroy($id);

        return redirect('/buku');
    }
}
