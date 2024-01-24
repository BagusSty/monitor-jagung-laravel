@extends('includes.header')

@section('title', 'Data distributor')
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
                                    <h1 class="modal-title fs-5" id="ModalTambahLabel">Tambah Data distributor</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form class="was-validated" method="post" action="{{ route('create.dist') }}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="nama_distributor" class="form-label">Nama distributor</label>
                                            <input type="text" class="form-control" id="nama_distributor" name="nama_dist" required>
                                            <div class="invalid-feedback">
                                                Tolong Isi Nama distributor Dengan Benar
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
                    <p class="m-2">Data distributor</p>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th class="col">Edit</th>
                            <th class="col">Hapus</th>
                            <th scope="col">Nama distributor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($distributor as $ks)
                        <tr>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#ModalEdit-{{$ks->dist_id}}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <div class="modal fade" id="ModalEdit-{{$ks->dist_id}}" tabindex="-1" aria-labelledby="ModalEditLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="ModalEditLabel">Update distributor</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form class="was-validated" method="post" action="/dist/{{$ks->dist_id}}/edit">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="nama_distributor" class="form-label">Nama distributor</label>
                                                        <input type="text" class="form-control" id="nama_distributor" name="nama_dist" value="{{$ks->nama_dist}}" required>
                                                        <div class="invalid-feedback">
                                                            Tolong Isi Nama distributor Dengan Benar
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
                                <a href="#" data-bs-toggle="modal" data-bs-target="#ModalHapus-{{$ks->dist_id}}">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <div class="modal fade" id="ModalHapus-{{$ks->dist_id}}" tabindex="-1" aria-labelledby="ModalHapusLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="ModalHapusLabel">Hapus Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                                <div class="modal-body">
                                                    <p>Apakah ingin menghapus {{ $ks->nama_dist }} ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a href="dist/{{$ks->dist_id}}/hapus" class="btn btn-primary">Simpan</a>
                                                </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{$ks->nama_dist}}</td>
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
