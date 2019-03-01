<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_installments', function (Blueprint $table) {
            $table->bigIncrements('installment_id');
            $table->bigInteger('loan_id')->unsigned()->nullable()->index();
            $table->bigInteger('member_id')->unsigned()->nullable()->index();
            $table->double('installment_principal');
            $table->double('installment_interest');
            $table->date('installment_date');
            $table->integer('group_id')->length(11)->unsigned()->nullable()->index();
            $table->timestamps();
            //foreign keys
            $table->foreign('loan_id')->references('loan_id')->on('loans')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('loan_installments');
    }
}
