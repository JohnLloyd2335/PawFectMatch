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
            $table->foreignId('species_id')->constrained('species')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('breed_id')->constrained('breeds')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->date('dob')->nullable();
            $table->string('gender');
            $table->decimal('height',5,2);
            $table->decimal('weight',5,2);
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
