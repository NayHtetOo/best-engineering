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
        Schema::create('ready_mixed_concretingworks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('site_id');
            // $table->string('Grade')->nullable();
            // $table->double('rate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ready_mixed_concretingworks');
    }
};
