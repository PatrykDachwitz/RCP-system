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
        Schema::table('histories', function (Blueprint $table) {
            $table->integer('work_minutes')->default(0)->change();
            $table->timestamp('start_work')->nullable()->change();
            $table->timestamp('end_work')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('histories', function (Blueprint $table) {
            $table->integer('work_minutes')->change();
            $table->timestamp('start_work')->change();
            $table->timestamp('end_work')->change();
        });
    }
};
