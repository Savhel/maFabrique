<?php

namespace App\Livewire\Manager;

use App\Models\Commandes;
use App\Models\Produits;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layout.app')]
#[Title('Formulaire de commande')]

class NouvelleCommandes extends Component
{



    public $fields ;

    #[Validate('required|min:5')]
    public $nom ;

    #[Validate('required|min:1')]
    public $telephone ;

    public $produits;

    public $user = '';

    public function mount(){
        $this->produits = Produits::all();
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
        try {

            foreach($formData as $value){

                $produit = Produits::where('id',$value['nom'])->first();

                if($produit['quantite'] < $value['quantite']){
                    throw ValidationException::withMessages([
                        'fields.*.quantite' => 'quantite insuffisante'
                    ]);
                }

                // dd($produit['quantite']);
            }

            foreach($formData as $value){

                $produit = Produits::where('id',$value['nom'])->first();

                Produits::where('id',$value['nom'])->update([
                    'quantite' => $produit['quantite'] - $value['quantite'],
                ]);

                // dd($produit['quantite']);
            }

        // dd($formData,$this->user->nom);


        // dd($this->user->nom);



            $this->validate();
            $data = json_encode([]);

            Commandes::create([
                'nomclient'=>$this->nom,
                'commande'=>$formData,
                'telephone'=>$this->telephone,
                'gerant' => $this->user->nom,

            ]);

            $this->reset();

            // return redirect()->route('produits')

            // ->session()->flash('message', 'Produit ajouter avec success');

            return redirect()->route('listeCommande');

        } catch (ValidationException $e) {

            return redirect()->route('erreurs')->with([
                'erreurs' => 'Vérifier les quantités là s\'il vous plait s\'il vous plait'
            ]);

        }




    }

    public function render()
    {
        return view('livewire.manager.nouvelle-commandes',[
            'produits' => $this->produits,
            'user' => $this->user
        ]);
    }
}
