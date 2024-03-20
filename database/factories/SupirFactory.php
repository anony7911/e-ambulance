<?php

namespace Database\Factories;

use App\Models\Supir;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SupirFactory extends Factory
{
    protected $model = Supir::class;

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
