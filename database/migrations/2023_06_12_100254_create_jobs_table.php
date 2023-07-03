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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('job_category_id');
            $table->unsignedBigInteger('job_role_id');
            $table->string('title'); 
            $table->string('vacancies',50);
            $table->date('deadline');
            $table->json('salary_details');
            $table->string('salary_type',50);
            $table->string('country',50);
            $table->string('location',150);
            $table->json('applicant')->nullable(true);
            $table->enum('job_feature',['featured','highlight'])->nullable(true);
            $table->string('experience',50);
            $table->string('education',50);
            $table->string('job_type',50);
            $table->text('description')->nullable(true);
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('job_category_id')->references('id')->on('job_categories')->onDelete('cascade');
            $table->foreign('job_role_id')->references('id')->on('job_roles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
