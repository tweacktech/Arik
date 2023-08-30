<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('park_payments', function (Blueprint $table) {
            $table->id();
            $table->string('parking_space_id')->nullable();
              $table->string('name')->nullable();
            $table->string('phone')->nullable();
              $table->string('email')->nullable();
              $table->string('payment_reference')->nullable();
            $table->decimal('amount',10,2)->default(0.0);
              $table->enum('status', ['pending','Approved', 'canceled'])->default('pending');
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('park_payments');
    }
}
