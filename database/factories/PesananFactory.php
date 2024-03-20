<?php

namespace Database\Factories;

use App\Models\Pesanan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PesananFactory extends Factory
{
    protected $model = Pesanan::class;

    public function definition()
    {
        return [
			'pelanggan_id' => $this->faker->name,
			'rumahsakit_id' => $this->faker->name,
			'supir_id' => $this->faker->name,
			'kategori_id' => $this->faker->name,
			'nama_pasien' => $this->faker->name,
			'alamat_jemput' => $this->faker->name,
			'longitude_jemput' => $this->faker->name,
			'latitude_jemput' => $this->faker->name,
			'no_telp' => $this->faker->name,
        ];
    }
}
