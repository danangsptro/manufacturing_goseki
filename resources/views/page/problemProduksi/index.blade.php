@extends('masterBackend')
@section('title', 'Problem Produksi')

@section('backend')
    <div class="container-fluid">
        <h4 class="h4 mb-2 text-gray-800 text-center mb-4 mt-4">List Problem Produksi</h3>
            <br>
            <a href="{{ route('create-problem-produksi') }}" class="btn btn-primary btn-small mb-2 btn-md">Tambah Data</a>
            <div class="card shadow mb-4">
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Img Problem</th>
                                    <th>Tanggal Problem</th>
                                    <th>Mesin Produksi</th>
                                    <th>Nama Operator</th>
                                    <th>Nama Produk</th>
                                    <th>Proses</th>
                                    <th>Waktu</th>
                                    <th>Remarks</th>
                                    <th>Author</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ Storage::url($d->img_problem) }}" target="_blank">
                                                <img width="70" height="70" border="0" align="center"
                                                    src="{{ Storage::url($d->img_problem) }}"
                                                    style="border-radius: 1rem; border:4px solid gray;" />
                                            </a>
                                        </td>
                                        <td>{{ $d->tanggal_problem }}</td>
                                        <td>{{ $d->mesin->nama_mesin }}</td>
                                        <td>{{ $d->operator->nama_operator }}</td>
                                        <td>{{ $d->produk->nama_produk }}</td>
                                        <td>{{ $d->proses->nama_proses }}</td>
                                        <td>{{ $d->start_time }} - {{ $d->end_time }}</td>
                                        <td>{{ $d->remark }}</td>
                                        <td>
                                            @if ($d->user->user_role === 'Admin')
                                                <span class="badge badge-pill badge-light">{{ $d->user->user_role }}</span>
                                            @elseif($d->user->user_role === 'Manager')
                                                <span
                                                    class="badge badge-pill badge-secondary">{{ $d->user->user_role }}</span>
                                            @elseif($d->user->user_role === 'Leader')
                                                <span class="badge badge-pill badge-info">{{ $d->user->user_role }}</span>
                                            @endif
                                            - {{ $d->user->name }}
                                        </td>

                                        <td class="text-center">
                                            <a href="{{ route('edit-problem-produksi', $d->id) }}"
                                                class="btn btn-warning btn-sm" style="border-radius: 5rem"><i
                                                    class="menu-icon fa fa-edit"></i> </a>
                                            <form action="{{ route('delete-problem-produksi', $d->id) }}" class="d-inline"
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
