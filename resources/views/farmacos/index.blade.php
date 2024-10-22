<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Precios
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="flex justify-end">

                <form class="grow" autocomplete="off">
                    <x-text-input name="search" type="search" class="mt-1 block w-1/3" placeholder="Buscar Farmaco" :value="request('search')"/>
                </form>


                <a href="{{ route('farmacos.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex-none">
                    Crear Farmaco
                </a>
            </div>


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nombre del Farmaco
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Código de Barra
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Laboratorio
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Precio
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($farmacos as $farmaco)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $farmaco->name }}
                                </th>

                                <td class="px-6 py-4">
                                    {{ $farmaco->barcode }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $farmaco->laboratory }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $farmaco->price_per_box }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('farmacos.edit', $farmaco) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>

                                    <form action="{{ route('farmacos.destroy', $farmaco) }}" method="POST"
                                        class="inline-block"
                                        onsubmit=" return confirm('¿Estas seguro de eliminar este Farmaco?')">

                                        @csrf
                                        @method('DELETE')
                                        
                                        <button type="submit"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline">Eliminar</button>


                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div>
                    {{ $farmacos->links() }}
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
