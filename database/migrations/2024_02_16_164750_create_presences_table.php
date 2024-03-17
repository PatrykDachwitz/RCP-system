<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('presences', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('user_id');
            $table->integer('month');
            $table->integer('year');
            $table->integer('time_to_work');
            $table->integer('time_completed')->default(0);
            $table->integer('time_worked')->default(0);
            $table->integer('time_on_sick_leave')->default(0);
            $table->integer('time_on_vacation')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presences');
    }
};
