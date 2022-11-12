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
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->double('price')->default(0);
            $table->string('description');
            $table->string('image');
            $table->string("type");
            $table->string("restaurant");
            $table->double("rating");
            $table->string("tags");
            $table->string("options")->nullable();
            $table->string("testimonials")->nullable();
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
        Schema::dropIfExists('meals');
    }
};
