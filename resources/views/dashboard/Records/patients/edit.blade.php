@extends('layout.dashboard')

@section('title')
    patients
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('patients.index') }}">patients</a></li>
    <li class="breadcrumb-item active">'Edit'</li>
@endsection

@section('content')
    <div class="m-5">

        <!--Errors_any-->
        <x-errors />

        <!--form_create_edit_date-->
        <form action="{{ route('patients.update', $patient->user_id) }}" method="post">
            @csrf
            @method('PUT')
            <x-form.text name="name" type="text" label="Name" value="{{ $patient->name }}" />

            <x-form.text name="phone" type="tel" label="Phone" value="{{ $patient->phone }}" />

            <x-form.text name="age" type="number" label="Age" value="{{ $patient->age }}" />

            <x-form.select name="gender" :options="['male', 'faminine']" value="{{ $patient->gender }}" />

            <x-form.text name="address" type="text" label="Address" value="{{ $patient->address }}" />


            <button type="submit" class="btn btn-primary btn_add">save edit</button>
        </form>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
