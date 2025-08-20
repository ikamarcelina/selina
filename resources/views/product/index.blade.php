<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                📦 Data Produk
            </h2>

            {{-- Toggle Dark / Light --}}
            <button id="toggleDarkMode"
                class="w-10 h-10 flex items-center justify-center rounded-full 
                       bg-gray-900 text-white shadow hover:scale-110 transition 
                       focus:outline-none focus:ring-2 focus:ring-offset-2 
                       focus:ring-gray-700 dark:bg-gray-100 dark:text-gray-900 dark:focus:ring-gray-300">
                <span id="toggleIcon" class="text-lg">🌙</span>
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl transition-colors duration-500">
                <div class="p-6 text-gray-900 dark:text-gray-100 transition-colors duration-500">

                    {{-- Tombol Tambah Produk --}}
                    <div class="flex justify-between items-center mb-6">
                        <a href="/product/create">
                            <x-primary-button class="px-5 py-2 text-sm rounded-lg shadow-md hover:scale-105 transition">
                                + Tambah Produk
                            </x-primary-button>
                        </a>
                    </div>

                    {{-- Table --}}
                    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700 shadow-md transition-colors duration-500">
                        <table class="w-full text-sm text-gray-700 dark:text-gray-200 transition-colors duration-500">
                            <thead class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white text-center text-xs uppercase tracking-wider">
                                <tr>
                                    <th class="p-3 w-12">No</th>
                                    <th class="p-3 w-24">Gambar</th>
                                    <th class="p-3 w-40 text-left">Nama Produk</th>
                                    <th class="p-3 w-64 text-left">Deskripsi</th>
                                    <th class="p-3 w-28">Harga</th>
                                    <th class="p-3 w-20">Stok</th>
                                    <th class="p-3 w-32">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                                @foreach ($products as $p)
                                    <tr class="hover:bg-indigo-50 dark:hover:bg-gray-700 hover:shadow-sm transition duration-300">
                                        {{-- No --}}
                                        <td class="p-3 text-center font-semibold">{{ $loop->iteration }}</td>

                                        {{-- Gambar --}}
                                        <td class="p-3 text-center">
                                            @if($p->image)
                                                <img src="{{ asset('storage/' . $p->image) }}"
                                                     alt="Gambar {{ $p->name }}"
                                                     class="h-16 w-16 object-cover rounded-lg shadow-md hover:scale-105 transition">
                                            @else
                                                <span class="text-gray-400 italic">Tidak ada</span>
                                            @endif
                                        </td>        

                                        {{-- Nama Produk --}}
                                        <td class="p-3 font-semibold text-gray-800 dark:text-gray-100">{{ $p->name }}</td>

                                        {{-- Deskripsi (truncate + tombol lihat) --}}
                                        <td class="p-3 text-gray-600 dark:text-gray-300 truncate max-w-xs">
                                            {{ Str::limit($p->description, 50) }}
                                            @if(strlen($p->description) > 50)
                                                <button 
                                                    onclick="openDesc('{{ $p->name }}', `{{ $p->description }}`)" 
                                                    class="ml-1 px-2 py-1 text-xs bg-indigo-100 text-indigo-700 rounded-full hover:bg-indigo-200 transition">
                                                    🔍 Lihat
                                                </button>
                                            @endif
                                        </td>

                                        {{-- Harga --}}
                                        <td class="p-3 text-center">
                                            <span class="px-2 py-1 rounded-lg bg-gradient-to-r from-green-100 to-green-200 text-green-700 font-semibold shadow">
                                                Rp {{ number_format($p->price, 0, ',', '.') }}
                                            </span>
                                        </td>

                                        {{-- Stok --}}
                                        <td class="p-3 text-center">
                                            @if($p->stock > 9)
                                                <span class="px-2 py-1 rounded-full bg-gradient-to-r from-green-100 to-green-200 text-green-700 text-xs font-bold shadow">
                                                    {{ $p->stock }}
                                                </span>
                                            @elseif($p->stock > 0)
                                                <span class="px-2 py-1 rounded-full bg-gradient-to-r from-yellow-100 to-yellow-200 text-yellow-700 text-xs font-bold shadow">
                                                    {{ $p->stock }}
                                                </span>
                                            @else
                                                <span class="px-2 py-1 rounded-full bg-gradient-to-r from-red-100 to-red-200 text-red-700 text-xs font-bold shadow">
                                                    Habis
                                                </span>
                                            @endif
                                        </td>

                                        {{-- Aksi --}}
                                        <td class="p-3 text-center">
                                            <div class="flex justify-center gap-2">
                                                <a href="/product/{{ $p->id }}/edit">
                                                    <x-primary-button class="px-3 py-1 text-xs rounded-md shadow hover:scale-105 transition">
                                                        Edit
                                                    </x-primary-button>
                                                </a>
                                                <form action="/product/{{ $p->id }}" method="POST"
                                                      onsubmit="return confirm('Yakin ingin menghapus produk ini?')"
                                                      class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-danger-button type="submit" class="px-3 py-1 text-xs rounded-md shadow hover:scale-105 transition">
                                                        Hapus
                                                    </x-danger-button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Modal Deskripsi --}}
    <div id="descModal" class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-50 z-50">
        <div id="modalBox" 
             class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200
                    rounded-xl shadow-2xl w-96 max-w-lg p-6 relative transform scale-90 opacity-0 transition duration-300">
            <h2 id="modalTitle" class="text-lg font-bold mb-3"></h2>
            <p id="modalContent" class="text-sm leading-relaxed"></p>
            <button onclick="closeDesc()" class="absolute top-2 right-2 text-gray-500 hover:text-red-500">
                ✖
            </button>
        </div>
    </div>

    <script>
        // --- Modal Deskripsi ---
        function openDesc(name, desc) {
            document.getElementById('modalTitle').innerText = name;
            document.getElementById('modalContent').innerText = desc;
            const modal = document.getElementById('descModal');
            const box = document.getElementById('modalBox');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                box.classList.remove('scale-90', 'opacity-0');
                box.classList.add('scale-100', 'opacity-100');
            }, 10);
        }
        function closeDesc() {
            const modal = document.getElementById('descModal');
            const box = document.getElementById('modalBox');
            box.classList.remove('scale-100', 'opacity-100');
            box.classList.add('scale-90', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 300);
        }

        // --- Dark / Light Mode Toggle ---
        const toggleBtn = document.getElementById('toggleDarkMode');
        const icon = document.getElementById('toggleIcon');

        function updateToggleLabel() {
            const isDark = document.documentElement.classList.contains('dark');
            icon.textContent = isDark ? '☀️' : '🌙'; // ☀️ kalau dark aktif
        }

        toggleBtn.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme',
                document.documentElement.classList.contains('dark') ? 'dark' : 'light'
            );
            updateToggleLabel();
        });

        // Apply saved theme on load + animasi halus
        (function() {
            if (localStorage.getItem('theme') === 'dark') {
                document.documentElement.classList.add('dark');
            }
            updateToggleLabel();
        })();
    </script>
</x-app-layout>
