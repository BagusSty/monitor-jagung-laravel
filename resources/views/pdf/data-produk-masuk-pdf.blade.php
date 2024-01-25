<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="col">Tanggal</th>
                <th scope="col">Kode Produk</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Nama Distributor/Kios</th>
                <th scope="col">Wilayah</th>
                <th scope="col">Kabupaten</th>
                <th scope="col">Stok Barang</th>
                <th scope="col">Tanggal Kadaluarsa</th>
                <th scope="col">PIC Gaslap</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($tabel as $tbl)
            <tr>
                <td>{{\Carbon\Carbon::parse($tbl->tanggal)->format('d/m/y')}}</td>
                <td>{{$tbl->kode_produk}}</td>
                <td>{{$tbl->nama_produk}}</td>
                <td>
                    @if ($tbl->nama_kios != null)
                    {{$tbl->nama_kios}} (Kios)
                    @endif
                    @if ($tbl->nama_dist != null)
                        {{$tbl->nama_dist}} (Distributor)
                    @endif
                </td>
                <td>{{$tbl->lokasi}}</td>
                <td>{{$tbl->posisi}}</td>
                <td>{{$tbl->stok}} {{$tbl->satuan}}</td>
                <td>{{\Carbon\Carbon::parse($tbl->expired_produk)->format('d/m/y')}}</td>
                <td>{{$tbl->nama_gaslap}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
