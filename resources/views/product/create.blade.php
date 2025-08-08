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

                    <form action="{{ route('product.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-gray-700">Nama Produk</label>
                            <input type="text" name="name" class="w-full rounded border-gray-300" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Stok</label>
                            <input type="number" name="stock" class="w-full rounded border-gray-300" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Harga</label>
                            <input type="number" name="price" class="w-full rounded border-gray-300" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Kode Barcode</label>
                            <input type="text" name="barcode" class="w-full rounded border-gray-300" required>
                        </div>

                        <x-primary-button>Simpan</x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

