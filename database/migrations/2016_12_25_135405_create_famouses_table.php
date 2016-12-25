<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('famouses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->tinyInteger('gender');
            $table->string('country');
            $table->text('intro');
            $table->string('remark');
            $table->date('birth_date');
            $table->date('death_date');
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
        Schema::drop('famouses');
    }
}
