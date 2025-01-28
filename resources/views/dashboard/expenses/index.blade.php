@extends('layout.dashboard')

@section('title')
    Expenses
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">expenses</li>
    <li class="breadcrumb-item active">index</li>
@endsection

@section('content')
    <!------ Sersh ------->
    <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between m-2">
        @csrf
        <input type="text" name="expense_type" class="form-control mx-2 mt-3 ml-4" placeholder="Expense Type" value="{{ request('expense_type') }}">
        <input type="date" name="expense_date" class="form-control mx-2 mt-3 ml-4" value="{{ request('expense_date') }}">
        <button type="submit" class="btn btn-primary mx-2 pl-5 pr-5 mr-4 mt-3 ml-4 btn_add">Sersh</button>
    </form>
    <!------ End Sersh ------->

    <x-alert type="success" />
    <x-alert type="info" />

    <!------main-content-start----------->
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                                <h2 class="ml-lg-2">expenses Schedule</h2>
                            </div>
                            <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                                <a href="{{ route('expenses.create') }}" class="btn btn-success btn_add"
                                    data-toggle="modal">
                                    <i class="material-icons">&#xE147;</i>
                                    <span>Add a expense</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>
                                <th>Expense_Type</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Expense_Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody class="tbody">
                            @forelse ($expenses as $expense)
                                <tr>
                                    <td>{{ $expense->expense_type }}</td>
                                    <td>{{ $expense->description }}</td>
                                    <td style="color: red ;text-align: center">${{ $expense->amount }}</td>
                                    <td>{{ $expense->expense_date }}</td>
                                    <td>
                                        <a href="{{ route('expenses.edit', $expense->id) }}" class="edit"
                                            data-toggle="modal">
                                            <i class="material-icons edit" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('expenses.destroy', $expense->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete" data-toggle="modal"><i
                                                    class="material-icons" data-toggle="tooltip"
                                                    title="Delete">&#xE872;</i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="text-align: center">No Data</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
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
    </style>
@endpush

@push('scripts')
@endpush
