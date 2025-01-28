<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booked_appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients','user_id')->cascadeOnDelete();  // ->  (المريض - علاقة بجدول المرضى_di)
            $table->date('appointment_date');  //  ->  (تاريخ الموعد)
            $table->time('appointment_time');  // ->  (وقت الموعد)
            $table->enum('review_type',['review','first_time'])->default('first_time');  // ->  (نوع المراجعة : اول مرة , مراجعة)
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending'); // حالة الموعد
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booked_appointments');
    }
};
