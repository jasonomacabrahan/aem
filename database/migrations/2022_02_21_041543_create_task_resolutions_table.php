<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskResolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_resolutions', function (Blueprint $table) {
            $table->id();
            $table->integer('taskAssignmentID')->default(0);
            $table->string('resolutionDetails')->nullable();
            $table->integer('userID')->default(0);
            $table->integer('verifiedBy')->default(0);
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
        Schema::dropIfExists('task_resolutions');
    }
}
