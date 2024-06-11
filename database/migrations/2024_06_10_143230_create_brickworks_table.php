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
        Schema::create('brickworks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('thickness_type_id');
            $table->unsignedBigInteger('ratio_type_id');
            // this is material cost
            $table->double('bricks')->nullable();
            $table->double('cements')->nullable();
            $table->double('sands')->nullable();
            $table->double('xmet')->nullable();

            // this is labour cost
            $table->double('masons')->nullable();
            $table->double('workers')->nullable();

            $table->integer('unit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brickworks');
    }
};
