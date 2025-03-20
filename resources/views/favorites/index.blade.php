<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Favorites') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                toastr.success('{{ session('success') }}');
            });
        </script>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($favorites->isEmpty())
                        <p class="text-center text-gray-500">Tidak ada buku favorit.</p>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach ($favorites as $buku)
                                <div class="border p-4">
                                    <a href="{{ route('buku.show', $buku->id) }}">
                                        <img src="{{ asset('storage/' . $buku->cover) }}" alt="{{ $buku->judul_buku }}"
                                            class="w-full h-80 object-cover rounded mb-2">
                                    </a>

                                    <form action="{{ route('favorite.toggle', $buku->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="mt-2 bg-red-500 text-white px-2 rounded">
                                            Hapus dari Favorit
                                        </button>
                                    </form>

                                    <h2 class="text-lg font-semibold text-blue-600 mt-2">
                                        <a href="{{ route('buku.show', $buku->id) }}">
                                            {{ $buku->judul_buku }}
                                        </a>
                                    </h2>

                                    <p class="text-sm text-gray-600">{{ $buku->penulis }}</p>
                                    <p class="text-blue-600 font-semibold mt-2">
                                        {{ $buku->category_id ? $buku->category->nama : 'Tidak ada kategori' }}
                                    </p>
                                    <p class="text-blue-600 text-sm mt-2">
                                        {{ $buku->rack_id ? $buku->rack->rack_name : 'Tidak ada rak' }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
