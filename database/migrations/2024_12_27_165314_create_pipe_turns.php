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
        Schema::create('pipe_turns', function (Blueprint $table) {
            $table->id();
            $table->foreignId("pipe_id")->constrained("pipes");
            $table->double("lat");
            $table->double("lng");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pipe_turns');
    }
};
