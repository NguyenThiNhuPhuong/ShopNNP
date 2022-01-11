<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('ordercode');
            $table->bigInteger('user_id')->unsigned();
            $table->string('fullname');
            $table->string('phone');
            $table->string('email');
            $table->integer('money');
            $table->integer('price_ship');
            $table->bigInteger('province_id');
            $table->bigInteger('district_id');
            $table->bigInteger('ward_id');
            $table->string('address');
            $table->bigInteger('orderstatus_id')->unsigned();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->foreign('province_id')->references('id')->on('province');
            $table->foreign('district_id')->references('id')->on('district');
            $table->foreign('ward_id')->references('id')->on('ward');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('orderstatus_id')->references('id')->on('orderstatus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
