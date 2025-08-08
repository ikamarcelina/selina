<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit produk
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
            <form method="POST" action="{{ route('product.update', $product->id) }}">
                @csrf
                @method('PUT')
               <div class="mt-2">
                     <x-input-label for="name" :value="__('Nama Produk')" />
                     <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                  <x-primary-button class="mt-2">
                {{ __('Simpan') }}
            </x-primary-button>
            </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
