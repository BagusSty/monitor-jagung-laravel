@extends('includes.header')

@section('title', 'Data Produk')
@section('datatables')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')

@include('includes.navbar')
@include('includes.sidebar')
<div class="content">
    <div class="container-fluid p-5">
        <div class="table-responsive text-nowrap card">
            <div class="row m-2">
                <div class="col-6">
                    <a href="#" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Tambah</a>
                    <a href="#" class="btn btn-success"><i class="fa-solid fa-print me-2"></i>Cetak</a>
                </div>
                <div class="col-6 text-end">
                    <p class="m-2">Data Produk Jagung</p>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th class="col">Edit</th>
                            <th class="col">Hapus</th>
                            <th class="col">Kode Produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Deskripsi Produk</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center text-primary"><i class="fa-solid fa-pen-to-square"></i></td>
                            <td class="text-center text-danger"><i class="fa-solid fa-trash"></i></td>
                            <td>JGG0001</td>
                            <td>Nama</td>
                            <td>Deskripsi</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('table').DataTable();
    });
</script>
@endsection
