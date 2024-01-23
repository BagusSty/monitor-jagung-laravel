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
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="ModalTambahLabel">Tambah Data Produk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form class="was-validated" method="post" action="{{ route('create.produk') }}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="nama_produk" class="form-label">Nama Produk</label>
                                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                                            <div class="invalid-feedback">
                                                Tolong Isi Nama Produk Dengan Benar
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
                                            <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-control" cols="30" rows="10" required></textarea>
                                            <div class="invalid-feedback">
                                                Tolong Isi Deskripsi Produk Dengan Benar
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
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Deskripsi Produk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $prd)
                        <tr>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#ModalEdit-{{$prd->produk_id}}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <div class="modal fade" id="ModalEdit-{{$prd->produk_id}}" tabindex="-1" aria-labelledby="ModalEditLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="ModalEditLabel">Update Data Produk</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form class="was-validated" method="post" action="/produk/{{$prd->produk_id}}/edit">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="nama_produk" class="form-label">Nama Produk</label>
                                                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{$prd->nama_produk}}" required>
                                                        <div class="invalid-feedback">
                                                            Tolong Isi Nama Produk Dengan Benar
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
                                                        <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-control" cols="30" rows="10" required>{{$prd->deskripsi_produk}}</textarea>
                                                        <div class="invalid-feedback">
                                                            Tolong Isi Deskripsi Produk Dengan Benar
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
                                <a href="#" data-bs-toggle="modal" data-bs-target="#ModalHapus-{{$prd->produk_id}}">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <div class="modal fade" id="ModalHapus-{{$prd->produk_id}}" tabindex="-1" aria-labelledby="ModalHapusLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="ModalHapusLabel">Hapus Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                                <div class="modal-body">
                                                    <p>Apakah ingin menghapus {{ $prd->nama_produk }} ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a href="produk/{{$prd->produk_id}}/hapus" class="btn btn-primary">Simpan</a>
                                                </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{$prd->nama_produk}}</td>
                            <td>{{$prd->deskripsi_produk}}</td>
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
        $('table').DataTable();
    });
</script>
@endsection
