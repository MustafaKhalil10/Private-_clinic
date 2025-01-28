<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Booked_appointment;
use App\Models\Expense;
use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Support\Facades\DB;


class ReportsController extends Controller
{
    public function index()
    {
        $request = request();
        $query = Booked_appointment::query();
        $fromDate = $request->query('fromDate');
        $toDate = $request->query('toDate');

        if ($fromDate && $toDate) {
        $query->whereBetween('appointment_date', [$fromDate, $toDate]);

        }
        $totalAppointments = $query->count();
        $cancelledAppointments = $query->where('status', 'cancelled')->count();
        $query = Booked_appointment::query();
        $completedAppointments = $query->where('status', 'confirmed')->count();
        $PatientsQuery = Patient::query();
        $totalPatients = Patient::count();



        $expensesQuery = Expense::query();
        // إجمالي الإيرادات
        $totalRevenue = $completedAppointments * 10;
        // المصاريف
        $totalExpenses = $expensesQuery->sum('amount');
        // الربح الصافي
        $netProfit = $totalRevenue - $totalExpenses;
        if ($fromDate && $toDate) {
            $PatientsQuery->whereBetween('created_at', [$fromDate, $toDate]);
            $expensesQuery->whereBetween('expense_date', [$fromDate, $toDate]);
        }


        // المرضى الأكثر زيارة
        $mostVisitedPatients = Booked_appointment::with('patient')
            ->select('patient_id', DB::raw('COUNT(*) as visit_count'))
            ->groupBy('patient_id')
            ->orderByDesc('visit_count')
            ->take(5)
            ->get();

        // التوزيع الديموغرافي (الجنس)
        $genderDistribution = Patient::select('gender', DB::raw('COUNT(*) as count'))
            ->groupBy('gender')
            ->get();

        // التوزيع الديموغرافي (العمر)
        $ageDistribution = Patient::select(
            DB::raw('CASE
            WHEN age BETWEEN 0 AND 18 THEN "0-18"
            WHEN age BETWEEN 19 AND 35 THEN "19-35"
            WHEN age BETWEEN 36 AND 50 THEN "36-50"
            ELSE "50+" END as age_group'),
            DB::raw('COUNT(*) as count')
        )
            ->groupBy('age_group')
            ->get();

        // التشخيصات الشائعة
        $commonDiagnoses = Prescription::select('diagnosis', DB::raw('COUNT(*) as count'))
            ->groupBy('diagnosis')
            ->orderByDesc('count')
            ->take(5)
            ->get();


        return view('dashboard.reports.index', [
            'totalAppointments' => $totalAppointments,
            'completedAppointments' => $completedAppointments,
            'cancelledAppointments' => $cancelledAppointments,
            'totalPatients' => $totalPatients,
            'totalRevenue' => $totalRevenue,
            'totalExpenses' => $totalExpenses,
            'netProfit' => $netProfit,
            'mostVisitedPatients' => $mostVisitedPatients,
            'genderDistribution' => $genderDistribution,
            'ageDistribution' => $ageDistribution,
            'commonDiagnoses' => $commonDiagnoses,
        ]);
    }


    public function exportPdf()
    {
        // استرجاع البيانات المطلوبة
        $totalAppointments = Booked_appointment::where('status', 'confirmed')->count();
        $totalPatients = Patient::count();

        // إيرادات المواعيد المكتملة
        $totalRevenue = $totalAppointments * 10;

        // المصاريف
        $totalExpenses = Expense::sum('amount');

        // الربح الصافي
        $netProfit = $totalRevenue - $totalExpenses;

        // حساب النسب
        $profitPercentage = $totalRevenue > 0 ? ($netProfit / $totalRevenue) * 100 : 0;
        $expensesPercentage = $totalRevenue > 0 ? ($totalExpenses / $totalRevenue) * 100 : 0;


        return view('dashboard.reports.pdf_report', [
            'totalAppointments' => $totalAppointments,
            'totalPatients' => $totalPatients,
            'totalRevenue' => $totalRevenue,
            'totalExpenses' => $totalExpenses,
            'netProfit' => $netProfit,
            'profitPercentage' => $profitPercentage,
            'expensesPercentage' => $expensesPercentage,
        ]);
    }
}
