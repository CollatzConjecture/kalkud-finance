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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('product_types_id')->nullable();
            $table->string('nama', 255);
            $table->integer('harga_beli_satuan');
            $table->integer('harga_jual_satuan');
            $table->dateTime('tanggal_berlaku');
            $table->timestamps();

            $table->foreign('product_types_id')
                ->references('id')
                ->on('product_types')
                ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
