@extends('layout.dashboard')

@section('title')
    reports
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">reports</li>
    <li class="breadcrumb-item active">index</li>
@endsection

@section('content')
    <div class="container mx-auto mt-10 p-4 shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold text-center mb-6">التقرير المالي والمرضى</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- عدد المرضى -->
            <div class="bg-white shadow-md rounded-lg p-6 text-center">
                <h3 class="text-2xl font-semibold text-blue-500">{{ $totalPatients }}</h3>
                <p class="text-gray-600 mt-2">إجمالي المرضى</p>
            </div>

            <!-- عدد المواعيد المكتملة -->
            <div class="bg-white shadow-md rounded-lg p-6 text-center">
                <h3 class="text-2xl font-semibold text-green-500">{{ $totalAppointments }}</h3>
                <p class="text-gray-600 mt-2">إجمالي المواعيد المكتملة</p>
            </div>

            <!-- الإيرادات -->
            <div class="bg-white shadow-md rounded-lg p-6 text-center">
                <h3 class="text-2xl font-semibold text-yellow-500">{{ number_format($totalRevenue, 2) }} $</h3>
                <p class="text-gray-600 mt-2">إجمالي الإيرادات</p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- المصاريف -->
            <div class="bg-white shadow-md rounded-lg p-6 text-center">
                <h3 class="text-2xl font-semibold text-red-500">{{ number_format($totalExpenses, 2) }} $</h3>
                <p class="text-gray-600 mt-2">إجمالي المصاريف</p>
            </div>

            <!-- الربح الصافي -->
            <div class="bg-white shadow-md rounded-lg p-6 text-center">
                <h3 class="text-2xl font-semibold text-green-500">{{ number_format($netProfit, 2) }} $</h3>
                <p class="text-gray-600 mt-2">الربح الصافي</p>
            </div>

            <!-- نسبة الربح -->
            <div class="bg-white shadow-md rounded-lg p-6 text-center">
                <h3 class="text-2xl font-semibold text-green-500">{{ $profitPercentage }} %</h3>
                <p class="text-gray-600 mt-2">نسبة الربح</p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- نسبة المصاريف -->
            <div class="bg-white shadow-md rounded-lg p-6 text-center">
                <h3 class="text-2xl font-semibold text-red-500">{{ $expensesPercentage }} %</h3>
                <p class="text-gray-600 mt-2">نسبة المصاريف</p>
            </div>
            <div class="rounded-lg p-6 text-center">
                <button onclick="window.print()" class="bg-gray-500 text-white px-4 py-2 rounded">طباعة التقرير</button>
            </div>
        </div>

    </div>
@endsection


@push('styles')
    <style>
        .thead {
            background: rgba(134, 134, 134, 0.982);
            color: #fff;
            font-size: 30px;
        }

        .delete {
            border: none;
        }

        .edit {
            color: #eabb00;
        }

        @media print {
            .no-print {
                display: none;
            }
        }

        @media print {

            /* إخفاء الشريط الجانبي */
            #sidebar {
                display: none !important;
            }

            /* إخفاء رأس الصفحة */
            .top-navbar {
                display: none !important;
            }

            /* توسيع منطقة التقرير */
            .content {
                margin: 0;
                width: 100%;
            }

            /* إخفاء الأزرار الإضافية */
            .btn_Acount,
            .btn_nav,
            .breadcrumb,
            .print-buttons {
                display: none !important;
            }
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.tailwindcss.com"></script>
@endpush
