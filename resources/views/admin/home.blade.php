@extends('layouts.admin')
@section('content')
    @foreach ($seller as $seller)
        <ul class="list-group">
            <li class="list-group-item">
                <h1>{{$seller->nama_toko}}</h1>
            </li>
        </ul>
    @endforeach
@endsection