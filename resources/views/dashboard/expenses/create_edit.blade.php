@extends('layout.dashboard')

@section('title')
    Expenses
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('expenses.index') }}">patients</a></li>
    <li class="breadcrumb-item active">{{ isset($expense) ? 'Edit' : 'Create' }}</li>
@endsection

@section('content')
    <div class="m-5">

        <!--Errors_any-->
        <x-errors />

        <!--form_create_edit_date-->
        <form action="{{ isset($expense) ? route('expenses.update', $expense->id) : route('expenses.store') }}"
            method="post">
            @csrf
            @if (isset($expense))
                @method('PUT')
            @endif

            <x-form.text name="expense_type" type="text" label="Expense_Type"
                value="{{ isset($expense) ? $expense->expense_type : '' }}" />

            <x-form.text name="description" type="text" label="Description"
                value="{{ isset($expense) ? $expense->description : '' }}" />

            <x-form.text name="amount" type="number" label="Amount"
                value="{{ isset($expense) ? $expense->amount : '' }}" />

            <x-form.text name="expense_date" type="date" label="Expense_Date"
                value="{{ isset($expense) ? $expense->expense_date : '' }}" />


            <button type="submit" class="btn btn-primary btn_add">{{ isset($expense) ? 'save edit' : 'save' }}</button>
        </form>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
