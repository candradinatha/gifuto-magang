<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\seller;
use App\transaksi;
use App\detail_transaksi;
use Carbon\Carbon;

class AdminGifutoController extends Controller
{
    public function index()
    {
        $seller = seller::all();
        $bulan = Carbon::now()->month;
        $transaksi = transaksi::whereMonth('tanggal_transaksi',$bulan)->get();
        $array =
            [
                // ['Bulan', 'Transaksi'],
                // ['Januari',  transaksi::whereMonth('tanggal_transaksi','1')->count()],
                // ['Februari',  transaksi::whereMonth('tanggal_transaksi','2')->count()],
                // ['Maret',  transaksi::whereMonth('tanggal_transaksi','3')->count()],
                // ['April',  transaksi::whereMonth('tanggal_transaksi','4')->count()],
                // ['Mei',  transaksi::whereMonth('tanggal_transaksi','5')->count()],
                // ['Juni',  transaksi::whereMonth('tanggal_transaksi','6')->count()],
                // ['Juli',  transaksi::whereMonth('tanggal_transaksi','7')->count()],
                // ['Agustus',  transaksi::whereMonth('tanggal_transaksi','8')->count()],
                // ['September',  transaksi::whereMonth('tanggal_transaksi','9')->count()],
                // ['Oktober',  transaksi::whereMonth('tanggal_transaksi','10')->count()],
                // ['November',  transaksi::whereMonth('tanggal_transaksi','11')->count()],
                // ['Desember',  transaksi::whereMonth('tanggal_transaksi','12')->count()]

                ['Bulan', 'Transaksi', 'Seller'],
                ['Januari',  transaksi::whereMonth('tanggal_transaksi','1')->count(), seller::whereMonth('created_at','1')->count()],
                ['Februari',  transaksi::whereMonth('tanggal_transaksi','2')->count(), seller::whereMonth('created_at','2')->count()],
                ['Maret',  transaksi::whereMonth('tanggal_transaksi','3')->count(), seller::whereMonth('created_at','3')->count()],
                ['April',  transaksi::whereMonth('tanggal_transaksi','4')->count(), seller::whereMonth('created_at','4')->count()],
                ['Mei',  transaksi::whereMonth('tanggal_transaksi','5')->count(), seller::whereMonth('created_at','5')->count()],
                ['Juni',  transaksi::whereMonth('tanggal_transaksi','6')->count(), seller::whereMonth('created_at','6')->count()],
                ['Juli',  transaksi::whereMonth('tanggal_transaksi','7')->count(), seller::whereMonth('created_at','7')->count()],
                ['Agustus',  transaksi::whereMonth('tanggal_transaksi','8')->count(), seller::whereMonth('created_at','8')->count()],
                ['September',  transaksi::whereMonth('tanggal_transaksi','9')->count(), seller::whereMonth('created_at','9')->count()],
                ['Oktober',  transaksi::whereMonth('tanggal_transaksi','10')->count(), seller::whereMonth('created_at','10')->count()],
                ['November',  transaksi::whereMonth('tanggal_transaksi','11')->count(), seller::whereMonth('created_at','11')->count()],
                ['Desember',  transaksi::whereMonth('tanggal_transaksi','12')->count(), seller::whereMonth('created_at','12')->count()]
            ];

        return view('admin.home')->with(compact('seller', 'transaksi','array'));
    }


    //cory
    public function status_seller()
    {
        $seller = seller::all();

        return view('admin.status_seller')->with('seller',$seller);
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
    public function status(Request $request,$id)
    {   
        $simpan = transaksi::find($id);
        $simpan->timestamps = false;
        if($simpan->status==='waiting_for_verif')
        {
            $simpan->status = 'verified';
        }
        elseif ($simpan->status==='verified') 
        {
            $simpan->status = 'delivered';
        }
        // else
        // {
        //     $simpan->status = '';
        // }
        $simpan->save();

        return redirect('/admin/transaksi/detail/'.$id);
    }
    // public function expired(Request $request,$id)
    // {   
    //     $simpan = transaksi::find($id);
    //     if($simpan->status==='unverified')
    //     {
    //         $simpan->status = 'expired';
    //     }
    //     $simpan->timestamps = false;
    //     $simpan->save();

    //     return redirect('/admin/transaksi');
    // }
    
    public function transaksi()
    {
        $transaksis = transaksi::all();
        return view('admin.transaksi')->with('transaksis',$transaksis);
        
    }

    public function detail(Request $request,$id)
    {
        $transaksis = transaksi::find($id);
        
        $pengirimans = DB::table('transaksis')
        ->where('transaksis.id',$id)
        ->join('users', 'transaksis.id_user', '=', 'users.id')
        ->join('kurir_pengirimans', 'transaksis.id_kurir', '=', 'kurir_pengirimans.id')
        ->select('transaksis.*',
                 'users.nama_depan',
                 'kurir_pengirimans.nama_kurir_pengiriman')      
        ->get();
        
        $details = DB::table('detail_transaksis')
        ->where('detail_transaksis.id_transaksi',$id)
        ->join('kados', 'detail_transaksis.id_kado', '=', 'kados.id')
        ->join('sellers', 'detail_transaksis.id_seller', '=', 'sellers.id')
        ->select('detail_transaksis.jumlah_brg',
                 'detail_transaksis.catatan_penjual',
                 'detail_transaksis.id_transaksi',
                 'kados.nama_kado',
                 'kados.harga_kado',
                 'sellers.nama_toko',
                 'sellers.nama_pemilik',
                 'sellers.email')
        ->get();
        //return view('admin.transaksi')->with('transaksis',$transaksis);
        return view('admin.detail')->with(compact('details','transaksis','pengirimans'));
        
    }
}
