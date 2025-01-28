<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $fillable = ['booked_appointment_id', 'doctor_notes','diagnosis', 'medications','file'];

    public static function rules()
    {
        return [
            'doctor_notes' => 'required|string|max:255',
            'medications' => 'required|string|max:255',
            'diagnosis'=>'required|string|max:255'
        ];
    }

    // كل موعد له وصفة طبية واحدة (أو لا يوجد وصفة)
    public function booked_appointment()
    {
        return $this->belongsTo(Booked_appointment::class);
    }
}
