<div>
    <form class="max-w-sm mx-auto" wire:submit='ajouterGerant'>
        <div class="mb-5">
            <label for="cni" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numéro de CNI</label>
            <input type="text" id="cni" wire:model='cni' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
        </div>
        <div>
            @error('cni') <span class="error text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="flex flex-row">
            <div class="mb-5">
                <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                <input type="text" id="nom" wire:model='nom' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Babana" required>
            </div>
            <div>
                @error('nom') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-5 ml-4">
                <label for="prenom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prénom</label>
                <input type="text" id="prenom" wire:model='prenom' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Gildas" required>
            </div>
            <div>
                @error('prenom') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="flex flex-row">
            <div class="mb-5">
                <label for="telephone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Téléphone</label>
                <input type="tel" id="telephone" wire:model='telephone' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Gildas" required>
            </div>
            <div>
                    @error('telephone') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
            <div class="mb-5 ml-4">
                <label for="adresse" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse</label>
                <input type="text" id="adresse" wire:model='adresse' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Gildas" required>
            </div>
            <div>
                @error('adresse') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="flex flex-row">
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe</label>
                <input type="password" id="password" wire:model='password' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required>
                </div>
                <div>
                    @error('password') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="mb-5 ml-4">
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmer le mot de passe</label>
                    <input type="password" id="password_confirmation" wire:model='password_confirmation' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                </div>
                <div>
                    @error('password_confirmation') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
        </div>



        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Créer un compte</button>

    </form>

</div>
