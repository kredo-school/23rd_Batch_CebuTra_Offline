<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Instagram関連のカラムを追加（NULLを許容）
            $table->string('instagram_username')->nullable()->change(); //after('email');
            $table->string('instagram_visibility')->default('always')->change(); //after('instagram_username');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['instagram_username', 'instagram_visibility']);
        });
    }
};