<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchanges', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->enum('source', \App\Models\Currency::AVAILABLE_CURRENCY_CODES);
            $table->enum('destination', \App\Models\Currency::AVAILABLE_CURRENCY_CODES);
            $table->bigInteger('amount');
            $table->bigInteger('result');
            $table->string('tracking_code', 32);
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
        Schema::dropIfExists('exchanges');
    }
}
