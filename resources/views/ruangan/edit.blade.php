@extends('layouts.master')
@section('title','Ubah Data Ruangan: E-Aset NICT')
@section('content')

    <div class="section-header">
        <h1 style="color: black;">Data Ruangan</h1>
    </div>
    <div class="section-body">
        {{-- <div class="card-header">
            <p style="color: black;">Ubah Data Barang: {{$data_barang->id_inventory}} - {{$data_barang->no_kwitansi}}</p>
        </div>   --}}
        <div class="card">
            <div class="card-body">
                <h4>Ubah Data Ruangan: {{$data_ruangan->nama_ruangan}} - {{$data_ruangan->kode_ruangan}}</h4>
                <hr>
                <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    
                    <form action="{{route('ruangan.update', $data_ruangan->ruangan_id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                  <input type="hidden" name="ruangan_id" value="{{$data_ruangan->ruangan_id}}" class="form-control">
                                  <label @error('kode_ruangan')
                                      class="text-danger"
                                  @enderror>Kode Ruangan  @error('kode_ruangan')
                                    | {{ $message }}
                                @enderror</label>
                                  <input type="text" name="kode_ruangan" value="{{$data_ruangan->kode_ruangan}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                  <label @error('nama_ruangan')
                                      class="text-danger"
                                  @enderror>Nama Ruangan  @error('nama_ruangan')
                                    | {{ $message }}
                                @enderror</label>
                                  <input type="text" name="nama_ruangan" value="{{$data_ruangan->nama_ruangan}}" class="form-control">
                                </div>
                              </div>
            
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label @error('id_kategori_ruangan')
                                      class="text-danger"
                                    @enderror>Kategori Ruangan  @error('id_kategori_ruangan')
                                    | {{ $message }}
                                    @enderror</label>
                                    <select name="id_kategori_ruangan" class="form-control">
                                    <option value="" selected disabled>Pilih Kategori Ruangan</option>
                                    @foreach ($kategori_ruangan as $k)
                                        {{-- <option value="{{$k->ruangan_id}}" {{old('ruangan_id', $data_barang -> ruangan_id == $r-> ruangan_id)? "selected": ""}}>{{$r->kode_ruangan}} - {{$r->nama_ruangan}}</option> --}}
                                        <option value="{{$k->id_kategori_ruangan}}" {{old('id_kategori_ruangan', $data_ruangan -> id_kategori_ruangan == $k-> id_kategori_ruangan)? "selected": ""}}>{{$k->nama_kategori_ruang}}</option>                                        
                                    @endforeach
                                  </select>
                                </div>
                              </div>
            
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label @error('lantai')
                                      class="text-danger"
                                  @enderror>Lantai  @error('lantai')
                                    | {{ $message }}
                                @enderror</label>
                                  <input type="text" name="lantai" value="{{$data_ruangan->lantai}}"class="form-control">
                                </div>
                              </div>
            
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label @error('luas')
                                      class="text-danger"
                                  @enderror>Luas Ruangan (m2)  @error('luas')
                                    | {{ $message }}
                                @enderror</label>
                                  <input type="integer" name="luas" value="{{$data_ruangan->luas}}"class="form-control">
                                </div>
                              </div>
            
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="foto_ruangan">Upload Foto</label>
                                  <input type="file" id="foto_ruangan" name="foto_ruangan" class="form-control-file">
                                </div>
                              </div>
            
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                      <input type="hidden" name="dipakai" value="0" >
                                        <input type="checkbox" id="dipakai" name="dipakai" value="1"{{$data_ruangan->dipakai}} checked>
                                        Ruangan Dipakai
                                    </label>
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
    </div>
@endsection
 
@push('page-scripts')
    
@endpush