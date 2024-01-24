@extends('includes.header')

@section('title', 'Dashboard')
@section('datatables')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')

@include('includes.navbar')
@include('includes.sidebar')
<div class="content">
    <div class="container-fluid p-5">
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif
        <div class="table-responsive text-nowrap card">
            <div class="row m-2">
                <div class="col-6">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambah">
                        <i class="fa-solid fa-plus me-2"></i>Tambah
                    </button>
                    <!-- Modal Tambah -->
                    <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="ModalTambahLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="ModalTambahLabel">Tambah Produk Masuk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form class="was-validated" method="post" action="{{route('create.produk-masuk')}}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-1 row">
                                            <div class="col-md-6">
                                                <label for="gaslap" class="form-label">Gaslap</label>
                                                @foreach ($gaslap as $gaslapItem)
                                                    <input type="text" class="form-control" id="gaslap" name="gaslap" value="{{ $gaslapItem->nama_gaslap }}" disabled required>
                                                    <input type="hidden" name="gs_id" value="{{$gaslapItem->gaslap_id}}">
                                                @endforeach
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tanggal" class="form-label">Tanggal</label>
                                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                            </div>
                                        </div>
                                        <div class="mb-1">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="produk" class="form-label">Pilih Produk</label>
                                                    <select class="form-select" name="produk" aria-label=".form-select-sm example" required>
                                                        <option selected disabled>-Pilih Produk-</option>
                                                        @foreach ($produk as $prd)
                                                        <option value="{{$prd->produk_id}}">{{$prd->nama_produk}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="kode" class="form-label">Kode Produk</label>
                                                    <input type="text" class="form-control" id="kode" name="kode" required>
                                                    <div class="invalid-feedback">
                                                        Isi Kode Produk Dengan Benar
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1">
                                            <label for="produk" class="form-label">Pilih Distributor/Kios</label>
                                            <input type="text" list="options" class="form-control" name="dist_kios" id="exampleSelect" placeholder="Cari distributor/kios...">
                                            <datalist id="options">
                                                @foreach ($dist as $dst)
                                                    <option value="{{$dst->id}}">{{$dst->nama_dist_kios}}</option>
                                                @endforeach
                                            </datalist>
                                        </div>
                                        <div class="mb-1 row">
                                            <div class="col-md-6">
                                                <label for="stok" class="form-label">Stok</label>
                                                <input type="number" class="form-control" id="stok" name="stok" required>
                                                <div class="invalid-feedback">
                                                    Masukkan Stok
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">Satuan</label>
                                                <br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="satuan" id="ton" value="ton" checked required>
                                                    <label class="form-check-label" for="ton">
                                                        Ton
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="satuan" id="kg" value="kg" required>
                                                    <label class="form-check-label" for="kg">
                                                        Kg
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1 row">
                                            <div class="col-md-6">
                                                <label for="wilayah" class="form-label">Wilayah</label>
                                                <input type="text" class="form-control" id="wilayah" name="wilayah" required>
                                                <div class="invalid-feedback">
                                                    Masukkan Wilayah
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="kabupaten" class="form-label">Kabupaten</label>
                                                <input type="text" class="form-control" id="kabupaten" name="kabupaten" required>
                                                <div class="invalid-feedback">
                                                    Masukkan Kabupaten
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1">
                                            <label for="expired" class="form-label">Tanggal Expired</label>
                                            <input type="date" class="form-control" id="expired" name="expired" required>
                                            <div class="invalid-feedback">
                                                Masukkan tanggal expired
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-success"><i class="fa-solid fa-print me-2"></i>Cetak</a>
                </div>
                <div class="col-6 text-end">
                    <p class="m-2">Data Monitoring Jagung</p>
                </div>
            </div>
            <hr>
            <div class="table-responsive m-2">
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
                        @foreach ($tabel as $tbl)
                        <tr>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#ModalEdit-{{$tbl->produk_id}}">
                                   <div class="text-center text-primary">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                   </div>
                                </a>
                                <div class="modal fade" id="ModalEdit-{{$tbl->produk_id}}" tabindex="-1" aria-labelledby="ModalEditLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="ModalEditLabel">Update Data Produk</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form class="was-validated" method="post" action="{{route('update.produk-masuk', $tbl->id_produk_masuk)}}">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-1 row">
                                                        <div class="col-md-6">
                                                            <label for="gaslap" class="form-label">Gaslap</label>
                                                            @foreach ($gaslap as $gaslapItem)
                                                                <input type="text" class="form-control" id="gaslap" name="gaslap" value="{{ $gaslapItem->nama_gaslap }}" disabled required>
                                                                <input type="hidden" name="gs_id" value="{{$gaslapItem->gaslap_id}}">
                                                            @endforeach
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="tanggal" class="form-label">Tanggal</label>
                                                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{$tbl->tanggal}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-1">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="produk" class="form-label">Pilih Produk</label>
                                                                <select class="form-select" name="produk" aria-label=".form-select-sm example" required>
                                                                    <option selected disabled>-Pilih Produk-</option>
                                                                    @foreach ($produk as $prd)
                                                                    <option value="{{$prd->produk_id}}">{{$prd->nama_produk}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="kode" class="form-label">Kode Produk</label>
                                                                <input type="text" class="form-control" id="kode" value="{{$tbl->kode_produk}}" name="kode" required>
                                                                <div class="invalid-feedback">
                                                                    Isi Kode Produk Dengan Benar
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="produk" class="form-label">Pilih Distributor/Kios</label>
                                                        <input type="text" list="options" class="form-control" name="dist_kios" id="exampleSelect" placeholder="Cari distributor/kios...">
                                                        <datalist id="options">
                                                            @foreach ($dist as $dst)
                                                                <option value="{{$dst->id}}">{{$dst->nama_dist_kios}}</option>
                                                            @endforeach
                                                        </datalist>
                                                    </div>
                                                    <div class="mb-1 row">
                                                        <div class="col-md-6">
                                                            <label for="stok" class="form-label">Stok</label>
                                                            <input type="number" class="form-control" id="stok" value="{{$tbl->stok}}" name="stok" required>
                                                            <div class="invalid-feedback">
                                                                Masukkan Stok
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="" class="form-label">Satuan</label>
                                                            <br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="satuan" id="ton" value="ton" required>
                                                                <label class="form-check-label" for="ton">
                                                                    Ton
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="satuan" id="kg" value="kg" required>
                                                                <label class="form-check-label" for="kg">
                                                                    Kg
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-1 row">
                                                        <div class="col-md-6">
                                                            <label for="wilayah" class="form-label">Wilayah</label>
                                                            <input type="text" class="form-control" id="wilayah" value="{{$tbl->lokasi}}" name="wilayah" required>
                                                            <div class="invalid-feedback">
                                                                Masukkan Wilayah
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="kabupaten" class="form-label">Kabupaten</label>
                                                            <input type="text" class="form-control" id="kabupaten" value="{{$tbl->posisi}}" name="kabupaten" required>
                                                            <div class="invalid-feedback">
                                                                Masukkan Kabupaten
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="expired" class="form-label">Tanggal Expired</label>
                                                        <input type="date" class="form-control" id="expired" name="expired" required>
                                                        <div class="invalid-feedback">
                                                            Masukkan tanggal expired
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#ModalHapus-{{$tbl->id_produk_masuk}}">
                                    <div class="text-center text-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </div>
                                </a>
                                <div class="modal fade" id="ModalHapus-{{$tbl->id_produk_masuk}}" tabindex="-1" aria-labelledby="ModalHapusLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="ModalHapusLabel">Hapus Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                                <div class="modal-body">
                                                    <p>Apakah ingin menghapus data ini ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a href="produk-masuk/{{$tbl->id_produk_masuk}}/hapus" class="btn btn-primary">Simpan</a>
                                                </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
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
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

 <script>
        $(document).ready(function () {
            $('table').DataTable({
                scrollX: true, // Enable horizontal scrolling
                fixedHeader: true, // Fix the header
                paging: true, // Enable pagination
            });
        });
    </script>
@endsection


