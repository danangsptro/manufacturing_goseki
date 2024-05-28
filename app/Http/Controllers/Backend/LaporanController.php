<?php

namespace App\Http\Controllers\Backend;

use App\hasil_produksi;
use App\Http\Controllers\Controller;
use App\problem_produksi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index()
    {
        return view('page.laporan.index');
    }

    public function hp()
    {
        $userId = Auth::user()->id;

        if (Auth::user()->user_role === 'Admin' || Auth::user()->user_role === 'Manager') {
            $data = hasil_produksi::all();
        } else {
            $data = hasil_produksi::where('user_id', $userId)->get();
        }

        return view('page.laporan.hp', compact('data'));
    }

    public function pp()
    {
        $userId = Auth::user()->id;

        if (Auth::user()->user_role === 'Admin' || Auth::user()->user_role === 'Manager') {
            $data = problem_produksi::all();
        } else {
            $data = problem_produksi::where('user_id', $userId)->get();
        }

        return view('page.laporan.pp', compact('data'));
    }

    public function search(Request $request, $type)
    {
        $userId = Auth::user()->id;

        if (Auth::user()->user_role === 'Admin' || Auth::user()->user_role === 'Manager') {
            if ($type === 'hp') $data = hasil_produksi::all();
            else $data = problem_produksi::all();
        } else {
            if ($type === 'hp') $data = hasil_produksi::where('user_id', $userId)->get();
            else $data = problem_produksi::where('user_id', $userId)->get();
        }

        $start = date("Y-m-d", strtotime($request->start));
        $end = date("Y-m-d", strtotime($request->end));
        if ($request->start && $request->end) {
            if($type === 'hp') $data = $data->whereBetween('tanggal_produksi', [$start, $end]);
            else $data = $data->whereBetween('tanggal_problem', [$start, $end]);
        }

        if($type === 'hp') return view('page.laporan.hp', compact('start', 'end', 'data'));
        else return view('page.laporan.pp', compact('start', 'end', 'data'));
    }


    public function printHasilProduksi(Request $request, $type)
    {
        $userId = Auth::user()->id;

        if (Auth::user()->user_role === 'Admin' || Auth::user()->user_role === 'Manager') {
            if ($type === 'hp') $data = hasil_produksi::all();
            else $data = problem_produksi::all();
        } else {
            if ($type === 'hp') $data = hasil_produksi::where('user_id', $userId)->get();
            else $data = problem_produksi::where('user_id', $userId)->get();
        }
        if ($type === 'hp') $text = 'Laporan Hasil Produksi';
        else $text = 'Laporan Problem Produksi';

        $user = Auth::user()->id;
        $idUser = User::where('id', $user)->first();

        $start = date("Y-m-d 00:00:00", strtotime($request->start));
        $end = date("Y-m-d 23:59:59", strtotime($request->end));

        if ($request->start && $request->end) {
            $data = $data->whereBetween('tanggal_produksi', [$start, $end]);
        }

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true)->setPaper('a4', 'landscape');
        $pdf->loadView('page.laporan.cetakPdf', compact(
            'data',
            'text',
            'idUser',
            'type'
        ));

        return $pdf->stream("Laporan-arsip-baru.pdf");
    }


    // public function searchpp(Request $request)
    // {

    //     $userId = Auth::user()->id;

    //     if (Auth::user()->user_role === 'Admin' || Auth::user()->user_role === 'Manager') {
    //         $data = problem_produksi::all();
    //     } else {
    //         $data = problem_produksi::where('user_id', $userId)->get();
    //     }

    //     $start = date("Y-m-d", strtotime($request->start));
    //     $end = date("Y-m-d", strtotime($request->end));
    //     if ($request->start && $request->end) {
    //         $data = $data->whereBetween('tanggal_problem', [$start, $end]);
    //     }

    //     return view('page.laporan.hp', compact('start', 'end', 'data'));
    // }
}
