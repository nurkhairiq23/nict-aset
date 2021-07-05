@extends('layouts.master')
@section('title','Tambah Data Inventory: E-Aset NICT')
@section('content')
<div class="section-header">
    <h4>Tambah Data Inventory</h4>
</div>  
<div class="section-body">
    <div class="card">    
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{route('inventory.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="hidden" name="id_inventory" class="form-control">
                      <label @error('nama_inventory')
                          class="text-danger"
                      @enderror>Nama Barang  @error('nama_inventory')
                        | {{ $message }}
                    @enderror</label>
                      <input type="text" name="nama_inventory" value="{{old('nama_inventory')}}" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('no_kwitansi')
                          class="text-danger"
                      @enderror>Nomor Kwitansi  @error('no_kwitansi')
                        | {{ $message }}
                    @enderror</label>
                      <input type="text" name="no_kwitansi" value="{{old('no_kwitansi')}}" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('vendor')
                          class="text-danger"
                      @enderror>Vendor  @error('vendor')
                        | {{ $message }}
                    @enderror</label>
                      <input type="text" name="vendor" value="{{old('vendor')}}" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label @error('harga')
                            class="text-danger"
                        @enderror>Harga  @error('harga')
                            | {{ $message }}
                        @enderror</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text">Rp. </div>
                            </div>
                            <input type="integer" name="harga" value="{{old('harga')}}" class="form-control">
                        </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('id_jenis_barang')
                          class="text-danger"
                        @enderror>Jenis Barang  @error('id_jenis_barang')
                        | {{ $message }}
                        @enderror</label>
                        <select name="id_jenis_barang" class="form-control">
                        <option value="" selected disabled>Pilih Jenis Barang</option>
                         @foreach ($jenis_barang as $jenis)
                          <option value="{{$jenis->id_jenis_barang}}">{{$jenis->nama_jenis_barang}}</option>
                         @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('tgl_perolehan')
                          class="text-danger"
                      @enderror>Tanggal Perolehan  @error('tgl_perolehan')
                        | {{ $message }}
                    @enderror</label>
                      <input type="date" name="tgl_perolehan" value="{{old('tgl_perolehan')}}"class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('tgl_pembukuan')
                          class="text-danger"
                      @enderror>Tanggal Pembukuan  @error('tgl_pembukuan')
                        | {{ $message }}
                    @enderror</label>
                      <input type="date" name="tgl_pembukuan" value="{{old('tgl_pembukuan')}}"class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('jumlah')
                          class="text-danger"
                      @enderror>Jumlah  @error('jumlah')
                        | {{ $message }}
                    @enderror</label>
                      <input type="integer" name="jumlah" value="{{old('jumlah')}}"class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('satuan')
                          class="text-danger"
                      @enderror>Satuan  @error('satuan')
                        | {{ $message }}
                      @enderror</label>
                      <input type="text" name="satuan" value="{{old('satuan')}}"class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="foto_inventory">Upload Foto</label>
                      <input type="file" id="foto_inventory" name="foto_inventory" class="form-control-file">
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
</div>
@endsection
 
@push('page-scripts')
    
@endpush