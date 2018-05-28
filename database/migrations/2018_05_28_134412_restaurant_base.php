<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RestaurantBase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingridients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->timestamps();
        });
		
		Schema::create('foods', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title')->default('');
			$table->text('description');			

			$table->timestamps();
		});
		
		Schema::create('foods_igridients', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('food_id')->unsigned()->default(0);
			$table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
			
			$table->integer('ingridient_id')->unsigned()->default(0);
			$table->foreign('ingridient_id')->references('id')->on('ingridients')->onDelete('cascade');

			$table->string('ingridient_count')->default('');
			
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
    }
}
