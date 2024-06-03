@extends('masterBackend')
@section('title', 'Index Target')

@section('backend')
    <div class="container-fluid">
        <h4 class="h4 mb-2 text-gray-800 text-center mb-4 mt-4">List Target</h3>
            <br>
            <a href="{{ route('create-target-jam') }}" class="btn btn-primary btn-small mb-2 btn-md">Tambah Data</a>
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
                                    <th>Target Jam</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->target }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('edit-target-jam', $d->id) }}" class="btn btn-warning btn-sm"
                                                style="border-radius: 5rem"><i class="menu-icon fa fa-edit"></i> </a>
                                            <form action="{{ route('delete-target-jam', $d->id) }}" class="d-inline"
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
