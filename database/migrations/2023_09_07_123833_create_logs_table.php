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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('clients_id');
            $table->unsignedBigInteger('updated_by');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('users_id')
                ->references('id')
                ->on('users');
            $table->foreign('clients_id')
                ->references('id')
                ->on('clients');
            $table->foreign('updated_by')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
