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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('country',60);
            $table->string('location');
            $table->string('contact',50);
            $table->string('email',50);
            $table->string('org_type');
            $table->string('industry_type');
            $table->string('team_size');
            $table->string('website');
            $table->date('establishment_date');
            $table->text('bio')->nullable(true);
            $table->text('vision')->nullable(true);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
