<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_expenses', function (Blueprint $table) {
            $table->id();
            $table->integer('activityID')->default(0);
            $table->integer('fuelLubricants')->default(0);
            $table->integer('travelPerDiem')->default(0);
            $table->integer('foodAccommodation')->default(0);
            $table->integer('miscExpense')->default(0);
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
        Schema::dropIfExists('activity_expenses');
    }
}
