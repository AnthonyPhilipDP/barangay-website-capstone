<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClearancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clearances', function (Blueprint $table) {
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
            $table->string('notified');
            $table->string('los');
            $table->string('purpose');
            $table->string('done');
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
        Schema::dropIfExists('clearances');
    }
}
