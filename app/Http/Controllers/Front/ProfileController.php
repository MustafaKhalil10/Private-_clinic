<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('front.profile.edit', [
            'user' => $user,
        ]);
    }


    public function update(Request $request)
    {
        $request->validate(Patient::rules());
        $user = Auth::user();
        $user->patient->fill($request->all())->save();
        return redirect()->route('front.profile.edit')
            ->with('success', 'Edit Profile Update Successfully');
    }
}
