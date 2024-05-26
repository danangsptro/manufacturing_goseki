@extends('masterBackend')
@section('title', 'Edit hasil produksi')

@section('backend')
    <div class="container-fluid">
        <div class="container card-content">
            <br>
            <br>
            <h4 class="text-center mb-4">Edit Hasil Produksi</h4>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Hasil Produksi</h6>
                </div>
                <div class="container-fluid mt-4 mb-4">
                    <form method="POST" action="{{ route('update-hasil-produksi', $data->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Tanggal Produksi</label>
                                    <input type="date" class="form-control" value="{{ $data->tanggal_produksi }}"
                                        name="tanggal_produksi" required>
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
                                        @foreach ($mesin as $value)
                                            <option value="{{ $value->id }}"
                                                {{ old('mesin_produksi_id') ?? $data->mesin_produksi_id == $value->id ? 'selected' : '' }}>
                                                {{ $value->nama_mesin }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama Operator</label>
                                    <select class=" form-control r-0 light" id="operator_id" name="operator_id">
                                        <option readonly>Pilih Nama Operator</option>
                                        @foreach ($operator as $value)
                                            <option value="{{ $value->id }}"
                                                {{ old('operator_id') ?? $data->operator_id == $value->id ? 'selected' : '' }}>
                                                {{ $value->nama_operator }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <select class=" form-control r-0 light" id="produk_id" name="produk_id">
                                        <option readonly>Pilih Nama Produk</option>
                                        @foreach ($produk as $value)
                                            <option value="{{ $value->id }}"
                                                {{ old('produk_id') ?? $data->produk_id == $value->id ? 'selected' : '' }}>
                                                {{ $value->nama_produk }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Proses</label>
                                    <select class=" form-control r-0 light" id="proses_id" name="proses_id">
                                        <option readonly>Pilih Proses</option>
                                        @foreach ($proses as $value)
                                            <option value="{{ $value->id }}"
                                                {{ old('proses_id') ?? $data->proses_id == $value->id ? 'selected' : '' }}>
                                                {{ $value->nama_proses }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Part</label><br>

                                    <input type="radio" name="part" value="ok"
                                        {{ $data->part == 'ok' ? 'checked' : '' }}>
                                    <label for="customRadioInline1"> OK (PCS)</label>
                                    <span> | </span>
                                    <input type="radio" name="part" value="ng"
                                        {{ $data->part == 'ng' ? 'checked' : '' }}>
                                    <label for="customRadioInline1"> NG (PCS)</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>JAM MULAI</label>
                                    <input type="time" class="form-control" name="start_time"
                                        value="{{ $data->start_time }}" required>
                                    @error('start_time')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label style="color: white">Nama Mesin</label>
                                    <input type="time" class="form-control" name="end_time"
                                        value="{{ $data->end_time }}" required>
                                    @error('end_time')
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
