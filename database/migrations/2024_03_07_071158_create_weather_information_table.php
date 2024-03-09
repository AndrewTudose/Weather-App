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
        Schema::create('weather_information', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('capital',40);
            $table->date('date');
            $table->time('hour');
            $table->decimal('temperature',4,2);
            $table->boolean('is_day');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather_information');
    }
};
