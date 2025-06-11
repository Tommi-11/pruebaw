<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class ContactForm extends Component
{
    public $nombres, $apellidos, $email, $asunto, $mensaje, $area;
    public $areas = [
        'proyeccion' => 'Proyección Social',
        'egresados' => 'Seguimiento Egresado',
        'extension' => 'Extensión Universitaria',
        'responsabilidad' => 'Responsabilidad Social',
    ];
    public $success = false;

    protected $rules = [
        'nombres' => 'required|string|max:100',
        'apellidos' => 'required|string|max:100',
        'email' => 'required|email',
        'asunto' => 'required|string|max:255',
        'mensaje' => 'required|string',
        'area' => 'required|string',
    ];

    public function submit()
    {
        $this->validate();
        $response = Http::post(route('contacto.enviar'), [
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'email' => $this->email,
            'asunto' => $this->asunto,
            'mensaje' => $this->mensaje,
            'area' => $this->area,
        ]);
        if ($response->json('success')) {
            $this->success = true;
            $this->reset(['nombres', 'apellidos', 'email', 'asunto', 'mensaje', 'area']);
        }
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
