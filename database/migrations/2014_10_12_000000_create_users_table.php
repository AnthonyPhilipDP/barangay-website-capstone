<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('middle')->nullable();
            $table->string('lastname');
            $table->string('suffix');
            $table->string('block')->nullable();
            $table->string('lot')->nullable();
            $table->string('phase')->nullable();
            $table->string('house')->nullable();
            $table->string('street')->nullable();
            $table->string('subdivision')->nullable();
            $table->string('barangay');
            $table->string('city_muni');
            $table->string('province');
            $table->string('dob');
            $table->string('pobcity');
            $table->string('pobprovince');
            $table->string('age');
            $table->string('civilstatus');
            $table->string('citizenship');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('admin');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
