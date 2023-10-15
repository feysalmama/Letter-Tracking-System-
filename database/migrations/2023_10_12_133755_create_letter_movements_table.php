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
        Schema::create('letter_movements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('letter_id'); // Foreign Key referencing Letter model
            $table->unsignedBigInteger('node_id'); // Foreign Key referencing Node model
            $table->timestamp('movement_date');
            $table->enum('status', ['In Progress', 'Completed', 'Pending', 'Cancelled'])->default('In Progress');
            $table->timestamp('completed_at')->nullable();
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
        Schema::dropIfExists('letter_movements');
    }
};
