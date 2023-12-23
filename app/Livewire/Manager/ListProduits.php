<?php

namespace App\Livewire\Manager;

use App\Models\Magasin;
use App\Models\Produits;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layout.app')]
#[Title('Liste des produits')]
class ListProduits extends Component
{

    public $fields = [];

    public $produits;

    public $magasin;

    public $user = '';

    public function mount()
    {
        $this->produits = Produits::all();

        $this->magasin = Magasin::select('nom', 'id')->get();

        // dd($this->magasin);
        if (auth()->check()) {
            $this->user = auth()->user();
        }
    }

    public function addField()
    {
        $this->fields[] = '';
    }

    public function nouvelleCommande(){
        return redirect()->route('nouvelleCommande');
    }

    public function nouveauProduit(){
        return redirect()->route('formumlaireDynamique');
    }

    public function render()
    {
        // dd($this->produits);
        return view('livewire.manager.list-produits',[
            'produits' => $this->produits,
            'magasin' => $this->magasin,
            'user' => $this->user
        ]);
    }
}
