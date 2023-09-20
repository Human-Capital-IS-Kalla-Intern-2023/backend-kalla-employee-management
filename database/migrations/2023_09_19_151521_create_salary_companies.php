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
        Schema::create('salary_companies', function (Blueprint $table) {
            $table->string('slug')->primary();
            $table->string('component');
            $table->enum('type',['fixed pay','deductions']);
            $table->boolean('is_hide')->default(0);
            $table->boolean('is_edit')->default(1);
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('slug')->references('slug')->on('salary_components');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_companies');
    }
};
