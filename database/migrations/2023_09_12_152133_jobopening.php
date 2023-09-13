<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jobopening extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_listing', function (Blueprint $table) {
            $table->id();
            $table->string('job_title')->nullable();
            $table->text('job_description')->nullable();
            $table->text('job_role')->nullable();
            $table->text('job_qualifications')->nullable();
            $table->string('job_experience_level')->nullable();
            $table->string('job_location')->nullable();
            $table->string('job_type')->nullable();
            $table->string('job_department')->nullable();
            $table->string('status')->default('active');
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
        Schema::dropIfExists('job_listing');
    }
}
