<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Produk
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nama Produk -->
                        <div class="mt-2">
                            <x-input-label for="name" value="Nama Produk" />
                            <x-text-input id="name" type="text" name="name"
                                class="block mt-1 w-full"
                                value="{{ old('name', $product->name) }}"
                                required />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Stok -->
                        <div class="mt-2">
                            <x-input-label for="stock" value="Stok" />
                            <x-text-input id="stock" type="number" name="stock"
                                class="block mt-1 w-full"
                                value="{{ old('stock', $product->stock) }}"
                                required />
                            <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                        </div>

                        <!-- Harga -->
                        <div class="mt-2">
                            <x-input-label for="price" value="Harga" />
                            <x-text-input id="price" type="number" step="0.01" name="price"
                                class="block mt-1 w-full"
                                value="{{ old('price', $product->price) }}"
                                required />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>
                    
                        <!-- Field Deskripsi -->
                     <div class="mt-4">
                             <x-input-label for="description" :value="__('Deskripsi')" />
                             <textarea id="description" 
                             name="description" 
                               class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                               rows="4">{{ old('description', $product->description ?? '') }}</textarea>
                  <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>


                        <!-- Upload Gambar -->
                        <div class="mt-2">
                            <x-input-label for="image" value="Gambar Produk" />
                            <input id="image" type="file" name="image" accept="image/*"
                                class="block mt-1 w-full">

                            @if ($product->image && Storage::disk('public')->exists($product->image))
                                <div class="mt-2">
                                    <p class="text-sm text-gray-600">Gambar saat ini:</p>
                                    <img src="{{ asset('storage/' . $product->image) }}" 
                                         alt="Gambar Produk" 
                                         class="w-32 h-32 object-cover border rounded">
                                </div>
                            @endif

                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <!-- Tombol Simpan -->
                        <x-primary-button class="mt-4">
                            Simpan
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
