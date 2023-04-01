<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urequests', function (Blueprint $table) {
            $table->id();
            $table->integer('userID');
            $table->string('application');
            $table->string('year');
            $table->integer('status')->comment('0->pending , 1->approved , 2 -> declined');
            $table->date('schedule')->nullable();
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
        Schema::dropIfExists('urequests');
    }
};
