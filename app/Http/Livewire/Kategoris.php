<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kategori;

class Kategoris extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nama, $warna;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.kategoris.view', [
            'kategoris' => Kategori::latest()
						->orWhere('nama', 'LIKE', $keyWord)
						->orWhere('warna', 'LIKE', $keyWord)
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
		$this->warna = null;
    }

    public function store()
    {
        $this->validate([
		'nama' => 'required',
		'warna' => 'required',
        ]);

        Kategori::create([ 
			'nama' => $this-> nama,
			'warna' => $this-> warna
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Kategori Successfully created.');
    }

    public function edit($id)
    {
        $record = Kategori::findOrFail($id);
        $this->selected_id = $id; 
		$this->nama = $record-> nama;
		$this->warna = $record-> warna;
    }

    public function update()
    {
        $this->validate([
		'nama' => 'required',
		'warna' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Kategori::find($this->selected_id);
            $record->update([ 
			'nama' => $this-> nama,
			'warna' => $this-> warna
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Kategori Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Kategori::where('id', $id)->delete();
        }
    }
}