<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_forms', function (Blueprint $table) {
            $table->id();
            $table->text('fullname');
            $table->string('ticket');
            $table->string('phone');
            $table->string('email');
            $table->text('seat_type');
            $table->text('assistance');
            $table->text('wheelchair');
            $table->text('disability_ass');     
            $table->BigInteger('status')->default(1);
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
        Schema::dropIfExists('special_forms');
    }
}
