<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee; // Importa el modelo Employee
use Livewire\WithFileUploads; // Para manejar subidas de archivos (si vamos a usar fotos)
use Illuminate\Support\Facades\Storage; // Para guardar archivos

class CreateEmployee extends Component
{
    use WithFileUploads; // Habilitamos la funcionalidad de subida de archivos

    // Propiedades públicas que se conectarán con los campos del formulario
    public $first_name;
    public $last_name;
    public $employee_id_number;
    public $position;
    public $hiring_date;
    public $company_name;
    public $photo; // Para la subida de la foto

    // Reglas de validación para los campos del formulario
    protected $rules = [
        'first_name' => 'required|string|min:2|max:255',
        'last_name' => 'required|string|min:2|max:255',
        'employee_id_number' => 'required|string|unique:employees,employee_id_number', // Único en la tabla 'employees'
        'position' => 'required|string|max:255',
        'hiring_date' => 'required|date',
        'company_name' => 'nullable|string|max:255',
        'photo' => 'nullable|image|max:1024', // Opcional, imagen, máximo 1MB
    ];

    // Mensajes de validación personalizados (opcional, para ser más amigable)
    protected $messages = [
        'first_name.required' => 'El nombre es obligatorio.',
        'last_name.required' => 'El apellido es obligatorio.',
        'employee_id_number.required' => 'El ID de empleado es obligatorio.',
        'employee_id_number.unique' => 'Este ID de empleado ya existe.',
        'position.required' => 'El cargo es obligatorio.',
        'hiring_date.required' => 'La fecha de contratación es obligatoria.',
        'hiring_date.date' => 'La fecha de contratación debe ser una fecha válida.',
        'photo.image' => 'El archivo debe ser una imagen.',
        'photo.max' => 'La imagen no debe superar 1MB.',
    ];

    // Método que se ejecuta cuando se envía el formulario
    public function saveEmployee()
    {
        // Valida los datos según las reglas definidas
        $this->validate();

        $photoPath = null;
        if ($this->photo) {
            // Guarda la foto en el almacenamiento 'public'
            // La subida de archivos de Livewire se encarga de la seguridad.
            $photoPath = $this->photo->store('photos/employees', 'public');
        }

        // Crea un nuevo empleado en la base de datos
        Employee::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'employee_id_number' => $this->employee_id_number,
            'position' => $this->position,
            'hiring_date' => $this->hiring_date,
            'company_name' => $this->company_name,
            'photo_path' => $photoPath, // Guardamos la ruta donde se almacenó la foto
        ]);

        // Limpia los campos del formulario después de guardar
        $this->reset();

        // Muestra un mensaje de éxito (usaremos notificaciones simples por ahora)
        session()->flash('message', 'Empleado creado exitosamente.');

        // Opcional: Redirigir al listado de empleados o a la página de detalle del nuevo empleado
        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.create-employee');
    }
}
