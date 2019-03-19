<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealerpackageorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealerspackageorders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('packageid');
            $table->string('dealerid');
            $table->string('boxid');
            $table->string('branchid');
            $table->string('ordernumber');
            $table->string('packageprice');
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
        Schema::dropIfExists('dealerspackageorders');
    }
}
