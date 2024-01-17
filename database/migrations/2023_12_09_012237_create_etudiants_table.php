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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 50);
            $table->string('adresse', 100);
            $table->string('phone', 20);
            $table->string('email', 100)->unique();
            $table->date('date_naissance');
            $table->integer('ville_id');
            $table->integer('user_id');
            $table->timestamps();
            
        });
        Schema::table('etudiants', function (Blueprint $table) {
            $table->foreign('ville_id')->references('id')->on('villes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
