<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('car_model_id');

            $table->string('title');
            $table->text('content')->nullable();
            $table->integer('likes')->unsigned()->default(0);
            $table->integer('dislikes')->unsigned()->default(0);
            $table->enum('fuel_type', ['petrol', 'diesel', 'gas', 'electric', 'hybrid', 'other'])->nullable();
            $table->integer('power')->unsigned()->nullable();
            $table->float('engine')->nullable();
            $table->float('consumption_city')->unsigned()->nullable();
            $table->float('consumption_highway')->unsigned()->nullable();
            $table->json('gallery')->nullable();

            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->nullOnDelete();

            $table->foreign('car_model_id')
                ->references('id')
                ->on('car_models')
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
        Schema::dropIfExists('reviews');
    }
}
