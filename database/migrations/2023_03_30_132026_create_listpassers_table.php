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
        Schema::create('listpassers', function (Blueprint $table) {
            $table->id();
            $table->string('appno');
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('ep')->nullable();
            $table->string('rc')->nullable();
            $table->string('sps')->nullable();
            $table->string('qs')->nullable();
            $table->string('ats')->nullable();
            $table->string('oar')->nullable();
            $table->text('school');
            $table->text('status');
            $table->text('year');
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
        Schema::dropIfExists('listpassers');
    }
};
