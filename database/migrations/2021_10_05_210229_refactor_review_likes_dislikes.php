<?php

use App\Models\Rating;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RefactorReviewLikesDislikes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn('likes');
            $table->dropColumn('dislikes');
        });

        Schema::create('ratings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('review_id');

            $table->enum('value', Rating::$values);

            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->foreign('review_id')
                ->references('id')
                ->on('reviews')
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
        Schema::table('reviews', function (Blueprint $table) {
            $table->integer('likes')->unsigned()->default(0)->after('content');
            $table->integer('dislikes')->unsigned()->default(0)->after('likes');
        });

        Schema::drop('ratings');
    }
}
