<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuoteItemDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_item_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quote_item_id');
            $table->string('service_id');
            $table->text('service_detail');
            $table->string('unit_price');
            $table->integer('qty');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->foreign('quote_item_id')->references('id')->on('quote_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quote_item_details');
    }
}
