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
        Schema::create('stock_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('stock_id')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('qty');
            $table->string('tipe', 255);
            $table->dateTime('tanggal_berlaku');
            $table->timestamps();

            $table->foreign('stock_id')
                ->references('id')
                ->on('stocks')
                ->onDelete('SET NULL');

            $table->foreign('unit_id')
                ->references('id')
                ->on('units')
                ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_transactions');
    }
};
