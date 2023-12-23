<div>
    <div class="flex flex-row justify-between">
        <h1 class="text-3xl font-bold underline text-red-200 text-center  ">
            liste du matériel stocké !
        </h1>
        @if (auth()->check() and auth()->user()->nom !== 'admin')
            <button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal" class="ml-2 text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                  </svg>
            </button>
        @endif



        <!-- Main modal -->
        <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white text-center">
                            Ajouter un produit au magasin
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->

                    <form class="max-w-sm mx-auto" wire:submit='addProduct'>
                      <div class="mb-5">
                        <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Le nom du matériel</label>

                        <input type="text" id="nom" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="sable sanaga"  wire:model="form.nom" required>

                    </div>
                      <div class="mb-5">
                        <label for="quantite" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">La quantié (en brouettes / sacs )</label>
                        <input type="number" id="quantite" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  wire:model="form.quantite"  required>

                    </div>

                      <button type="submit" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
                            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Ajouter
                            </span>
                       </button>
                    </form>

                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    </div>
                </div>
            </div>
        </div>

    </div>
    @if (auth()->check() and auth()->user()->nom !== 'admin')
        <div class="flex justify-center items-center ">
            <button type="button" wire:click="fabricationProduit" class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                <i class="mdi mdi-plus"></i> Fabriquer un produit
            </button>
        </div>
    @endif
    {{-- Be like water. --}}
    <div class="relative overflow-x-auto overflow-y-scroll shadow-md sm:rounded-lg mt-10">
        <div class="max-w-full max-h-[500px] ">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nom du matériau
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantite en stock
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Derniere livraison
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($magasins as $items )
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                            {{-- <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-10 h-10 rounded-full" src="{{ asset('storage/images/code.png') }}" alt="Image">
                            </th> --}}
                            <td class="px-6 py-4">
                                {{ $items->nom }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $items->quantite }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $items->updated_at }}
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>





