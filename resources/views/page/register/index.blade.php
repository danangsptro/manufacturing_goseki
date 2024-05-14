@extends('masterBackend')
@section('title', 'Register')


@section('backend')
    <div class="container-fluid">
        <br>
        <h3 class="h4 mb-2 text-gray-800 text-center mb-4 mt-4">Register User</h3>
        <!-- page-header -->
        <div class="page-header">
            <div class="ml-auto">
                <div class="input-group mb-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                        <span>
                            <i class="fa fas-plus"><strong>Tambah Data</strong></i>
                        </span>
                    </button>
                    @if (session('message'))
                        <div class="col-sm-12 mt-4">
                            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                <span class="badge badge-pill badge-success">Sukses</span> {{ session('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-light">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('store-user') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Nama:</label>
                                                    <input type="text" class="form-control" id="recipient-name"
                                                        placeholder="jhone" required name="name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Email:</label>
                                                    <input type="text" class="form-control" id="recipient-name"
                                                        placeholder="jhone@example.com" required name="email">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Username:</label>
                                                    <input type="text" class="form-control" id="recipient-name" required
                                                        name="username">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Jenis Kelamin</label>
                                                <select class="custom-select" id="inputGroupSelect01" name="jenis_kelamin">
                                                    <option selected>Pilih Option</option>
                                                    <option value="laki-laki">Laki-laki</option>
                                                    <option value="perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>User Role</label>
                                                <select class="custom-select" id="inputGroupSelect01" name="user_role">
                                                    <option selected>Pilih Option</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Pegawai">Pegawai</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">No Telp:</label>
                                                    <input type="text" class="form-control" id="recipient-name"
                                                        placeholder="0812xxxxxxx" required name="no_telepon">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Tempat Lahir:</label>
                                                    <input type="text" class="form-control" id="recipient-name"
                                                        name="tempat_lahir" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Tanggal
                                                        Lahir:</label>
                                                    <input type="date" class="form-control" id="recipient-name"
                                                        name="tanggal_lahir" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Password:</label>
                                                    <input type="text" class="form-control" id="recipient-name"
                                                        name="password" required>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End page-header -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr style="font-size: 17px">
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Jenis Kelamin</th>
                                <th>User Role</th>
                                <th>No Telepon</th>
                                <th>Tanggal Lahir</th>
                                <th>Tempat Lahir</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr style="font-size: 15px">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>{{ $d->username }}</td>
                                    <td>{{ $d->jenis_kelamin }}</td>
                                    <td>{{ $d->user_role }}</td>
                                    <td>{{ $d->no_telepon }}</td>
                                    <td>{{ $d->tanggal_lahir }}</td>
                                    <td>{{ $d->tempat_lahir }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('edit-account-user', $d->id) }}" class="btn btn-warning btn-sm"
                                            style="border-radius: 5rem"><i class="menu-icon fa fa-edit"></i></a>
                                        <form action="{{ route('delete-user', $d->id) }}" class="d-inline"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('ANDA YAKIN INGIN MENGHAPUS ?')"
                                                style="border-radius: 5rem"><i class="menu-icon fa fa-trash"></i>
                                                </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
