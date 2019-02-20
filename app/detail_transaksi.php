<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    public function transaksi()
    {
        return $this->belongsTo('App\transaksi'); 
    }
}
