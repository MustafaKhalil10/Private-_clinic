<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booked_appointment extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = ['patient_id', 'appointment_date', 'appointment_time', 'review_type', 'status', 'notes'];

    public static function rules()
    {
        return [
            'appointment_date' => ['required', 'date'],
            'appointment_time' => 'required',
            'review_type' => 'in:review,first_time',
            'status' => 'in:pending,confirmed,cancelled',
        ];
    }

    // "كل موعد له وصفة طبية واحدة "أو لا يوجد وصفة
    public function prescription()
    {
        return $this->hasOne(Prescription::class);
    }

    // كل موعد له مبلغ مالي واحد
    public function Payment()
    {
        return $this->hasOne(Payment::class);
    }

    // كل المواعيد تنتمي للمرضى
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'user_id');
    }
}
