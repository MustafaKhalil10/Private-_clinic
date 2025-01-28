<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Booked_appointment;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppointmentsController extends Controller
{

    public function index()
    {
        Appointment::where(DB::raw("CONCAT(appointment_date, ' ', appointment_time)"), '<', now())->delete();
        $request = request();
        $query = Appointment::query();
        $query = $query->where('status', 'active');
        $appointment_date = $request->query('appointment_date');

        if ($appointment_date) {
            $query->where('appointment_date', 'LIKE', "%{$appointment_date}%");
        }
        $appointments = $query->paginate(100);
        $contact = Setting::find(1);
        return view('front.appointments.index', compact('appointments','contact'));
    }


    public function book($id)
    {
        $appointment = Appointment::find($id);
        Booked_appointment::create([
            'patient_id'=>Auth::id(),
            'appointment_date'=>$appointment->appointment_date,
            'appointment_time' =>$appointment->appointment_time,
        ]);
        $appointment->delete();
        return back()->with('success', 'Appointment booked successfully!');
    }
}
