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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained();
            $table->text('name')->unique();
            $table->timestamp('due');
            $table->double('lat');
            $table->double('lng');
            $table->timestamps();
        });

        Schema::create('project_assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained();
            $table->foreignId('asset_id')->constrained();
            $table->timestamps();
        });

        Schema::create('project_pipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained();
            $table->foreignId('pipe_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_assets');
        Schema::dropIfExists('project_pipes');
        Schema::dropIfExists('projects');
    }
};
