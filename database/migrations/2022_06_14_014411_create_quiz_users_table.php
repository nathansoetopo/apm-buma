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
        Schema::create('quiz_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('quiz_id')->constrained('quizzes')->onUpdate('cascade')->onDelete('cascade');
            $table->float('grade');
            $table->timestamp('start_time')->nullable();
            $table->time('time_remaining')->nullable();
            $table->enum('status', ['Unfinished','Finished', 'Ongoing', 'Late'])->nullable();
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
        Schema::dropIfExists('quiz_users');
    }
};
