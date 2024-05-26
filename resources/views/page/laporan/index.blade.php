@extends('masterBackend')
@section('title', 'Index Laporan')

@section('backend')
    <div class="container-fluid">
        <h3 class="mb-2 text-gray-800 text-center mb-4 mt-4">Laporan Data</h3>
            <div class="row py-4 m-4">
                <div class="col-lg-6">
                    <div class="card text-center">
                        <div class="text-center mt-4">
                            <img src="{{ asset('assets/img/laporan.png') }}" width="100px" alt=""
                                style="border-radius: 5px">

                        </div>
                        <h5 class="mt-3"> Form Hasil Produksi</h5>
                        <button class="btn btn-dark mt-4">Lihat</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card text-center">
                        <div class="text-center mt-4">
                            <img src="{{ asset('assets/img/laporan.png') }}" width="100px" alt=""
                                style="border-radius: 5px">

                        </div>
                        <h5 class="mt-3"> Problem Produksi</h5>
                        <button class="btn btn-dark mt-4">Lihat</button>
                    </div>
                </div>
            </div>
    </div>
@endsection
