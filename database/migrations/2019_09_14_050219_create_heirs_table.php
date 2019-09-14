<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heirs', function (Blueprint $table) {
            $table->increments('heir_id');
            $table->string('first_name',30);
            $table->string('middle_name',30)->nullable;
            $table->string('last_name',30);
            $table->enum('gender', ['male','female']);
            $table->enum('relation', ['son','daughter','wife','husband','father','mother','other']);
            $table->date('birthday');
            //$table->integer('user_id')->length(11)->unsigned()->nullable()->index();
            $table->string('phone_no',20);
            $table->string('phone_no_2',20);
            $table->string('email',100);
            $table->string('address',100);
            $table->string('residence',100);
            $table->string('business',100);
            $table->string('profile_picture',20)->nullable();
            $table->integer('member_id')->length(11)->unsigned()->nullable()->index();
            $table->timestamps();
            //foreign keys
            $table->foreign('member_id')->references('member_id')->on('members')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('heirs');
    }
}
