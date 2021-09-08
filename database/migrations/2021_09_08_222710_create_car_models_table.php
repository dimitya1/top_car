<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_models', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('car_brand_id');

            $table->string('name')->unique();
            $table->year('produced_from')->nullable();
            $table->year('produced_to')->nullable();
            $table->json('gallery')->nullable();

            $table->timestamps();

            $table->foreign('car_brand_id')
                ->references('id')
                ->on('car_brands')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_models');
    }
}
