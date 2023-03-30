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
        Schema::create('u_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('userid');
            $table->integer('request')->comment('0->clearance,1->identification,2->certification');
            $table->integer('status')->comment('0->pending,1->approved,2->declined');
            $table->text('purpose')->nullable();
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
        Schema::dropIfExists('u_requests');
    }
};
