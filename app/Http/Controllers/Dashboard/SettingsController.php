<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    public function edit()
    {
        $setting = Setting::find(1);
        return view('dashboard.settings.edit', ['setting' => $setting]);
    }


    public function update(Request $request, $id)
    {
            $request->validate([
            'clinic_name' => 'required|string|max:255',
            'clinic_email' => 'required|email|max:255',
            'clinic_phone' => 'required|string|max:20',
            'clinic_address' => 'required|string|max:255',
        ]);
        Setting::where('id', '=', $id)
            ->update([
            'clinic_name' => $request->post('clinic_name'),
            'clinic_email' => $request->post('clinic_email'),
            'clinic_phone' => $request->post('clinic_phone'),
            'clinic_address' => $request->post('clinic_address'),]);
        return redirect()->route('settings.edit')->with('success', 'settings update successfully');
    }
}
