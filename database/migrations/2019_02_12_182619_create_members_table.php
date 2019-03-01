<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('member_id');
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
            $table->string('residence',100);
            $table->string('profile_picture',20)->nullable();
            $table->integer('group_id')->length(11)->unsigned()->nullable()->index();
            $table->timestamps();
            //foreign keys
            $table->foreign('user_id')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('members');
    }
}
