<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function index()
    {
        $request = request();
        $query = Expense::query();
        $expense_type = $request->query('expense_type');
        $expense_date = $request->query('expense_date');
        if ($expense_type) {
            $query->where('expense_type', 'LIKE', "%{$expense_type}%");
        }
        if ($expense_date) {
            $query->whereDate('expense_date', '>=', $expense_date);
        }
        $expenses = $query->paginate();
        return view('dashboard.expenses.index', ['expenses' => $expenses]);
    }


    public function create()
    {
        return view('dashboard.expenses.create_edit');
    }


    public function store(Request $request)
    {
        $request->validate(Expense::rules());
        Expense::create($request->all());
        return redirect()->route('expenses.index')->with('success', 'expense Add successfully');
    }


    public function edit($id)
    {
        $expense = Expense::find($id);
        return view('dashboard.expenses.create_edit', ['expense' => $expense]);
    }


    public function update(Request $request, $id)
    {
        $request->validate(Expense::rules());
        $expense = Expense::find($id);
        $expense->update($request->all());
        return redirect()->route('expenses.index')->with('success', 'expense update successfully');
    }


    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index')->with('info', 'expense delete successfully');
    }
}
