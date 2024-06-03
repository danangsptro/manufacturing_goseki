<?php

namespace App\Http\Controllers\Backend;

use App\hasil_produksi;
use App\Http\Controllers\Controller;
use App\mesin_produksi;
use App\operator;
use App\produk;
use App\proses;
use App\target_qty;
use Carbon\Carbon;
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
        $target = target_qty::all();

        // $time = "14:45"; // 2:45 PM
        // $totalMinutes = convertClockToMinutes($time);
        // dd( $totalMinutes); // Outputs: 885

        return view('page.hasilProduksi.create', compact('mesin', 'produk', 'operator', 'proses', 'target'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'tanggal_produksi' => 'required',
            'mesin_produksi_id' => 'required|integer|min:1',
            'operator_id' => 'required|integer|min:1',
            'target_qty_id' => 'required|integer|min:1',
            'produk_id' => 'required|integer|min:1',
            'proses_id' => 'required|integer|min:1',
            'qty_target' => 'required|min:1',
            'qty_part_ok' => 'required|min:1',
            'qty_part_ng' => 'required|min:1',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i'
        ]);

        $data = new hasil_produksi();
        $userId = Auth::user()->id;

        $data->tanggal_produksi = $validate['tanggal_produksi'];
        $data->mesin_produksi_id = $validate['mesin_produksi_id'];
        $data->operator_id = $validate['operator_id'];
        $data->produk_id = $validate['produk_id'];
        $data->proses_id = $validate['proses_id'];
        $data->target_qty_id = $validate['target_qty_id'];
        $data->qty_target = $validate['qty_target'];
        $data->qty_part_ok = $validate['qty_part_ok'];
        $data->qty_part_ng = $validate['qty_part_ng'];
        $data->start_time = $validate['start_time'];
        $data->end_time = $validate['end_time'];
        $data->user_id = strval($userId);

        /* Forumula */
        $startTime = Carbon::parse($data->start_time);
        $endTime = Carbon::parse($data->end_time);

        $durationInMinutes = $endTime->diffInMinutes($startTime);
        $target = target_qty::find($data->target_qty_id);
        $durationCalculate = $durationInMinutes / 60;
        $calculateTargetOrOclock = $target->target * $durationCalculate;
        $calcule = $data->qty_target / $calculateTargetOrOclock;
        $result = $calcule * 100;

        $data->percent = round($result);
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
        $target = target_qty::all();
        return view('page.hasilProduksi.edit', compact('data', 'mesin', 'operator', 'produk', 'proses', 'target'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'tanggal_produksi' => 'required',
            'mesin_produksi_id' => 'required|integer|min:1',
            'operator_id' => 'required|integer|min:1',
            'target_qty_id' => 'required|integer|min:1',
            'produk_id' => 'required|integer|min:1',
            'proses_id' => 'required|integer|min:1',
            'qty_target' => 'required|min:1',
            'qty_part_ok' => 'required|min:1',
            'qty_part_ng' => 'required|min:1',
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
            $data->target_qty_id = $validate['target_qty_id'];
            $data->qty_target = $validate['qty_target'];
            $data->qty_part_ok = $validate['qty_part_ok'];
            $data->qty_part_ng = $validate['qty_part_ng'];
            $data->start_time = $validate['start_time'];
            $data->end_time = $validate['end_time'];
            $data->user_id = strval($userId);

            /* Forumula */
            $startTime = Carbon::parse($data->start_time);
            $endTime = Carbon::parse($data->end_time);

            $durationInMinutes = $endTime->diffInMinutes($startTime);
            $target = target_qty::find($data->target_qty_id);
            $durationCalculate = $durationInMinutes / 60;
            $calculateTargetOrOclock = $target->target * $durationCalculate;
            $calcule = $data->qty_target / $calculateTargetOrOclock;
            $result = $calcule * 100;

            $data->percent = round($result);
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
