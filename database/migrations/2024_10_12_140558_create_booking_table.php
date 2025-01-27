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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('city');
            $table->string('place');
            $table->string('event_type');
            $table->string('no_of_palace');
            $table->string('diet');
            $table->string('contact_no');
            $table->string('date');
            $table->string('email');
            $table->string('name');
            $table->string('request')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
