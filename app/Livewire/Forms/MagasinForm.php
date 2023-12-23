<?php

namespace App\Livewire\Forms;

use App\Models\Magasin;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;

class MagasinForm extends Form
{
    //
    #[Validate('required|min:5|unique:magasins,nom')]
    public $nom = '';

    #[Validate('required|min:1')]
    public $quantite = '';



    public function rules()
    {
        return [
            'nom' => [
                'required',
                Rule::unique('magasins')->ignore($this->nom, 'nom'),
            ],
            'quantite' => 'required|min:5',
        ];
    }

}
