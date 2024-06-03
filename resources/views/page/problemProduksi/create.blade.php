@extends('masterBackend')
@section('title', 'Create Problem Produksi')

@section('backend')
    <div class="container-fluid">
        <div class="container card-content">
            <br>
            <br>
            <h4 class="text-center mb-4">Create Problem Produksi</h4>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create Problem Produksi</h6>
                </div>
                <div class="container-fluid mt-4 mb-4">
                    <form method="POST" action="{{ route('store-problem-produksi') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Tanggal Problem</label>
                                    <input type="date" class="form-control" name="tanggal_problem" required>
                                    @error('tanggal_problem')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Mesin Produksi</label>
                                    <select class=" form-control  r-0 light" id="mesin_produksi_id"
                                        name="mesin_produksi_id">
                                        <option readonly>Pilih Mesin Produksi</option>
                                        @foreach ($mesin as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->nama_mesin }}</option>
                                        @endforeach
                                    </select>
                                    @error('mesin_produksi_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama Operator</label>
                                    <select class=" form-control r-0 light" id="operator_id" name="operator_id">
                                        <option readonly>Pilih Nama Operator</option>
                                        @foreach ($operator as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->nama_operator }}</option>
                                        @endforeach
                                    </select>
                                    @error('operator_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <select class=" form-control r-0 light" id="produk_id" name="produk_id">
                                        <option readonly>Pilih Nama Produk</option>
                                        @foreach ($produk as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->nama_produk }}</option>
                                        @endforeach
                                    </select>
                                    @error('produk_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Proses</label>
                                    <select class=" form-control r-0 light" id="proses_id" name="proses_id">
                                        <option readonly>Pilih Proses</option>
                                        @foreach ($proses as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->nama_proses }}</option>
                                        @endforeach
                                    </select>
                                    @error('proses_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>JAM MULAI</label>
                                    <input type="time" class="form-control" name="start_time" required>
                                    @error('start_time')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label style="color: white">Nama Mesin</label>
                                    <input type="time" class="form-control" name="end_time" required>
                                    @error('end_time')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Img Problem</label>
                                    <input type="file" class="form-control" name="img_problem" required>
                                    <i class="text-danger" style="font-size: 13px">* jpeg,png,jpg, max = 2mb</i>
                                    @error('img_problem')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Remark</label><br>
                                    <textarea class="form-control" aria-label="With textarea" name="remark"></textarea>
                                    @error('remark')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <input type="text" name="user_id" style="background:white; border:1px solid white"
                                    disabled>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary btn-block"
                                        onclick="return confirm('Data yang di masukan sudah benar ?')">Submit</button>
                                </div>
                                <div class="col-lg-6">
                                    <a href="{{ route('problem-produksi') }}" type="submit"
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
