<?php
namespace App\Http\Controllers;
use App\Models\RakBuku;
use Illuminate\Http\Request;

class RakBukuController extends Controller
{
    private function pre($arr = [])
    {
        echo '<pre>';
       // print_r($arr);
        echo '</pre>';
    }

    public function index(Request $request)
    {
        $rak = RakBuku::all();
        $this->pre($request->session()->all());
        return view('rak_buku.index', ['rak' => $rak]);
    }

    public function store_ajax(Request $request)
    {
        $rak = new RakBuku();
        $rak->nama = $request->input('nama');
        $rak->lokasi = $request->input('lokasi');
        $rak->keterangan = $request->input('keterangan');
        $json = Response::json_encode($rak);
        return $json;
    }


    public function create()
    {
        $data['store'] = 'Input';
        $data['rak'] = new RakBuku();
        $data['action'] = url('rak_buku');
        return view('rak_buku.form', $data);
    }

    public function store(Request $request)
    {
        $rak = new RakBuku();
        $rak->nama = $request->input('nama');
        $rak->lokasi = $request->input('lokasi');
        $rak->keterangan = $request->input('keterangan');
        $request->session()->put('rak', $rak);
        $rak->save();
        $request->session()->flash('pesan', 'Data telah berhasil tersimpan.');
        return redirect('/rak_buku');
    }


    public function show(RakBuku $rakBuku)
    {
        return view('rak_buku.destroy', ['rak' => $rakBuku]);
    }

    public function edit(RakBuku $rakBuku)
    {
        $data['store'] = 'Ubah';
        $data['rak'] = $rakBuku;
        $data['action'] = url('rak_buku' . '/' . $rakBuku->id);
        return view('rak_buku.form', $data);
    }

    public function update(Request $request, RakBuku $rakBuku)
    {
        $rakBuku->nama = $request->input('nama');
        $rakBuku->lokasi = $request->input('lokasi');
        $rakBuku->keterangan = $request->input('keterangan');
        $rakBuku->save();
        $request->session()->flash('pesan', 'Data telah berhasil diubah.');
        return redirect('/rak_buku');
    }

    public function destroy(RakBuku $rakBuku)
    {
        $rakBuku->delete();
        $request->session()->flash('pesan', 'Data telah berhasil dihapus.');
        return redirect('/rak_buku');
    }

}