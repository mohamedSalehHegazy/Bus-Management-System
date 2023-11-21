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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->dateTime('departure_at');
            $table->dateTime('arrive_at');
            $table->unsignedInteger('available_seats');
            $table->unsignedBigInteger('bus_id')->nullable();
            $table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade');
            $table->unsignedBigInteger('departure_city_id')->nullable();
            $table->foreign('departure_city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->unsignedBigInteger('arrival_city_id')->nullable();
            $table->foreign('arrival_city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
