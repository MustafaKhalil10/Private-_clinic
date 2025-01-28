<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AppointmentsController;
use App\Http\Controllers\Dashboard\Booked_appointmentsController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ExpensesController;
use App\Http\Controllers\Dashboard\PatientsController;
use App\Http\Controllers\Dashboard\PrescriptionsController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\Record_appointmentsController;
use App\Http\Controllers\Dashboard\ReportsController;
use App\Http\Controllers\Dashboard\SettingsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' =>['auth', 'role:admin,doctor']], function () {

////////// Dashboard //////////
Route::get('/admin',[DashboardController::class,'index'])->name('dashboard.index');

////////// patints //////////
Route::resource('dashboard/patients', PatientsController::class);

////////// Appointments //////////
Route::resource('dashboard/appointments', AppointmentsController::class);

////////// Booked_appointments //////////
Route::resource('dashboard/booked_appointments', Booked_appointmentsController::class);

////////// Record //////////
Route::get('appointment.record',[Record_appointmentsController::class,'index'])->name('appointment.record');

////////// Prescriptions //////////
Route::resource('dashboard/prescriptions', PrescriptionsController::class);
Route::get('dashboard/prescriptions/add/{id}',[PrescriptionsController::class,'add'])->name('prescriptions.add');
Route::post('dashboard/prescriptions/add_prescription/{id}',[PrescriptionsController::class,'add_prescription'])->name('prescriptions.add_prescription');

////////// Expenses //////////
Route::resource('dashboard/expenses', ExpensesController::class);

////////// Admin //////////
Route::resource('dashboard/admin', AdminController::class);

////////// Profile //////////
Route::get('dashboard/profile/edit', [ProfileController::class,'edit'])->name('dashboard.profile.edit');
Route::patch('dashboard/profile/update', [ProfileController::class, 'update'])->name('dashboard.profile.update');

////////// Reports //////////
Route::get('dashboard/reports/index',[ReportsController::class,'index'])->name('reports.index');
Route::get('dashboard/reports/exportPdf',[ReportsController::class,'exportPdf'])->name('report.exportPdf');

////////// Settings //////////
Route::put('/settings/update/{id}',[SettingsController::class,'update'])->name('settings.update');
Route::get('/settings/edit',[SettingsController::class,'edit'])->name('settings.edit');


});
