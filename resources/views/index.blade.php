@extends('layouts.master')
@section('title','E-Aset')
@section('content')

    <div class="section-header">
        <h1 style="text-align: center; color:black;">DASHBOARD BARANG MILIK NEGARA NICT</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <h4 style="text-align: center; color:black;">Aset Inventaris BMN NICT</h4>
            
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                        <div class="card-header">
                            <h4>Aset Berdasarkan Kondisi</h4>
                        </div>
                        <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <canvas id="myChart4" width="365" height="182" class="chartjs-render-monitor" style="display: block; width: 365px; height: 182px;"></canvas>
                        </div>
                        </div> 
                    </div>
                
                {{-- <div class="row"> --}}
                    <div class="col-md-4">
                        <div class="card">
                        <div class="card-header">
                            <h4>Aset Berdasarkan Label</h4>
                        </div>
                        <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <canvas id="myChart5" width="365" height="182" class="chartjs-render-monitor" style="display: block; width: 365px; height: 182px;"></canvas>
                        </div>
                        </div> 
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                        <div class="card-header">
                            <h4>Aset Berdasarkan Sensus</h4>
                        </div>
                        <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <canvas id="myChart6" width="365" height="182" class="chartjs-render-monitor" style="display: block; width: 365px; height: 182px;"></canvas>
                        </div>
                        </div> 
                    </div>
                {{-- </div> --}}
                </div>
            </div>
            <div class="card-body">
                <h4 style="text-align: center; color:black;">Aset Inventory BMN NICT</h4>
            
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                        <div class="card-header">
                            <h4>Jumlah Total Aset Inventory : 70</h4>
                        </div>
                        {{-- <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <canvas id="myChart4" width="365" height="182" class="chartjs-render-monitor" style="display: block; width: 365px; height: 182px;"></canvas>
                        </div> --}}
                        </div> 
                    </div>
                
                </div>
            </div>
        </div>
    </div>

@endsection 

@push('page-scripts')
    <script src="{{asset('assets/modules/chart.min.js')}}"></script>
@endpush

@push('after-scripts')
    <script>
        var ctx = document.getElementById("myChart4").getContext('2d');
        var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: [{
            data: [
                100,
                80,
                50,
            ],
            backgroundColor: [
                '#63ed7a',
                '#6777ef',
                '#fc544b',
            ],
            label: 'Dataset 1'
            }],
            labels: [
            'Baik',
            'Rusak Ringan',
            'Rusak Berat',
            ],
        },
        options: {
            responsive: true,
            legend: {
            position: 'bottom',
            },
        }
        });
    </script>

    <script>
        var ctx = document.getElementById("myChart5").getContext('2d');
        var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: [{
            data: [
                250,
                80,

            ],
            backgroundColor: [
                '#63ed7a',
                '#6777ef',
            ],
            label: 'Dataset 2'
            }],
            labels: [
            'Sudah Dilabel',
            'Belum Dilabel',
            ],
        },
        options: {
            responsive: true,
            legend: {
            position: 'bottom',
            },
        }
        });
    </script>

    <script>
        var ctx = document.getElementById("myChart6").getContext('2d');
        var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: [{
            data: [
                200,
                110,

            ],
            backgroundColor: [
                '#63ed7a',
                '#fc544b',
            ],
            label: 'Dataset 2'
            }],
            labels: [
            'Ditemukan',
            'Tidak Ditemukan',
            ],
        },
        options: {
            responsive: true,
            legend: {
            position: 'bottom',
            },
        }
        });
    </script>
@endpush