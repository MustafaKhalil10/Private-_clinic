@extends('layout.dashboard')

@section('title')
    Admin
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
    <li class="breadcrumb-item active">{{ isset($admin) ? 'Edit' : 'save' }}</li>
@endsection

@section('content')
    <div class="m-5">

        <!--Errors_any-->
        <x-errors />

        <!--form_create_edit_date-->
        <form action="{{ isset($admin) ? route('admin.update', $admin->id) : route('admin.store') }}" method="post">
            @csrf
            @if (isset($admin))
                @method('PUT')
            @endif
            <x-form.text name="name" type="text" label="Name" value="{{ isset($admin) ? $admin->name : '' }}" />

            <x-form.text name="email" type="email" label="Email" value="{{ isset($admin) ? $admin->email : '' }}" />

            <x-form.text name="password" type="password" label="Password" />

            <button type="submit" class="btn btn-primary btn_add">save edit</button>
        </form>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
