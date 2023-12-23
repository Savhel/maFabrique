<?php

namespace App\Livewire;

use App\Models\Magasin;
use App\Models\Produits;
use Illuminate\Validation\ValidationException;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layout.app')]
#[Title('Formulaire')]

class FormulaireDynamique extends Component
{

    public $fields ;

    #[Validate('required|min:5|unique:produits,nom')]
    public $nom ;

    #[Validate('required|numeric')]
    public $quantite ;

    #[Validate('required|min:1|numeric')]
    public $quantitemin ;

    public $magasin;

    public $user = '';

    public function mount(){
        $this->magasin = Magasin::all();
        $this->fill([
            'fields'=>collect([['nom'=>'','quantite'=>'']])
        ]);

        if (auth()->check()) {
                    $this->user = auth()->user();
                }
    }

    public function addField()
    {
        $this->fields->push(['nom'=>'','quantite'=>'']);
    }

    public function removeField($index)
    {
        // unset($this->fields[$index]);
        // $this->fields = array_values($this->fields);
        //dd($key);
        $this->fields->pull($index);
    }
    public function ajouterProuduit()
    {
        // Récupérer les données soumises
        $formData = $this->fields;

        // Faire quelque chose avec les données récupérées


        // Réinitialiser le formulaire
        //$this->reset();

        $validated=$this->validate(
            [
            'fields.*.nom'=>'required',
            'fields.*.quantite'=>'required|numeric',

            ],
            [
                'fields.*.nom.required'=>'Il faut un nom',
                'fields.*.quantite.numeric'=>'ça doit être un nombre',
            ]
        );

        //dd($formData,$this->nom,$this->quantite,$this->quantitemin);

        try {

            $this->validate();
            $data = json_encode([]); ;

            Produits::create([
                'nom'=>$this->nom,
                'composition'=>$formData,
                'minimum'=>$this->quantitemin,
                'fabriquants'=>$data,
                'quantite'=>$this->quantite,

            ]);

            $this->reset();

            // return redirect()->route('produits')

            // ->session()->flash('message', 'Produit ajouter avec success');

            return redirect()->route('produits');

        } catch (ValidationException $e) {

            return redirect()->route('erreurs')->with([
                'erreurs' => 'Vérifier les données que vous voulez enregistrer s\'il vous plait'
            ]);

        }




    }

    public function render()
    {
        return view('livewire.formulaire-dynamique', [
            'magasin' =>$this->magasin,
            'user' => $this->user
        ]);
    }
}
