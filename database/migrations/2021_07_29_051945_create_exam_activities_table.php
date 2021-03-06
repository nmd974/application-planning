<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_activities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('duration');
            $table->integer('order');
            $table->foreignId('exam_id')->constrained()->cascadeOnDelete();
            $table->boolean('archived')->default(false);
            $table->foreignId('activitie_id')->constrained()->nullable();
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
        Schema::dropIfExists('exam_activities');
    }
}
