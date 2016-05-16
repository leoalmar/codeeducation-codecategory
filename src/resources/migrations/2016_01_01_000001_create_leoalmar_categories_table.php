<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeoalmarCategoriesTable
{

    public function up()
    {
        Schema::create('leoalmar_categories', function(Blueprint $table){
            $table->increments('id');

            $table->integer('parent_id')->nullable()->unsigned();
            $table->foreign('parent_id')->references('id')->on('leoalmar_categories');

            $table->string('name');
            $table->string('slug');
            $table->boolean('active')->default(false);
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('leoalmar_categories');
    }
}