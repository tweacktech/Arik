<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {

        $table->id();
        // $table->unsignedBigInteger('user_id')->nullable(); // If you want to associate with users.
        $table->string('parking_space_id')->nullable();
        $table->string('booking_start_time');
        $table->string('booking_start_date');
        $table->string('booking_end_time');
        $table->string('booking_end_date');
         $table->string('email')->nullable();
          $table->decimal('amount',10,2)->default(0.0);
        $table->boolean('is_paid')->default(false);
        $table->timestamps();

        // $table->foreign('user_id')->references('id')->on('users');
        // $table->foreign('parking_space_id')->references('id')->on('parking_spssaces');
    });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
