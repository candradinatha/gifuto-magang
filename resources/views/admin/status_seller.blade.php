@extends('layouts.admin')

@section('content')
<div class="d-flex border">
    <div class="bg-primary text-light p-4">
        <div class="d-flex align-items-center h-100">
            <i class="fa fa-3x fa-fw fa-cog"></i>
        </div>
    </div>
    <div class="flex-grow-1 bg-white p-4">
        <p class="text-uppercase text-secondary mb-0">Seller Aktif</p>
        <h3 class="font-weight-bold mb-0">{{$jumlah->where('status_seller','aktif')->count()}}</h3>
    </div>
</div>
</br>
<div class="d-flex border">
    <div class="bg-primary text-light p-4">
        <div class="d-flex align-items-center h-100">
            <i class="fa fa-3x fa-fw fa-cog"></i>
        </div>
    </div>
    <div class="flex-grow-1 bg-white p-4">
        <p class="text-uppercase text-secondary mb-0">Seller Tidak Aktif</p>
        <h3 class="font-weight-bold mb-0">{{$jumlah->where('status_seller','tidak_aktif')->count()}}</h3>
    </div>
</div>
</br>
<div class="card mb-4">
    <div class="card-body">
        {{--  <div id="example_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
            <div class="col-sm-12 col-md-6">
                <div id="example_filter" class="dataTables_filter">
                <form action="/admin/status-seller">
                    <label>
                        <input type="search" class="form-control form-control-sm" placeholder="Search-Name" aria-controls="example">
                    </label>
                    <label>
                        <input type="submit" value="Search" class="form-control form-control-sm" placeholder="search" aria-controls="example">
                    </label>
                    <button type="button" class="btn btn-link btn-sm btn-icon ml-2 mb-1" data-toggle="tooltip" title="Search">
                        <i class="fa fa-fw fa-search"></i>
                    </button>
                </form>
                </div>
            </div>
        </div>  --}}
        </br>
        <div class="row"><div class="col-sm-12">
            <table id="example" class="table table-hover dataTable no-footer dtr-inline" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 225.5px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Nama-Toko</th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 225.5px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Nama-Pemilik</th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 225.5px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Status-Seller</th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 225.5px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($seller as $id =>$sell)
                    <tr >
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h5>{{$sell->nama_toko}}</h5>
                                </li>
                            </ul>                    
                        </td>
                        <td>                
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h5>{{$sell->nama_pemilik}}</h5>
                                </li>
                            </ul>
                        </td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h5>{{$sell->status_seller}}</h5>
                                </li>
                            </ul>
                        </td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    @if ($sell->status_seller==='aktif')
                                      
                                    <button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#myModal-{{$id}}">Non-Aktifkan</button>
                                    
                                    @elseif ($sell->status_seller==='tidak_aktif')
                                    
                                    <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#myModal-{{$id}}">Aktifkan</button>
                                    @endif
                                    
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <form action="{{route('admin.update-status',$sell->id)}}" method="POST">
                @csrf
                @method('put')
                    <div id="myModal-{{$id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p>Yakin Ingin Mengubah?...</p>
                                </div>
                                <div class="modal-footer">
                                <button type="submit"   class="btn btn-primary" >ya</button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @endforeach
                </tbody>
            </table>
            {{$seller->links()}}
        </div>
    </div>
</div>
@endsection

