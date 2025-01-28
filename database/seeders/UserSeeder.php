<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'=>'ali',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('1234'),
            'role'=>'admin'
        ]);
        User::create([
            'name'=>'mustafa',
            'email'=>'doctor@gmail.com',
            'password'=>Hash::make('1234'),
            'role'=>'doctor'
        ]);
        Setting::create([
            'clinic_name'=>'Hope Clinic',
            'clinic_email'=>'hope_clinic@gmail.com',
            'clinic_phone'=>'+1-526-169-528',
            'clinic_address'=>'idleb-street15300-Ahf5x',
        ]);
    }
}
