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
        Schema::create('activites', function (Blueprint $table) {
        $table->id();
        $table->string('titre');
        $table->string('type');
        $table->text('description')->nullable();
        $table->dateTime('date_heure');
        $table->integer('duree');
        $table->string('modalite_travail')->nullable();
        $table->text('ressources')->nullable();
        $table->foreignId('classroom_id')->constrained('classrooms')->onDelete('cascade');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activites');
    }
};
