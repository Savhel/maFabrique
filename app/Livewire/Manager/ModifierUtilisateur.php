<?php

namespace App\Livewire\Manager;

use App\Models\Employes;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layout.app')]
#[Title('Modifier un utilisateur')] 
class ModifierUtilisateur extends Component
{

    public $id;
    public $employe;

    #[Validate('required|min:9|unique:employes,telephone')]
    public $telephone = '';

    #[Validate('required|min:9|unique:employes,contacturgent')]
    public $contacturgent = '';

    #[Validate('required|min:9')]
    public $adresse = '';

    public $user = '';

    public function mount()
    {
        if (auth()->check()) {
                    $this->user = auth()->user();
                }
        // Utilisez la variable $id ici pour accéder à l'ID récupéré depuis l'URL
        $this->id = session()->get('id');

        // dd($this->id);

        $this->employe = Employes::find($this->id);

        if (is_null($this->employe)) {
            // abort(404);
            return redirect()->route('erreurs')->with([
                'erreurs' => 'Vous n\'a le droit d\'actualiser la page s\'il vous plait'
            ]);
        }
    }

    public function update()
    {


        try {

            $this->validate();

            $this->employe->update([
                'telephone' => $this->telephone,
                'contacturgent' => $this->contacturgent,
                'adresse' => $this->adresse
            ]);

            $this->reset();

             return $this->redirect('/employes');

         } catch (ValidationException $e) {

             return redirect()->route('erreurs')->with([
                 'erreurs' => 'Vérifier les données que vous voulez modifier s\'il vous plait'
             ]);

         }
    }


    public function render()
    {
        // dd($this->employe);

        return view('livewire.manager.modifier-utilisateur',[
            'employe' => $this->employe,
            'user' => $this->user
        ]);
    }
}
