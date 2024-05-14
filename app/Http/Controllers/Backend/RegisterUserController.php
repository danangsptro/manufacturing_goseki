<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data = User::whereNotIn('id', [$user->id])->get();
        if (Auth::user()->user_role === 'Admin') {
            return view('page.register.index', compact('data'));
        } else {
            return redirect()->back()->with([
                'message' => "Access Denied!",
                'style' => 'error'
            ]);
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->username = $request->username;
        $data->user_role = $request->user_role;
        $data->no_telepon = $request->no_telepon;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->password = Hash::make('qwerty');
        $data->save();

        if ($data) {
            return redirect()->back()->with([
                'message' => "Tambah User",
                'style' => 'success'
            ]);
        }
    }

    public function deleteUser($id)
    {
        $data = User::find($id);
        if ($data) {
            $data->delete();
            return redirect()->back()->with([
                'message' => "Delete User",
                'style' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => "Data not found",
                'style' => 'error'
            ]);
        }
    }

    public function profile()
    {
        $data = Auth::user();
        return view('page.register.profile', compact('data'));
    }

    public function editProfile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:1',
            'email' => 'required|min:1|unique:users,email,' . $id,
            'username' => 'required|min:1',
            'jenis_kelamin' => 'required|min:1',
            'no_telepon' => 'required|min:1',
            'tempat_lahir' => 'required|min:1',
            'tanggal_lahir' => 'required|min:1',
        ]);
        $input = $request->all();
        $data = User::find($id);
        $data->update($input);

        if ($data) {
            return redirect()->back()->with([
                'message' => "Update Profile",
                'style' => 'success'
            ]);
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:4',
            'confirm_password' => 'required|min:4|same:password'
        ]);

        $data = User::find($id);
        $data->update([
            'password' => Hash::make($request->password)
        ]);

        if ($data) {
            return redirect()->back()->with([
                'message' => "Update Profile",
                'style' => 'success'
            ]);
        }
    }

    public function editAccountUser($id)
    {
        $data = User::find($id);
        return view('page.register.edit', compact('data'));
    }
}
