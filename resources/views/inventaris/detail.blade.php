@extends('layouts.master')
@section('title','Inventaris: E-Aset NICT')
@section('content')

<div class="section-header">
   <h1>Data Inventaris</h1>
</div>

<div class="section_body">
    <div class="card">
        <div class="card-header">
            <h4>{{$data_barang->nama_inventaris}} - {{$data_ruangan->nama_ruangan}} - {{$data_barang->nup}}</h4>
        </div>
        <div class="card-body">
            <div class="btn-group mb-3" role="group" aria-label="Basic example">
                <a href="{{route('inventaris.edit', $data_barang->id_inventaris)}}" class="btn btn-warning">Ubah Data</a>
                <a href="#" class="btn btn-print">Cetak Label</a>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card">
                          <div id="foto_inventaris" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#foto_inventaris" data-slide-to="0" class="active"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img class="d-block w-100" src="{{asset('images/'.$data_barang->foto_inventaris)}}" alt="{{$data_barang->foto_inventaris}}">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('assets/img/news/img07.jpg')}}" alt="Second slide">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('assets/img/news/img08.jpg')}}" alt="Third slide">
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#foto_inventaris" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#foto_inventaris" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6">
                  <div class="card">
                      <ul class="nav nav-tabs" id="Tab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active show" id="tab_umum" data-toggle="tab" href="#data_inventaris" role="tab" aria-controls="inventaris" aria-selected="true">Umum</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="tab_history" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">Riwayat Mutasi</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="tab_perbaikan" data-toggle="tab" href="#perbaikan" role="tab" aria-controls="perbaikan" aria-selected="false">Perbaikan</a>
                        </li>
                      </ul>
                      <div class="tab-content tab-bordered" id="content_umum">
                        <div class="tab-pane fade active show" id="data_inventaris" role="tabpanel" aria-labelledby="tab_umum">
                          <div class="row">
                            <div class="col-12 col-sm-12 col-lg-12">
                                <table class="table table-bordered table-sm">
                                    <tr>
                                        <th style="width: 30%;">Kode Barang</th>
                                        <td>{{$data_barang -> kode_inventaris}}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <td>{{$data_barang -> nama_inventaris}}</td>
                                    </tr>
                                    <tr>
                                        <th>Kode Ruangan</th>
                                        <td>{{$data_ruangan -> kode_ruangan}}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Ruangan</th>
                                        <td>{{$data_ruangan -> nama_ruangan}}</td>
                                    </tr>
                                    <tr>
                                        <th>NUP</th>
                                        <td>{{$data_barang -> nup}}</td>
                                    </tr>
                                    <tr>
                                        <th>Tahun Perolehan</th>
                                        <td>{{$data_barang -> tahun}}</td>
                                    </tr>
                                    <tr>
                                        <th>Merk Tipe</th>
                                        <td>{{$data_barang -> merk}}</td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td>{{$data_barang -> keterangan}}</td>
                                    </tr>
                                    <tr>
                                        <th>Status Sensus</th>
                                        <td>{{$data_barang -> sensus}}</td>
                                    </tr>
                                    <tr>
                                        <th>Kondisi</th>
                                        <td>{{$data_barang -> kondisi}}</td>
                                    </tr>
                                    <tr>
                                        <th>Status Label</th>
                                        <td>{{$data_barang -> label}}</td>
                                    </tr>
                                </table>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="tab_history">
                          history
                        </div>
                        <div class="tab-pane fade" id="perbaikan" role="tabpanel" aria-labelledby="tab_perbaikan">
                          perbaikan
                        </div>
                      </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
    
@endsection
 
@push('page-scripts')
    
@endpush