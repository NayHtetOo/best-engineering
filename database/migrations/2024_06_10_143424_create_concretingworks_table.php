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
        Schema::create('concretingworks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ratio_type_id');
            $table->unsignedBigInteger('mixed_type_id');

            $table->double('cements')->nullable();
            $table->double('aggregates')->nullable();
            $table->double('sands')->nullable();
            $table->double('fuel')->nullable();


            $table->double('masons')->nullable();
            $table->integer('workers')->nullable();

            $table->double('machine_drivers')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concretingworks');
    }
};
