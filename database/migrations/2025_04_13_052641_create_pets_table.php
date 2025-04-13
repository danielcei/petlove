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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo');
            $table->foreignId('animal_id')->constrained()->cascadeOnDelete();
            $table->foreignId('breed_id')->constrained()->cascadeOnDelete();
            $table->date('birthdate')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->decimal('weight', 5, 2)->nullable(); // peso em kg
            $table->string('color')->nullable();
            $table->enum('size', ['small', 'medium', 'large'])->nullable();
            $table->boolean('is_neutered')->default(false);
            $table->text('notes')->nullable();
            $table->softDeletes();
            $table->foreignId('created_by')->nullable()->constrained('users')->after('softDeletes');
            $table->foreignId('updated_by')->nullable()->constrained('users')->after('created_by');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
