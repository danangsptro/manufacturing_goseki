<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\jadwalProduksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JadwalProduksiController extends Controller
{
    public function index()
    {
        $data = jadwalProduksi::all();
        return view('page.jadwalProduksi.index', compact('data'));
    }

    public function create()
    {
        if (Auth::user()->user_role === 'Leader') {
            toastr("Access denied", 'error');
            return redirect()->route('jadwal-produksi');
            return view('page.jadwalProduksi.create');
        } else {
            return view('page.jadwalProduksi.create');
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'jadwal_produksi' => 'required|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = new jadwalProduksi();
        $data->jadwal_produksi = $validate['jadwal_produksi'];

        if (!$data->jadwal_produksi) {
            $data->jadwal_produksi = $data->jadwal_produksi;
        } else {
            $validate['jadwal_produksi'] = $request->file('jadwal_produksi')->store('asset/jadwalProduksi', 'public');
            $data->jadwal_produksi = $validate['jadwal_produksi'];
        }

        $data->save();

        if ($data) {
            toastr("Data Success di upload Data", 'success');
            return redirect()->route('jadwal-produksi');
        } else {
            toastr("Data Failed di upload", 'error');
            return redirect()->route('jadwal-produksi');
        }
    }

    public function edit($id)
    {
        $data = jadwalProduksi::find($id);


        if (Auth::user()->user_role === 'Leader') {
            toastr("Access denied", 'error');
            return redirect()->route('jadwal-produksi');
            return view('page.jadwalProduksi.edit', compact('data'));
        } else {
            return view('page.jadwalProduksi.edit', compact('data'));
        }
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'jadwal_produksi' => 'required|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = jadwalProduksi::find($id);

        if ($validate['jadwal_produksi']) {
            if ($data->jadwal_produksi) {
                Storage::delete('public/' . $data->jadwal_produksi);
                $data->jadwal_produksi = $request->file('jadwal_produksi')->store('asset/jadwalProduksi', 'public');
                $data->save();
            }
        }

        if ($data) {
            toastr("Data Success di edit Data", 'success');
            return redirect()->route('jadwal-produksi');
        } else {
            toastr("Data Failed di edit", 'error');
            return redirect()->route('jadwal-produksi');
        }
    }

    public function destroy($id)
    {
        if (!$id) {
            toastr("Data not found", 'error');
            return redirect()->route('jadwal-produksi');
        }
        $data = jadwalProduksi::find($id);
        Storage::delete('public/' . $data->jadwal_produksi);
        $data->delete();
        if ($data) {
            toastr("Data Success di Delete", 'success');
            return redirect()->route('jadwal-produksi');
        }
    }
}
