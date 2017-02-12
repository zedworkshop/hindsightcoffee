<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {
            $table->string('id');
            $table->text('json')->default('');
            $table->string('tweet_text')->default('');
            $table->string('place_id')->default('');
            $table->string('place_name')->default('');
            $table->decimal('latitude', 18, 8)->nullable();
            $table->decimal('longitude', 18, 8)->nullable();
            $table->string('user_id')->default('');
            $table->string('user_screen_name')->default('');
            $table->string('user_avatar_url')->default('');
            $table->boolean('approved');
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
        Schema::dropIfExists('tweets');
    }
}
