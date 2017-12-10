<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePopulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('populations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('month');
            $table->date('date')->nullable();;
            $table->string('status');
            $table->string('enrollment');
            $table->string('name');
            $table->string('system');
            $table->string('turn');
            $table->string('semi_day')->nullable();
            $table->string('scholarship')->nullable();
            $table->string('foreign')->nullable();
            $table->string('agreement')->nullable();
            $table->string('average')->nullable();
            $table->string('five_or_more')->nullable();
            $table->string('quarter');
            $table->string('year_income')->nullable();;
            $table->string('year_discharge')->nullable();
            $table->text('observations_of_changes')->nullable();;
            $table->date('modification_date')->nullable();;
            $table->string('low')->nullable();
            $table->date('low_date')->nullable();;
            $table->text('observations_low')->nullable();;
            $table->string('intern_letter')->nullable();
            $table->string('certificate')->nullable();
            $table->string('title')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('populations');
    }
}
