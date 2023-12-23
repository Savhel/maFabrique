<?php

namespace App\Livewire\Manager;

use App\Models\Commandes;
use App\Models\Produits;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layout.app')]
#[Title('liste de commandes')]

class ListeCommandes extends Component
{

    public $commandes;

    public $user;

    public $produits;

    public function mount()
    {
        $this->commandes = Commandes::orderBy('created_at', 'desc')->get();

        $this->produits = Produits::select('nom', 'id')->get();

        if (auth()->check()) {
            $this->user = auth()->user();
        }
    }
    public function render()
    {
        return view('livewire.manager.liste-commandes',[
            'commandes'=> $this->commandes,
            'user' => $this->user,
            'produits' => $this->produits
        ]);
    }
}
