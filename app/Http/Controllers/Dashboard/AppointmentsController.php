<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    public function index()
    {
        $request = request();
        $query = Appointment::query();
        $appointment_date = $request->query('appointment_date');
        $appointment_time = $request->query('appointment_time');
        $starus = $request->query('status');

        if ($starus == 'all') {
            $query->get();
        } else if ($starus) {
            $query->whereStatus($starus);
        }
        if ($appointment_date) {
            $query->whereDate('appointment_date', '=', $appointment_date);
        }
        if ($appointment_time) {
            $query->whereDate('appointment_time', '=', $appointment_time);
        }
        $appointments = $query->paginate(50);
        return view('dashboard.appointments.index', ['appointments' => $appointments]);
    }

    public function create()
    {
        return view('dashboard.appointments.create_edit');
    }

    public function store(Request $request)
    {
        $request->validate(Appointment::rules());
        Appointment::create($request->all());
        return redirect()->route('appointments.index')->with('success', 'Appointment Add successfully');
    }

    public function edit($id)
    {
        $appointment = Appointment::find($id);
        return view('dashboard.appointments.create_edit', ['appointment' => $appointment]);
    }


    public function update(Request $request, $id)
    {
        $request->validate(Appointment::rules());
        Appointment::where('id', '=', $id)
            ->update([
                'appointment_date' => $request->post('appointment_date'),
                'appointment_time' => $request->post('appointment_time'),
                'status' => $request->post('status'),
            ]);
        return redirect()->route('appointments.index')->with('success', 'Appointment update successfully');
    }
}
