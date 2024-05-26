<?php

namespace App\Http\Controllers\Backend;

use App\hasil_produksi;
use App\Http\Controllers\Controller;
use App\problem_produksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $hasilProduksi = hasil_produksi::all();
        $problemProduksi = problem_produksi::all();
        return view('page.home.index', compact('hasilProduksi', 'problemProduksi'));
    }
}
