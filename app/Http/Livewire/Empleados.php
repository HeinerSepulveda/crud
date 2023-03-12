<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Empleado;

class Empleados extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $apellidos, $documento, $direccion, $telefono, $foto;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.empleados.view', [
            'empleados' => Empleado::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('apellidos', 'LIKE', $keyWord)
						->orWhere('documento', 'LIKE', $keyWord)
						->orWhere('direccion', 'LIKE', $keyWord)
						->orWhere('telefono', 'LIKE', $keyWord)
						->orWhere('foto', 'LIKE', $keyWord)
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
		$this->nombre = null;
		$this->apellidos = null;
		$this->documento = null;
		$this->direccion = null;
		$this->telefono = null;
		$this->foto = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'apellidos' => 'required',
		'documento' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
		'foto' => 'required',
        ]);

        Empleado::create([ 
			'nombre' => $this-> nombre,
			'apellidos' => $this-> apellidos,
			'documento' => $this-> documento,
			'direccion' => $this-> direccion,
			'telefono' => $this-> telefono,
			'foto' => $this-> foto
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Empleado Successfully created.');
    }

    public function edit($id)
    {
        $record = Empleado::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->apellidos = $record-> apellidos;
		$this->documento = $record-> documento;
		$this->direccion = $record-> direccion;
		$this->telefono = $record-> telefono;
		$this->foto = $record-> foto;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'apellidos' => 'required',
		'documento' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
		'foto' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Empleado::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'apellidos' => $this-> apellidos,
			'documento' => $this-> documento,
			'direccion' => $this-> direccion,
			'telefono' => $this-> telefono,
			'foto' => $this-> foto
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Empleado Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Empleado::where('id', $id);
            $record->delete();
        }
    }
}
