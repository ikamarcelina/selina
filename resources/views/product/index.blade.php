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

                    {{-- Tombol Tambah Produk --}}
                    <a href="/product/create">
                        <x-primary-button>Tambah Produk</x-primary-button>
                    </a>

                    <table class="w-full text-gray-500 mt-4 border-collapse border border-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="p-2 border">NO</th>
                                <th class="p-2 border">GAMBAR</th>
                                <th class="p-2 border">NAMA PRODUK</th>
                                <th class="p-2 border">DESKRIPSI</th>
                                <th class="p-2 border">HARGA</th>
                                <th class="p-2 border">STOK</th>
                                <th class="p-2 border">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $p)
                                <tr class="border-b">
                                    <td class="p-2 border">{{ $loop->iteration }}</td>
                                    <td class="p-2 border">
                                        @if($p->image)
                                            <img src="{{ asset('storage/' . $p->image) }}"
                                                 alt="Gambar {{ $p->name }}"
                                                 class="h-16 w-16 object-cover rounded">
                                        @endif
                                    </td>        
                                    <td class="p-2 border">{{ $p->name }}</td>
                                    <td class="p-2 border">{{ $p->description }}</td>
                                    <td class="p-2 border">{{ number_format($p->price, 0, ',', '.') }}</td>
                                    <td class="p-2 border">{{ $p->stock }}</td>
                                    <td class="p-2 border flex gap-2">
                                        <a href="/product/{{ $p->id }}/edit">
                                            <x-primary-button>Edit</x-primary-button>
                                        </a>
                                        <form action="/product/{{ $p->id }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button type="submit">
                                                Hapus
                                            </x-danger-button>
                                        </form>    
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
