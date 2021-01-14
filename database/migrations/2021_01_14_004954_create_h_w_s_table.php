<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHWSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_w_s', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->date('due_to')->nullable();
            $table->unsignedInteger('lecture_id');
            $table->String('image')->nullable();
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
        Schema::dropIfExists('h_w_s');
    }
}
