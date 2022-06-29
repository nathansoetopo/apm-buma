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
        Schema::create('apm', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->time('sleep_start');
            $table->time('sleep_end');
            $table->string('duration')->nullable();
            $table->float('points')->nullable();
            $table->date('test_date');
            $table->time('test_time');
            $table->enum('status',['N','KKR','KKS','KKB'])->default('KKB');
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
        Schema::dropIfExists('apm');
    }
};
