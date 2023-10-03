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
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('name');
            $table->string('no_computer')->unique();
            $table->foreignId('room_id')->nullable();
            $table->foreignId('brand_id');
            $table->enum('status',['New' , 'Broken' , 'Repaired'])->default('New');
            $table->date('date');
            $table->softDeletes();
            $table->date('broken_time')->nullable();
            $table->date('repaired_time')->nullable();
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
        Schema::dropIfExists('computers');
    }
};
