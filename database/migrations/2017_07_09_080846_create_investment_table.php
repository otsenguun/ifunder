<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('investment', function (Blueprint $table){
            $table->increments('id');
            $table->string('project_name');
            $table->string('project_desc');
            $table->string('project_looking');
            $table->integer('user_id')->unsigned();
            $table->integer('location_id')->unsigned();
            $table->integer('sector_id')->unsigned();
            $table->integer('invest_id')->unsigned();
            $table->integer('capital_id')->unsigned();
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
        //
        Schema::dropIfExists('investment');
    }
}
