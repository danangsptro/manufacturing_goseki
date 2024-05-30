@extends('masterBackend')
@section('title', 'Create Hasil Produksi')

@section('backend')
    <div class="container-fluid">
        <div class="container card-content">
            <br>
            <br>
            <h4 class="text-center mb-4">Create Hasil Produksi</h4>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create Hasil Produksi</h6>
                </div>
                <div class="container-fluid mt-4 mb-4">
                    <form method="POST" action="{{ route('store-hasil-produksi') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Tanggal Produksi</label>
                                    <input type="date" class="form-control" name="tanggal_produksi" required>
                                    @error('tanggal_produksi')
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
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Part</label><br>

                                    <input type="radio" name="part" value="ok">
                                    <label for="customRadioInline1"> OK (PCS)</label>
                                    <span> | </span>
                                    <input type="radio" name="part" value="ng">
                                    <label for="customRadioInline1"> NG (PCS)</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Part Qty</label><br>
                                    <input type="number" placeholder="Example: 1" class="form-control" name="qty_part">
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

                            <div class="col-lg-6" >
                                <input type="text" name="user_id" style="background:white; border:1px solid white" disabled>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary btn-block"
                                        onclick="return confirm('Data yang di masukan sudah benar ?')">Submit</button>
                                </div>
                                <div class="col-lg-6">
                                    <a href="{{ route('hasil-produksi') }}" type="submit"
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
