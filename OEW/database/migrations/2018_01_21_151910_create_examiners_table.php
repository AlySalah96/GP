<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExaminersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('examiners', function (Blueprint $table) {
            $table->increments('id')->unsigned();;
            $table->string('name');
            $table->string('password');
            $table->string('email');
            $table->string('gender');
           // $table->longblob('image');
            $table->string('phone');
            $table->text('address');
            $table->date('birth_day');
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
        Schema::dropIfExists('examiners');
    }
}
