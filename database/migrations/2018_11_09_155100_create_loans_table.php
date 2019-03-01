<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('loan_id');
            $table->bigInteger('member_id')->unsigned()->nullable()->index();
            $table->double('loan_principal');
            $table->double('loan_interest');
            $table->double('loan_fee');
            $table->double('loan_insurance');
            $table->integer('loan_duration');
            $table->date('date_issued');
           	$table->integer('group_id')->length(11)->unsigned()->nullable()->index();
            $table->timestamps();
			//foreign keys
            $table->foreign('group_id')->references('group_id')->on('groups')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
