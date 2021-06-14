<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $this->_validation($request);

        User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'level' => $request->level,
            'email' => $request->email,
        ]);

        return redirect('user');
    }

    public function _validation(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|max:100|min:2',
            'level' => 'required|min:3',
            'password' => 'required|min:5',
            'email' => 'required',
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->_validation($request);
        $user = User::find($id);
        $request->merge(['password' => bcrypt($request->password)]);
        $user->update($request->all());
        return redirect('user');
    }

    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->delete();
        return back();
    }

    public function user()
    {
        $user = User::onlyTrashed()->get();
        return view('auth.user.trash', ['user' => $user]);
    }

    public function restoreuser($id)
    {
        $user = User::onlyTrashed()->where('id', $id);
        $user->restore();

        return redirect('user/trash');
    }

    public function restore_alluser()
    {
        $user = User::onlyTrashed();
        $user->restore();

        return redirect('user/trash');
    }

    public function delete_user($id)
    {
        $user = User::onlyTrashed()->where('id', $id);
        $user->forceDelete();

        return redirect('user/trash');
    }

    public function delete_all_user()
    {
        $user = User::onlyTrashed();
        $user->forceDelete();

        return redirect('user/trash');
    }
}
