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
        Schema::create('salary_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('salary_id')->constrained();
            $table->integer('order')->default(1);
            $table->foreignId('salary_component_id')->nullable()->default(null)->constrained();
            $table->string('component_name')->nullable()->default(null);
            $table->enum('type',['fixed pay','deductions']);
            $table->boolean('is_hide')->default(0);
            $table->boolean('is_edit')->default(1);
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_details');
    }
};
