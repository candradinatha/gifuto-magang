@extends('layouts.admin')
@section('content')
<div class="row mb-4">
    <div class="col-md">
        <div class="d-flex border">
            <div class="bg-primary text-light p-4">
                <div class="d-flex align-items-center h-100">
                    <i class="fa fa-3x fa-fw fa-calendar-alt"></i>
                </div>
            </div>
            <div class="flex-grow-1 bg-white p-4">
                <p class="text-uppercase text-secondary mb-0">Tanggal Transaksi</p>
                <hr>
                <h4>{{$transaksis->tanggal_transaksi}}</h4>
            </div>
        </div>
    </div>
<!-- </div>
<div class="row mb-4"> -->
    <div class="col-md">
        <div class="d-flex border">
            <div class="bg-danger text-light p-4">
                <div class="d-flex align-items-center h-100">
                    <i class="fa fa-3x fa-fw fa-calendar-times"></i>
                </div>
            </div>
            <div class="flex-grow-1 bg-white p-4">
                <p class="text-uppercase text-secondary mb-0">Batas Transaksi</p>
                <hr>
                <h4>{{$transaksis->batas_transaksi}}</h4>
            </div>
        </div>
    </div>
<!-- </div>
<div class="row mb-4"> -->
    <div class="col-md">
        <div class="d-flex border">
            <div class="flex-grow-1 bg-white p-4">
                <p class="text-uppercase text-secondary mb-0">Status :</p>
                <hr>
                <h4>{{$transaksis->status}}</h4>
            </div>
        </div>
    </div>
</div>                  

<!-- PERTAMA -->
<!-- <div class="card mb-4">
    <div class="card-body">
        <h4>Kado:</h4><br>
        <table id="example" class="table table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nama Kado</th>
                    <th>Jumlah Barang</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $detail)
                    <tr>
                        <td>{{$detail->nama_kado}}</td>
                        <td>{{$detail->jumlah_brg}}</td>
                        <td>{{$detail->harga_kado}}</td>
                    </tr>
                @endforeach
                <tr class="table-active">
                    <th>Total</th>
                    <td>{{$transaksis->total_belanja}}</td>
                    <td>{{$transaksis->total_transaksi}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <h4>Seller:</h4><br>
        <table id="example1" class="table table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nama Toko</th>
                    <th>Nama Pemilik</th>
                    <th>E-mail</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $detail)
                    <tr>
                        <td>{{$detail->nama_toko}}</td>
                        <td>{{$detail->nama_pemilik}}</td>
                        <td>{{$detail->email}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>  
</div>

<div class="card mb-4">
    <div class="card-body">
        <h4>Pengiriman:</h4><br>
        <table id="example2" class="table table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nama User</th>
                    <th>Alamat Pengirman</th>
                    <th>Ongkos Kirim</th>
                    <th>Kurir</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $detail)
                    <tr>
                        <td>{{$detail->nama_depan}}</td>
                        <td>{{$detail->alamat_pengiriman}}</td>
                        <td>{{$detail->total_ongkos_kirim}}</td>
                        <td>{{$detail->nama_kurir_pengiriman}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>  
</div>

<div class="card mb-4">
    <div class="card-body">
        <h4>Bukti Transfer:</h4><br>
        <div style="display: flex; justify-content: center;">
            <img src="{{ asset('images/bukti/' . $transaksis->bukti_transaksi) }}" align="middle" />
        </div>
    </div>  
</div> -->

<!-- TAB -->
<ul class="nav nav-tabs nav-fill mb-3" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="kado-tab" data-toggle="tab" href="#kado" role="tab" aria-controls="kado" aria-selected="true">Kado</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="seller-tab" data-toggle="tab" href="#seller" role="tab" aria-controls="seller" aria-selected="false">Seller</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pengiriman-tab" data-toggle="tab" href="#pengiriman" role="tab" aria-controls="pengiriman" aria-selected="false">Pengiriman</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="bukti-tab" data-toggle="tab" href="#bukti" role="tab" aria-controls="bukti" aria-selected="false">Bukti Transfer</a>
    </li>
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="kado" role="tabpanel" aria-labelledby="kado">
        <div class="card mb-4">
            <div class="card-body">
                <table id="example" class="table table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nama Kado</th>
                            <th>Jumlah Barang</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($details as $detail)
                            <tr>
                                <td>{{$detail->nama_kado}}</td>
                                <td>{{$detail->jumlah_brg}}</td>
                                <td>{{$detail->harga_kado}}</td>
                            </tr>
                        {{--  @endforeach  --}}
                        <tr class="table-active">
                            <th>Total</th>
                            <td>{{$transaksis->total_belanja}}</td>
                            <td>{{$transaksis->total_transaksi}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="seller" role="tabpanel" aria-labelledby="seller">
        <div class="card mb-4">
            <div class="card-body">
                <h4>Seller:</h4><br>
                <table id="example1" class="table table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nama Toko</th>
                            <th>Nama Pemilik</th>
                            <th>E-mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{--  @foreach($details as $detail)  --}}
                            <tr>
                                <td>{{$detail->nama_toko}}</td>
                                <td>{{$detail->nama_pemilik}}</td>
                                <td>{{$detail->email}}</td>
                            </tr>
                        {{--  @endforeach  --}}
                    </tbody>
                </table>
            </div>  
        </div>
    </div>

    <div class="tab-pane fade" id="pengiriman" role="tabpanel" aria-labelledby="pengiriman">
        <div class="card mb-4">
            <div class="card-body">
                <h4>Pengiriman:</h4><br>
                <table id="example2" class="table table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nama User</th>
                            <th>Alamat Pengirman</th>
                            <th>Ongkos Kirim</th>
                            <th>Kurir</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{--  @foreach($details as $detail)  --}}
                            <tr>
                                <td>{{$detail->nama_depan}}</td>
                                <td>{{$detail->alamat_pengiriman}}</td>
                                <td>{{$detail->total_ongkos_kirim}}</td>
                                <td>{{$detail->nama_kurir_pengiriman}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>  
        </div>
    </div>
    <div class="tab-pane fade" id="bukti" role="tabpanel" aria-labelledby="bukti">
        <div class="card mb-4">
            <div class="card-body">
                <h4>Bukti Transfer:</h4><br>
                <div style="display: flex; justify-content: center;">
                    <img src="{{ asset('images/bukti/' . $transaksis->bukti_transaksi) }}" align="middle" />
                </div>
                <hr>
                <div>
                    <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#myModal">Ubah</button>
                </div>
            </div>  
        </div>
    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p>Confirm</p>
            </div>
            <div class="modal-footer">
                <form action="{{route('admin.update-seller',$transaksis->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <button type="submit"   class="btn btn-primary" >Ya</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>    
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <script>
    $(document).ready(function () {
        $('#example').DataTable();
        $('#example1').DataTable();
        $('#example2').DataTable();
        
    });


</script> -->
@endsection