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
        Schema::create('schedule_configs', function (Blueprint $table) {
            $table->id();
            $table->string('day_of_week');
            $table->time('start_time');
            $table->time('end_time');
            $table->softDeletes();
            $table->foreignId('created_by')->nullable()->constrained('users')->after('softDeletes');
            $table->foreignId('updated_by')->nullable()->constrained('users')->after('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_configs');
    }
};
