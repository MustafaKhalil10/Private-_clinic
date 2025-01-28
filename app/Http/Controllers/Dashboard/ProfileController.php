<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('dashboard.profile.edit', [
            'user' => $user,
        ]);
    }

    
    public function update(Request $request)
    {
        $request->validate(User::rules());
        $id = Auth::id();
        $user = User::find($id);
        if(Hash::check($request->post('old_password'), $user->password)) {
                    $user->update([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'password' => Hash::make($request->post('new_password'))
        ]);
        return redirect()->route('dashboard.profile.edit')
            ->with('success', 'The password has been changed');
        } else{
        return redirect()->route('dashboard.profile.edit')
            ->with('info', 'Password is wrong');
        }
    }
}
