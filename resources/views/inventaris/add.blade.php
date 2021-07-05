@extends('layouts.master')
@section('title','Tambah Data Inventaris: E-Aset NICT')
@section('content')
<div class="section-header">
  <h4>Tambah Data</h4>
</div>  
<div class="section-body">
    <div class="card">            
        <form action="{{route('inventaris.store')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="hidden" name="id_inventaris" class="form-control">
                      <label @error('kode_inventaris')
                          class="text-danger"
                      @enderror>Kode Barang  @error('kode_inventaris')
                        | {{ $message }}
                    @enderror</label>
                      <input type="text" name="kode_inventaris" value="{{old('kode_inventaris')}}" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('nama_inventaris')
                          class="text-danger"
                      @enderror>Nama Barang  @error('nama_inventaris')
                        | {{ $message }}
                    @enderror</label>
                      <input type="text" name="nama_inventaris" value="{{old('nama_inventaris')}}" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('ruangan_id')
                          class="text-danger"
                        @enderror>Ruangan  @error('ruangan_id')
                        | {{ $message }}
                        @enderror</label>
                        <select name="ruangan_id" class="form-control">
                        <option value="" selected disabled>Pilih Ruangan</option>
                         @foreach ($ruangan as $r)
                          <option value="{{$r->ruangan_id}}">{{$r->kode_ruangan}} - {{$r->nama_ruangan}}</option>
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
                      <input type="integer" name="nup" value="{{old('nup')}}"class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('tahun')
                          class="text-danger"
                      @enderror>Tahun Perolehan  @error('tahun')
                        | {{ $message }}
                    @enderror</label>
                      <input type="year" name="tahun" value="{{old('tahun')}}"class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('merk')
                          class="text-danger"
                      @enderror>Merk / Tipe  @error('merk')
                        | {{ $message }}
                    @enderror</label>
                      <input type="text" name="merk" value="{{old('merk')}}"class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('harga')
                          class="text-danger"
                      @enderror>Harga  @error('harga')
                        | {{ $message }}
                    @enderror</label>
                      <input type="integer" name="harga" value="{{old('harga')}}"class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('keterangan')
                          class="text-danger"
                      @enderror>Keterangan  @error('keterangan')
                        | {{ $message }}
                      @enderror</label>
                      <input type="text" name="keterangan" value="{{old('keterangan')}}"class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('kondisi')
                          class="text-danger"
                      @enderror>Kondisi  @error('kondisi')
                        | {{ $message }}
                      @enderror</label>
                    <select name="kondisi" class="form-control">
                        <option value="" selected disabled>Kondisi Barang</option>
                         @foreach (["Baik"=>"Baik","Rusak Ringan"=>"Rusak Ringan","Rusak Berat"=>"Rusak Berat"] AS $kondisi)
                          <option value="{{$kondisi}}">{{$kondisi}}</option>
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
                    <select name="label" class="form-control">
                        <option value="" selected disabled>Label Barang</option>
                         @foreach (["Sudah Dilabel"=>"Sudah Dilabel","Belum Dilabel"=>"Belum Dilabel"] AS $label)
                          <option value="{{$label}}">{{$label}}</option>
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
                    <select name="sensus" class="form-control">
                        <option value="" selected disabled>Sensus Barang</option>
                         @foreach (["Ditemukan"=>"Ditemukan","Belum Ditemukan"=>"Belum Ditemukan"] AS $sensus)
                          <option value="{{$sensus}}">{{$sensus}}</option>
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
                  <button class="btn btn-primary mr-1" type="submit">Submit</button>
                  <button class="btn btn-secondary" type="reset">Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
 
@push('page-scripts')
    
@endpush