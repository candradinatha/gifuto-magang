@extends('layouts.admin')
@section('content')
<div class="row mb-4">
    <div class="col-md">
        <div class="d-flex border">
            <div class="bg-primary text-light p-4">
                <div class="d-flex align-items-center h-100">
                    <i class="fa fa-3x fa-fw fa-times"></i>
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksis as $id => $transaksi)
                    <tr>
                        <td data-toggle="modal" data-target="#myModal-{{$id}}">{{$transaksi->tanggal_transaksi}}</td>
                        <td data-toggle="modal" data-target="#myModal-{{$id}}">{{$transaksi->batas_transaksi}}</td>
                        <td data-toggle="modal" data-target="#myModal-{{$id}}">{{$transaksi->status}}</td>
                        <td>
                            @if ($transaksi->status==='unverified')
                                    
                            <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#action-{{$id}}">Cek Bukti</button>
                            
                            @endif
                        </td>
                    </tr>
                    <div id="myModal-{{$id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    {{--  <b>ID Transaksi:</b>
                                    @foreach ($transaksi->details as $detail)
                                        {{$detail->id_transaksi}}@if(!$loop->last), @endif
                                    @endforeach
                                    <br><b>ID Kado:</b>
                                    @foreach ($transaksi->details as $detail)
                                        {{$detail->id}}@if(!$loop->last), @endif
                                    @endforeach
                                    <br><b>Jumlah Barang:</b>
                                    @foreach ($transaksi->details as $detail)
                                        {{$detail->jumlah_brg}}@if(!$loop->last), @endif
                                    @endforeach
                                    <br><b>ID Seller:</b>
                                    @foreach ($transaksi->details as $detail)
                                        {{$detail->id_seller}}@if(!$loop->last), @endif
                                    @endforeach
                                    <br><b>Catatan Penjual:</b>
                                    @foreach ($transaksi->details as $detail)
                                        {{$detail->catatan_penjual}}@if(!$loop->last), @endif
                                    @endforeach
                                    <br><b>Tanggal Transaksi:</b>
                                    {{$transaksi->tanggal_transaksi}}
                                    <br><b>Batas Transaksi:</b>
                                    {{$transaksi->batas_transaksi}}
                                    <br><b>Status Transaksi:</b>
                                    {{$transaksi->status}}  --}}
                                    <div class="row">
                                        <div class="col-md-4">   
                                            <b allign="right">ID Transaksi
                                            <br>ID Kado
                                            <br>Jumlah Barang
                                            <br>ID Seller
                                            <br>Catatan Penjual
                                            <br>Tanggal Transaksi
                                            <br>Batas Transaksi
                                            <br>Status Transaksi</b>
                                        </div>
                                        <div class="col-sm-0">   
                                            <b allign="right">:
                                            <br>:
                                            <br>:
                                            <br>:
                                            <br>:
                                            <br>:
                                            <br>:
                                            <br>:</b>
                                        </div>
                                        <div class="col-sm-7">
                                            @foreach ($transaksi->details as $detail)
                                                {{$detail->id_transaksi}}@if(!$loop->last), @endif
                                            @endforeach<br>
                                            @foreach ($transaksi->details as $detail)
                                                {{$detail->id}}@if(!$loop->last), @endif
                                            @endforeach<br>
                                            @foreach ($transaksi->details as $detail)
                                                {{$detail->jumlah_brg}}@if(!$loop->last), @endif
                                            @endforeach<br>
                                            @foreach ($transaksi->details as $detail)
                                                {{$detail->id_seller}}@if(!$loop->last), @endif
                                            @endforeach<br>
                                            @foreach ($transaksi->details as $detail)
                                                {{$detail->catatan_penjual}}@if(!$loop->last), @endif
                                            @endforeach<br>
                                            {{$transaksi->tanggal_transaksi}}<br>
                                            {{$transaksi->batas_transaksi}}<br>
                                            {{$transaksi->status}}<br>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="action-{{$id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p>Yakin Ingin Mengubah?...</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{route('admin.update-seller',$transaksi->id)}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <button type="submit"   class="btn btn-primary" >ya</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>    
                                    </form>
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
