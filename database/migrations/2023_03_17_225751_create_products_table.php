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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->string('name', 255)->nullable(false);
            $table->string('foto', 255)->nullable(false);
            $table->unsignedInteger('price')->nullable(false);
            $table->unsignedInteger('stock')->nullable(false);
            $table->text('description')->nullable(true);
            $table->date('release_date')->nullable(false);
            $table->string('status', 20)->nullable(false);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
};
