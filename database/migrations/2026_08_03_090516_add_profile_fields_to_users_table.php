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
        Schema::table('users', function (Blueprint $table) {
            // カラムが存在しない場合のみ追加する安全な判定
            if (!Schema::hasColumn('users', 'bio')) {
                $table->string('bio', 500)->nullable()->after('password');
            }
            if (!Schema::hasColumn('users', 'school')) {
                $table->string('school')->nullable();
            }
            if (!Schema::hasColumn('users', 'english_level')) {
                $table->string('english_level')->nullable();
            }
            if (!Schema::hasColumn('users', 'current_area')) {
                $table->string('current_area')->nullable();
            }
            if (!Schema::hasColumn('users', 'age')) {
                $table->integer('age')->nullable();
            }
            if (!Schema::hasColumn('users', 'gender')) {
                $table->string('gender')->nullable();
            }
            if (!Schema::hasColumn('users', 'nationality')) {
                $table->string('nationality')->nullable();
            }
            if (!Schema::hasColumn('users', 'native_lang')) {
                $table->string('native_lang')->nullable();
            }
            if (!Schema::hasColumn('users', 'instagram_username')) {
                $table->string('instagram_username')->nullable();
            }
            if (!Schema::hasColumn('users', 'instagram_visibility')) {
                $table->string('instagram_visibility')->default('always');
            }
            if (!Schema::hasColumn('users', 'avatar_url')) {
                $table->string('avatar_url')->nullable();
            }

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // 追加した可能性があるカラムを安全に削除
            $columns = [
                'bio', 'school', 'english_level', 'current_area',
                'age', 'gender', 'nationality', 'native_lang',
                'instagram_username', 'instagram_visibility', 'avatar_url'
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('users', $column)) {
                    $table->dropColumn($column);
                }
            }

        });
    }
};
