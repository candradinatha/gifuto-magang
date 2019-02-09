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
        return view('admin.status_seller');
    }
}
