<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Farmaco
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <form method="POST" action="{{ route('farmacos.update', $farmaco) }}">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="name" value="Nombre del farmaco" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                        :value="old('name', $farmaco->name)" required autofocus autocomplete="name" />
                </div>
                <div>
                    <x-input-label for="barcode" value="Código de barra" />
                    <x-text-input id="barcode" name="barcode" type="text" class="mt-1 block w-full"
                        :value="old('barcode', $farmaco->barcode)" required autocomplete="barcode" />
                    <x-input-error class="mt-2" :messages="$errors->get('barcode')" />
                </div>
                <div>
                    <x-input-label for="laboratory" value="Laboratorio" />
                    <x-text-input id="laboratory" name="laboratory" type="text" class="mt-1 block w-full"
                        :value="old('laboratory', $farmaco->laboratory)" required autocomplete="laboratory" />
                    <x-input-error class="mt-2" :messages="$errors->get('laboratory')" />
                </div>
                <div>
                    <x-input-label for="price_per_box" value="Precio por caja" />
                    <x-text-input id="price_per_box" name="price_per_box" type="text" class="mt-1 block w-full"
                        :value="old('price_per_box', $farmaco->price_per_box)" autocomplete="price_per_box" />
                    <x-input-error class="mt-2" :messages="$errors->get('price_per_box')" />
                </div>

                <div class="text-end">
                    <x-primary-button >
                        Actualizar Farmaco
                    </x-primary-button>
                </div>
            </form>

        </div>
    </div>

</x-app-layout>
