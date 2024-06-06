<?php

namespace App\Http\Controllers\Backend;

use App\hasil_produksi;
use App\Http\Controllers\Controller;
use App\problem_produksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $sales = hasil_produksi::select(
            DB::raw('YEAR(tanggal_produksi) as year'),
            DB::raw('MONTH(tanggal_produksi) as month'),
            DB::raw('SUM(qty_target) as total')
        )
            ->groupBy('year', 'month')
            ->get();

        $labels = [];
        $data = [];

        foreach ($sales as $sale) {
            $date = Carbon::create($sale->year, $sale->month, 1);
            $labels[] =  $date->translatedFormat('F') . ' ' . $sale->year;
            $data[] = $sale->total;
        }

        $hasilProduksi = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Target Hasil Produksi',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'data' => $data,
                ]
            ]
        ];

        $pp = problem_produksi::select(
            DB::raw('YEAR(tanggal_problem) as year'),
            DB::raw('MONTH(tanggal_problem) as month'),
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('year', 'month')
            ->get();

        $labelss = [];
        $dataa = [];

        foreach ($pp as $sale) {
            $date = Carbon::create($sale->year, $sale->month, 1);
            $labelss[] =  $date->translatedFormat('F') . ' ' . $sale->year;
            $dataa[] = $sale->total;
        }

        $problemProduksi = [
            'labels' => $labelss,
            'datasets' => [
                [
                    'label' => 'Problem Produksi',
                    'backgroundColor' => 'salmon',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'data' => $dataa,
                ]
            ]
        ];
        return view('page.home.index', compact('hasilProduksi', 'problemProduksi'));
    }
}
