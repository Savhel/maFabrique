<?php

namespace App\Livewire\Manager;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Employes;
use App\Models\Magasin;
use App\Models\Produits;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;

#[Layout('layout.app')]
#[Title('Fabrication de produits')]
class FabricationProduits extends Component
{

    public $magasins ;

    #[Validate('required|min:1')]
    public $idemployes;

    #[Validate('required|min:1')]
    public $quantite;

    public $nomProduits;

    public $produits;

    public $nomemploye;

    public $employes;

    public $nomproduit;

    public $nommateriau;

    public $composition;

    public $myId;

    public $nombre;

    public $dataComposition;

    public $updateMagasin;

    public $quantiteMinimale;

    public $user = '';

    public function mount()
    {
        $this->magasins = Magasin::orderBy('updated_at', 'desc')->get();

        $this->employes = Employes::orderBy('updated_at', 'desc')->get();

        $this->produits = Produits::orderBy('updated_at', 'desc')->get();
        if (auth()->check()) {
                    $this->user = auth()->user();
                }
        // dd($this->user->nom);

    }

    public function updatedNomproduit($value)
    {
        $this->myId = $value;

        $this->composition = Produits::select('composition')
        ->where('id',$value)->get();

        $this->nomProduits = Produits::select('nom')
        ->where('id',$value)->get();

        //  dd($this->composition);

        $this->nomProduits = $this->nomProduits[0]->nom;


        foreach($this->composition as $value){
            // dd(json_decode($value->composition)[0]->nom);
            $this->nommateriau = json_decode($value->composition)[0]->nom;
            break;
        }
        $this->nommateriau = Magasin::select('nom')
        ->where('id',$this->nommateriau)->get();

        // dd($this->nommateriau[0]->nom);

        $this->nommateriau = $this->nommateriau[0]->nom;
    }

    public function updatedQuantite($value)
    {
        // dd($this->nommateriau);

        $composition = Produits::select('composition')
        ->where('id',$this->myId)->get();

        $quantiteMinimale = Produits::select('minimum')
        ->where('id',$this->myId)->get();

        // dd($quantiteMinimale[0]->minimum);

        $this->quantiteMinimale = $quantiteMinimale[0]->minimum ;

        foreach($composition as $items){
            $quantiteMateriau = json_decode($items->composition)[0]->quantite;
            break;
        }
        if ($value === ''){

            $this->nombre = 0;
        }else{
            $this->nombre = $value * $this->quantiteMinimale / $quantiteMateriau;
        }


    }

    public function ajouterProuduit(){
        $date = Carbon::now()->locale('fr')->isoFormat('dddd D MMMM YYYY');

        $this->composition = Produits::select('composition')
        ->where('id',$this->myId)->get();

        // dd(json_decode($this->composition[0]->composition));

        $this->dataComposition = json_decode($this->composition[0]->composition);



        // $this->validate();

        $fabriquant = [
            'gerant'=> $this->user->prenom.' '.$this->user->nom,
            'idEmploye'=>$this->idemployes,
            'quantite'=>$this->nombre,
            'date'=> $date,
        ];

        $quantite = $this->quantite;

        $quantiteDb = Produits::select('quantite')
        ->where('id',$this->myId)->get();

        $fabriquantDb = Produits::select('fabriquants')
        ->where('id',$this->myId)->get();


        $mydata = json_decode($fabriquantDb[0]->fabriquants);

        // dd(json_decode($fabriquantDb[0]->fabriquants),$fabriquant);

        array_push($mydata, $fabriquant);

        $quantiteDb = $quantiteDb[0]->quantite + $this->nombre ;

        // dd($quantiteDb,$mydata);



        try {
            $this->produits = Produits::find($this->myId);
            $quantiteMinimale = Produits::select('minimum')
                                        ->where('id',$this->myId)->get();

            // dd($quantiteMinimale[0]->minimum);

            $this->quantiteMinimale = $quantiteMinimale[0]->minimum ;

            foreach($this->dataComposition as $compostion){

                $this->updateMagasin = Magasin::find($compostion->nom);

                $quantite = Magasin::select('quantite')
                                        ->where('id',$compostion->nom)->get();

                $quantiteEnleve = $this->nombre * $compostion->quantite / $this->quantiteMinimale ;

                $quantite = $quantite[0]->quantite - $quantiteEnleve ;

                if ($quantite < 0 ){
                    return redirect()->route('erreurs')->with([
                        'erreurs' => 'Le stock est insuffisant pour fabriquer '.$this->nombre.'  '. $this->nomProduits
                    ]);
                }

                // dd($quantiteEnleve);
                $this->updateMagasin->update([
                    'quantite' => $quantite,
                ]);


            }

            $this->produits->update([
                'fabriquants' => $mydata,
                'quantite' => $quantiteDb,
            ]);



            $this->reset();

             return $this->redirect('/produits');

         } catch (ValidationException $e) {

             return redirect()->route('erreurs')->with([
                 'erreurs' => 'Vérifier les données que vous voulez modifier s\'il vous plait'
             ]);

         }

    }

    public function render()
    {

        return view('livewire.manager.fabrication-produits',[
            'produits'=> $this->produits,
            'employes'=> $this->employes,
            'nommateriau'=> $this->nommateriau,
            'nomProduit'=> $this->nomProduits,
            'nombre'=>$this->nombre,
            'user' => $this->user
        ]);
    }
}
