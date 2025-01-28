<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = ['appointment_date', 'appointment_time', 'status'];

    public static function rules()
    {
        return [
            'appointment_date' => ['required', 'date', 'after:today'],
            'appointment_time' => 'required',
            'status' => 'in:active,inactive',
        ];
    }

}
