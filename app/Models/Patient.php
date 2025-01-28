<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Patient extends User
{
    use HasFactory;
    protected $primaryKey ='user_id';
    protected $fillable = ['user_id','name', 'phone', 'age', 'gender', 'address'];

    public static function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'age' => 'nullable',
        ];
    }

    // المريض يمكن أن يكون له عدة مواعيد
    public function booked_appointment()
    {
        return $this->hasMany(Booked_appointment::class, 'patient_id' , 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
