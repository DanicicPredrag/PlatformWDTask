<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TimeSpentMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_spent', function (Blueprint $table) {
            $table->increments('time_spent_id');
            $table->integer('activity_id',false, true );
            $table->text('description')->charset('utf8');
            $table->integer('time_spent', false, true );
            $table->timestamps();

            $table->foreign('activity_id')
                ->references('activity_id')->on('activities')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
