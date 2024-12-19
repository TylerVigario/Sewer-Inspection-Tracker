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
        Schema::create('inspection_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pipe_id')->constrained('pipes');
            $table->boolean('downstream');
            $table->boolean('complete');
            $table->string('remarks')->nullable();
            $table->integer('distance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspection_activities');
    }
};
