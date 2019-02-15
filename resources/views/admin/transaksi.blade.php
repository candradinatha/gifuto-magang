@extends('layouts.admin')
@section('content')
<div class="row mb-4">
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-primary text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-cog"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Usage</p>
                    <h3 class="font-weight-bold mb-0">10%</h3>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-success text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-check"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Tickets</p>
                    <h3 class="font-weight-bold mb-0">374</h3>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-danger text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-shopping-cart"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Sales</p>
                    <h3 class="font-weight-bold mb-0">73,829</h3>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-info text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-users"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Customers</p>
                    <h3 class="font-weight-bold mb-0">1,683</h3>
                </div>
            </div>
        </div>
    </div>

<div class="card mb-4">
    <div class="card-body">
        <table id="example" class="table table-hover" cellspacing="0" width="100%">
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


    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>

@endsection
