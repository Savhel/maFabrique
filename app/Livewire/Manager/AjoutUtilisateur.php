<?php

namespace App\Livewire\Manager;

use App\Models\Employes;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layout.app')]
#[Title('Ajouter un employé')]

class AjoutUtilisateur extends Component
{

    use WithFileUploads;
    // public EmployesForm $enmploye;

    #[Validate('required|min:5|unique:employes,cni')]
    public $cni = '';


    #[Validate('required|min:2')]
    public $nom = '';

    #[Validate('required|min:2')]
    public $prenom = '';

    #[Validate('required|min:9|unique:employes,telephone')]
    public $telephone = '';

    #[Validate('required|min:9|unique:employes,contacturgent')]
    public $contacturgent = '';

    #[Validate('required|min:4')]
    public $adresse = '';
    public $user = '';

    public function mount()
    {
        if (auth()->check()) {
            $this->user = auth()->user();
        }
    }


    public function ajouterEmploye()
     {

        //dd($this->photodeprofil,$this->nom,$this->prenom,$this->telephone,$this->contacturgent,$this->adresse,$this->photodecni);


         try {

            $validated = $this->validate();

            // if($this->photodeprofil and $this->photodecni){

            //     $validated['photodeprofil'] = $this->photodeprofil->store('profils','public');

            //     $validated['photodecni'] = $this->photodecni->store('cni','public');

            // }

            // dd($validated);


             Employes::create($validated);

             $this->reset();

             return $this->redirect('/employes');

         } catch (ValidationException $e) {

             return redirect()->route('erreurs')->with([
                 'erreurs' => 'Vérifier les données que vous voulez enregistrer s\'il vous plait'
             ]);

         }






         // return redirect()->back()->withErrors(['Impossible d\'enregistrer.']);

     }
    public function render()
    {
        return view('livewire.manager.ajout-utilisateur',[
            'user' => $this->user
        ]);
    }
}
