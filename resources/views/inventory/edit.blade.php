@extends('layouts.master')
@section('title','Ubah Data Inventory: E-Aset NICT')
@section('content')

    <div class="section-header">
        <h1 style="color: black;">Data Inventory</h1>
    </div>
    <div class="section-body">
        {{-- <div class="card-header">
            <p style="color: black;">Ubah Data Barang: {{$barang->id_inventory}} - {{$data_barang->no_kwitansi}}</p>
        </div>   --}}
        <div class="card">
            <div class="card-body">
                <h4>Ubah Data Barang: {{$barang->nama_inventory}} - {{$barang->no_kwitansi}}</h4>
                <hr>
                <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    
                    <form action="{{route('inventory.update', $barang->id_inventory)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <input type="hidden" name="id_inventory" value="{{$barang->id_inventory}}" class="form-control">
                                <label @error('nama_inventory')
                                    class="text-danger"
                                @enderror>Nama Barang  @error('nama_inventory')
                                    | {{ $message }}
                                @enderror</label>
                                <input type="text" name="nama_inventory" value="{{$barang->nama_inventory}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label @error('no_kwitansi')
                                    class="text-danger"
                                @enderror>Nomor Kwitansi  @error('no_kwitansi')
                                    | {{ $message }}
                                @enderror</label>
                                <input type="text" name="no_kwitansi" value="{{$barang->no_kwitansi}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label @error('vendor')
                                    class="text-danger"
                                @enderror>Vendor  @error('vendor')
                                    | {{ $message }}
                                @enderror</label>
                                <input type="text" name="vendor" value="{{$barang->vendor}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label @error('harga')
                                    class="text-danger"
                                @enderror>Harga  @error('harga')
                                    | {{ $message }}
                                @enderror</label>
                                <input type="integer" name="harga" value="{{$barang->harga}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label @error('id_jenis_barang')
                                    class="text-danger"
                                    @enderror>Kategori Barang  @error('id_jenis_barang')
                                    | {{ $message }}
                                    @enderror</label>
                                    <select name="id_jenis_barang" class="form-control">
                                        @foreach ($kategori as $k)
                                        <option value="{{$k->id_jenis_barang}}" {{old('id_jenis_barang', $barang -> id_jenis_barang == $k-> id_jenis_barang)? "selected": ""}}>{{$k->nama_jenis_barang}}</option>
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
                                <input type="date" name="tgl_perolehan" value="{{$barang->tgl_perolehan}}"class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label @error('tgl_pembukuan')
                                    class="text-danger"
                                @enderror>Tanggal Pembukuan  @error('tgl_pembukuan')
                                    | {{ $message }}
                                @enderror</label>
                                <input type="date" name="tgl_pembukuan" value="{{$barang->tgl_pembukuan}}"class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label @error('jumlah')
                                    class="text-danger"
                                @enderror>Jumlah  @error('jumlah')
                                    | {{ $message }}
                                @enderror</label>
                                <input type="integer" name="jumlah" value="{{$barang->jumlah}}"class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label @error('satuan')
                                    class="text-danger"
                                @enderror>Satuan  @error('satuan')
                                    | {{ $message }}
                                @enderror</label>
                                <input type="text" name="satuan" value="{{$barang->satuan}}"class="form-control">
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
                        <button class="btn btn-primary mr-1" type="submit">Ubah</button>
                        <button class="btn btn-secondary" type="cancel">Batal</button>
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