<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blueprints', function (Blueprint $table) {
            $table->string('name')->nullable()->after('area_id');
            $table->string('image')->nullable()->after('name');
            $table->text('notes')->nullable()->after('image');
        });
    }

    public function down(): void
    {
        Schema::table('blueprints', function (Blueprint $table) {
            $table->dropColumn(['name', 'image', 'notes']);
        });
    }
};