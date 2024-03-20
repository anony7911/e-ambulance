<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Rumahsakit;

class Rumahsakits extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nama, $alamat, $no_telp, $longitude, $latitude, $province_id, $regency_id;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.rumahsakits.view', [
            'rumahsakits' => Rumahsakit::latest()
						->orWhere('nama', 'LIKE', $keyWord)
						->orWhere('alamat', 'LIKE', $keyWord)
						->orWhere('no_telp', 'LIKE', $keyWord)
						->orWhere('longitude', 'LIKE', $keyWord)
						->orWhere('latitude', 'LIKE', $keyWord)
						->orWhere('province_id', 'LIKE', $keyWord)
						->orWhere('regency_id', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nama = null;
		$this->alamat = null;
		$this->no_telp = null;
		$this->longitude = null;
		$this->latitude = null;
		$this->province_id = null;
		$this->regency_id = null;
    }

    public function store()
    {
        $this->validate([
		'nama' => 'required',
		'province_id' => 'required',
		'regency_id' => 'required',
        ]);

        Rumahsakit::create([ 
			'nama' => $this-> nama,
			'alamat' => $this-> alamat,
			'no_telp' => $this-> no_telp,
			'longitude' => $this-> longitude,
			'latitude' => $this-> latitude,
			'province_id' => $this-> province_id,
			'regency_id' => $this-> regency_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Rumahsakit Successfully created.');
    }

    public function edit($id)
    {
        $record = Rumahsakit::findOrFail($id);
        $this->selected_id = $id; 
		$this->nama = $record-> nama;
		$this->alamat = $record-> alamat;
		$this->no_telp = $record-> no_telp;
		$this->longitude = $record-> longitude;
		$this->latitude = $record-> latitude;
		$this->province_id = $record-> province_id;
		$this->regency_id = $record-> regency_id;
    }

    public function update()
    {
        $this->validate([
		'nama' => 'required',
		'province_id' => 'required',
		'regency_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Rumahsakit::find($this->selected_id);
            $record->update([ 
			'nama' => $this-> nama,
			'alamat' => $this-> alamat,
			'no_telp' => $this-> no_telp,
			'longitude' => $this-> longitude,
			'latitude' => $this-> latitude,
			'province_id' => $this-> province_id,
			'regency_id' => $this-> regency_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Rumahsakit Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Rumahsakit::where('id', $id)->delete();
        }
    }
}