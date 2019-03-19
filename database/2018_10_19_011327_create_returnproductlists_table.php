<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnproductlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returnsproductlists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('branchid');
            $table->string('item_id');
            $table->string('rquantity');
            $table->string('note');
            $table->string('returnbatchnum');
            $table->string('status');
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
        Schema::dropIfExists('returnsproductlists');
    }
}
