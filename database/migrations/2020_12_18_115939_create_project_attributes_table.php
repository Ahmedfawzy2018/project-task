<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreign('project_id')->references('id')->on('project')->onDelete('cascade');
            $table->unsignedBigInteger('project_id');
            $table->string('Attkey') ;
            $table->string('Attval') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_attributes');
    }
}
