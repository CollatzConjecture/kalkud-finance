<?php

namespace Database\Factories;

use App\Models\Stock;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StockTransaction>
 */
class StockTransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hargaBeli = $this->faker->numberBetween(5000, 20000);

        $hargaJual = $this->faker->numberBetween($hargaBeli, $hargaBeli + 10000);

        return [
            'uuid' => Str::uuid(),
            'stock_id' => Stock::inRandomOrder()->first()->id,
            'unit_id' => Unit::inRandomOrder()->first()->id,
            'harga_beli' => $hargaBeli,
            'harga_jual' => $hargaJual,
            'qty' => $this->faker->numberBetween(0, 1000),
            'tipe' => $this->faker->randomElement(['Barang Masuk','Barang Keluar']),
            'tanggal_berlaku' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
