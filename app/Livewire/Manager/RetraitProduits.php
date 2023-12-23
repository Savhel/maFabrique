<?php

namespace App\Livewire\Manager;

use App\Models\Employes;
use App\Models\Magasin;
use App\Models\Produits;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;

#[Layout('layout.app')]
#[Title('Retraits des produits')]

class RetraitProduits extends Component
{
    public $id;
    public $nom;

    public $prenom;

    public $fabriquant;
    public $user = '';


    public function mount(){

        $this->id = session()->get('idUser');

        if (!session()->get('idUser') ){
            return redirect()->route('erreurs')->with([
                'erreurs' => "Vous ne pouvez pas actualiser désolé !"
            ]);
        }
        if (auth()->check()) {
                    $this->user = auth()->user();
                }

        // dd($this->id);

        $this->nom = Employes::select('nom')
        ->where('id',$this->id)->get();

        $this->prenom = Employes::select('prenom')
        ->where('id',$this->id)->get();

        $this->fabriquant = Produits::select('fabriquants', 'nom', 'id')->get();

        //dd($this->nom, $this->prenom, $this->fabriquant);


    }
    public function render()
    {
        // $items = $this->fabriquant[0];

        // dd(json_decode($this->fabriquant[0]->fabriquants)[0]->idEmploye);
        return view('livewire.manager.retrait-produits',[
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'fabriquant' => $this->fabriquant,
            'id'=>$this->id,
            'user' => $this->user
        ]);
    }
}
