<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ApplicationsDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applicants', function (Blueprint $table) {
            $table->id();
            $table->string('email_address')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('profile_photo');
            $table->string('uploaded_resume');
            $table->string('country');
            $table->string('password');
            $table->string('state_of_origin');
            $table->string('lga');
            $table->date('date_of_birth');
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
        Schema::dropIfExists('job_applicants');
    }
}
