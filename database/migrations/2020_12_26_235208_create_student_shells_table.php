<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentShellsTable extends Migration
{
    public function up()
    {

        Schema::create('student_shells', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->float('total_score');
            $table->unsignedInteger('lecture_id');
            $table->unique(array('user_id', 'lecture_id'));
            $table->timestamps();
        });
    }
//$table->unique(array('user_id', 'lecture_id'));

    public function down()
    {
        Schema::dropIfExists('student_shells');
    }
}
