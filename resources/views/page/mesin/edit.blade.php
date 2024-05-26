@extends('masterBackend')
@section('title', 'Edit Index Mesin')

@section('backend')
    <div class="container-fluid">
        <div class="container card-content">
            <br>
            <br>
            <h4 class="text-center mb-4">Edit Mesin Produksi</h4>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Mesin Produksi</h6>
                </div>
                <div class="container-fluid mt-4 mb-4">
                    <form method="POST" action="{{route('update-mesin', $data->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Nama Mesin</label>
                                    <input type="text" class="form-control" placeholder="Example: 150 T. Amada"
                                        name="nama_mesin" value="{{ $data->nama_mesin }}" required>
                                    @error('nama_mesin')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary btn-block"
                                        onclick="return confirm('Data yang di masukan sudah benar ?')">Submit</button>
                                </div>
                                <div class="col-lg-6">
                                    <a href="{{ route('mesin') }}" type="submit"
                                        class="btn btn-dark btn-block">Back</a>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
