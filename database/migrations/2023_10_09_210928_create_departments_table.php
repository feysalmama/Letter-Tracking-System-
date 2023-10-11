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
              Schema::create('departments', function (Blueprint $table) {
         $table->id();
        $table->string('name');
        $table->string('description');
        $table->timestamps();
    });

    // Schema::table('letter_tracking_system_3', function (Blueprint $table) {
    //     $table->unsignedBigInteger('department_id')->nullable();
    //     $table->foreign('department_id')->references('id')->on('departments');
    // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
};
