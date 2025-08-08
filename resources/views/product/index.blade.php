<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Produk
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table class="w-full text-gray-500">
                        <thead class="bg-gray-50">
                            <tr>
                                <td class="p-2">NO</td>
                                <td class="p-2">NAMA PRODUK</td>
                                <td class="p-2">STOK</td>
                                <td class="p-2">HARGA</td>
                                <td class="p-2">BARCODE</td>
                                <td class="p-2">AKSI</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $p)
                                <tr class="border-b">
                                    <td class="p-2">{{ $loop->iteration }}</td>
                                    <td class="p-2">{{ $p->name }}</td>
                                    <td class="p-2">{{ $p->stock }}</td>
                                    <td class="p-2">{{ $p->price }}</td>
                                    <td class="p-2">{{ $p->barcode }}</td>
                                    <td class="p-2">
                                        <!-- Tombol Aksi Bisa Ditaruh di sini -->
                                        <a href="#" class="text-blue-600 hover:underline">Edit</a> |
                                        <a href="#" class="text-red-600 hover:underline">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
