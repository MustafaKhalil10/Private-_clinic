<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable = ['expense_type','description','amount','expense_date'];

    public static function rules()
    {
        return [
            'expense_type' => 'required|min:3|max:40',
            'description' => 'required|min:3|max:200',
            'expense_date' => ['required', 'date'],
            'amount' => 'required|min:1|max:8',
        ];
    }
}
