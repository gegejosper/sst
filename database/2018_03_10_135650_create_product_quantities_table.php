<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductQuantitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productquantities', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('prod_id');
            $table->integer('brand_id');
            $table->string('var_name');
            $table->integer('supplier_id');
            $table->integer('branch_id');
            $table->integer('category_id');
            $table->string('price');
            $table->string('saleprice');
            $table->string('priceoption');
            $table->string('description');
            $table->integer('quantity');
            $table->string('lenght')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('color')->nullable();
            $table->string('unit');
            $table->rememberToken();
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
        Schema::dropIfExists('productquantities', function (Blueprint $table) {
            //
        });
    }
}
