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
            $table->foreignId('start_journey_city_id')->constrained('cities')->onDelete('cascade');
            $table->foreignId('stop_journey_city_id')->constrained('cities')->onDelete('cascade');
            $table->foreignId('driver_id')->constrained('drivers')->onDelete('cascade');
            $table->date('trip_date');
            $table->foreignId('bus_name_id')->constrained('buses')->onDelete('cascade');
            $table->foreignId('bus_seat_id')->constrained('buses')->onDelete('cascade');
            $table->foreignId('bus_time_id')->constrained('time_shedules')->onDelete('cascade');
            $table->string('bus_condition');
            $table->integer('ticket_price');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
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
