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
        <h1 align="center">Daftar Barang Milik Negara NICT</h1>
        <center>
        <table class="table table-bordered table-sm" style="width: 95%;">
            <thead>
               <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Ruangan</th>
                    <th scope="col">Nama Ruangan</th>
                    <th scope="col">Kategori Ruangan</th>
                    <th scope="col">Lantai</th>
                    <th scope="col">Luas Ruangan</th>
                </tr>
            </thead>
            <tbody>
            @foreach($ruangan as $data)
                <tr>
                    <td>{{$loop -> iteration}}</td>
                    <td>{{$data -> kode_ruangan}}</td>
                    <td>{{$data -> nama_ruangan}}</td>
                    <td>{{$data -> nama_kategori_ruang}}</td>
                    <td>{{$data -> lantai}}</td>
                    <td>{{$data -> luas}} m2</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </center>
        <div style="padding-left: 35px">
            Menampilkan {{$ruangan->firstItem()}}
            - {{$ruangan->lastItem()}}
            dari {{$ruangan->total()}} item
        </div>
        
    </div>

</body>
</html>