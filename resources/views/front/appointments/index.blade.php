@extends('layout.front')

@section('title')
    Appointment
@endsection

@section('content')

    <section id="appointment" class="appointment section">
        <div class="container mt-1">
            <x-alert type="success" />
            <h1 class="text-center mb-4">Available Appointments</h1>

            <!-- قائمة اختيار اليوم -->
            <div class="mb-4">
                <label class="form-label ml-3 mr-4">Filter by Day :</label>
                <!------ Sersh ------->
                <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between m-2">
                    @csrf
                    <input type="date" name="appointment_date" class="form-control mx-2 ml-4">
                    <button type="submit" class="btn btn-book mx-2 pl-5 pr-5 mr-4 ml-4">Sersh</button>
                </form>
                <!------ End Sersh ------->
            </div>

            <!-- قائمة المواعيد -->
            <div class="appointments">
                @foreach ($appointments as $appointment)
                    <div class="appointment-card">
                        <h5>{{ $appointment->appointment_date }} (<?php
                        $dateTime = new DateTime($appointment->appointment_date);
                        $dayOfWeek = $dateTime->format('l'); // '1' لعرض اسم اليوم بالكامل
                        echo $dayOfWeek;
                        ?>)</h5>
                        <p><strong>Time:</strong> {{ $appointment->appointment_time }} AM</p>
                        <p><strong>Doctor:</strong> Dr. mustafa</p>
                        <a href="{{ route('front.appointments.book', $appointment->id) }}" class="btn btn-book w-100"
                            data-toggle="modal">Book Now</a>
                        {{-- <button class="btn btn-book w-100">Book Now</button> --}}
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .appointments {
            display: flex;
            flex-wrap: wrap;
            justify-content: left;
        }

        .appointment-card {
            width: 400px;
            /* border: 1px solid #dee2e6; */
            border-radius: 8px;
            padding: 15px 40px;
            margin: 15px;
            transition: transform 0.3s;
            background-color: var(--surface-color);
        }

        .appointment-card:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-book {
            background-color: var(--accent-color);
            color: var(--background-color);
        }

        .btn-book:hover {
            background-color: var(--accent-color);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: scale(1.01);
            color: #fff;
        }
    </style>
@endpush

@push('scripts')
@endpush
