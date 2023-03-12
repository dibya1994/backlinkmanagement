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
        Schema::create('backlinks', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->string('type');
            $table->integer('keyword_id');
            $table->integer('no_backlink_keyword');
            $table->integer('target_url');
            $table->integer('no_backlink_targeturl');
            $table->string('backlink_website');
            $table->integer('no_website_used');
            $table->string('da');
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->string('backlink_url');
            $table->string('status');
            $table->text('instruction');
            $table->string('issues');
            $table->integer('limitation');
            $table->text('uses');
            $table->integer('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backlinks');
    }
};
