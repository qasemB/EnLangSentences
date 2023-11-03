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
        Schema::create('phrase_sentece', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('phrase_id')->unsigned()->index();
            $table->bigInteger('sentence_id')->unsigned()->index();

            $table->foreign('phrase_id')->references('id')->on('phrases')->onDelete('cascade');
            $table->foreign('sentence_id')->references('id')->on('sentences')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phrase_sentece');
    }
};
