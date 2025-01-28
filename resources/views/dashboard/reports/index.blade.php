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
    <!------ Sersh ------->
    <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between m-2">
        @csrf
        <input type="date" name="fromDate" class="form-control mx-2 mt-3 ml-4" value="{{ request('fromDate') }}">
        <input type="date" name="toDate" class="form-control mx-2 mt-3 ml-4" value="{{ request('toDate') }}">
        <button type="submit" class="btn btn-primary mx-2 pl-5 pr-5 mr-4 mt-3 ml-4 btn_add">Sersh</button>
    </form>
    <!------ End Sersh ------->

    <x-alert type="success" />
    <x-alert type="info" />

    <!------main-content-start----------->
    <div class="container mx-auto mt-8">
        <!-- Header Section -->
        <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-10">لوحة التقارير</h1>

        <!-- Summary Section -->
        <section class="mb-12">
            <h2 class="text-3xl font-bold text-center text-gray-700 mb-6">تقارير المواعيد</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-blue-50 border border-blue-200 shadow-md rounded-lg p-6 text-center">
                    <h3 class="text-3xl font-semibold text-blue-600">{{ $totalAppointments }}</h3>
                    <p class="text-gray-600 mt-2">إجمالي المواعيد</p>
                </div>
                <div class="bg-green-50 border border-green-200 shadow-md rounded-lg p-6 text-center">
                    <h3 class="text-3xl font-semibold text-green-600">{{ $completedAppointments }}</h3>
                    <p class="text-gray-600 mt-2">المواعيد المكتملة</p>
                </div>
                <div class="bg-red-50 border border-red-200 shadow-md rounded-lg p-6 text-center">
                    <h3 class="text-3xl font-semibold text-red-600">{{ $cancelledAppointments }}</h3>
                    <p class="text-gray-600 mt-2">المواعيد الملغاة</p>
                </div>
                <div class="bg-yellow-50 border border-yellow-200 shadow-md rounded-lg p-6 text-center">
                    <h3 class="text-3xl font-semibold text-yellow-600">{{ $totalPatients }}</h3>
                    <p class="text-gray-600 mt-2">إجمالي المرضى</p>
                </div>
            </div>
        </section>

        <!-- Financial Section -->
        <section class="mb-12 bg-gray-50 p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold text-center text-gray-700 mb-6">التقارير المالية</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-blue-100 border border-blue-300 shadow-md rounded-lg p-6 text-center">
                    <h3 class="text-3xl font-semibold text-blue-700">{{ number_format($totalRevenue, 2) }} $</h3>
                    <p class="text-gray-600 mt-2">إجمالي الإيرادات</p>
                </div>
                <div class="bg-red-100 border border-red-300 shadow-md rounded-lg p-6 text-center">
                    <h3 class="text-3xl font-semibold text-red-700">{{ number_format($totalExpenses, 2) }} $</h3>
                    <p class="text-gray-600 mt-2">إجمالي المصاريف</p>
                </div>
                <div class="bg-green-100 border border-green-300 shadow-md rounded-lg p-6 text-center">
                    <h3 class="text-3xl font-semibold text-green-700">{{ number_format($netProfit, 2) }} $</h3>
                    <p class="text-gray-600 mt-2">الربح الصافي</p>
                </div>
            </div>
        </section>

        <!-- Patient Reports Section -->
        <section class="mb-12">
            <h2 class="text-3xl font-bold text-center text-gray-700 mb-6">تقارير المرضى</h2>

            <div class="bg-white border border-gray-200 shadow-md rounded-lg p-6 mb-8">
                <h3 class="text-2xl font-semibold text-gray-700 mb-4">المرضى الأكثر زيارة</h3>
                <ul class="list-disc pl-6 text-gray-600">
                    @foreach ($mostVisitedPatients as $entry)
                        <li class="mb-2">{{ $entry->patient->name }} - {{ $entry->visit_count }} زيارة</li>
                    @endforeach
                </ul>
            </div>

            <div class="bg-white border border-gray-200 shadow-md rounded-lg p-6 mb-8">
                <h3 class="text-2xl font-semibold text-gray-700 mb-4">توزيع المرضى حسب الجنس</h3>
                <ul class="list-disc pl-6 text-gray-600">
                    @foreach ($genderDistribution as $gender)
                        <li class="mb-2">{{ $gender->gender }}: {{ $gender->count }} مريض</li>
                    @endforeach
                </ul>
            </div>

            <div class="bg-white border border-gray-200 shadow-md rounded-lg p-6 mb-8">
                <h3 class="text-2xl font-semibold text-gray-700 mb-4">توزيع المرضى حسب العمر</h3>
                <ul class="list-disc pl-6 text-gray-600">
                    @foreach ($ageDistribution as $age)
                        <li class="mb-2">{{ $age->age_group }}: {{ $age->count }} مريض</li>
                    @endforeach
                </ul>
            </div>

            <div class="bg-white border border-gray-200 shadow-md rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-gray-700 mb-4">الأمراض/التشخيصات الأكثر شيوعًا</h3>
                <ul class="list-disc pl-6 text-gray-600">
                    @foreach ($commonDiagnoses as $diagnosis)
                        <li class="mb-2">{{ $diagnosis->diagnosis }}: {{ $diagnosis->count }} حالة</li>
                    @endforeach
                </ul>
            </div>
        </section>
    </div>

    <div class="container mx-auto mt-10 p-4 shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold text-center mb-6">لطباعة ملخص التقارير</h1>
        <!-- زر الطباعة -->
        <div class=" text-center mb-6">
            <a href="{{ route('report.exportPdf') }}" class="text-white px-4 py-2 rounded mr-3 btn_add">لطباعة التقرير</a>
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
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.tailwindcss.com"></script>
@endpush
