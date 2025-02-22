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
        Schema::create('user', function(Blueprint $table) {
            $table->id();
            $table->string('username', 99)->unique();
            $table->string('password', 99);
            $table->timestampsTz();
            $table->rememberToken();
        });

        Schema::create('note', function(Blueprint $table) {
            $table->id();
            $table->string('title', 99)->unique();
            $table->longText('content');
            $table->enum('color', ['YELLOW', 'TURQOISE', 'SALMON', 'GREEN']);
            $table->foreignId('user_id')->constrained('user');
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
        Schema::dropIfExists('note');
    }
};
