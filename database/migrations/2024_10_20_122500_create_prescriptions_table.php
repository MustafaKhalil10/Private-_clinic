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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booked_appointment_id')->constrained('booked_appointments')->cascadeOnDelete();  // ->  (الموعد - علاقة بجدول المواعيد_di)
            $table->text('doctor_notes');  // ->  (ملاحظات الطبيب)
            $table->text('diagnosis');  // ->  ( التشخيص)
            $table->text('medications');  // ->  (الأدوية الموصوفة)
            $table->string('file')->nullable();  // ->  (صورة تحاليل)
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
        Schema::dropIfExists('prescriptions');
    }
};
