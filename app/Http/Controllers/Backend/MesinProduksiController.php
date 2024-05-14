<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\mesin_produksi;
use Illuminate\Http\Request;

class MesinProduksiController extends Controller
{
    public function index()
    {
        $data = mesin_produksi::all();
        return view('page.mesin.index', compact('data'));
    }

    public function create()
    {
        return view('page.mesin.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_mesin' => 'required|min:5'
        ]);

        $data =  new mesin_produksi();
        $data->nama_mesin = $validate['nama_mesin'];
        $data->save();

        if ($data) {
            toastr("Data $data->nama_mesin Success Create Data", 'success');
            return redirect()->route('mesin');
        } else {
            toastr("Data $data->nama_mesin Failed Create Data", 'error');
            return redirect()->route('mesin');
        }
    }

    public function edit($id)
    {
        $data = mesin_produksi::find($id);
        return view('page.mesin.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_mesin' => 'required|min:5'
        ]);

        $data = mesin_produksi::find($id);
        $data->nama_mesin = $validate['nama_mesin'];
        $data->save();

        if ($data) {
            toastr("Data $data->nama_mesin Success Update Data", 'success');
            return redirect()->route('mesin');
        } else {
            toastr("Data $data->nama_mesin Failed Update Data", 'error');
            return redirect()->route('mesin');
        }
    }

    public function delete($id)
    {
        $data = mesin_produksi::find($id);
        $data->delete();

        if ($data) {
            toastr("Data $data->nama_mesin Success Delete Data", 'success');
            return redirect()->route('mesin');
        } else {
            toastr("Data $data->nama_mesin Failed Delete Data", 'error');
            return redirect()->route('mesin');
        }
    }
}
