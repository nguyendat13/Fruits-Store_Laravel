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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('password', 255);
            $table->string('fullname', 15)->default('');  // Hoặc một giá trị mặc định khác
            $table->string('gender', 1000)->default('male'); // Cung cấp giá trị mặc định
            $table->string('thumbnail', 1000)->default('default-thumbnail.jpg');  // Giá trị mặc định cho thumbnail
            $table->string('email', 1000)->nullable();
            $table->timestamp('email_verified_at')->nullable();  // Thêm cột email_verified_at
            $table->string('phone', 1000)->nullable();  // Cho phép phone có giá trị NULL
            $table->string('address', 1000)->nullable();
            $table->enum('roles', ['admin', 'customer'])->default('customer');
            $table->unsignedInteger('created_by')->default(1);  // Giá trị mặc định cho created_by
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('status')->default(2);  // Giá trị mặc định cho status
            $table->softDeletes();  // Sử dụng softDeletes() thay vì softDeletes('delete_at')
            $table->timestamps();
            $table->rememberToken();  // Thêm cột remember_token

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
