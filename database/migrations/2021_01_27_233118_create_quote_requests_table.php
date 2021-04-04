<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuoteRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('from_address')->nullable();
            $table->string('to_address')->nullable();
            $table->string('requested_date')->nullable();
            $table->string('distance')->nullable();
            $table->string('identifier')->nullable();
            $table->string('collection_address_description')->nullable();
            $table->string('delivery_address_description')->nullable();
            $table->string('timeslot')->nullable();
            $table->boolean('date_is_flexible')->default(false)->nullable();
            $table->boolean('use_form')->default(false)->nullable();
            $table->text('items_list')->nullable();
            $table->boolean('make_additional_stop')->nullable();
            $table->string('additional_stop_address')->nullable();
            $table->string('collection_or_delivery_stop')->nullable();
            $table->boolean('plastic_covers')->default(false)->nullable();
            $table->boolean('bubble_wrap')->default(false)->nullable();
            $table->text('special_instructions')->nullable();
            $table->double('price')->nullable();
            $table->text('terms')->nullable();
            $table->bigInteger('volume')->nullable();
            $table->bigInteger('status_id')->default(1);
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
        Schema::dropIfExists('quote_requests');
    }
}
