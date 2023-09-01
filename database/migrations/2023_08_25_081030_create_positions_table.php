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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('companies_id');
            $table->string('position_name');
            $table->unsignedBigInteger('job_grade');
            $table->unsignedBigInteger('directorate');
            $table->unsignedBigInteger('division');
            $table->unsignedBigInteger('section');
            $table->timestamps();

            $table->foreign('job_grade')->references('id')->on('job_grades')->onDelete('rescrict');
            $table->foreign('directorate')->references('id')->on('directorats')->onDelete('rescrict');
            $table->foreign('division')->references('id')->on('divisions')->onDelete('rescrict');
            $table->foreign('section')->references('id')->on('sections')->onDelete('rescrict');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
