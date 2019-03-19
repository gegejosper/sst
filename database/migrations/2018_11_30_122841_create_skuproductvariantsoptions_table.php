<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkuproductvariantsoptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skuproductvariantsoptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('var_id');
            $table->integer('options_id');
            $table->string('warehousequantity');
            $table->string('varprice');
            $table->integer('prod_id');
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
        Schema::dropIfExists('skuproductvariantsoptions');
    }
}
