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
        Schema::create('job_plans', function (Blueprint $table) {
            $table->id();
            $table->string('label',150);
            $table->string('currency_symbol',100);
            $table->integer('price');
            $table->integer('job_post_limit');
            $table->integer('featured_job_post_limit');
            $table->integer('highlight_job_post_limit');
            $table->string('profile_view_limitation')->nullable(true);
            $table->integer('cv_view_limit')->nullable(true);
            $table->enum('display_frontend',['0','1']);
            $table->text('desc');
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_plans');
    }
};
