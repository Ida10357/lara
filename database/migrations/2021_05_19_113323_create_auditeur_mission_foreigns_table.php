<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditeurMissionForeignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('auditeur_missions', function (Blueprint $table) {
            $table->foreign('mission_id')->references('id')->on('missions')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('auditeur_id')->references('id')->on('auditeurs')->constrained()->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auditeur_mission_foreigns');
    }
}
