<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_transactions', function (Blueprint $table) {
            $table->bigIncrements('loan_trans_id');
			$table->bigInteger('installment_id')->unsigned()->nullable()->index();
            $table->bigInteger('member_id')->unsigned()->nullable()->index();
			$table->double('loan_principal');
            $table->double('loan_interest');
            $table->double('loan_fee');
            $table->double('loan_insurance');
            $table->double('loan_fine');
			$table->date('date_paid');
			$table->integer('group_id')->length(11)->unsigned()->nullable()->index();
            $table->timestamps();
			//foreign keys
            $table->foreign('installment_id')->references('installment_id')->on('loan_installments')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('loan_transactions');
    }
}
