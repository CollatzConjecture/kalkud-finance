<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class StockFactory extends Factory
{
    protected $model = Stock::class;

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
            'product_id' => Product::inRandomOrder()->first()->id,
            'harga_beli' => $hargaBeli,
            'harga_jual' => $hargaJual,
            'qty' => $this->faker->numberBetween(0, 1000),
            'tanggal_berlaku' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
