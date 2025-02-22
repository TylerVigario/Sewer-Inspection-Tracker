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
        Schema::create('pipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('upstream_asset_id')->constrained('assets');
            $table->foreignId('downstream_asset_id')->constrained('assets');
            $table->integer('size')->nullable();
            $table->integer('length')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pipes');
    }
};
