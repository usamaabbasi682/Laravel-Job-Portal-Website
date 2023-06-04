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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('country',60); 
            $table->string('location');
            $table->string('profession',100);
            $table->string('experience',100);
            $table->string('job_role',100);
            $table->string('education',100);
            $table->string('gender',100);
            $table->string('website');
            $table->integer('applied_jobs')->nullable(true);
            $table->date('dob');
            $table->string('marital_status');
            $table->text('bio')->nullable(true);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
