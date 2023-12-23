<div>
    <div class="flex flex-row justify-center">
        <h1 class="text-3xl font-bold underline text-red-200 text-center  ">
            liste des commandes !
        </h1>
        {{-- @if (auth()->check() and auth()->user()->nom !== 'admin')
            <button type="button" wire:click='nouveauProduit'  class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg  px-5 py-2.5 text-center me-2 mb-2 text-xl">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                  </svg>
            </button>
        @endif
        @if (auth()->check() and auth()->user()->nom !== 'admin')
            <button type="button" wire:click='nouvelleCommande' class="ml-2 text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 21">
                    <path d="M15 14H7.78l-.5-2H16a1 1 0 0 0 .962-.726l.473-1.655A2.968 2.968 0 0 1 16 10a3 3 0 0 1-3-3 3 3 0 0 1-3-3 2.97 2.97 0 0 1 .184-1H4.77L4.175.745A1 1 0 0 0 3.208 0H1a1 1 0 0 0 0 2h1.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 10 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3Zm-8 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm8 0a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                    <path d="M19 3h-2V1a1 1 0 0 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 0 0 2 0V5h2a1 1 0 1 0 0-2Z"/>
                </svg>
            </button>
        @endif --}}



    </div>

    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="relative overflow-x-auto overflow-y-scroll shadow-md sm:rounded-lg mt-10">
        <div class="max-w-full max-h-[500px] ">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nom du client
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Numéro de téléphone
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Commande
                        </th>
                        <th scope="col" class="px-6 py-3">
                            date
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($commandes as $items )

                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <th scope="row" class=" font-semibold px-6 py-4 underline text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $items->nomclient }}
                            </th>
                            <td scope="row" class=" font-semibold px-6 py-4 underline text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $items->telephone}}
                            </td>
                            <td class="px-6 py-4">
                            <!-- Modal toggle -->
                                <button data-modal-target="crud-modal.{{ $items->id }}" data-modal-toggle="crud-modal.{{ $items->id }}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    Voir la commande
                                </button>

                            <!-- Main modal -->
                                <div id="crud-modal.{{ $items->id }}" tabindex="-1" aria-hidden="true" class=" hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                    Commandes
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal.{{ $items->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form class="p-4 md:p-5">
                                                <div class="grid gap-4 mb-4 grid-cols-2">
                                                    <div class="col-span-2 sm:col-span-1">
                                                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Materiaux </label>
                                                        @foreach (json_decode($items->commande) as $values)
                                                            @foreach ($produits as $item )
                                                                @if ($item->id == $values->nom)
                                                                    <input type="text" id="disabled-input" aria-label="disabled input" class="mb-4 text-center bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value=" {{ $item->nom }}" disabled>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </div>
                                                    <div class="col-span-2 sm:col-span-1">
                                                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantité (brouette/sac)</label>
                                                        @foreach (json_decode($items->commande) as $values)
                                                            <input type="text" id="disabled-input" aria-label="disabled input" class="mb-4 text-center bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $values->quantite }}" disabled>

                                                        @endforeach
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </td>
                            <td class="px-6 py-4 text-center text-xl font-semibold">
                                {{ $items->created_at }}
                            </td>

                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>
