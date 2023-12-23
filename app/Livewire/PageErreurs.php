<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layout.app')]
#[Title('Erreur')]

class PageErreurs extends Component
{

    public $erreurs;

    public $user = '';
    public function mount()
    {
        $this->erreurs = session()->get('erreurs');
        if (auth()->check()) {
            $this->user = auth()->user();
        }

    }

    public function render()
    {
        return view('livewire.page-erreurs')->with([
            'erreurs' => $this->erreurs,
            'user' => $this->user
        ]);
    }
}
