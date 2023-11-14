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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->boolean("is_admin")->default(false);
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string("phone")->unique();
            $table->rememberToken();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('national_code')->unique()->nullable();
            $table->string('ip')->nullable();
            $table->timestamp('birth_date')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->text('address')->nullable();
            $table->text('avatar')->nullable();
            $table->string('instagram')->nullable();
            $table->string('telegram')->nullable();
            $table->tinyInteger('news')->default(1);
            $table->boolean('is_active')->default(true);
            $table->tinyInteger('see_all')->default(1)->comment('1=all, 2=just my sentences, 3=just other users sentences');
            $table->integer("editing_score")->default(0);
            $table->integer("adding_score")->default(0);
            $table->integer("practicing_score")->default(0);
            $table->integer("practicing_count")->default(0);
            $table->timestamp("last_practice_at")->nullable();
            $table->integer("practice_days")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
