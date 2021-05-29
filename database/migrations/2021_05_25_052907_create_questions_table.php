<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->integer('test_id');
            $table->integer('topic_id');
            $table->string('question');
            $table->string('type');
            $table->string('first_choice')->nullable();
            $table->string('second_choice')->nullable();
            $table->string('third_choice')->nullable();
            $table->string('fourth_choice')->nullable();
            $table->boolean('first_answer')->default(false);
            $table->boolean('second_answer')->default(false);
            $table->boolean('third_answer')->default(false);
            $table->boolean('fourth_answer')->default(false);
            $table->integer('marks');
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('questions');
    }
}
