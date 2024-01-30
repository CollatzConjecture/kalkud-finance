<?php

namespace Database\Factories;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class UnitFactory extends Factory
{
    protected $model = Unit::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $items = [
            'Kopo','TKI','Ciatuel','Mekar'
        ];

        $sekolah = [
            'TK','SD','SMP','SMA'
        ];

        $nama = $this->faker->randomElement($items);

        $jenis = $this->faker->randomElement($sekolah);

        return [
            'uuid' => Str::uuid(),
            'nama' => $nama,
            'jenis' => $jenis,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
