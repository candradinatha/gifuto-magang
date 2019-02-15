<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\seller;

class AdminGifutoController extends Controller
{
    public function index()
    {
        $seller = seller::all();
        return view('admin.home')->with('seller', $seller);
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
        $seller = seller::all();
        return view('admin.transaksi')->with('seller', $seller);
    }
}
