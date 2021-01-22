<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use PDF;

class BukuController extends Controller
{
    public function index()
    {
    	$buku = Buku::all();
    	return view('home', compact('buku'));
    }

    public function insert(Request $request)
    {
    	$buku = new Buku();
        $buku->kode = $request->get('kode');
        $buku->judul = $request->get('judul');
        $buku->harga = $request->get('harga');        
        $buku->save();

        return redirect('/');
    }


    public function update(request $request, $kode)
    {
    	$buku = Buku::where('kode',$kode)->first();
    	$buku->judul = $request->judul;
    	$buku->harga = $request->harga;
    	$buku->save();

    	if ($buku) {
    		return redirect('/');
    	} else {
    		dd('error cannot update this post');
    	}
    }


    public function delete($kode)
    {
    	$buku = Buku::where('kode',$kode)->first();
    	$buku->delete();
    	if ($buku) {
    		return redirect('/');
    	} else {
    		dd('error cannot delete this post');
    	}
    }

    public function cetak_pdf()
    {
    	$buku = Buku::all();
    	$pdf = PDF::loadview('buku_pdf',['buku'=>$buku]);
    	return $pdf->stream();
    }

}
