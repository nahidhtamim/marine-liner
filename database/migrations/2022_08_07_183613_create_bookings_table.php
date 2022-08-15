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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_id')->unique();
            $table->string('company_name');
            $table->string('company_address');
            $table->integer('from_country');
            $table->integer('from_port');
            $table->integer('destination_country');
            $table->integer('destination_port');
            $table->tinyInteger('container_id');
            $table->date('booking_date');
            $table->string('goods');
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
        Schema::dropIfExists('bookings');
    }
};
