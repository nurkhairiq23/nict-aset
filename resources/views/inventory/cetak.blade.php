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
                    <th scope="col">Nama Barang</th>
                    <th scope="col">No Kwitansi</th>
                    <th scope="col">Vendor</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Tanggal Perolehan</th>
                    <th scope="col">Tanggal Pembukuan</th>
                    <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <tbody>
            @foreach($inventory as $data)
            <tr>
                <td>{{$loop -> iteration}}</td>
                <td>{{$data -> nama_inventory}}</td>
                <td>{{$data -> no_kwitansi}}</td>
                <td>{{$data -> vendor}}</td>
                <td>Rp. {{$data -> harga}}</td>
                <td>{{$data -> nama_jenis_barang}}</td>
                <td>{{$data -> tgl_perolehan}}</td>
                <td>{{$data -> tgl_pembukuan}}</td>
                <td>{{$data -> jumlah}} {{$data -> satuan}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </center>
        <div style="padding-left: 35px">
            Menampilkan {{$inventory->firstItem()}}
            - {{$inventory->lastItem()}}
            dari {{$inventory->total()}} item
        </div>
        
    </div>

</body>
</html>