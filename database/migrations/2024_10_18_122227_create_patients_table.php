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
        Schema::create('patients', function (Blueprint $table) {
            //$table->id();
            $table->primary('user_id');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();  // ->  (علاقة بجدول User)
            $table->string('name');  //  -> (اسم المريض)
            $table->string('phone')->nullable();  //  -> (رقم الهاتف)
            $table->string('age')->nullable();  //  -> (العمر)
            $table->enum('gender', ['male', 'faminine'])->default('male');  //  -> (الجنس)
            $table->string('address')->nullable();  //  -> (العنوان)
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
        Schema::dropIfExists('patients');
    }
};
