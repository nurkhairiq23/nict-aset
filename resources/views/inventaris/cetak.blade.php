<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
    <title>Daftar Data BMN</title>
</head>
<body>
    <div class="form-group">
        <h1 align="center"><b>Daftar Barang Milik Negara NICT</b></h1>
        <center>
        <table class="table table-bordered table-sm" style="width: 95%;">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Kode - Nama Ruangan</th>
                <th scope="col">NUP</th>
                <th scope="col">Tahun</th>
                <th scope="col">Merk</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Kondisi</th>
                <th scope="col">Status Label</th>
                <th scope="col">Status Sensus</th>
            </tr>
            </thead>
            <tbody>
            @foreach($inventaris as $data)
            <tr>
                <td align="center">{{$loop -> iteration}}</td>
                <td>{{$data -> kode_inventaris}}</td>
                <td>{{$data -> nama_inventaris}}</td>
                <td>{{$data -> kode_ruangan}} - {{$data -> nama_ruangan}}</td>
                <td align="center">{{$data -> nup}}</td>
                <td align="center">{{$data -> tahun}}</td>
                <td>{{$data -> merk}}</td>
                <td>{{$data -> keterangan}}</td>
                <td align="center">{{$data -> kondisi}}</td>
                <td align="center">{{$data -> label}}</td>
                <td align="center">{{$data -> sensus}}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
        </center>
        <div style="padding-left: 35px">
            Menampilkan {{$inventaris->firstItem()}}
            - {{$inventaris->lastItem()}}
            dari {{$inventaris->total()}} item
        </div>
        
    </div>

</body>
</html>