<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class ProvinceAndCity extends Component
{

    public $provinces;
    public $cities = [];
    public $selectedProvince;

    public function mount()
    {
        // Ambil semua data provinsi
        $this->provinces = Province::all();
    }

    public function updatedSelectedProvince($provinceId)
    {
        // Ambil kota berdasarkan provinsi yang dipilih
        $this->cities = Regency::where('province_id', $provinceId)->get()->toArray();
    }

    public function render()
    {
        return view('livewire.province-and-city');
    }
}
