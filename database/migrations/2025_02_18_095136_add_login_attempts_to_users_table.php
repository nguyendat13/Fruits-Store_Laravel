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
        Schema::table('user', function (Blueprint $table) {
            $table->integer('login_attempts')->default(0); // Thêm cột login_attempts
            $table->timestamp('locked_until')->nullable();  // Thêm cột locked_until để lưu thời gian khóa
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn('login_attempts'); // Xóa cột login_attempts
            $table->dropColumn('locked_until');  // Xóa cột locked_until
        });
    }
};
