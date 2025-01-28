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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booked_appointment_id')->constrained('booked_appointments')->cascadeOnDelete();  // ->  (الموعد - علاقة بجدول المواعيد_di)
            $table->decimal('amount');  // ->  (المبلغ المدفوع)
            $table->date('payment_date');  //  ->  (تاريخ الدفع)
            $table->enum('payment_method', ['cash', 'card']);  // ->  (طريقة الدفع: نقداً، بطاقة)
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
        Schema::dropIfExists('payments');
    }
};
