<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('nagrereklamo');
            $table->string('address');
            $table->string('number')->nullable();
            $table->string('inirereklamo');
            $table->string('address1');
            $table->string('number1')->nullable();
            $table->string('subject');
            $table->mediumText('salaysay');
            $table->string('notified');
            $table->string('solved');
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
        Schema::dropIfExists('complaints');
    }
}
