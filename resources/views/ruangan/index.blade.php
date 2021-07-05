@extends('layouts.master')
@section('title','Data Ruangan NICT')
@section('content')

    <div class="section-header">
        <h1>Data Ruangan</h1>
    </div>
    <div class="section-body">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4>Pencarian Data</h4>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <input type="text" class="form-control" id="inputnama" placeholder="--Nama Ruangan--">
                        </div>
                        <div class="form-group col-md-3">
                            <select id="inputState" class="form-control">
                                <option selected disabled>--Kategori Ruangan--</option>
                                <option>Halaman Utama</option>
                                <option>Auditorium</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <select id="inputState" class="form-control">
                                <option selected disabled>--Lantai--</option>
                                <option>1</option>
                                <option>2</option>
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
                    <a href="{{route('ruangan.create')}}" class="btn btn-primary">Tambah Data</a>
                    <a href="{{route('ruangan.print')}}" target="_blank"class="btn btn-print">Cetak Data</a>
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
                        Menampilkan {{$ruangan->firstItem()}}
                        - {{$ruangan->lastItem()}}
                        dari {{$ruangan->total()}} item
                    </div>
                    <table class="table table-bordered table-sm">
                        <thead>
                           <tr>
                                <th scope="col">No</th>
                                <th scope="col"></th>
                                <th scope="col">Kode Ruangan</th>
                                <th scope="col">Nama Ruangan</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Kategori Ruangan</th>
                                <th scope="col">Lantai</th>
                                <th scope="col">Luas Ruangan</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($ruangan as $no => $data)
                        <tr>
                            <td>{{$ruangan -> firstItem() + $no}}</td>
                            <td>
                                    <a href="{{route('ruangan.show', $data->ruangan_id)}}" class="btn btn-icon"><i class="fas fa-info-circle"></i></a>
                                    <a href="{{route('ruangan.edit', $data->ruangan_id)}}" class="btn btn-icon"><i class="far fa-edit"></i></a>
                            </td>
                            <td>{{$data -> kode_ruangan}}</td>
                            <td>{{$data -> nama_ruangan}}</td>
                            <td>
                                <img src="{{asset('images/'.$data -> foto_ruangan)}}" alt="" width="150px">
                            </td>
                            <td>{{$data -> nama_kategori_ruang}}</td>
                            <td>{{$data -> lantai}}</td>
                            <td>{{$data -> luas}} m2</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$ruangan->links()}}
                </div>
            </div> 
        </div>
    </div>

@endsection 