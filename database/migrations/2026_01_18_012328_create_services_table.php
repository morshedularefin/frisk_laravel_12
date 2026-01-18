<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('icon');
            $table->string('photo');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('short_description');
            $table->text('description');
            $table->integer('item_order')->default(0);
            $table->string('home_page_2');
            $table->string('home_page_3');
            $table->string('home_page_5');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
