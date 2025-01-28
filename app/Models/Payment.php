<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['booked_appointment_id','amount','payment_method','payment_method'];

    // كل موعد له مبلغ مالي واحد
    public function booked_appointment()
    {
        return $this->belongsTo(Booked_appointment::class);
    }
}
