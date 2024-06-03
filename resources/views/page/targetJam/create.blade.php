@extends('masterBackend')
@section('title', 'Index Target')

@section('backend')
    <div class="container-fluid">
        <div class="container card-content">
            <br>
            <br>
            <h4 class="text-center mb-4">Create Target Jam</h4>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create Target Jam</h6>
                </div>
                <div class="container-fluid mt-4 mb-4">
                    <form method="POST" action="{{route('store-target-jam')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Target Jam</label>
                                    <input type="number" class="form-control" placeholder="Example: 10"
                                        name="target" required>
                                    @error('target')
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
                                    <a href="{{ route('target-jam') }}" type="submit"
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