<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Koleksi buku') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex justify-between">
            <form action="{{ route('bukus.koleksi-buku') }}" method="GET" class="mb-4">
                <input type="text" name="search" placeholder="Cari buku..."
                    class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ request('search') }}">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg ml-2">Cari</button>
            </form>

            <form method="GET" action="{{ route('bukus.koleksi-buku') }}">
                <select name="category" onchange="this.form.submit()"
                    class="w-full md:w-auto border border-gray-300 rounded-lg focus:outline-none 
                       focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition 
                       bg-white dark:border-gray-600">
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->nama }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>

        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($bukus as $buku)
                <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                    <a href="{{ route('buku.show', $buku->id) }}">
                        <img src="{{ asset('storage/' . $buku->cover) }}" alt="{{ $buku->judul_buku }}"
                            class="w-full min-h-[420px] object-cover">
                    </a>
                    <div class="p-4">
                        @auth
                            <button
                                class="btn-favorite px-2 rounded text-white font-semibold
                            {{ Auth::user()->favorites->contains($buku->id) ? 'bg-red-500' : 'bg-green-500' }}"
                                data-id="{{ $buku->id }}">
                                {{ Auth::user()->favorites->contains($buku->id) ? 'Hapus dari Favorit' : 'Tambahkan ke Favorit' }}

                            </button>
                        @endauth

                        {{-- <p class="text-sm text-green-600 font-semibold mt-2">
                                {{ optional($buku->created_at)->format('d M Y') }}
                            </p> --}}

                        <h2 class="text-lg font-semibold text-blue-600 mt-2">
                            <a href="{{ route('buku.show', $buku->id) }}">
                                {{ $buku->judul_buku }}
                            </a>
                        </h2>
                        <p class="text-blue-600 font-semibold mt-2">
                            {{ $buku->category_id ? $buku->category->nama : 'Tidak ada kategori' }}</p>
                        <p class="text-blue-600 text-sm mt-2">
                            {{ $buku->rack_id ? $buku->rack->rack_name : 'Tidak ada rak' }}</p>
                        <p class="text-gray-800 text-sm mt-2"> {{ $buku->penulis }}</p>
                        <div class="flex items-center mt-2">
                            <span class="text-yellow-400 text-lg">★</span>
                            <span class="text-lg font-semibold mr-1">{{ $buku->averageRating ?? 0 }}</span>
                            <span class="text-gray-600 text-sm">({{ number_format($buku->totalRatings ?? 0) }}
                                rating)</span>
                        </div>
                    </div>
                </div>
            @endforeach

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('.btn-favorite').click(function() {
                        let bukuId = $(this).data('id');
                        let button = $(this);

                        $.ajax({
                            url: '/favorite/' + bukuId,
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.status === 'added') {
                                    button.text('Hapus dari Favorit');
                                    button.removeClass('bg-green-500').addClass('bg-red-500');
                                } else {
                                    button.text('Tambahkan ke Favorit');
                                    button.removeClass('bg-red-500').addClass('bg-green-500');
                                }
                            }
                        });
                    });
                });
            </script>
        </div>
        <div class="mt-4">
            {{ $bukus->links('vendor.pagination.tailwind') }}
        </div>
    </div>
    <div class="m-auto text-center">
        @if ($bukus->isEmpty())
            <p class="text-gray-500 mt-4">Buku tidak ditemukan.</p>
        @endif
    </div>
</x-app-layout>
