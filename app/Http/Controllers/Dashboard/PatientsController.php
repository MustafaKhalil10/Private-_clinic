<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientsController extends Controller
{

    public function index()
    {
        $request = request();
        $query = Patient::query();
        $patient_name = $request->query('patient_name');
        if ($patient_name) {
            $query->where('name', 'LIKE', "%{$patient_name}%");
        }
        $patients = $query->paginate(50);
        return view('dashboard.Records.patients.index', ['patients' => $patients]);
    }


    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('dashboard.Records.patients.edit', ['patient' => $patient]);
    }


    public function update(Request $request, $id)
    {
        $request->validate(Patient::rules());
        $patient = Patient::find($id);
        $patient->update($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient update successfully');
    }


    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('info', 'patient delete successfully');
    }
}
