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
        Schema::create('user_reviews', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->unsignedBigInteger('reviewable_id'); // movie or tv show
        $table->string('reviewable_type'); // "App\Models\Movie" or "App\Models\TvShow"
        $table->tinyInteger('rating'); // 1–5 stars
        $table->enum('status', ['fresh', 'rotten'])->nullable(); // user opinion
        $table->text('body')->nullable(); // optional review text
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_reviews');
    }
};
