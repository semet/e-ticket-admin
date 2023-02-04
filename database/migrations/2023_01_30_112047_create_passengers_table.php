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
        Schema::create('passengers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('booking_id')
                ->references('id')
                ->on('bookings')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('nik');
            $table->string('name');
            $table->string('email');
            $table->boolean('is_claimed')->default(0);
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
        Schema::dropIfExists('passengers');
    }
};
