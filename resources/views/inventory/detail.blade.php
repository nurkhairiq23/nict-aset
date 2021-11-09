@extends('layouts.master')
@section('title','Inventaris: E-Aset NICT')
@section('content')

<div class="section-header">
   <h1>Data Inventory</h1>
</div>

<div class="section_body">
    <div class="card">
        <div class="card-header">
            <h4>{{$inventory->nama_inventory}} - {{$inventory->no_kwitansi}}</h4>
        </div>
        <div class="card-body">
            <div class="btn-group mb-3" role="group" aria-label="Basic example">
                <a href="{{route('inventory.edit', $inventory->id_inventory)}}" class="btn btn-warning">Ubah Data</a>
                {{-- <a href="#" class="btn btn-print">Cetak Data</a> --}}
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card">
                          <div id="foto_inventory" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#foto_inventory" data-slide-to="0" class="active"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img class="d-block w-100" src="{{asset('images/'.$inventory->foto_inventory)}}" alt="{{$inventory->foto_inventory}}">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('assets/img/news/img07.jpg')}}" alt="Second slide">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('assets/img/news/img08.jpg')}}" alt="Third slide">
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#foto_inventory" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#foto_inventory" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6">
                  <div class="card">
                      {{-- <ul class="nav nav-tabs" id="Tab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active show" id="tab_umum" data-toggle="tab" href="#data_inventory" role="tab" aria-controls="inventory" aria-selected="true">Umum</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="tab_history" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">Riwayat Mutasi</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="tab_perbaikan" data-toggle="tab" href="#perbaikan" role="tab" aria-controls="perbaikan" aria-selected="false">Perbaikan</a>
                        </li>
                      </ul> --}}
                      {{-- <div class="tab-content tab-bordered" id="content_umum"> --}}
                        {{-- <div class="tab-pane fade active show" id="data_inventory" role="tabpanel" aria-labelledby="tab_umum"> --}}
                            <div class="row">
                                <table class="table table-bordered table-sm">
                                    {{-- <tr>
                                        <th style="width: 30%;">Kode Barang</th>
                                        <td>{{$inventory -> kode_inventory}}</td>
                                    </tr> --}}
                                    <tr>
                                        <th width="30%">Nama Barang</th>
                                        <td>{{$inventory -> nama_inventory}}</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Kwitansi</th>
                                        <td>{{$inventory -> no_kwitansi}}</td>
                                    </tr>
                                    <tr>
                                        <th>Vendor</th>
                                        <td>{{$inventory -> vendor}}</td>
                                    </tr>
                                    <tr>
                                        <th>Harga</th>
                                        <td>Rp. {{$inventory -> harga}}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Barang</th>
                                        <td>{{$jenis_barang -> nama_jenis_barang}}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Perolehan</th>
                                        <td>{{$inventory -> tgl_perolehan}}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Pembukuan</th>
                                        <td>{{$inventory -> tgl_pembukuan}}</td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah</th>
                                        <td>{{$inventory -> jumlah}}</td>
                                    </tr>
                                    <tr>
                                        <th>Satuan</th>
                                        <td>{{$inventory -> satuan}}</td>
                                    </tr>
                                </table>
                            </div>
                        {{-- </div> --}}
                        {{-- <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="tab_history">
                          history
                        </div>
                        <div class="tab-pane fade" id="perbaikan" role="tabpanel" aria-labelledby="tab_perbaikan">
                          perbaikan
                        </div> --}}
                      {{-- </div> --}}
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
    
@endsection
 
@push('page-scripts')
    
@endpush