<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail buku') }}
        </h2>
    </x-slot>
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow mt-12">
        <h2 class="text-2xl font-bold text-blue-800 mb-4">Detail Koleksi Umum</h2>

        <!-- Bagian Atas -->
        <div class="flex flex-col md:flex-row gap-4">
            <!-- Gambar Buku -->
            <div class="w-full md:w-1/3">
                <img src="{{ asset('storage/' . $buku->cover) }}" alt="{{ $buku->judul_buku }}"
                    class="w-full rounded-lg shadow">
            </div>

            <!-- Informasi Buku -->
            <div class="w-full md:w-2/3">
                <p class="text-sm text-green-600 font-semibold">
                    {{ optional($buku->created_at)->format('d M Y') }}
                </p>
                <h3 class="text-xl font-bold text-blue-900 mb-2">{{ $buku->judul_buku }}</h3>
                @auth
                    <button
                        class="btn-favorite px-2 rounded text-white font-semibold
                        {{ Auth::user()->favorites->contains($buku->id) ? 'bg-red-500' : 'bg-green-500' }}"
                        data-id="{{ $buku->id }}">
                        {{ Auth::user()->favorites->contains($buku->id) ? 'Hapus dari Favorit' : 'Tambahkan ke Favorit' }}
                    </button>
                @endauth
            </div>
        </div>

        <!-- Tabel Detail -->
        <div class="mt-6 mb-6">
            @php $deskripsi = json_decode($buku->description); @endphp
            <p class="text-gray-600 mt-2">{!! $buku->description !!}</p>
            <h3 class="text-lg font-semibold text-gray-800 mb-3 mt-4">Deskripsi Koleksi Umum</h3>
            <div class="border rounded-lg overflow-hidden">
                <table
                    class="w-full text-sm text-left border-collapse capitalize mb-12>
                    <tbody>
                        <tr class="border-b">
                    <td class="px-4 py-2 font-semibold bg-gray-100">kategori</td>
                    <td class="px-4 py-2">
                        {{ $buku->category_id ? $buku->category->nama : 'Tidak ada kategori' }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold bg-gray-100">Rak</td>
                        <td class="px-4 py-2">{{ $buku->rack_id ? $buku->rack->rack_name : 'Tidak ada rak' }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold bg-gray-100">penulis</td>
                        <td class="px-4 py-2">{{ $buku->penulis }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold bg-gray-100">penerbit</td>
                        <td class="px-4 py-2">{{ $buku->penerbit }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold bg-gray-100">tahun terbit</td>
                        <td class="px-4 py-2">{{ $buku->tahun_terbit }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @auth
            @if ($buku->stock > 0)
                <div class="flex">
                    <a href="{{ route('bukus.formPeminjaman', $buku->id) }}"
                        class="bg-blue-700 text-white p-2 rounded-md text-center capitalize cursor-pointer hover:bg-blue-600 ml-auto">pinjam
                        buku</a>
                </div>
            @else
                <div class="flex">
                    <button class="bg-gray-400 text-white p-2 rounded-md text-center capitalize cursor-not-allowed ml-auto"
                        disabled>
                        Stok Habis
                    </button>
                </div>
            @endif

        @endauth
    </div>

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

    <div class="p-8 max-w-4xl mx-auto bg-white rounded-lg shadow mt-8">
        <h3 class="text-xl font-semibold mt-2">Review Pengguna</h3>
        <div class="flex items-center mt-4">
            <span class="text-yellow-400 text-lg">★</span>
            <span class="text-lg font-semibold ml-1">{{ $averageRating ?? 0 }}</span>
            <span class="text-gray-600 text-sm ml-1">({{ number_format($totalRatings ?? 0) }} rating)</span>
        </div>


        @foreach ($buku->reviews as $review)
            <div class="mt-4 p-3 border-l-4 rounded">
                <p class="font-bold">{{ $review->user->name ?? 'User Tidak Diketahui' }}</p>
                <div class="flex items-center">
                    @for ($i = 1; $i <= 5; $i++)
                        <span class="{{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-400' }}">★</span>
                    @endfor
                </div>
                <p class="text-gray-700 mt-1">{{ $review->komentar }}</p>
            </div>
        @endforeach
    </div>

</x-app-layout>
