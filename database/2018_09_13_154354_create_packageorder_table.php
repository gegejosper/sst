<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packageorders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('packageid');
            $table->string('customerid');
            $table->string('boxid');
            $table->string('branchid');
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
        Schema::dropIfExists('packageorders');
    }
}
