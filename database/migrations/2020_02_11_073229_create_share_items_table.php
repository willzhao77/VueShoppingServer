<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShareItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('share_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img');
            $table->string('title');
            $table->bigInteger('category_id');
            $table->string('user_name');
            $table->string('description');
            $table->string('show_imgs');
            $table->bigInteger('clicked')->default('0');
            $table->boolean('is_top')->default(false);
            $table->boolean('is_hot')->default(false);
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
        Schema::dropIfExists('share_items');
    }
}
