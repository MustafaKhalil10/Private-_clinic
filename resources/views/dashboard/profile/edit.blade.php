@extends('layout.dashboard')

@section('title')
    profile
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">profile</li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
    <div class="m-5">
        <!--Errors_any-->
        <x-errors />
        <x-alert type="success" />
        <x-alert type="info" />

        <form action="{{ route('dashboard.profile.update') }}" method="post">
            @csrf
            @method('patch')

            <x-form.text name="name" type="text" label="Name" value="{{ $user->name }}" />

            <x-form.text name="email" type="email" label="Email" value="{{ $user->email }}" />

            <x-form.text name="old_password" type="password" label="Old Password" />

            <x-form.text name="new_password" type="password" label="New Password" />

            <button type="submit" class="btn btn-primary btn_add">Edit Save</button>

        </form>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
