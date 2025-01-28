<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Booked_appointment;
use App\Models\Expense;
use App\Models\Patient;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPatients = Patient::count();
        $malePatients = Patient::where('gender', 'male')->count();
        $femalePatients = Patient::where('gender', 'faminine')->count();
        $appointments = Booked_appointment::count();
        $completedAppointments = Booked_appointment::where('status', 'confirmed')->count();
        $cancelledAppointments = Booked_appointment::where('status', 'cancelled')->count();

        // توزيع المرضى حسب الفئات العمرية
        $ageGroups = [
            '0-18' => Patient::whereBetween('age', [0, 18])->count(),
            '19-35' => Patient::whereBetween('age', [19, 35])->count(),
            '36-60' => Patient::whereBetween('age', [36, 60])->count(),
            '60+' => Patient::where('age', '>', 60)->count(),
        ];

        // الإيرادات والمصاريف
        $totalRevenue = $appointments * 10;
        $totalExpenses = Expense::sum('amount');
        $netProfit = $totalRevenue - $totalExpenses;

        return view('dashboard.index', compact(
            'totalPatients',
            'malePatients',
            'femalePatients',
            'appointments',
            'completedAppointments',
            'cancelledAppointments',
            'ageGroups',
            'totalRevenue',
            'totalExpenses',
            'netProfit'
        ));
    }
}
