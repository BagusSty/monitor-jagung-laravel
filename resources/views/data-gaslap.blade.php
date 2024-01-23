@extends('includes.header')

@section('title', 'Data Petugas Lapangan')
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
                                    <h1 class="modal-title fs-5" id="ModalTambahLabel">Tambah Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form class="was-validated" method="post" action="{{ route('create.gaslap') }}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="nama_gaslap" class="form-label">Nama Petugas Lapangan</label>
                                            <input type="text" class="form-control" id="nama_gaslap" name="nama_gaslap" required>
                                            <div class="invalid-feedback">
                                                Tolong Isi Nama Gaslap Dengan Benar
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nip" class="form-label">NIP Petugas Lapangan</label>
                                            <input type="number" class="form-control" id="nip" name="nip" required>
                                            <div class="invalid-feedback">
                                                NIP Gaslap Dengan Benar
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" required>
                                            <div class="invalid-feedback">
                                                Username harus diisi
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" minlength="6" required>
                                            <div class="invalid-feedback">
                                                Password harus diisi dan minimal 6 karakter
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
                    <p class="m-2">Data Petugas Lapangan</p>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="col">Edit</th>
                            <th class="col">Hapus</th>
                            <th class="col">Nama Gaslap</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gaslap as $gs)
                        <tr>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#ModalEdit-{{$gs->gaslap_id}}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <div class="modal fade" id="ModalEdit-{{$gs->gaslap_id}}" tabindex="-1" aria-labelledby="ModalEditLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="ModalEditLabel">Update Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form class="was-validated" method="post" action="gaslap/{{$gs->user_id}}/{{$gs->gaslap_id}}/edit">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="nama_gaslap" class="form-label">Nama Petugas Lapangan</label>
                                                        <input type="text" class="form-control" id="nama_gaslap" name="nama_gaslap" value="{{$gs->nama_gaslap}}" required>
                                                        <div class="invalid-feedback">
                                                            Tolong Isi Nama Gaslap Dengan Benar
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nip" class="form-label">NIP Petugas Lapangan</label>
                                                        <input type="number" class="form-control" id="nip" name="nip" value="{{$gs->nip}}" required>
                                                        <div class="invalid-feedback">
                                                            NIP Gaslap Dengan Benar
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Username</label>
                                                        <input type="text" class="form-control" id="username" name="username" value="{{$gs->username}}" required>
                                                        <div class="invalid-feedback">
                                                            Username harus diisi
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="password" class="form-control" id="password" name="password" minlength="6" required>
                                                        <div class="invalid-feedback">
                                                            Password harus diisi dan minimal 6 karakter
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
                                <a href="#" data-bs-toggle="modal" data-bs-target="#ModalHapus-{{$gs->gaslap_id}}">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <div class="modal fade" id="ModalHapus-{{$gs->gaslap_id}}" tabindex="-1" aria-labelledby="ModalHapusLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="ModalHapusLabel">Hapus Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                                <div class="modal-body">
                                                    <p>Apakah ingin menghapus {{ $gs->nama_gaslap }} ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a href="gaslap/{{$gs->user_id}}/{{$gs->gaslap_id}}/hapus" class="btn btn-primary">Simpan</a>
                                                </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $gs->nama_gaslap }}</td>
                            <td>{{ $gs->nip }}</td>
                            <td>{{ $gs->username }}</td>
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
