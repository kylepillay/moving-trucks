<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuoteLineItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_line_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('quote_request_id');
            $table->integer('quantity')->default(0);
            $table->integer('version')->default(0);
            $table->boolean('is_additional')->default(false);
            $table->bigInteger('inventory_id');
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
        Schema::dropIfExists('quote_line_items');
    }
}
