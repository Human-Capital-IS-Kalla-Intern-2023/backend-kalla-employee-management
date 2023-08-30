<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('fullname');
            $table->string('nickname');
            $table->date('hire_date');
            $table->string('company_email');
            $table->unsignedBigInteger('main_position');
            $table->unsignedBigInteger('secondary_position');
            $table->timestamps();

            $table->foreign('main_position')->references('id')->on('positions')->onDelete('cascade');
            $table->foreign('secondary_position')->references('id')->on('positions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
