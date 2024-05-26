<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\produk;
use App\proses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProsesController extends Controller
{
    public function index()
    {
        $data = proses::all();
        if (Auth::user()->user_role === 'Manager') {
            toastr("Access denied", 'error');
            return redirect()->route('dashboard');
        } else {
            return view('page.proses.index', compact('data'));
        }
    }

    public function create()
    {
        if (Auth::user()->user_role === 'Manager') {
            toastr("Access denied", 'error');
            return redirect()->route('dashboard');
        } else {
            return view('page.proses.create');
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_proses' => 'required|min:4'
        ]);

        $data = new proses();
        $data->nama_proses = $validate['nama_proses'];
        $data->save();

        if ($data) {
            toastr("Data $data->nama_proses Success Create Data", 'success');
            return redirect()->route('proses');
        } else {
            toastr("Data $data->nama_proses Failed Create Data", 'error');
            return redirect()->route('proses');
        }
    }

    public function edit($id)
    {
        $data = proses::find($id);
        if (Auth::user()->user_role === 'Manager') {
            toastr("Access denied", 'error');
            return redirect()->route('dashboard');
        } else {
            return view('page.proses.edit', compact('data'));
        }
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_proses' => 'required|min:4'
        ]);

        $data = proses::find($id);
        $data->nama_proses = $validate['nama_proses'];
        $data->save();

        if ($data) {
            toastr("Data $data->nama_proses Success Update Data", 'success');
            return redirect()->route('proses');
        } else {
            toastr("Data $data->nama_proses Failed Update Data", 'error');
            return redirect()->route('proses');
        }
    }

    public function delete($id)
    {
        $data = proses::find($id);
        $data->delete();

        if ($data) {
            toastr("Data $data->nama_proses Success Delete Data", 'success');
            return redirect()->route('proses');
        } else {
            toastr("Data $data->nama_proses Failed Delete Data", 'error');
            return redirect()->route('proses');
        }
    }
}
