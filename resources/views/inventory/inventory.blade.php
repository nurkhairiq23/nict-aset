@extends('layouts.master')
@section('title','E-Aset NICT')
@section('content')

    <div class="section-header">
        <h1>Data Inventory</h1>
    </div>
    <div class="section-body">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4>Pencarian Data</h4>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <input type="text" class="form-control" id="inputnama" placeholder="--Nama Barang--">
                        </div>
                        <div class="form-group col-md-3">
                            <select id="inputState" class="form-control">
                                <option selected disabled>--Bulan Perolehan--</option>
                                <option>Januari</option>
                                <option>Februari</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <input type="text" class="form-control" id="inputnama" placeholder="--Vendor--">
                        </div>
                        <div class="form-group col-md-3">
                            <select id="inputState" class="form-control">
                                <option selected disabled>--Bulan Pembukuan--</option>
                                <option>Januari</option>
                                <option>Februari</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row"> 
                        <div class="buttons">
                            <button class="btn btn-primary">Cari</button> 
                            <button class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </div>           
                    <hr>
                    <a href="{{route('inventory.create')}}" class="btn btn-primary">Tambah Data</a>
                    <a href="{{route('inventory.print')}}" target="_blank" class="btn btn-print">Cetak Data</a>
                    <hr>
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                            <span>×</span>
                            </button>
                            {{session('message')}}
                        </div>
                        </div>
                    @endif
                    <div>
                        Menampilkan {{$inventory->firstItem()}}
                        - {{$inventory->lastItem()}}
                        dari {{$inventory->total()}} item
                    </div>
                    <table class="table table-bordered table-sm">
                        <thead>
                           <tr>
                                <th scope="col">No</th>
                                <th scope="col"> </th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">No Kwitansi</th>
                                <th scope="col">Vendor</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jenis Barang</th>
                                <th scope="col">Tanggal Perolehan</th>
                                <th scope="col">Tanggal Pembukuan</th>
                                <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($inventory as $no => $data)
                        <tr>
                            <td>{{$inventory->firstItem() + $no }}</td>
                            <td>
                                    <a href="{{route('inventory.show', $data->id_inventory)}}" class="btn btn-icon btn-info btn-sm"><i class="fas fa-info-circle"></i></a>
                                    <a href="{{route('inventory.edit', $data->id_inventory)}}" class="btn btn-icon btn-warning btn-sm"><i class="far fa-edit"></i></a>
                            </td>
                            <td>{{$data -> nama_inventory}}</td>
                            <td>{{$data -> no_kwitansi}}</td>
                            <td>{{$data -> vendor}}</td>
                            <td>Rp. {{$data -> harga}}</td>
                            <td>{{$data -> nama_jenis_barang}}</td>
                            <td>{{$data -> tgl_perolehan}}</td>
                            <td>{{$data -> tgl_pembukuan}}</td>
                            <td>{{$data -> jumlah}} {{$data -> satuan}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $inventory->links() }}
                    </div>
                </div>
            </div> 
        </div>
    </div>

@endsection 