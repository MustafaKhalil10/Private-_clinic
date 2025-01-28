<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Booked_appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Record_appointmentsController extends Controller
{
    public function index()
    {
        $request = request();
        $query = Booked_appointment::query()
            ->whereIn('status', ['confirmed', 'cancelled']);
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
        $booked_appointments = $query->paginate();
        return view('dashboard.Records.appointment.record', ['booked_appointments' => $booked_appointments]);
    }
}
