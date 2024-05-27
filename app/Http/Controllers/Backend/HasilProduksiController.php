<?php

namespace App\Http\Controllers\Backend;

use App\hasil_produksi;
use App\Http\Controllers\Controller;
use App\mesin_produksi;
use App\operator;
use App\produk;
use App\proses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilProduksiController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;

        if (Auth::user()->user_role === 'Admin') {
            $data = hasil_produksi::all();
        } else {
            $data = hasil_produksi::where('user_id', $userId)->get();
        }
        // $mesin = mesin_produksi::all();
        // $operator = operator::all();
        // $produk = produk::all();
        // $proses = proses::all();

        return view('page.hasilProduksi.index', compact('data'));
    }

    public function create()
    {
        $userId = Auth::user()->id;

        if ($userId === 1) $operator = operator::all();
        else $operator = operator::where('user_id', $userId)->get();

        $mesin = mesin_produksi::all();
        $produk = produk::all();
        $proses = proses::all();

        return view('page.hasilProduksi.create', compact('mesin', 'produk', 'operator', 'proses'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'tanggal_produksi' => 'required',
            'mesin_produksi_id' => 'required',
            'operator_id' => 'required',
            'produk_id' => 'required',
            'proses_id' => 'required',
            'part' => 'required',
            'qty_part' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);

        $data = new hasil_produksi();
        $userId = Auth::user()->id;

        $data->tanggal_produksi = $validate['tanggal_produksi'];
        $data->mesin_produksi_id = $validate['mesin_produksi_id'];
        $data->operator_id = $validate['operator_id'];
        $data->produk_id = $validate['produk_id'];
        $data->proses_id = $validate['proses_id'];
        $data->part = $validate['part'];
        $data->qty_part = $validate['qty_part'];
        $data->start_time = $validate['start_time'];
        $data->end_time = $validate['end_time'];
        $data->user_id = strval($userId);
        $data->save();

        if ($data) {
            toastr("Data Success Create Hasil Produksi", 'success');
            return redirect()->route('hasil-produksi');
        } else {
            toastr("Dat Failed Create Hasil Produksi", 'error');
            return redirect()->route('hasil-produksi');
        }
    }

    public function edit($id)
    {
        $data = hasil_produksi::find($id);
        $mesin = mesin_produksi::all();
        $operator = operator::all();
        $produk = produk::all();
        $proses = proses::all();
        return view('page.hasilProduksi.edit', compact('data', 'mesin', 'operator', 'produk', 'proses'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'tanggal_produksi' => 'required',
            'mesin_produksi_id' => 'required',
            'operator_id' => 'required',
            'produk_id' => 'required',
            'proses_id' => 'required',
            'part' => 'required',
            'qty_part' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);

        $data = hasil_produksi::find($id);
        $userId = Auth::user()->id;

        if (!$id) {
            toastr("Data Not Found", 'error');
            return redirect()->route('hasil-produksi');
        } else {
            $data->tanggal_produksi = $validate['tanggal_produksi'];
            $data->mesin_produksi_id = $validate['mesin_produksi_id'];
            $data->operator_id = $validate['operator_id'];
            $data->produk_id = $validate['produk_id'];
            $data->proses_id = $validate['proses_id'];
            $data->part = $validate['part'];
            $data->qty_part = $validate['qty_part'];
            $data->start_time = $validate['start_time'];
            $data->end_time = $validate['end_time'];
            $data->user_id = strval($userId);
            $data->save();

            toastr("Data Success Edit Hasil Produksi", 'success');
            return redirect()->route('hasil-produksi');
        }
    }

    public function delete($id)
    {
        $data = hasil_produksi::find($id);
        $data->delete();

        if ($data) {
            toastr("Data Success Delete Data", 'success');
            return redirect()->route('hasil-produksi');
        } else {
            toastr("Data Failed Delete Data", 'error');
            return redirect()->route('hasil-produksi');
        }
    }
}
