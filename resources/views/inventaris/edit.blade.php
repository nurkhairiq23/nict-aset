@extends('layouts.master')
@section('title','Ubah Data Inventaris: E-Aset NICT')
@section('content')

    <div class="section-header">
        <h1>Data Inventaris</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="col-12 col-md-12 col-lg-12">
              <div class="card-body">
                <h4>Ubah Data Barang: {{$data_barang->nama_inventaris}} - {{$data_ruangan->nama_ruangan}} - {{$data_barang->nup}}</h4>
                <hr>
                <form action="{{route('inventaris.update', $data_barang->id_inventaris)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <input type="hidden" name="id_inventaris" value="{{$data_barang->id_inventaris}}" class="form-control">
                            <label @error('kode_inventaris')
                                class="text-danger"
                            @enderror>Kode Barang  @error('kode_inventaris')
                                | {{ $message }}
                            @enderror</label>
                            <input type="text" name="kode_inventaris" value="{{$data_barang->kode_inventaris}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label @error('nama_inventaris')
                                class="text-danger"
                            @enderror>Nama Barang  @error('nama_inventaris')
                                | {{ $message }}
                            @enderror</label>
                            <input type="text" name="nama_inventaris" value="{{$data_barang->nama_inventaris}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label @error('ruangan_id')
                                class="text-danger"
                                @enderror>Ruangan  @error('ruangan_id')
                                | {{ $message }}
                                @enderror</label>
                                {{-- <select name="ruangan_id" class="form-control">
                                    <option value="{{$data_barang->ruangan_id}}" selected>{{$data_ruangan->kode_ruangan}} - {{$data_ruangan->nama_ruangan}}</option>
                                    @foreach ($ruangan as $r)
                                    <option value="{{$r->ruangan_id}}">{{$r->kode_ruangan}} - {{$r->nama_ruangan}}</option>
                                    @endforeach
                                </select> --}}
                                <select name="ruangan_id" class="form-control">
                                    @foreach ($ruangan as $r)
                                    <option value="{{$r->ruangan_id}}" {{old('ruangan_id', $data_barang -> ruangan_id == $r-> ruangan_id)? "selected": ""}}>{{$r->kode_ruangan}} - {{$r->nama_ruangan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label @error('nup')
                                class="text-danger"
                            @enderror>NUP  @error('nup')
                                | {{ $message }}
                            @enderror</label>
                            <input type="integer" name="nup" value="{{$data_barang->nup}}"class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label @error('tahun')
                                class="text-danger"
                            @enderror>Tahun Perolehan  @error('tahun')
                                | {{ $message }}
                            @enderror</label>
                            <input type="year" name="tahun" value="{{$data_barang->tahun}}"class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label @error('merk')
                                class="text-danger"
                            @enderror>Merk / Tipe  @error('merk')
                                | {{ $message }}
                            @enderror</label>
                            <input type="text" name="merk" value="{{$data_barang->merk}}"class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Harga</label>
                            <input type="integer" name="harga" value="{{$data_barang->harga}}"class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label @error('keterangan')
                                class="text-danger"
                            @enderror>Keterangan  @error('keterangan')
                                | {{ $message }}
                            @enderror</label>
                            <input type="text" name="keterangan" value="{{$data_barang->keterangan}}"class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Kondisi</label>
                            {{-- <select name="kondisi" class="form-control">
                                <option value="{{$data_barang->kondisi}}" selected>{{$data_barang->kondisi}}</option>
                                @foreach (["Sudah Dilabel"=>"Sudah Dilabel","Belum Dilabel"=>"Belum Dilabel"] AS $kondisi)
                                <option value="{{$kondisi}}">{{$kondisi}}</option>
                                @endforeach
                            </select> --}}
                            <select name="kondisi" class="form-control">
                                @foreach (["Baik"=>"Baik","Rusak Ringan"=>"Rusak Ringan","Rusak Berat"=>"Rusak Berat"] AS $kondisi_barang => $status)
                                <option value="{{$kondisi_barang}}" {{old('kondisi', $data_barang -> kondisi == $kondisi_barang ? "selected": "")}}>{{$status}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label @error('label')
                                class="text-danger"
                            @enderror>Pelabelan  @error('label')
                                | {{ $message }}
                            @enderror</label>
                            {{-- <select name="label" class="form-control">
                                <option value="{{$data_barang->label}}" selected>{{$data_barang->label}}</option>
                                @foreach (["Sudah Dilabel"=>"Sudah Dilabel","Belum Dilabel"=>"Belum Dilabel"] AS $label)
                                <option value="{{$label}}">{{$label}}</option>
                                @endforeach
                            </select> --}}
                            <select name="label" class="form-control">
                                @foreach (["Sudah Dilabel"=>"Sudah Dilabel","Belum Dilabel"=>"Belum Dilabel"] AS $label_barang => $status)
                                <option value="{{$label_barang}}" {{old('label', $data_barang -> label == $label_barang ? "selected": "")}}>{{$status}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label @error('sensus')
                                class="text-danger"
                            @enderror>Sensus  @error('Sensus')
                                | {{ $message }}
                            @enderror</label>
                            {{-- <select name="sensus" class="form-control">
                                <option value="{{$data_barang->sensus}}" selected>{{$data_barang->sensus}}</option>
                                @foreach (["Ditemukan"=>"Ditemukan","Belum Ditemukan"=>"Belum Ditemukan"] AS $sensus)
                                <option value="{{$sensus}}">{{$sensus}}</option>
                                @endforeach
                            </select> --}}
                            <select name="sensus" class="form-control">
                                @foreach (["Ditemukan"=>"Ditemukan","Belum Ditemukan"=>"Belum Ditemukan"] AS $sensus_barang => $status)
                                <option value="{{$sensus_barang}}" {{old('sensus', $data_barang -> sensus == $sensus_barang ? "selected": "")}}>{{$status}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="foto_inventaris">Upload Foto</label>
                            <input type="file" id="foto_inventaris" name="foto_inventaris" class="form-control-file">
                            </div>
                        </div>

                    </div> 

                    <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Ubah</button>
                    <button class="btn btn-secondary" type="close">Batal</button>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>
@endsection
 
@push('page-scripts')
    
@endpush