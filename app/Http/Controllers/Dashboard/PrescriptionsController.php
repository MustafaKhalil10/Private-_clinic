<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionsController extends Controller
{
    public function index()
    {
        $request = request();
        $query = Prescription::query();
        $patient_name = $request->query('patient_name');
        $id = $request->query('id');

        if ($patient_name) {
            $query->join('booked_appointments', 'prescriptions.booked_appointment_id', '=', 'booked_appointments.id')
                ->join('patients', 'booked_appointments.patient_id', '=', 'patients.user_id')
                ->where('patients.name', 'LIKE', "%{$patient_name}%");
        }

        if ($id) {
            $query->where('booked_appointment_id', '=', $id);
        }
        $prescriptions = $query->paginate();
        return view('dashboard.prescriptions.index', ['prescriptions' => $prescriptions]);
    }


    public function add($id)
    {
        return view('dashboard.prescriptions.create_edit', ['id_booked_appointments' => $id]);
    }


    public function add_prescription(Request $request, $id)
    {
        $request->validate(Prescription::rules());
        Prescription::create([
            'booked_appointment_id' => $id,
            'doctor_notes' => $request->post('doctor_notes'),
            'medications' => $request->post('medications'),
            'diagnosis' => $request->post('diagnosis'),
            'file' => $request->post('file'),
        ]);
        return redirect()->route('prescriptions.index')->with('success', 'prescription Add successfully');
    }


    public function edit($id)
    {
        $prescription = Prescription::find($id);
        return view('dashboard.prescriptions.create_edit', ['prescription' => $prescription]);
    }


    public function update(Request $request, $id)
    {
        $request->validate(Prescription::rules());
        $prescription = Prescription::find($id);
        $prescription->update($request->all());
        return redirect()->route('prescriptions.index')->with('success', 'prescription update successfully');
    }
}
