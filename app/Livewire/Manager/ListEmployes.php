<?php

namespace App\Livewire\Manager;

use App\Models\Employes;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layout.app')]
#[Title('Liste des employés')]

class ListEmployes extends Component
{
    public $employes;

    public $user = '';

    public function mount()
    {
        $this->employes = Employes::orderBy('updated_at', 'desc')->get();

        if (auth()->check()) {
            $this->user = auth()->user();
        }
    }

    public function addEmploye(){
        return redirect()->route('ajout');
    }

    public function editEmploye($id){
        return redirect()->route('editEmploye')->with('id',$id);
    }

    public function tousLesRetraits($id){

        return redirect()->route('retrait')->with('idUser',$id);;
    }


    public function render()
    {
        return view('livewire.manager.list-employes',[
            'employes'=> $this->employes,
            'user' => $this->user
        ]);
    }
}
