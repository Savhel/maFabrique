<?php

namespace App\Livewire\Manager;

use App\Livewire\Forms\MagasinForm;
use App\Models\Employes;
use App\Models\Magasin;
use App\Models\Produits;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layout.app')]
#[Title('Eléments au magasin')]

class ListMagazin extends Component
{
    public MagasinForm $form;

    public $nom = '';

    public $quantite = '';

    public $filterColums = 'nom';

    public $date ;

    public $data ;

    public $errors;

    public $magasins;

    public $employes;

    public $produits;

    public $user = '';

    public function mount()
    {
        $this->magasins = Magasin::orderBy('updated_at', 'desc')->get();

        if (auth()->check()) {
            $this->user = auth()->user();
        }
    }


    public function addProduct()
    {

        try {

            $this->validate();

            Magasin::create(
                $this->form->all()
            );

            $this->reset();

            return $this->redirect('/magazin');

        } catch (ValidationException $e) {

            return redirect()->route('erreurs')->with([
                'erreurs' => 'Vérifier les données que vous voulez enregistrer s\'il vous plait'
            ]);

        }
        // return redirect()->back()->withErrors(['Impossible d\'enregistrer.']);

    }

    public function fabricationProduit(){

        return redirect()->route('fabricationProduit');
    }


    public function render()
    {
        return view('livewire.manager.list-magazin',[
            'magasins' => $this->magasins,
            'user' => $this->user
        ]);
    }
}


