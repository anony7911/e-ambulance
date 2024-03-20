<?php

namespace Database\Factories;

use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PelangganFactory extends Factory
{
    protected $model = Pelanggan::class;

    public function definition()
    {
        return [
			'nama' => $this->faker->name,
			'email' => $this->faker->name,
			'no_telp' => $this->faker->name,
			'user_id' => $this->faker->name,
        ];
    }
}
