<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('settlement_id')->index()->default(0)->comment('订单 id');
            $table->string('title')->default('')->comment('商品名称');
            $table->string('pic')->default('')->comment('商品图片');
            $table->string('spec')->default('')->comment('商品规格');
            $table->unsignedInteger('num')->default(0)->comment('购买数量');
            $table->decimal('price')->default(0)->comment('商品单价');
            $table->unsignedInteger('good_id')->default(0)->comment('商品 id');
            $table->unsignedInteger('spec_id')->default(0)->comment('规格 id');
            $table->foreign('settlement_id')
                ->references('id')->on('settlements')
                ->onDelete('cascade');
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
        Schema::dropIfExists('order_details');
    }
}
