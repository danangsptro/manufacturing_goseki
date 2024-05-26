@extends('masterBackend')
@section('title', 'Create Jadwal Produksi')

@section('backend')
    <div class="container-fluid">
        <div class="container card-content">
            <br>
            <br>
            <h4 class="text-center mb-4">Create Jadwal Produksi</h4>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create Jadwal Produksi</h6>
                </div>
                <div class="container-fluid mt-4 mb-4">
                    <form method="POST" action="{{ route('store-jadwal-produksi') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Jadwal Produksi</label>
                                    <input type="file" class="form-control" name="jadwal_produksi" required>
                                    <i class="text-danger" style="font-size: 13px">* jpeg,png,jpg, max = 2mb</i>
                                    @error('jadwal_produksi')
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
                                    <a href="{{ route('jadwal-produksi') }}" type="submit"
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
