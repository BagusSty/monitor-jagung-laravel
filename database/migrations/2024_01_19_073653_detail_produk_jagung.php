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
        Schema::create('produk_masuk', function (Blueprint $table) {
            $table->string('kode_produk_masuk', 30)->primary()->unique();
            $table->string('produk_id',30);
            $table->foreign('produk_id')->references('produk_id')->on('produk');
            $table->string('gaslap_id',30);
            $table->foreign('gaslap_id')->references('gaslap_id')->on('gaslap');
            $table->string('dist_id',30)->nullable();
            $table->foreign('dist_id')->references('dist_id')->on('distributor');
            $table->string('kios_id',30)->nullable();
            $table->foreign('kios_id')->references('kios_id')->on('kios');
            $table->dateTime('expired_produk');
            $table->integer('stok');
            $table->string('satuan',10);
            $table->dateTime('tanggal');
            $table->string('lokasi',200);
            $table->string('posisi', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_produk');
    }
};
