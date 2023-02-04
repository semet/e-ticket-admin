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
            $table->uuid('id')->primary();
            $table->uuid('destination_id')
                ->references('id')
                ->on('destinations')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->uuid('user_id')
                ->references('id')
                ->on('users')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->uuid('schedule_id')
                ->references('id')
                ->on('schedules')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('number')->unique();
            $table->date('date');
            $table->enum('status', ['pending', 'confirmed', 'cancelled']);
            $table->enum('type', ['quantity', 'couple', 'family']);
            $table->string('snap_token')->nullable();
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
