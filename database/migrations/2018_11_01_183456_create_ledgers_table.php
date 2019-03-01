<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->increments('ledger_id');
			$table->string('ledger_name',30);
			$table->enum('interest', ['yes','no']);
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
        Schema::dropIfExists('ledgers');
    }
}
