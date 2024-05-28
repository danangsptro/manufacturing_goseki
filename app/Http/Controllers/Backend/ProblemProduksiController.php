<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\mesin_produksi;
use App\operator;
use App\problem_produksi;
use App\produk;
use App\proses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProblemProduksiController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;

        if (Auth::user()->user_role === 'Admin') {
            $data = problem_produksi::all();
        } else {
            $data = problem_produksi::where('user_id', $userId)->get();
        }
        return view('page.problemProduksi.index', compact('data'));
    }

    public function create()
    {
        $mesin = mesin_produksi::all();
        $produk = produk::all();
        $operator = operator::all();
        $proses = proses::all();

        return view('page.problemProduksi.create', compact('mesin', 'produk', 'operator', 'proses'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'tanggal_problem' => 'required',
            'mesin_produksi_id' => 'required|integer|min:1',
            'operator_id' => 'required|integer|min:1',
            'produk_id' => 'required|integer|min:1',
            'proses_id' => 'required|integer|min:1',
            'start_time' => 'required',
            'end_time' => 'required',
            'remark' => 'required'
        ]);

        $data = new problem_produksi();
        $userId = Auth::user()->id;

        $data->tanggal_problem = $validate['tanggal_problem'];
        $data->mesin_produksi_id = $validate['mesin_produksi_id'];
        $data->operator_id = $validate['operator_id'];
        $data->produk_id = $validate['produk_id'];
        $data->proses_id = $validate['proses_id'];
        $data->start_time = $validate['start_time'];
        $data->end_time = $validate['end_time'];
        $data->remark = $validate['remark'];
        $data->user_id = strval($userId);
        $data->save();

        if ($data) {
            toastr("Data Success Create Problem Produksi", 'success');
            return redirect()->route('problem-produksi');
        } else {
            toastr("Data Failed Create Problem Produksi", 'error');
            return redirect()->route('problem-produksi');
        }
    }

    public function edit($id)
    {
        $data = problem_produksi::find($id);
        $mesin = mesin_produksi::all();
        $operator = operator::all();
        $produk = produk::all();
        $proses = proses::all();
        return view('page.problemProduksi.edit', compact('data', 'mesin', 'operator', 'produk', 'proses'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'tanggal_problem' => 'required',
            'mesin_produksi_id' => 'required|integer|min:1',
            'operator_id' => 'required|integer|min:1',
            'produk_id' => 'required|integer|min:1',
            'proses_id' => 'required|integer|min:1',
            'start_time' => 'required',
            'end_time' => 'required',
            'remark' => 'required'
        ]);

        $data = problem_produksi::find($id);
        $userId = Auth::user()->id;


        if (!$id) {
            toastr("Data Not Found", 'error');
            return redirect()->route('hasil-produksi');
        } else {
            $data->tanggal_problem = $validate['tanggal_problem'];
            $data->mesin_produksi_id = $validate['mesin_produksi_id'];
            $data->operator_id = $validate['operator_id'];
            $data->produk_id = $validate['produk_id'];
            $data->proses_id = $validate['proses_id'];
            $data->start_time = $validate['start_time'];
            $data->end_time = $validate['end_time'];
            $data->remark = $validate['remark'];
            $data->user_id = strval($userId);
            $data->save();

            toastr("Data Success Edit Hasil Produksi", 'success');
            return redirect()->route('problem-produksi');
        }
    }

    public function delete($id)
    {
        $data = problem_produksi::find($id);
        $data->delete();

        if ($data) {
            toastr("Data Success Delete Data", 'success');
            return redirect()->route('problem-produksi');
        } else {
            toastr("Data Failed Delete Data", 'error');
            return redirect()->route('problem-produksi');
        }
    }
}
