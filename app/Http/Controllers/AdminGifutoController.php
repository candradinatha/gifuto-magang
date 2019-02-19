<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\seller;
use App\transaksi;
use App\detail_transaksi;

class AdminGifutoController extends Controller
{
    public function index()
    {
        $seller = seller::all();
        $bulan = '02';
        $transaksi = transaksi::whereMonth('tanggal_transaksi',$bulan)->get();

        return view('admin.home')->with(compact('seller', 'transaksi'));
    }


    //cory
    public function status_seller()
    {
        $jumlah = seller::all();
        $seller = seller::paginate(5);

        return view('admin.status_seller')->with(compact('jumlah','seller'));
    }
    public function edit($id)
    {   
        $seller = seller::find($id);
        return view('admin.edit')->with('seller', $seller);
    }
    public function update(Request $request,$id)
    {   
        $simpan = seller::find($id);
        if($simpan->status_seller==='aktif')
        {
            $simpan->status_seller = 'tidak_aktif';
        }
        else
        {
            $simpan->status_seller = 'aktif';
        }
        $simpan->save();

        return redirect('/admin/status-seller');
    }
    
    public function transaksi()
    {
        //$transaksi = transaksi::all();
        $details = DB::table('detail_transaksis')
        ->join('transaksis', 'detail_transaksis.id_transaksi', '=', 'transaksis.id')
        ->join('kados', 'detail_transaksis.id_kado', '=', 'kados.id')
        ->select('detail_transaksis.jumlah_brg',
                 'detail_transaksis.catatan_penjual',
                 'detail_transaksis.id_transaksi',
                 'transaksis.total_belanja',
                 'transaksis.tanggal_transaksi',
                 'transaksis.batas_transaksi',
                 'transaksis.status',
                 'transaksis.id',
                 'kados.nama_kado',
                 'kados.harga_kado')
        ->get();
        return view('admin.transaksi')->with('details',$details);
    }
    
}
