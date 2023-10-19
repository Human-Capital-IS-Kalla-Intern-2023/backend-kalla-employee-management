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
        Schema::create('employee_compenstations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('compensation_id')->constrained();
            $table->json('employee');
            $table->json('position');
            $table->json('eligible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_compenstations');
    }
};
