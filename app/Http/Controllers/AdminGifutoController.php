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

        return view('admin.home')->with(compact('seller', 'transaksi'));
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
        $tanggal = Carbon::now();
        $simpan->timestamps = false;
        if($simpan->status==='unverified')
        {
            $simpan->status = 'success';
        }
        // else
        // {
        //     $simpan->status = '';
        // }
        $simpan->save();

        return redirect('/admin/transaksi');
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
        $details = DB::table('detail_transaksis')
        ->where('detail_transaksis.id_transaksi',$transaksis->id)
        ->join('kados', 'detail_transaksis.id_kado', '=', 'kados.id')
        ->join('sellers', 'detail_transaksis.id_seller', '=', 'sellers.id')
        ->join('transaksis', 'detail_transaksis.id_transaksi', '=', 'transaksis.id')
        ->join('users', 'transaksis.id_user', '=', 'users.id')
        ->join('kurir_pengirimans', 'transaksis.id_kurir', '=', 'kurir_pengirimans.id')
        ->select('detail_transaksis.jumlah_brg',
                 'detail_transaksis.catatan_penjual',
                 'detail_transaksis.id_transaksi',
                 'kados.nama_kado',
                 'kados.harga_kado',
                 'sellers.nama_toko',
                 'sellers.nama_pemilik',
                 'sellers.email',
                 'users.nama_depan',
                 'kurir_pengirimans.nama_kurir_pengiriman',
                 'transaksis.alamat_pengiriman',
                 'transaksis.total_ongkos_kirim')
        ->get();
        //return view('admin.transaksi')->with('transaksis',$transaksis);
        return view('admin.detail')->with(compact('details','transaksis'));
        
    }
}
