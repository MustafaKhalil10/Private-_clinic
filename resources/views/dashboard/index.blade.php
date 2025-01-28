@extends('layout.dashboard')

@section('title')
    dashboard
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">index</li>
@endsection

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-4xl font-semibold text-center text-gray-800 mb-5 mt-5">لوحة التحكم - إحصائيات</h1>

        <!-- الإحصائيات العامة -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="bg-white shadow-xl rounded-xl p-8 col-md-4 mt-3" style="width: 100px">
                    <h2 class="text-xl font-bold text-center text-gray-800">الفئات العمرية للمرضى</h2>
                    <canvas id="ageGroupsChart" style="width: 200px"></canvas>
                </div>
                <div class="col-md-1"></div>

                <div class="col-md-6 mb-3" style="max-width: 400px; margin: auto; padding: 20px;">
                    <h2 class="text-xl font-bold text-center text-gray-800">ملخص عام للمرضى و المواعيد</h2>
                    <canvas id="simpleChart"></canvas>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-xl rounded-xl p-8 mt-6">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">الإيرادات والمصاريف</h2>
            <canvas id="financialChart"></canvas>
        </div>
    @endsection

    @push('styles')
        <style>
            /* تخصيص ألوان الرسوم البيانية */
            .chart-container {
                position: relative;
                width: 100%;
                height: 200px;
            }
        </style>
    @endpush
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // رسم بياني للفئات العمرية
            const ageGroupsChartCtx = document.getElementById('ageGroupsChart').getContext('2d');
            new Chart(ageGroupsChartCtx, {
                type: 'pie',
                data: {
                    labels: ['0-18', '19-35', '36-60', '60+'],
                    datasets: [{
                        data: [
                            {{ $ageGroups['0-18'] }},
                            {{ $ageGroups['19-35'] }},
                            {{ $ageGroups['36-60'] }},
                            {{ $ageGroups['60+'] }}
                        ],
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50'],
                        hoverOffset: 10
                    }]
                }
            });
            // رسم بياني للإيرادات والمصاريف
            const financialChartCtx = document.getElementById('financialChart').getContext('2d');
            new Chart(financialChartCtx, {
                type: 'bar',
                data: {
                    labels: ['الإيرادات', 'المصاريف', 'صافي الربح'],
                    datasets: [{
                        label: 'المبلغ ($)',
                        data: [{{ $totalRevenue }}, {{ $totalExpenses }}, {{ $netProfit }}],
                        backgroundColor: ['#4CAF50', '#F44336', '#2196F3'],
                        borderRadius: 12,
                        borderSkipped: false,
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1000
                            }
                        }
                    }
                }
            });
        </script>
        <script>
            // البيانات
            const data = {
                appointments: 50,
                completedAppointments: 35,
                cancelledAppointments: 10,
                totalPatients: 100
            };
            // إنشاء الرسم البياني
            const ctx = document.getElementById('simpleChart').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['إجمالي المواعيد', 'المواعيد المكتملة', 'المواعيد الملغاة', 'إجمالي المرضى'],
                    datasets: [{
                        data: [
                            data.appointments,
                            data.completedAppointments,
                            data.cancelledAppointments,
                            data.totalPatients
                        ],
                        backgroundColor: ['#4caf50', '#2196f3', '#f44336', '#ff9800']
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    }
                }
            });
        </script>
    @endpush
