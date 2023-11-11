<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessClearancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_clearances', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('middle')->nullable();
            $table->string('lastname');
            $table->string('suffix');
            $table->string('businessname');
            $table->string('block')->nullable();
            $table->string('lot')->nullable();
            $table->string('phase')->nullable();
            $table->string('house')->nullable();
            $table->string('street')->nullable();
            $table->string('subdivision')->nullable();
            $table->string('barangay');
            $table->string('city_muni');
            $table->string('province');
            $table->string('notified');
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
        Schema::dropIfExists('business_clearances');
    }
}
