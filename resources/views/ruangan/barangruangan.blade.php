@extends('layouts.master')
@section('title','Data Barang Ruangan NICT')
@section('content')

    <div class="section-header">
        <h1>Data Barang Ruangan</h1>
    </div>
    <div class="section_body">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-12">
                      <div class="card">
                          <ul class="nav nav-tabs" id="Tab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active show" id="tab_unit" data-toggle="tab" href="#unit" role="tab" aria-controls="inventaris" aria-selected="true">Unit / Ruangan</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="tab_profile" data-toggle="tab" href="#profile" role="tab" aria-controls="history" aria-selected="false">Profile</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="tab_lainnya" data-toggle="tab" href="#lainnya" role="tab" aria-controls="perbaikan" aria-selected="false">Lainnya</a>
                            </li>
                          </ul>
                          <div class="tab-content tab-bordered" id="content_umum">
                            <div class="tab-pane fade active show" id="unit" role="tabpanel" aria-labelledby="tab_unit">
                              <div class="row">
                                <div class="col-12 col-sm-12 col-lg-12">
                                    <form action="{{route('inventaris.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="hidden" name="nama_uakpb" class="form-control">
                                                    <label @error('nama_uakpb')
                                                        class="text-danger"
                                                    @enderror>Nama UAKPB  @error('nama_uakpb')
                                                    | {{ $message }}
                                                    @enderror</label>
                                                    <input type="text" name="nama_uakpb" value="{{old('nama_uakpb')}}" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label @error('kode_uakpb')
                                                        class="text-danger"
                                                    @enderror>Kode UAKPB  @error('kode_uakpb')
                                                    | {{ $message }}
                                                    @enderror</label>
                                                    <input type="text" name="kode_uakpb" value="{{old('kode_uakpb')}}" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label @error('unit_kerja')
                                                        class="text-danger"
                                                        @enderror>Unit Kerja  @error('unit_kerja')
                                                        | {{ $message }}
                                                        @enderror</label>
                                                    <select name="unit_kerja" class="form-control">
                                                        <option value="" disabled selected>-- Pilih Data --</option>
                                                        <option value="NICT">NICT</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label @error('ruangan_id')
                                                        class="text-danger"
                                                        @enderror>Ruangan  @error('ruangan_id')
                                                        | {{ $message }}
                                                        @enderror</label>
                                                    <select name="ruangan_id" class="form-control select2" multiple="">
                                                        @foreach ($ruangan as $r)
                                                          <option value="{{$r->ruangan_id}}">{{$r->kode_ruangan}} - {{$r->nama_ruangan}}</option>
                                                        @endforeach
                                                    </select>
                                                    <p class="help-block">Tekan <kbd>Ctrl+Click</kbd> untuk memilih.</p>
                                                </div>

                                                <div class="form-group">
                                                    <label @error('model_laporan')
                                                        class="text-danger"
                                                        @enderror>Model Laporan  @error('model_laporan')
                                                        | {{ $message }}
                                                        @enderror</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="model_laporan" id="model_laporan" checked>
                                                        <label class="form-check-label" for="model_laporan">
                                                            Keseluruhan
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="model_laporan" id="model_laporan">
                                                        <label class="form-check-label" for="model_laporan">
                                                            Ringkas
                                                        </label>
                                                    </div>
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
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="tab_profile">
                                <form action="{{route('inventaris.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="hidden" name="pembantu_kp_barang" class="form-control">
                                                <label @error('pembantu_kp_barang')
                                                    class="text-danger"
                                                @enderror>Pembantu Kuasa Pengguna Barang  @error('pembantu_kp_barang')
                                                | {{ $message }}
                                                @enderror</label>
                                                <input type="text" name="pembantu_kp_barang" value="{{old('pembantu_kp_barang')}}" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label @error('nip_kp_barang')
                                                    class="text-danger"
                                                @enderror>NIP Kuasa Pengguna Barang  @error('nip_kp_barang')
                                                | {{ $message }}
                                                @enderror</label>
                                                <input type="text" name="nip_kp_barang" value="{{old('nip_kp_barang')}}" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <input type="hidden" name="pj_ruangan" class="form-control">
                                                <label @error('pj_ruangan')
                                                    class="text-danger"
                                                @enderror>Penanggung Jawab Ruangan  @error('pj_ruangan')
                                                | {{ $message }}
                                                @enderror</label>
                                                <input type="text" name="pj_ruangan" value="{{old('pj_ruangan')}}" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label @error('nip_pj_ruangan')
                                                    class="text-danger"
                                                @enderror>NIP Penanggung Jawab Ruangan  @error('nip_pj_ruangan')
                                                | {{ $message }}
                                                @enderror</label>
                                                <input type="text" name="nip_pj_ruangan" value="{{old('nip_pj_ruangan')}}" class="form-control">
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
                            <div class="tab-pane fade" id="lainnya" role="tabpanel" aria-labelledby="tab_lainnya">
                                <form action="{{route('inventaris.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label @error('ukuran_kertas')
                                                    class="text-danger"
                                                    @enderror>Ukuran Kertas  @error('ukuran_kertas')
                                                    | {{ $message }}
                                                    @enderror</label>
                                                <select name="ukuran_kertas" class="form-control">
                                                    <option value="A4" selected disabled>A4</option>
                                                    <option value="Legal">Legal</option>
                                                    <option value="Letter">Letter</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label @error('orientasi')
                                                    class="text-danger"
                                                    @enderror>Orientasi  @error('orientasi')
                                                    | {{ $message }}
                                                    @enderror</label>
                                                <select name="orientasi" class="form-control">
                                                    <option value="Potrait" selected disabled>Potrait</option>
                                                    <option value="Landscape">Landscape</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <input type="hidden" name="judul" class="form-control">
                                                <label @error('judul')
                                                    class="text-danger"
                                                @enderror>Judul  @error('judul')
                                                | {{ $message }}
                                                @enderror</label>
                                                <input type="text" name="judul" value="{{old('judul')}}" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label @error('sub_judul')
                                                    class="text-danger"
                                                @enderror>Sub Judul  @error('sub_judul')
                                                | {{ $message }}
                                                @enderror</label>
                                                <input type="text" name="sub_judul" value="{{old('sub_judul')}}" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label @error('catatan')
                                                    class="text-danger"
                                                @enderror>Catatan  @error('catatan')
                                                | {{ $message }}
                                                @enderror</label>
                                                <textarea name="catatan" value="{{old('catatan')}}" class="form-control"></textarea>
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
                    </div>
                  </div>
            </div>
        </div>
    </div>


@endsection
