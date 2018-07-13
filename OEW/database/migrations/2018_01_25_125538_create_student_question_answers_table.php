<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_question_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('answer')->nullable();
            $table->string('question_type');
            $table->integer('id_question');//->unsigned();
            //$table->foreign('id_question')->references('id')->on('questions');
            $table->integer('student_id')->nullable();;
            $table->integer('exam_id');
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
        Schema::dropIfExists('student_question_answers');
    }
}
