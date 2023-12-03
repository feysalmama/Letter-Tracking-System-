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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., "Route A"
            $table->integer('estimated_waiting_time'); // in minutes
            $table->string('office_name'); // Name of the office or point of interaction
            $table->boolean('in_or_out_office')->default('0'); // 1 for "In" and 0 for "Out"
            $table->string('zone')->nullable(); // Zone or city administration
            $table->string('woreda')->nullable(); // Woreda (if applicable)
            $table->unsignedBigInteger('letter_type_id'); // Foreign key to link with LetterType
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
        Schema::dropIfExists('routes');
    }
};
