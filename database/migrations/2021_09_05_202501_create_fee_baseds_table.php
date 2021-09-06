<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeBasedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_baseds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('adjusted_idr');
            $table->string('adjusted_usd');
            $table->string('fee_idr');
            $table->string('fee_usd');
            $table->integer('category_fee');
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
        Schema::dropIfExists('fee_baseds');
    }
}
