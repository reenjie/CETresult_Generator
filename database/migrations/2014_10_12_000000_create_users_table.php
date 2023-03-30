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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('mname');
            $table->string('religion');
            $table->string('civilstatus');
            $table->string('gender');
            $table->date('birthdate');
            $table->text('address');
            $table->string('contactno');
            $table->string('emergencycontact');
            $table->string('com_tax_number')->nullable();
            $table->string('tin')->nullable();
            $table->string('gsis')->nullable();
            $table->string('sss')->nullable();
            $table->string('occupation')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('roles')->comment('0->admin, 1->user');
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
};