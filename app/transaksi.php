<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    //
    public function details()
    {
        return $this->hasMany('App\detail_transaksi');
    }
}
