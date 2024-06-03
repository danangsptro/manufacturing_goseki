<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\target_qty;
use Illuminate\Http\Request;

class TargetController extends Controller
{
    public function index()
    {
        $data = target_qty::all();
        return view('page.targetJam.index', compact('data'));
    }

    public function create()
    {
        return view('page.targetJam.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'target' => 'required|min:1'
        ]);

        $data = new target_qty();
        $data->target = $validate['target'];
        $data->save();

        if ($data) {
            toastr("Data $data->target Success Create Data", 'success');
            return redirect()->route('target-jam');
        } else {
            toastr("Data $data->target Failed Create Data", 'error');
            return redirect()->route('target-jam');
        }
    }

    public function edit($id)
    {
        $data = target_qty::find($id);
        return view('page.targetJam.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'target' => 'required|min:1'
        ]);

        $data = target_qty::find($id);
        $data->target = $validate['target'];
        $data->save();

        if ($data) {
            toastr("Data $data->target Success Create Data", 'success');
            return redirect()->route('target-jam');
        } else {
            toastr("Data $data->target Failed Create Data", 'error');
            return redirect()->route('target-jam');
        }
    }

    public function delete($id)
    {
        $data = target_qty::find($id);
        $data->delete();

        if ($data) {
            toastr("Data $data->target Success Delete Data", 'success');
            return redirect()->route('target-jam');
        } else {
            toastr("Data $data->target Failed Delete Data", 'error');
            return redirect()->route('target-jam');
        }
    }
}
