<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\operator;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index()
    {
        $data = operator::all();
        return view('page.operator.index', compact('data'));
    }

    public function create()
    {
        return view('page.operator.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_operator' => 'required|min:5'
        ]);

        $data = new operator();
        $data->nama_operator = $validate['nama_operator'];
        $data->save();

        if ($data) {
            toastr("Data $data->nama_operator Success Create Data", 'success');
            return redirect()->route('operator');
        } else {
            toastr("Data $data->nama_operator Failed Create Data", 'error');
            return redirect()->route('operator');
        }
    }

    public function edit($id)
    {
        $data = operator::find($id);
        return view('page.operator.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_operator' => 'required|min:4'
        ]);

        $data = operator::find($id);
        $data->nama_operator = $validate['nama_operator'];
        $data->save();

        if ($data) {
            toastr("Data $data->nama_operator Success Update Data", 'success');
            return redirect()->route('operator');
        } else {
            toastr("Data $data->nama_operator Failed Update Data", 'error');
            return redirect()->route('operator');
        }
    }

    public function delete($id)
    {
        $data = operator::find($id);
        $data->delete();

        if ($data) {
            toastr("Data $data->nama_operator Success Delete Data", 'success');
            return redirect()->route('operator');
        } else {
            toastr("Data $data->nama_operator Failed Delete Data", 'error');
            return redirect()->route('operator');
        }
    }
}
