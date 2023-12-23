

<div class="relative p-4 w-full max-w-2xl max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white text-center">
                Formulaire de sortie du matériel ( <i class="text-red-500">actualisez la page si vous vous trompez !</i> )
            </h3>
        </div>
        <!-- Modal body -->

        <form class="max-w-sm mx-auto w-[2000px] max-h-[400px] " wire:submit='ajouterProuduit'>
            <div class="flex justify-between">
                <div class="mb-5 ">
                    <select id="underline_select" wire:model="idemployes" class="block py-2.5 px-0 w-[200px] text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option selected>Il s'agit de quel employé ? </option>
                        @foreach ($employes as  $user )
                            <option value="{{$user->id}}"> {{$user->prenom}} {{$user->nom}} </option>

                        @endforeach
                    </select>
                </div>
                <div class="mb-5 ml-4">
                    <select id="underline_select" wire:model.live="nomproduit" class="block py-2.5 px-0 w-[200px] text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option selected>Il veut fabriquer quoi ?</option>

                        @foreach ($produits as  $items )

                            <option value="{{$items->id}}">{{$items->nom}} </option>

                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-5 w-[400px] mx-auto">
                <label for="quantite" class="block text-center mb-2 text-sm text-gray-900 dark:text-white font-semibold">La quantité de {{$nommateriau ?? '...'}} (en brouette /sac) </label>
                <input type="number" id="quantite" wire:model.live='quantite'  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            </div>
            <div class="flex justify-center ">
                <button type="submit" class="inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 group-hover:bg-opacity-0">
                    valider le retrait du materiel
                </button>
            </div>

        </form>

        <!-- Modal footer -->
        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
            <p class="text-red-600">Une fois que vous validez le retrait du matériel nous enregistrons le nombre total de <i class="text-purple-500 underline font-semibold">{{ $nomProduit ?? '...' }}</i>  soit <i class="text-purple-500 underline font-semibold">{{ $nombre ?? '...' }}</i> au magasin comme étant déjà fabriqué ... Courage à vous ! </p>
        </div>
    </div>
</div>

