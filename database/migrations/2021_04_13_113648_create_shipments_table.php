<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_reminiscent_take');
            $table->string('contact_name_take');
            $table->string('add_take');
            $table->integer('phone_take');
            $table->string('name_reminiscent_send');
            $table->string('contact_name_send');
            $table->string('add_send');
            $table->integer('phone_send');
            $table->integer('payment_methods');
            $table->integer('commodities');
            $table->float('quantity');
            $table->float('mass');
            $table->float('long');
            $table->float('wide');
            $table->float('high');
            $table->float('value_goods');
            $table->float('collection_fee');
            $table->float('vehicle');
            $table->date('date');
            $table->time('hours');
            $table->time('minute');
            $table->string('content_goods');
            $table->string('note');
            $table->integer('status');
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
        Schema::dropIfExists('shipments');
    }
}
