<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Booked_appointment;
use App\Repositories\Record\RecordModelRepositories;
use Illuminate\Http\Request;

class Booked_appointmentsController extends Controller
{
    public function index()
    {
        $request = request();
        $query = Booked_appointment::query()->where('appointment_date', '>=', today());
        $patient_name = $request->query('patient_name');
        $id = $request->query('id');
        $starus = $request->query('status');
        $today = $request->query('today');

        if ($today) {
            $query->whereDate('appointment_date', today());
        }

        if ($starus == 'all') {
            $query->get();
        } else if ($starus) {
            $query->whereStatus($starus);
        }

        if ($patient_name) {
            $query->join('patients', 'patients.user_id', '=', 'booked_appointments.patient_id')
                ->where('patients.name', 'LIKE', "%{$patient_name}%");
        }

        if ($id) {
            $query->where('id', '=', $id);
        }
        $booked_appointments = $query->paginate(50);
        return view('dashboard.booked_appointments.index', ['booked_appointments' => $booked_appointments]);
    }


    public function edit($id)
    {
        $booked_appointment = Booked_appointment::find($id);
        return view('dashboard.booked_appointments.edit', ['booked_appointment' => $booked_appointment]);
    }


    public function update(Request $request, $id)
    {
        $request->validate(Booked_appointment::rules());
        Booked_appointment::where('id', '=', $id)
            ->update([
                'appointment_date' => $request->post('appointment_date'),
                'appointment_time' => $request->post('appointment_time'),
                'review_type' => $request->post('review_type'),
                'status' => $request->post('status'),
            ]);
        return redirect()->route('booked_appointments.index')->with('success', 'Booked_appointment update successfully');
    }
}
