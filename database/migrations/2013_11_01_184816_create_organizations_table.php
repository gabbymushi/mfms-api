<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('organization_id');
			$table->string('organization_name',100);
			//$table->integer('id_no')->length(10)->unsigned();
			$table->string('email_address',30)->unique()->nullable();
			$table->string('postal_address',30)->nullable();
			$table->string('physical_address',30)->nullable();
			$table->string('phone_one',30)->nullable();
			$table->string('phone_two',30)->nullable();
			$table->string('phone_three',30)->nullable();
			$table->integer('region_id')->length(11)->unsigned()->nullable()->index();
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
        Schema::dropIfExists('organizations');
    }
}
