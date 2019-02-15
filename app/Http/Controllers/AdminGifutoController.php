<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\seller;
use App\transaksi;
use App\status_pembayaran;
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
        
    }
    
    public function transaksi()
    {
        $transaksi = transaksi::all();
        $detail = detail_transaksi::all();
        $pembayaran = status_pembayaran::all();
        return view('admin.transaksi')->with(compact('transaksi','peembayaran'));
    }
    
    public function filtertransaksi(Request $request)
    {
        $filter = $request->input('filtertransaksi');
        $tampil = transaksi::where('',$filter);
        return view('admin.transaksi');
    }
}
