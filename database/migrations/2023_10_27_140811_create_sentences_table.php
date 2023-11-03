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
        Schema::create('sentences', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("author_id")->unsigned()->index();
            $table->text("sentence");
            $table->string("target_words")->nullable();
            $table->bigInteger("category_id")->unsigned()->index();
            $table->tinyInteger("level")->comment('1 to 6');
            $table->text("description")->nullable();
            $table->boolean("hide_for_others")->default(false);
            $table->boolean("is_active")->default(true);
            $table->integer("like_count");
            $table->integer("dislike_count");
            $table->integer("view_count");
            $table->boolean("in_voting")->default(false);
            $table->integer("to_delete_count")->comment("when in_voting is true");
            $table->integer("not_to_delete_count")->comment("when in_voting is true");
            $table->text("image")->nullable();
            $table->text("video")->nullable();
            $table->text("audio")->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('author_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sentences');
    }
};
