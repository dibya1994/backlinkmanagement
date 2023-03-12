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
        Schema::create('digitalmarketers', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->nullable();
            $table->string('email',100)->unique();
            $table->string('phone',100)->unique();
            $table->string('password');
            $table->string('active_status');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('digitalmarketers');
    }
};
