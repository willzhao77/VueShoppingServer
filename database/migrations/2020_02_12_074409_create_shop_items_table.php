<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img');
            $table->string('title');
            $table->decimal('market_price', 8, 2);
            $table->decimal('sell_price', 8, 2);
            $table->integer('stock_quantity');
            $table->string('goods_no');
            $table->string('show_imgs');
            $table->longText('content');
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
        Schema::dropIfExists('shop_items');
    }
}
