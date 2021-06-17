<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecommandationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommandations', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->date('echeance');
            $table->string('statut');
            $table->unsignedBigInteger('mission_id');
            $table->unsignedBigInteger('auditeur_id');
            //$table->foreignId('mission_id')->references('id')->on('missions')->constrained()->onDelete('cascade')->onUpdate('cascade');
            //$table->foreignId('auditeur_id')->references('id')->on('auditeurs')->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('recommandations');
    }
}
