<?php

namespace Database\Factories;

use App\Models\ProductType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductType>
 */
class ProductTypeFactory extends Factory
{
    protected $model = ProductType::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $items = ['20 lbr','40 lbr','70 lbr',
            'A3','A4','Kecil','Mandarin',
            'SD','SMP','SMA','Sermon','Jurnal','Tugas SD',
            'SMP KP','Bendera','Nama'
        ];

        // Add numbered items from 'No 03' to 'No 24'
        for ($i = 3; $i <= 24; $i++) {
            $items[] = 'No ' . str_pad($i, 2, '0', STR_PAD_LEFT);
        }

        // Add sizes 'S' to '6XL' and 'Khs', repeat this block as needed
        $sizes = ['SS','S', 'M', 'L', 'XL', '2XL', '3XL', '4XL', '5XL', '6XL', 'Khs'];
        foreach ($sizes as $size) {
            $items[] = $size;
        }

        $numberedRanges = [
            '15 - 16', '17 - 18', '19 - 20', '19 - 20',
            '21 - 22', '23 - 24', '25 - 26', '23 - 24',
            '25 - 26', '23 - 24', '25 - 26'
        ];

        foreach ($numberedRanges as $range) {
            $items[] = $range;
        }

        $nama = $this->faker->randomElement($items);

        return [
            'uuid' => Str::uuid(),
            'nama' => $nama,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
