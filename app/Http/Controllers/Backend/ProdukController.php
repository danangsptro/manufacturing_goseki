<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function index()
    {
        $data = produk::all();
        if (Auth::user()->user_role === 'Manager') {
            toastr("Access denied", 'error');
            return redirect()->route('dashboard');
        } else {
            return view('page.produk.index', compact('data'));
        }
    }

    public function create()
    {
        if (Auth::user()->user_role === 'Manager') {
            toastr("Access denied", 'error');
            return redirect()->route('dashboard');
        } else {
            return view('page.produk.create');
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_produk' => 'required|min:4'
        ]);

        $data = new produk();
        $data->nama_produk = $validate['nama_produk'];
        $data->save();

        if ($data) {
            toastr("Data $data->nama_produk Success Create Data", 'success');
            return redirect()->route('produk');
        } else {
            toastr("Data $data->nama_produk Failed Create Data", 'error');
            return redirect()->route('produk');
        }
    }

    public function edit($id)
    {
        $data = produk::find($id);
        if (Auth::user()->user_role === 'Manager') {
            toastr("Access denied", 'error');
            return redirect()->route('dashboard');
        } else {
            return view('page.produk.edit', compact('data'));
        }
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_produk' => 'required|min:4'
        ]);

        $data = produk::find($id);
        $data->nama_produk = $validate['nama_produk'];
        $data->save();

        if ($data) {
            toastr("Data $data->nama_produk Success Create Data", 'success');
            return redirect()->route('produk');
        } else {
            toastr("Data $data->nama_produk Failed Create Data", 'error');
            return redirect()->route('produk');
        }
    }

    public function delete($id)
    {
        $data = produk::find($id);
        $data->delete();

        if ($data) {
            toastr("Data $data->nama_mesin Success Delete Data", 'success');
            return redirect()->route('produk');
        } else {
            toastr("Data $data->nama_mesin Failed Delete Data", 'error');
            return redirect()->route('produk');
        }
    }
}
