@extends('layouts.admin')
@section('content')
<div class="row mb-4">
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-primary text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-tasks"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Unverified</p>
                    <h3 class="font-weight-bold mb-0">{{$transaksis->where('status','unverified')->count()}}</h3>
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
                    <p class="text-uppercase text-secondary mb-0">Success</p>
                    <h3 class="font-weight-bold mb-0">{{$transaksis->where('status','success')->count()}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-danger text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-ban"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Cancelled</p>
                    <h3 class="font-weight-bold mb-0">{{$transaksis->where('status','cancelled')->count()}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-info text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-exclamation-triangle "></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Expired</p>
                    <h3 class="font-weight-bold mb-0">{{$transaksis->where('status','expired')->count()}}</h3>
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
                @foreach ($transaksis as $id => $transaksi)
                    <tr>
                        <td data-toggle="modal" data-target="#myModal-{{$id}}">{{$transaksi->tanggal_transaksi}}</td>
                        <td data-toggle="modal" data-target="#myModal-{{$id}}">{{$transaksi->batas_transaksi}}</td>
                        <td data-toggle="modal" data-target="#myModal-{{$id}}">{{$transaksi->status}}</td>
                    </tr>
                    <div id="myModal-{{$id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    {{$transaksi->details}}
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>    
                                </div>
                            </div>
                        </div>
                    </div>
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
