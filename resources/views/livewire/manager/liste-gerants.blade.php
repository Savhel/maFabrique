<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="flex flex-row justify-between">
        <h1 class="text-3xl font-bold underline text-red-200 text-center  ">
            liste des gérants de la fabrique !
        </h1>
        {{-- <button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal" class="ml-2 text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><i class="mdi mdi-plus"></i></button> --}}
        @if (auth()->check() and auth()->user()->nom == 'admin')
            <button type="button" wire:click='addEmploye' class="ml-2 text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
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
                            Ajouter un gérant de la fabrique
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->



                    <form class="max-w-sm mx-auto mb-4" wire:submit='ajouterGerant'>
                        <div class="mb-5">
                        <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                        <input   type="text" id="nom" wire:model='nom' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Babana" required>
                        </div>
                        <div>
                            @error('nom') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-5">
                            <label for="prenom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prénom</label>
                            <input type="text" id="prenom" wire:model='prenom' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Gildas" required>
                        </div>
                        <div>
                            @error('prenom') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-5">
                            <label for="telephone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Téléphone</label>
                            <input type="tel" id="telephone" wire:model='telephone' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Gildas" required>
                        </div>
                        <div>
                                @error('telephone') <span class="error text-red-500">{{ $message }}</span> @enderror
                            </div>
                        <div class="mb-5">
                            <label for="adresse" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse</label>
                            <input type="text" id="adresse" wire:model='adresse' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Gildas" required>
                        </div>
                        <div>
                            @error('adresse') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-5">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe</label>
                            <input type="password" id="password" wire:model='password' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required>
                        </div>
                        <div>
                            @error('password') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-5">
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmer le mot de passe</label>
                            <input type="password" id="password_confirmation" wire:model='password_confirmation' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                        </div>
                        <div>
                            @error('password_confirmation') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="photodeprofil">Photo de profil</label>
                            <input accept="image/png, image/jpg, image/jpeg" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="photodeprofil_help" id="photodeprofil" wire:model="photodeprofil" type="file">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="photodeprofil_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                            @error('photodeprofil') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="text-white mb-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Créer un compte</button>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="grid h-full  sm:grid-col xs:grid-col xl:grid-col md:grid-cols-2 gap-6 items-center justify-center   mx-auto">
        @forelse ($gerants as $gerant )
            @if ($gerant->nom != 'admin' )
                <div class="w-full  sm:max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                    <div class="flex flex-col items-center pb-10">
                        {{-- <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('storage/' . $gerant->photodeprofil) }}"alt="photo"/> --}}
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$gerant->cni}}</h5>
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$gerant->prenom}} {{$gerant->nom}}</h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Contact : {{$gerant->telephone}}</span>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Adresse : {{$gerant->adresse}}</span>
                        @if ($gerant->is_active == 1)
                            <div class="flex mt-4 md:mt-6">
                                <button wire:click="desactiver({{ $gerant->id }})" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Désactiver</button>
                            </div>
                        @else
                            <div class="flex mt-4 md:mt-6">
                                <button wire:click="activer({{ $gerant->id }})" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Activer</button>
                            </div>
                        @endif

                    </div>
                </div>
            @endif
        @empty
            <div class="w-full  sm:max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                <div class="flex flex-col items-center pb-10">
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Vous n'avez aucun gérant pour le moment</h5>
                </div>
            </div>
        @endforelse
    </div>
</div>
