@extends('layouts.master')
@section('title','Ruangan: E-Aset NICT')
@section('content')

<div class="section-header">
   <h1>Data Ruangan</h1>
</div>

<div class="section_body">
    <div class="card">
        <div class="card-header">
            <h4>{{$data_ruangan->nama_ruangan}} - {{$data_ruangan->kode_ruangan}}</h4>
        </div>
        <div class="card-body">
            <div class="btn-group mb-3" role="group" aria-label="Basic example">
                <a href="{{route('ruangan.edit', $data_ruangan->ruangan_id)}}" class="btn btn-warning">Ubah Data</a>
                <a href="#" class="btn btn-print">Cetak Label</a>
            </div>
            <div class="card">
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <table class="table table-bordered table-sm">
                            <tr>
                                <th style="width: 20%;">Kode Ruangan</th>
                                <td>{{$data_ruangan -> kode_ruangan}}</td>
                            </tr>
                            <tr>
                                <th>Nama Ruangan</th>
                                <td>{{$data_ruangan -> nama_ruangan}}</td>
                            </tr>
                            <tr>
                                <th>Lantai</th>
                                <td>{{$data_ruangan -> lantai}}</td>
                            </tr>
                            <tr>
                                <th>Luas</th>
                                <td>{{$data_ruangan -> luas}}</td>
                            </tr>
                            <tr>
                                <th>Kategori Ruangan</th>
                                <td>{{$ruangan -> nama_kategori_ruang}}</td>
                            </tr>
                            <tr>
                                <th>Ruangan dipakai</th>
                                <td>
                                    @if ($data_ruangan -> dipakai == 1)
                                    Ya
                                    @elseif ($data_ruangan -> dipakai == 0)
                                    Tidak
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Foto Ruangan</th>
                                <td>
                                    <img src="{{asset('images/'.$data_ruangan -> foto_ruangan)}}" alt="" width="500px">
                                </td>
                            </tr>
                        </table>
                    </div>
                  </div>
            </div>
            {{-- <div class="row"> --}}
                {{-- <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card">
                          <div id="foto_inventaris" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#foto_inventaris" data-slide-to="0" class="active"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img class="d-block w-100" src="{{asset('images/'.$data_ruangan->foto_inventaris)}}" alt="{{$data_barang->foto_inventaris}}">
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
                </div> --}}
                {{-- <div class="col-12 col-sm-6 col-lg-6"> --}}
                  {{-- <div class="card"> --}}
                      {{-- <div class="tab-content tab-bordered" id="content_umum"> --}}
                        {{-- <div class="tab-pane fade active show" id="data_inventaris" role="tabpanel" aria-labelledby="tab_umum"> --}}
                          {{-- <div class="row">
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
                          </div> --}}
                        {{-- </div> --}}
                        {{-- <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="tab_history">
                          history
                        </div>
                        <div class="tab-pane fade" id="perbaikan" role="tabpanel" aria-labelledby="tab_perbaikan">
                          perbaikan
                        </div> --}}
                    {{-- </div> --}}
                  {{-- </div> --}}
                {{-- </div> --}}
            {{-- </div> --}}
        </div>
    </div>
</div>
    
@endsection
 
@push('page-scripts')
    
@endpush