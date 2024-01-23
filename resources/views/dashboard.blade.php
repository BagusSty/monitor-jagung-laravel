@extends('includes.header')

@section('title', 'Dashboard')

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
                    <p class="m-2">Data Monitoring Jagung</p>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="col">Edit</th>
                            <th class="col">Hapus</th>
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
                        <tr>
                            <td class="text-center text-primary"><i class="fa-solid fa-pen-to-square"></i></td>
                            <td class="text-center text-danger"><i class="fa-solid fa-trash"></i></td>
                            <td>23/01/2024</td>
                            <td>JGG0001</td>
                            <td>Jagung-Olympus</td>
                            <td>SMAI</td>
                            <td>Jatim</td>
                            <td>Malang</td>
                            <td>100 Ton</td>
                            <td>6/6/2025</td>
                            <td>Indra H.</td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


