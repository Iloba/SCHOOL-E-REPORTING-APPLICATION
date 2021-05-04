<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            //Foreign Key
            $table->unSignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name');  //Student Name
            $table->string('gender'); //Student Gender
            $table->string('school'); //Student School
            $table->string('passport_photograph'); //Student Passport
            $table->string('class'); //Student Class
            $table->integer('age'); //Student Age
            $table->string('Guardian_name');
            $table->string('Guardian_email'); //Guardian's Email
            $table->text('report')->nullable();
            $table->string('report_file')->nullable();

            
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
        Schema::dropIfExists('students');
    }
}
