<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $items = [
            'Buku Tulis','Buku Halus','Buku Gbr',
            'Buku Kotak','Buku SM', 'Buku','Baju Batik',
            'Panda Laki','Panda Perempuan','Kotak TK Laki',
            'Kotak TK Perempuan','OR TK','OR SD','OR SMP',
            'Kemeja Kotak SMP KP Laki','Celana Kotak SMP KP Laki',
            'Kemeja Kotak SMP KP Cewe','Rok Kotak SMP KP Cewe',
            'Kemeja Kotak SMP MW Laki','Kemeja Kotak SMP MW Cewe',
            'Rok Kotak SMP MW Cewe','OR SMA','Kotak SMA Laki',
            'Kotak SMA Cewe','Rok Kotak SMA','Kaos Kaki TK',
            'Kaos Kaki SMP','Kaos Kaki SMA',
        ];
        
        $nama = $this->faker->randomElement($items);

        $hargaBeliSatuan = $this->faker->numberBetween(5000, 20000);

        $hargaJualSatuan = $this->faker->numberBetween($hargaBeliSatuan, $hargaBeliSatuan + 10000);
        
        return [
            'uuid' => Str::uuid(),
            'product_type_id' => ProductType::inRandomOrder()->first()->id,
            'nama' => $nama,
            'harga_beli_satuan' => $hargaBeliSatuan,
            'harga_jual_satuan' => $hargaJualSatuan,
            'tanggal_berlaku' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
