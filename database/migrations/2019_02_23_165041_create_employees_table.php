<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('employee_id');
            $table->string('first_name',30);
            $table->string('middle_name',30)->nullable;
            $table->string('last_name',30);
            $table->enum('gender', ['male','female']);
            $table->date('birthday');
            $table->integer('user_id')->length(11)->unsigned()->nullable()->index();
            $table->string('phone_no',20);
            $table->string('phone_no_2',20);
            $table->string('email',100);
            $table->string('address',100);
            $table->string('profile_picture',255)->nullable();
            $table->integer('organization_id')->length(11)->unsigned()->nullable()->index();
            $table->timestamps();
            //foreign keys
            $table->foreign('user_id')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('organization_id')->references('organization_id')->on('organizations')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
