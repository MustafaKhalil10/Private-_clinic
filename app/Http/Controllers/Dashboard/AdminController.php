<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::where('role', '=', 'admin')->get();
        return view('dashboard.admin.index', ['admins' => $admins]);
    }


    public function create()
    {
        return view('dashboard.admin.create_edit');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|min:6',
            'password' => 'required|string|min:3',
        ]);
        User::create([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'password' => Hash::make($request->post('password')),
            'role' => 'admin'
        ]);
        return redirect()->route('admin.index')
            ->with('success', 'Admin Add successfully');
    }


    public function edit($id)
    {
        //
        $admin = User::find($id);
        return view('dashboard.admin.create_edit', ['admin' => $admin]);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|min:6',
            'password' => 'required|string|min:3',
        ]);
        $user = User::find($id);
        $user->update([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'password' => Hash::make($request->post('password'))
        ]);
        return redirect()->route('admin.index')
            ->with('success', 'The password has been changed');
    }
}
