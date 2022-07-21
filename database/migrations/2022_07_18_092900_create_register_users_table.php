<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('qualification_id')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            // $table->integer('pid')->nullable();
            $table->string('refer_code')->nullable();
            $table->string('refer_by')->nullable();

            $table->string('photo', 190)->unique();
            $table->string('fullname');
            $table->string('email', 190);
            $table->string('city');
            $table->text('uaddress');
            $table->date('dob');
            $table->string('gender', 10);
            $table->string('phone');
            $table->string('whatsappno');

            $table->string('password');
            $table->string('otp')->nullable();

            $table->dateTime('created_date')->useCurrent();
            $table->dateTime('last_login_date')->useCurrent();

            $table->boolean('status')->default(true);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('register_users')->onDelete('cascade');
            $table->foreign('qualification_id')->references('id')->on('qualifications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('register_users');
    }
};
