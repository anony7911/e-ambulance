<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pelanggan;

class Pelanggans extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nama, $email, $no_telp, $user_id;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.pelanggans.view', [
            'pelanggans' => Pelanggan::latest()
						->orWhere('nama', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('no_telp', 'LIKE', $keyWord)
						->orWhere('user_id', 'LIKE', $keyWord)
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
		$this->email = null;
		$this->no_telp = null;
		$this->user_id = null;
    }

    public function store()
    {
        $this->validate([
		'nama' => 'required',
		'email' => 'required',
		'no_telp' => 'required',
		'user_id' => 'required',
        ]);

        Pelanggan::create([ 
			'nama' => $this-> nama,
			'email' => $this-> email,
			'no_telp' => $this-> no_telp,
			'user_id' => $this-> user_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Pelanggan Successfully created.');
    }

    public function edit($id)
    {
        $record = Pelanggan::findOrFail($id);
        $this->selected_id = $id; 
		$this->nama = $record-> nama;
		$this->email = $record-> email;
		$this->no_telp = $record-> no_telp;
		$this->user_id = $record-> user_id;
    }

    public function update()
    {
        $this->validate([
		'nama' => 'required',
		'email' => 'required',
		'no_telp' => 'required',
		'user_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Pelanggan::find($this->selected_id);
            $record->update([ 
			'nama' => $this-> nama,
			'email' => $this-> email,
			'no_telp' => $this-> no_telp,
			'user_id' => $this-> user_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Pelanggan Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Pelanggan::where('id', $id)->delete();
        }
    }
}