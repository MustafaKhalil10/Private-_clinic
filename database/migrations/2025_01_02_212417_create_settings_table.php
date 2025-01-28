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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('clinic_name')->nullable();  // ->(اسم العيادة)
            $table->string('clinic_email')->nullable();  // ->(بريد العيادة)
            $table->string('clinic_phone')->nullable();  // ->(هاتف العيادة)
            $table->string('clinic_address')->nullable();  // ->(عنوان العيادة)
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
        Schema::dropIfExists('settings');
    }
};
