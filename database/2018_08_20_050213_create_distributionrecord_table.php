<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributionrecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributionrecords', function (Blueprint $table) {
            $table->increments('id');
            $table->string('distributionnumber');
            $table->string('branchid');
            $table->string('productid');
            $table->string('quantity');
            $table->string('status');
            $table->string('date');
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
        Schema::dropIfExists('distributionrecords');
    }
}
