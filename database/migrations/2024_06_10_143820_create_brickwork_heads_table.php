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
        Schema::create('brickwork_heads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('site_id');
            $table->unsignedBigInteger('thickness_type_id');
            $table->unsignedBigInteger('ratio_type_id');

            $table->double('length')->nullable();
            $table->double('width')->nullable();
            $table->double('height')->nullable();
            $table->double('qty')->nullable();
            // material costs
            $table->double('bricks')->nullable();
            $table->double('cements')->nullable();
            $table->double('sands')->nullable();
            $table->double('xmet')->nullable();
            // labour costs
            $table->double('masons')->nullable();
            $table->double('workers')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brickwork_heads');
    }
};
