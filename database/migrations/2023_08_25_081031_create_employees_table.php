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
            $table->unsignedBigInteger('position');
            $table->timestamps();

            $table->foreign('position')->references('id')->on('positions')->onDelete('restrict');

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
