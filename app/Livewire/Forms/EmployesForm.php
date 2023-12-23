<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class EmployesForm extends Form
{
    //
     //

    use WithFileUploads;

    public $photodeprofil;

    public $photodecni;

     #[Validate('required|min:4')]
     public $nom = '';

     #[Validate('required|min:4')]
     public $prenom = '';

     #[Validate('required|min:4|numeric')]
     public $telephone = '';

     #[Validate('required|min:4|numeric')]
     public $contcturgent = '';

     #[Validate('required|min:4|numeric')]
     public $adresse = '';
}


