@extends('layouts.admin')
@section('content')
<div class="row mb-4">
    <div class="col-md">
        <div class="d-flex border">
            <div class="bg-primary text-light p-4">
                <div class="d-flex align-items-center h-100">
                    <i class="fa fa-3x fa-fw fa-users"></i>
                </div>
            </div>
            <div class="flex-grow-1 bg-white p-4">
                <p class="text-uppercase text-secondary mb-0">Jumlah Seller</p>
                <h3 class="font-weight-bold mb-0">{{$seller->count()}}</h3>
            </div>
        </div>
    </div>
<!-- </div>
<div class="row mb-4"> -->
    <div class="col-md">
        <div class="d-flex border">
            <div class="bg-danger text-light p-4">
                <div class="d-flex align-items-center h-100">
                    <i class="fa fa-3x fa-fw fa-shopping-cart"></i>
                </div>
            </div>
            <div class="flex-grow-1 bg-white p-4">
                <p class="text-uppercase text-secondary mb-0">Jumlah Transaksi</p>
                <h3 class="font-weight-bold mb-0">{{$transaksi->count()}}</h3>
            </div>
        </div>
    </div>
</div>  

{{-- <div class="card mb-4"> --}}
    {{-- <div class="card-header bg-white font-weight-bold">
        Area
    </div> --}}
    {{-- <div class="card-body"> --}}
        <div id="chart_div_3" style="width: 100%; height: 500px; padding-left: -25%;"></div>
    {{-- </div> --}}
{{-- </div> --}}


<div class="nav nav-tabs my-info" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
        aria-controls="nav-home" aria-selected="true">Jumlah Seller</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
        aria-controls="nav-profile" aria-selected="false">Transaksi</a>
</div>        

<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="card mb-4">
            <div class="card-body">
                <table id="example" class="table table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nama Toko</th>
                            <th>Nama Pemilik</th>
                            <th>Status Seller</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($seller as $seller)
                            <tr>
                                <td>{{$seller->nama_toko}}</td>
                                <td>{{$seller->nama_pemilik}}</td>
                                <td>{{$seller->status_seller}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="card mb-4">
            <div class="card-body">
                <table id="contoh" class="table table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Tanggal Transaksi</th>
                            <th>Batas Transaksi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $penjualan)
                            <tr>
                                <td>{{$penjualan->tanggal_transaksi}}</td>
                                <td>{{$penjualan->batas_transaksi}}</td>
                                <td>{{$penjualan->status}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>   

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
    $(document).ready(function () {
        $('#contoh').DataTable();
    });
</script>
<script type="text/javascript" src="{{asset('js/loader.js')}}"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart3);
    function drawChart3() {
        var data = google.visualization.arrayToDataTable(
            {!! json_encode($array) !!}
        );

        var options = {
            title: 'Tahun 2019',
            hAxis: {title: 'Bulan',  titleTextStyle: {color: '#3333'}},
            vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div_3'));
        chart.draw(data, options);
    }
</script>

@endsection