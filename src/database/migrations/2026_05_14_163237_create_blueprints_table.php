<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blueprints', function (Blueprint $table) {
            $table->id();

            $table->foreignId('result_item_id')
                ->constrained('items')
                ->onDelete('cascade');

            $table->foreignId('machine_id')
                ->constrained('machines')
                ->onDelete('cascade');

            $table->integer('craft_time')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blueprints');
    }
};