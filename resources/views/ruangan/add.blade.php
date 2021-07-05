@extends('layouts.master')
@section('title','Tambah Ruangan: E-Aset NICT')
@section('content')
<div class="section-header">
    <h4>Tambah Data Inventory</h4>
</div>  
<div class="section-body">
    <div class="card">    
      {{-- <div class="card-body"> --}}
        <div class="col-12 col-md-12 col-lg-12">
          {{-- <div class="card"> --}}
            <form action="{{route('ruangan.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="hidden" name="ruangan_id" class="form-control">
                      <label @error('kode_ruangan')
                          class="text-danger"
                      @enderror>Kode Ruangan  @error('kode_ruangan')
                        | {{ $message }}
                    @enderror</label>
                      <input type="text" name="kode_ruangan" value="{{old('kode_ruangan')}}" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('nama_ruangan')
                          class="text-danger"
                      @enderror>Nama Ruangan  @error('nama_ruangan')
                        | {{ $message }}
                    @enderror</label>
                      <input type="text" name="nama_ruangan" value="{{old('nama_ruangan')}}" class="form-control">
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
                          <option value="{{$k->id_kategori_ruangan}}">{{$k->nama_kategori_ruang}}</option>
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
                      <input type="text" name="lantai" value="{{old('lantai')}}"class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('luas')
                          class="text-danger"
                      @enderror>Luas Ruangan (m2)  @error('luas')
                        | {{ $message }}
                    @enderror</label>
                      <input type="integer" name="luas" value="{{old('luas')}}"class="form-control">
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
                            <input type="checkbox" id="dipakai" name="dipakai" value="{{old('dipakai')}}"> Ruangan Dipakai
                        </label>
                    </div>
                  </div>

                </div> 

                <div class="card-footer text-right">
                  <button class="btn btn-primary mr-1" type="submit">Submit</button>
                  <button class="btn btn-secondary" type="reset">Reset</button>
                </div>
            </form>
            </div>
          {{-- </div> --}}
        </div>
      {{-- </div> --}}
    </div>
</div>
@endsection
 
@push('page-scripts')
    
@endpush