<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaggageTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baggage_tables', function (Blueprint $table) {
             $table->id();
            $table->string('Routing')->nullable();
            $table->string('Concept')->nullable();
            $table->string('Businessclass')->nullable();
            $table->string('Premiumclass')->nullable();
            $table->string('Economyclass')->nullable();
            $table->string('Allclasses')->nullable();
            $table->string('Infant')->nullable();
            $table->decimal('Rate',12,2)->default(0.0);
            $table->text('Factor')->nullable();   
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
        Schema::dropIfExists('baggage_tables');
    }
}
