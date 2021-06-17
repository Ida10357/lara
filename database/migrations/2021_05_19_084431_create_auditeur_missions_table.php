<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditeurMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditeur_missions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('auditeur_id');
            $table->unsignedBigInteger('mission_id');
            //$table->foreignId('auditeur_id')->references('id')->on('auditeurs')->constrained()->onDelete('cascade')->onUpdate('cascade');
            //$table->foreignId('mission_id')->references('id')->on('missions')->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('auditeur_missions');
    }
}
