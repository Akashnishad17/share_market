<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->double('open',12,6);
            $table->double('high',12,6);
            $table->double('low',12,6);
            $table->double('close',12,6);
            $table->double('volume',12,6);
            $table->double('cmp',12,6);
            $table->double('price_change',12,6);
            $table->double('market_capitalization',12,6);
            $table->double('rate_of_investment',12,6);
            $table->double('price_per_earn',12,6);
            $table->double('book',12,6);
            $table->double('enterprise',12,6);
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
        Schema::dropIfExists('stocks');
    }
}
