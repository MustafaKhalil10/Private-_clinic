@extends('layout.dashboard')

@section('title')
    settings
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">settings</li>
    <li class="breadcrumb-item active">index</li>
@endsection

@section('content')
    <div class="m-5">

        <!--Errors_any-->
        <x-errors />
        <x-alert type="success" />

        <!--form_create_edit_date-->
        <form action="{{ route('settings.update', 1) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <x-form.text name="clinic_name" type="text" label="clinic_name" value="{{ $setting->clinic_name }}" />

                    <x-form.text name="clinic_email" type="text" label="clinic_email"
                        value="{{ $setting->clinic_email }}" />
                </div>
                <div class="col-md-6">
                    <x-form.text name="clinic_phone" type="text" label="clinic_phone"
                        value="{{ $setting->clinic_phone }}" />

                    <x-form.text name="clinic_address" type="text" label="clinic_address"
                        value="{{ $setting->clinic_address }}" />
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn_add mt-3">save edit</button>
        </form>
    </div>
@endsection


@push('styles')
@endpush

@push('scripts')
@endpush
