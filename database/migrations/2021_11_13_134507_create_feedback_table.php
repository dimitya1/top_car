<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->unsignedBigInteger('handled_by')->nullable();

            $table->text('message');
            $table->string('creator_name');
            $table->string('creator_email')->nullable();
            $table->string('creator_phone_number')->nullable();
            $table->text('comment')->nullable();

            $table->tinyInteger('is_handled')->default(0);

            $table->timestamps();

            $table->foreign('handled_by')->references('id')->on('users');
            $table->foreign('creator_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback');
    }
}
