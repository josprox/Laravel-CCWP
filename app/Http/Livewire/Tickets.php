<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Ticket;

class Tickets extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Usuario, $Nombre, $num_control, $Motivo, $Mensaje;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.tickets.view', [
            'tickets' => Ticket::latest()
						->orWhere('Usuario', 'LIKE', $keyWord)
						->orWhere('Nombre', 'LIKE', $keyWord)
						->orWhere('num_control', 'LIKE', $keyWord)
						->orWhere('Motivo', 'LIKE', $keyWord)
						->orWhere('Mensaje', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->Usuario = null;
		$this->Nombre = null;
		$this->num_control = null;
		$this->Motivo = null;
		$this->Mensaje = null;
    }

    public function store()
    {
        $this->validate([
		'Usuario' => 'required',
		'Nombre' => 'required',
		'num_control' => 'required',
		'Motivo' => 'required',
		'Mensaje' => 'required',
        ]);

        Ticket::create([ 
			'Usuario' => $this-> Usuario,
			'Nombre' => $this-> Nombre,
			'num_control' => $this-> num_control,
			'Motivo' => $this-> Motivo,
			'Mensaje' => $this-> Mensaje
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Ticket Successfully created.');
    }

    public function edit($id)
    {
        $record = Ticket::findOrFail($id);

        $this->selected_id = $id; 
		$this->Usuario = $record-> Usuario;
		$this->Nombre = $record-> Nombre;
		$this->num_control = $record-> num_control;
		$this->Motivo = $record-> Motivo;
		$this->Mensaje = $record-> Mensaje;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'Usuario' => 'required',
		'Nombre' => 'required',
		'num_control' => 'required',
		'Motivo' => 'required',
		'Mensaje' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Ticket::find($this->selected_id);
            $record->update([ 
			'Usuario' => $this-> Usuario,
			'Nombre' => $this-> Nombre,
			'num_control' => $this-> num_control,
			'Motivo' => $this-> Motivo,
			'Mensaje' => $this-> Mensaje
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Ticket Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Ticket::where('id', $id);
            $record->delete();
        }
    }
}
