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
        Schema::create('nodes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the node or office
            $table->string('office_name'); // Office name
            $table->boolean('in_or_out_office'); // 1 for "In" and 0 for "Out"
            $table->string('zone'); // Zone or city administration
            $table->string('woreda'); // Woreda (if applicable)
            $table->unsignedBigInteger('route_id'); // Foreign key to link with Route
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
        Schema::dropIfExists('nodes');
    }
};
