<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file_no');
            $table->unsignedBigInteger('insurance_id');
            $table->unsignedBigInteger('adjuster_id');
            $table->unsignedBigInteger('broker_id');
            $table->unsignedBigInteger('incident_id');
            $table->unsignedBigInteger('policy_id');
            $table->string('insured');
            $table->string('risk_location');
            $table->string('currency');
            $table->string('leader');
            $table->date('begin');
            $table->date('end');
            $table->date('dol');
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
        Schema::dropIfExists('case_lists');
    }
}
