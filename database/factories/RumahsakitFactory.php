<?php

namespace Database\Factories;

use App\Models\Rumahsakit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RumahsakitFactory extends Factory
{
    protected $model = Rumahsakit::class;

    public function definition()
    {
        return [
			'nama' => $this->faker->name,
			'alamat' => $this->faker->name,
			'no_telp' => $this->faker->name,
			'longitude' => $this->faker->name,
			'latitude' => $this->faker->name,
			'province_id' => $this->faker->name,
			'regency_id' => $this->faker->name,
        ];
    }
}
