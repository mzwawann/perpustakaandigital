<x-app-layout>
    <div>
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
    </div>
    <div class="p-8 max-w-4xl mx-auto bg-white rounded-lg shadow mt-8">
        <form action="{{ route('review.store', $buku->id) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-lg font-medium">Beri Rating:</label>
                <div class="flex space-x-2">
                    @for ($i = 1; $i <= 5; $i++)
                        <span class="cursor-pointer text-gray-400 text-3xl" onclick="setRating({{ $i }})"
                            id="star-{{ $i }}">
                            ★
                        </span>
                    @endfor
                </div>
                <input type="hidden" name="rating" id="rating" value="0">
                <p id="rating-error" class="text-red-500 text-sm hidden">Rating wajib diisi!</p>
            </div>

            <div class="mb-4">
                <label class="block text-lg font-medium">Komentar:</label>
                <textarea name="komentar" class="w-full p-2 border rounded" rows="3"></textarea>
            </div>

            <button type="submit" onclick="return validateForm()" class="bg-blue-500 text-white px-4 py-2">Kirim
                Review</button>
            <script>
                function setRating(rating) {
                    document.getElementById('rating').value = rating;

                    // Update warna bintang
                    for (let i = 1; i <= 5; i++) {
                        document.getElementById('star-' + i).classList.toggle('text-yellow-400', i <= rating);
                        document.getElementById('star-' + i).classList.toggle('text-gray-400', i > rating);
                    }

                    // Hilangkan pesan error jika sudah memilih rating
                    document.getElementById('rating-error').classList.add('hidden');
                }

                function validateForm() {
                    let rating = document.getElementById('rating').value;
                    if (rating == 0) {
                        document.getElementById('rating-error').classList.remove('hidden');
                        return false; // Mencegah form dikirim
                    }
                    return true; // Izinkan submit
                }
            </script>
        </form>

        <script>
            function setRating(rating) {
                document.getElementById('rating').value = rating;

                // Reset warna bintang
                for (let i = 1; i <= 5; i++) {
                    document.getElementById('star-' + i).classList.remove('text-yellow-400');
                    document.getElementById('star-' + i).classList.add('text-gray-400');
                }

                // Warnai bintang yang dipilih dan sebelumnya
                for (let i = 1; i <= rating; i++) {
                    document.getElementById('star-' + i).classList.remove('text-gray-400');
                    document.getElementById('star-' + i).classList.add('text-yellow-400');
                }
            }
        </script>
    </div>
</x-app-layout>
