@extends('layouts.master')
@section('title','E-Aset NICT')
@section('content')

    <div class="section-header">
        <h1>Data Inventaris</h1>
    </div>
    <div class="section-body">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4>Pencarian Data</h4>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="inputnama" placeholder="--Nama Barang--">
                        </div>
                        <div class="form-group col-md-3">
                            <select id="inputState" class="form-control">
                                <option>--Status Label--</option>
                                <option>Sudah Dilabel</option>
                                <option>Belum Dilabel</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <select id="inputState" class="form-control">
                                <option>--Tahun--</option>
                                <option>2020</option>
                                <option>2021</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <select id="inputruangan" class="form-control">
                                <option>--Ruangan--</option>
                                <option>Kamar 101</option>
                                <option>Kamar 102</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <select id="inputState" class="form-control">
                                <option>--Status Sensus--</option>
                                <option>Ditemukan</option>
                                <option>Todak Ditemukan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <select id="inputState" class="form-control">
                                <option>--Kondisi--</option>
                                <option>Baik</option>
                                <option>Rusak Ringan</option>
                                <option>Rusak Berat</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row"> 
                        <div class="buttons">
                            <button class="btn btn-primary">Cari</button> 
                            <button class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </div>           
                    <hr>
                    <a href="{{route('inventaris.create')}}" class="btn btn-primary">Tambah Data</a>
                    <a href="{{route('inventaris.print')}}" target="_blank" class="btn btn-print">Cetak Data</a>
                    <a href="#" class="btn btn-print">Cetak Label</a>

                    <hr>
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                            <span>×</span>
                            </button>
                            {{session('message')}}
                        </div>
                        </div>
                    @endif
                    <div>
                        Menampilkan {{$inventaris->firstItem()}}
                        - {{$inventaris->lastItem()}}
                        dari {{$inventaris->total()}} item
                    </div>
                    <table class="table table-bordered table-sm">
                        <thead>
                           <tr>
                                <th scope="col">Detail</th>
                                <th scope="col">
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" data-checkboxes="inventaris" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                    </div>
                                </th>
                                <th scope="col">No</th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Kode - Nama Ruangan</th>
                                <th scope="col">NUP</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Kondisi</th>
                                <th scope="col">Status Label</th>
                                <th scope="col">Status Sensus</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($inventaris as $no => $data)
                        <tr>
                            <td>
                                <a href="{{route('inventaris.show', $data->id_inventaris)}}" class="btn btn-icon btn-info btn-sm"><i class="fas fa-info-circle"></i></a>
                            </td>
                            <td>
                                <div class="custom-checkbox custom-control">
                                    <input type="checkbox" data-checkboxes="inventaris" class="custom-control-input" id="checkbox-{{$data->id_inventaris}}">
                                    <label for="checkbox-{{$data->id_inventaris}}" class="custom-control-label">&nbsp;</label>
                                </div>
                            </td>
                            <td>{{$inventaris->firstItem() + $no }}</td>
                            <td>{{$data -> kode_inventaris}}</td>
                            <td>{{$data -> nama_inventaris}}</td>
                            <td>{{$data -> kode_ruangan}} - {{$data -> nama_ruangan}}</td>
                            <td>{{$data -> nup}}</td>
                            <td>{{$data -> tahun}}</td>
                            <td>{{$data -> kondisi}}</td>
                            <td>{{$data -> label}}</td>
                            <td>{{$data -> sensus}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $inventaris->links() }}
                    </div>
                </div>
            </div> 
        </div>
    </div>

@endsection 

@push('page-scripts')
    <script src="{{asset('assets/js/page/components-table.js')}}"></script>
@endpush

@push('after-scripts')
    <script>
        $("[data-checkboxes]").each(function() {
        var me = $(this),
            group = me.data('checkboxes'),
            role = me.data('checkbox-role');

        me.change(function() {
            var all = $('[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"])'),
            checked = $('[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"]):checked'),
            dad = $('[data-checkboxes="' + group + '"][data-checkbox-role="dad"]'),
            total = all.length,
            checked_length = checked.length;

            if(role == 'dad') {
            if(me.is(':checked')) {
                all.prop('checked', true);
            }else{
                all.prop('checked', false);
            }
            }else{
            if(checked_length >= total) {
                dad.prop('checked', true);
            }else{
                dad.prop('checked', false);
            }
            }
        });
        });
    </script>
@endpush