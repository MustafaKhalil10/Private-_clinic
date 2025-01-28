<?php

use App\Http\Controllers\Front\AppointmentsController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\ProfileController;
use Illuminate\Support\Facades\Route;


////////// Front //////////
Route::get('/',[FrontController::class,'home'])->name('front.home'); // -> front_home

Route::get('/front.services',[FrontController::class,'services'])->name('front.services'); // -> front_services

Route::get('/front.doctor',[FrontController::class,'doctor'])->name('front.doctor'); // -> front_doctor

Route::get('/front.contact',[FrontController::class,'contact'])->name('front.contact'); // -> front_contact

////////// appointment //////////
Route::get('/front.appointment.index',[AppointmentsController::class,'index'])->name('front.appointments.index'); // -> front_appointment
Route::get('/front.appointment.book/{id}',[AppointmentsController::class,'book'])->name('front.appointments.book')->middleware(['auth', 'role:patient']); // -> front_appointment

////////// Profile //////////
Route::get('/front/profile/edit', [ProfileController::class,'edit'])->name('front.profile.edit');
Route::patch('/front/profile/update', [ProfileController::class, 'update'])->name('front.profile.update');


