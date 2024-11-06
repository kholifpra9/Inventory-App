<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(){
        $data['barangs'] = Barang::with('kategori')->get();
        return view('barang.index', $data);
    }

    public function create(){
        $data['kategoris'] = Kategori::pluck('nama_kategori', 'id');
        return view('barang.create', $data);
    }

    public function edit(string $id){
        $data['barang'] = Barang::findOrFail($id);
        $data['kategoris'] = Kategori::pluck('nama_kategori', 'id');
        return view('barang.edit', $data);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nama_barang' => 'required|max:255',
            'stok' => 'required',
            'kategori_id' => 'required',
            'user_id' => 'required'
        ]);

        Barang::create($validated);

        $notification = array(
            'message' => "Data Barang berhasil Ditambahkan!",
            'alert-type' => 'success'
        );

        if ($request->save == true) {
            return redirect()->route('barang.index')->with($notification);
        }
        else{
            return redirect()->route('barang_masuk.create');
        }
    }

    public function update(Request $request, string $id){
        $validated = $request->validate([
            'nama_barang' => 'required|max:255',
            'stok' => 'required',
            'kategori_id' => 'required'
        ]);

        Barang::where('id', $id)->update($validated);

        $notification = array(
            'message' => "Data Barang berhasil diupdate!",
            'alert-type' => 'success'
        );

        if ($request->save == true) {
            return redirect()->route('barang.index')->with($notification);
        }
        else{
            return redirect()->route('barang_masuk.create');
        }
    }

    public function destroy(string $id){
        $barang = Barang::findOrFail($id);
        $barang->delete();

        $notification = array(
            'message' => "Data Barang berhasil dihapus!",
            'alert-type' => 'success'
        );

        return redirect()->route('barang.index')->with($notification);
    }

    public function generatePDF()
    {
        $barang = Barang::get();
    
        $data = [
            'title' => 'Laporan Stok Barang Inventory MI AL-HUDA',
            'date' => date('m/d/Y'),
            'barang' => $barang
        ]; 

        $pdf = FacadePdf::loadView('barang.barangpdf', $data);
       
        return $pdf->download('Cetak Barang.pdf');
    }
}
