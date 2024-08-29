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
        Schema::create('equipements', function (Blueprint $table) {
            $table->id();
            $table->string('nom_equipement');
            $table->string('serialnumber');
            $table->string('productnumber');
            $table->integer('type_equipement_id');
            $table->integer('location_id');
            $table->integer('site_id');
            $table->integer('etat_equipement_id');
            $table->string('feedback');
            $table->string('observation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipements');
    }
};

