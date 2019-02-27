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
                <h3>{{$transaksis->tanggal_transaksi}}</h3>
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
                <h3>{{$transaksis->batas_transaksi}}</h3>
            </div>
        </div>
    </div>
</div>         

<div class="card mb-4">
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
<!-- <script>
    $(document).ready(function () {
        $('#example').DataTable();
        $('#example1').DataTable();
        $('#example2').DataTable();
        
    });


</script> -->
@endsection