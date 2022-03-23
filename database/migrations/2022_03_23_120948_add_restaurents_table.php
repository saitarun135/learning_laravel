<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRestaurentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurents',function(Blueprint $table){
            $table->integer('id');
            $table->string('name',50);
            $table->string('type');
            $table->integer('admin_id')->unsigned();
            $table->integer('rating',5);
            $table->foreign('admin_id')->references('id')->on('user');
            $table->date('created_at');
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
