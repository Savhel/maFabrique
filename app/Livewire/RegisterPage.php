<?php

namespace App\Livewire;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layout.donnees')]
#[Title('Enregistrement')]

class RegisterPage extends Component
{
    use WithFileUploads;

    // #[Validate('required|min:3|unique:users,nom')]
    public $nom = '';

    // #[Validate('required|min:3')]
    public $prenom = '';

    #[Validate('image|max:1024')] // 1MB Max
    public $photodeprofil;

    #[Validate('required|min:3|unique:users,telephone')]
    public $telephone = '';

    // #[Validate('required|min:3')]
    public $password_confirmation = '';

    // #[Validate('required|min:3')]
    public $adresse = '';

    // #[Validate('required|min:3|same:password_confirmation')]
    public $password = '';

    public $user = '';

    public function mount()
    {
        if (auth()->check()) {
            $this->user = auth()->user();
        }
    }


    public function ajouterGerant(): void
    {
        $validated = $this->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'lowercase' , 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string' ],
            'photodeprofil' => ['required', 'image', 'max:1024' ]
        ]);
        if($this->photodeprofil){

            $validated['photodeprofil'] = $this->photodeprofil->store('profils','public');

        }

        if ($this->password == $this->password_confirmation){

            $validated['password'] = Hash::make($validated['password']);

            // dd($validated);

            event(new Registered($user = User::create($validated)));

            //Auth::login($user);

            $this->redirect(route('listeGerant'));
        }else{
            $this->addError('password', 'Les mots de passe ne sont pas identiques');
        }


    }

    public function render()
    {
        return view('livewire.register-page',[
            'user' => $this->user
        ]);
    }
}
