<?php

namespace App\Livewire;

use Livewire\Component;

class DonneesProduits extends Component
{
    public $user = '';

    public function mount()
    {
        if (auth()->check()) {
            $this->user = auth()->user();
        }
    }
    public function render()
    {
        return view('livewire.donnees-produits',[
            'user' => $this->user
        ]);
    }
}
