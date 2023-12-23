<?php

namespace App\Livewire;

use App\Livewire\Forms\LoginForm;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;
use Illuminate\Support\Facades\Hash;

#[Layout('layout.donnees')]
#[Title('Authentification')]
class WelcomePage extends Component
{

    #[Validate('required|min:3')]
    public $nom = '';

    #[Validate('required')]
    public $password = '';

    public $user;

       /**
     * Handle an authentication attempt.
     */
    public function login()
    {



        // $password = 'admin';
        // $hashedPassword = Hash::make($password);

        // dd($hashedPassword);

        $test = User::find(1);

        // dd((Hash::check('admin', $test->password)));

        $this->validate();


        if (Auth::attempt(['nom' => $this->nom, 'password' => $this->password, 'is_active' => 1])) {
            session()->regenerate();

            return redirect()->intended('produits');
        }

        return redirect()->route('login')->with('error', 'Identifiants incorrects');
    }

    public function render()
    {
        return view('livewire.welcome-page');
    }
}
