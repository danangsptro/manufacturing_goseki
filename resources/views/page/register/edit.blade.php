@extends('masterBackend')
@section('title', 'Register')

@section('backend')
    <br>
    <div class="container-fluid mt-2">
        <div class="font-weight-bold text-black">
            <p class="fs-30 mb-0">Update Data User</p>
            <span></span>
        </div>
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
        <div class="mt-4">
            <div class="row">
                <div class="col-sm-5 mb-2 ">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img width="130" src="{{ asset('assets/img/undraw_posting_photo.svg') }}">
                                <div class="mt-3">
                                    <h4 class="text-black font-weight-bold"></h4>
                                    <p>SISTEM DATA ENTRY HASIL PRODUKSI</p>
                                    <p><span class="font-weight-bold">{{ $data->name }}</span></p>
                                </div>
                                <hr>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Ganti Password
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="card">
                        <h5 class="card-header fs-18 font-weight-bold text-white bg-dark">Edit User</h5>
                        <div class="card-body">
                            <form action="{{ route('edit-profile', $data->id) }}" class="fs-14 needs-validation" novalidate
                                method="post">
                                @csrf
                                <div>
                                    <label class="form-label font-weight-bold">Nama</label>
                                    <input type="text" name="name" value="{{ $data->name }}" class="form-control"
                                        autocomplete="off" required />
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-2">
                                    <label class="form-label font-weight-bold">Email</label>
                                    <input type="email" name="email" value="{{ $data->email }}" class="form-control"
                                        autocomplete="off" required />
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-2">
                                    <label class="form-label font-weight-bold">Username</label>
                                    <input type="text" name="username" value="{{ $data->username }}" class="form-control"
                                        autocomplete="off" required />
                                    @error('username')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-2">
                                    <label class="form-label font-weight-bold">Jenis Kelamin</label><br>
                                    <input type="radio" {{ $data->jenis_kelamin == 'laki-laki' ? 'checked' : '' }}
                                        name="jenis_kelamin" value="laki-laki">
                                    <label for="customRadioInline1">Laki-laki</label>

                                    <input type="radio" {{ $data->jenis_kelamin == 'perempuan' ? 'checked' : '' }}
                                        name="jenis_kelamin" value="perempuan">
                                    <label for="customRadioInline1">Perempuan</label>

                                </div>
                                <div class="mt-2">
                                    <label class="form-label font-weight-bold">No Telp</label>
                                    <input type="number" name="no_telepon" value="{{ $data->no_telepon }}"
                                        class="form-control" autocomplete="off" required />
                                    @error('no_telepon')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-2">
                                    <label class="form-label font-weight-bold">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" value="{{ $data->tempat_lahir }}"
                                        class="form-control" autocomplete="off" required />
                                    @error('tempat_lahir')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-2">
                                    <label class="form-label font-weight-bold">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" value={{ $data->tanggal_lahir }}
                                        class="form-control" autocomplete="off" required />
                                    @error('tanggal_lahir')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-2">
                                    <label class="form-label font-weight-bold">User Role</label><br>
                                    <input type="radio" {{ $data->user_role == 'Admin' ? 'checked' : '' }}
                                        name="user_role" value="Admin">
                                    <label for="customRadioInline1">Admin</label>

                                    <input type="radio" {{ $data->user_role == 'Manager' ? 'checked' : '' }}
                                        name="user_role" value="Manager">
                                    <label for="customRadioInline1">Manager</label>
                                    
                                    <input type="radio" {{ $data->user_role == 'Leader' ? 'checked' : '' }}
                                        name="user_role" value="Leader">
                                    <label for="customRadioInline1">Leader</label>

                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-dark btn-sm"><i
                                            class="fa fa-redo mr-2"></i>Perbarui Akun</button>
                                    <a href="{{ route('register') }}" type="submit"
                                        class="btn btn-outline-danger btn-sm"><i class="fa fa-redo mr-2"></i>Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white fs-18">Ganti Password</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update-password', $data->id) }}" class="fs-14 needs-validation" novalidate
                        method="post">
                        @csrf
                        <div>
                            <label for="password" class="form-label font-weight-bold">Password</label>
                            <input type="password" name="password" id="password" class="form-control" autocomplete="off"
                                required />
                        </div>
                        <div class="mt-2">
                            <label for="confirm_password" class="form-label font-weight-bold">Konfirmasi Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                                autocomplete="off" required />
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-dark btn-sm"><i class="fa fa-redo mr-2"></i>Perbarui
                                Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
