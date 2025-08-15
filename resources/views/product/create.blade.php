<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Produk
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Nama Produk -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Nama Produk</label>
                            <input type="text" name="name" class="w-full rounded border-gray-300" required>
                        </div>

                        <!-- Stok -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Stok</label>
                            <input type="number" name="stock" class="w-full rounded border-gray-300" required>
                        </div>

                        <!-- Harga -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Harga</label>
                            <input type="number" name="price" class="w-full rounded border-gray-300" required>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Deskripsi</label>
                            <textarea name="description" 
                                      class="w-full rounded border-gray-300" 
                                      rows="4">{{ old('description') }}</textarea>
                        </div>

                        <!-- Gambar Produk -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Gambar Produk</label>
                            <input id="image" type="file" name="image" class="w-full rounded border-gray-300" accept="image/*">
                            @error('image')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                            
                        <x-primary-button>Simpan</x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
