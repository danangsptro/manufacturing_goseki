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
        // $hasilProduksi = hasil_produksi::all();
        // $problemProduksi = problem_produksi::all();

        $hasilProduksi = [
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'Hasil Produksi',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'data' => [65, 59, 80, 81, 56, 55, 40],
                ]
            ]
        ];

        $problemProduksi = [
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'Problem Produksi',
                    'backgroundColor' => 'salmon',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'data' => [65, 59, 80, 81, 56, 55, 40],
                ]
            ]
        ];
        return view('page.home.index', compact('hasilProduksi', 'problemProduksi'));
    }
}
