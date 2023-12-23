

<div class="relative p-4 w-full max-w-2xl max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white text-center">
                Nouvelle commande
            </h3>
        </div>
        <!-- Modal body -->

        <form class="max-w-sm mx-auto w-[1200px] max-h-[400px] overflow-x-auto  overflow-y-auto" wire:submit='ajouterProuduit'>
            <div class="flex justify-between mb-5">
                <div class="mb-5 ">
                    <label for="nom" class="block mb-2 mr-4 text-sm font-semibold text-gray-900 dark:text-white">Le nom du client</label>
                    <input type="text" id="nom" wire:model='nom' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="parpaing de 10" required>
                </div>
                <div class="mb-5 ml-4">
                    <label for="telephone" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Téléphone du client</label>
                    <input type="tel" id="telephone" wire:model='telephone'  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                </div>
            </div>
            @foreach ($fields as $index => $field)
                <div class="flex justify-between mb-6">
                    <select id="underline_select" wire:model="fields.{{ $index }}.nom" class="block py-2.5 px-0 w-[200px] text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option selected>Seletionne un produit</option>
                        @foreach ($produits as $item)
                            <option value="{{ $item->id }}">{{ $item->nom }}</option>
                        @endforeach
                    </select>

                    <input type="number" id="quantite" wire:model="fields.{{ $index }}.quantite"  class="w-[100px] shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required >

                    <button wire:click.prevent="removeField({{ $index }})" type="button" class="ml-2 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" >
                        <i class="mdi mdi-window-close"></i>
                    </button>
                </div>
            @endforeach
            <div class="flex justify-between">
                 <button wire:click.prevent="addField" type="button" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Ajouter un champ</button>
                <button type="submit" data-modal-hide="default-modal" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        valider la commande
                    </span>
                </button>
            </div>

        </form>

        <!-- Modal footer -->
        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
            <h5 class="text-white font-bold text-lg"> Soyez prudent parce qu'une fois la commende valider la quantité de produit diminue en stock et c'est compter en caisse</h5>
        </div>
    </div>
</div>

