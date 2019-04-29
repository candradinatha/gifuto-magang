@extends('layouts.detail_kado')

@section('content')
<!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-80">
    <div class="flex-w flex-sb">
        <div class="w-size13 p-t-30 respon5">
            <div class="wrap-slick3 flex-sb flex-w">
                <div class="wrap-slick3-dots"></div>
                <div class="slick3">
                    @foreach ($foto_barangs as $foto)
                        <div class="item-slick3" data-thumb="{{ asset("images/kados/$foto->url") }}">
                            <div class="image-wrapper">
                                <img src="{{ asset("images/kados/$foto->url") }}" alt="IMG-PRODUCT">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="w-size14 p-t-30 respon5">
            <h4 class="product-detail-name m-text16 p-b-13">
                {{$kado->nama_kado}}
            </h4>

            <span class="m-text17">
                Rp {{number_format($kado->harga_kado,2)}}
            </span>

            <div class="p-t-33 p-b-33">
                <h4 class="product-detail-name m-text16 p-b-13">
                    Stok Tersedia: {{$kado->stok}}
                </h4>
            <div>

            <div class="p-b-45">
                <span class="s-text8 m-r-35"><b>Penjual:</b> {{$seller->nama_toko}}</span><br>
                <span class="s-text8 m-r-35"><b>Pemilik:</b> {{$seller->nama_pemilik}}</span><br>
                <span class="s-text8 m-r-35"><b>E-mail:</b> {{$seller->email}}</span><br>
                <span class="s-text8 m-r-35"><b>Telp:</b> {{$seller->no_telp}}</span><br>
            </div>

            <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
                <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                    Deskripsi Kado
                    <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                    <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                </h5>

                <div class="dropdown-content dis-none p-t-15 p-b-23">
                    <p class="s-text8">
                        {{$kado->deskripsi}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
