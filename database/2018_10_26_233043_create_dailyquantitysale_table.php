<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyquantitysaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dailyquantitysales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('branchid');
            $table->string('productid');
            $table->string('salequantity');
            $table->string('saledate');
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
        Schema::dropIfExists('dailyquantitysales');
    }
}
