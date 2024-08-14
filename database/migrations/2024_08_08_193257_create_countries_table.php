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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('country_code');
            $table->string('country_name');
            $table->string('currency_name');
            $table->string('currency_code');
            $table->string('currency_sign');
            $table->string('continent');
            $table->string('call');
            $table->float('value')->default(0);
            $table->dateTime('date')->nullable();
            $table->integer('order')->default(0);
            $table->integer('group')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
