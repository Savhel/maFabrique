<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="flex flex-row justify-center items-center">
        <h1 class="text-3xl font-bold underline text-red-200 text-center  ">
            Nom : {{ $prenom[0]->prenom }} {{ $nom[0]->nom }}
        </h1>

    </div>
    <div class="relative overflow-x-auto overflow-y-scroll shadow-md sm:rounded-lg mt-10">
        <div class="max-w-full max-h-[500px] ">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nom du produit
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantité fabriquée
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Gérants
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jour de fabrication
                        </th>

                    </tr>
                </thead>
                @foreach ($fabriquant as $values )
                    <tbody>
                        @foreach (json_decode($values->fabriquants) as $items )

                            @if ($items->idEmploye == $id)
                                 <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                    <th scope="row" class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                        {{ $values->nom }}
                                    </th>
                                    <td class="px-6 py-4 text-center">
                                        {{ $items->quantite }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        M. {{ $items->gerant }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{ $items->date }}
                                    </td>
                                </tr>
                            @endif

                        @endforeach


                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
