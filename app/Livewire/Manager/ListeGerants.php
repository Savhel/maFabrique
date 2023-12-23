<?php

namespace App\Livewire\Manager;

use App\Models\Employes;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;


#[Layout('layout.app')]
#[Title('Liste des gérants')]


class ListeGerants extends Component
{

    use WithFileUploads;

    public $gerants;

    public $user = '';

    public $employe;

    public $employes;


    public function mount()
    {
        $this->gerants = User::orderBy('updated_at', 'desc')->get();

        if (auth()->check()) {
            $this->user = auth()->user();
        }
        // dd($this->gerants);
    }

    public function addEmploye()
    {
        return redirect(route('enregistrer'));
    }

    public function activer($id)
    {
        $this->employe = User::find($id);



        $this->employe->update([
            'is_active' => true,
        ]);
        // dd($this->employe);

        $this->employes = User::select('id')
                                    ->whereNotIn('id', [$id,$this->user->id])->get();
        //

        foreach ($this->employes as $value) {
            $employe = User::find($value);
            // dd($value->id,$employe);
            $employe->update([
                'is_active' => false,
            ]);
        }


        return redirect(route('listeGerant'));
    }

    public function desactiver($id)
    {
        $this->employe = User::find($id);

        $this->employe->update([
            'is_active' => false,
        ]);



        return redirect(route('listeGerant'));
    }



    public function render()
    {
        return view('livewire.manager.liste-gerants',[
            'gerants'=>$this->gerants,
        ]);
    }
}
