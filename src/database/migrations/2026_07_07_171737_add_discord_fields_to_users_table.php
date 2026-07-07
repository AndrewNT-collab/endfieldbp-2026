<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('discord_id')->nullable()->unique()->after('id');

            $table->string('discord_username')->nullable();

            $table->string('discord_avatar')->nullable();

            $table->string('display_name')->nullable();

            $table->string('uid')->nullable();

            $table->string('server')->nullable();

            $table->string('tag1')->nullable();

            $table->string('tag2')->nullable();

            $table->string('tag3')->nullable();

            $table->text('bio')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn([
                'discord_id',
                'discord_username',
                'discord_avatar',
                'display_name',
                'uid',
                'server',
                'tag1',
                'tag2',
                'tag3',
                'bio'
            ]);

        });
    }
};
