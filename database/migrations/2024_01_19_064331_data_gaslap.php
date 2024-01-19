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
        Schema::create('gaslap', function (Blueprint $table) {
            $table->string('gaslap_id', 30)->primary()->unique();
            $table->string('user_id',30);
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->string('nip',30);
            $table->string('nama_gaslap',250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gaslap');
    }
};
