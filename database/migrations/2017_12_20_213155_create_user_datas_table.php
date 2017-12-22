<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone_format')->nullable()->change;
            $table->string('phone')->nullable()->change;
            $table->timestamps();
        });

        // Userdata - Category BelongsToMany
        Schema::create('categories_userdata', function (Blueprint $table) {
            $table->integer('user_data_id');
            $table->integer('category_id');
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
        Schema::dropIfExists('user_datas');
        Schema::dropIfExists('categories_userdata');
    }
}
