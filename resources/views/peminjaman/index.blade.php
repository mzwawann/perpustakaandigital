<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Peminjaman') }}
        </h2>
    </x-slot>

    @if (session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-3 mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="container mx-auto p-4 max-w-7xl px-4 sm:px-6 lg:px-8 py-6">
        <h2 class="text-2xl font-semibold mb-4">Riwayat Peminjaman</h2>

        @if ($peminjaman->isEmpty())
            <p class="text-center text-gray-500">Tidak ada riwayat peminjaman.</p>
        @else
            @foreach ($peminjaman->sortByDesc('tanggal_peminjaman') as $item)
                <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-700 font-semibold">Peminjaman</span>
                            <span class="ml-2 text-gray-700 font-semibold">
                                {{ \Carbon\Carbon::parse($item->tanggal_peminjaman)->format('d M Y') }}
                            </span>

                            @php
                                $statusColors = [
                                    'menunggu konfirmasi' => 'bg-yellow-100 text-yellow-800',
                                    'dipinjam' => 'bg-blue-100 text-blue-800',
                                    'dikembalikan' => 'bg-green-100 text-green-800',
                                ];
                            @endphp

                            <span
                                class="ml-2 px-2 py-1 text-sm rounded-md {{ $statusColors[$item->status] ?? 'bg-gray-200 text-gray-800' }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </div>
                        <span class="text-gray-500 text-sm">ID: {{ $item->id }}</span>
                    </div>

                    <div class="flex flex-col sm:flex-row mt-3">
                        <!-- Cover Buku -->
                        <img src="{{ asset('storage/' . $item->buku->cover) }}" alt="Buku"
                            class="w-full max-w-xs sm:max-w-[200px] h-auto rounded-lg object-cover">

                        <div class="mt-4 sm:mt-0 sm:ml-4 w-full">
                            <!-- Judul Buku -->
                            <h2 class="text-2xl font-semibold text-blue-900">{{ $item->buku->judul_buku }}</h2>

                            <!-- Informasi Buku -->
                            <table class="mt-4 w-full">
                                <tr>
                                    <td class="w-48 pr-4">Tanggal Pengembalian</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_harus_kembali)->format('d M Y') }}</td>
                                </tr>
                                <tr>
                                    <td class="w-48 pr-4">Penulis</td>
                                    <td>{{ $item->buku->penulis }}</td>
                                </tr>
                                <tr>
                                    <td class="w-48 pr-4">Kategori</td>
                                    <td>{{ $item->buku->category->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="w-48 pr-4">Rak</td>
                                    <td>{{ $item->buku->rack->rack_name }}</td>
                                </tr>
                                @if ($item->status === 'dikembalikan' || $item->status === 'dipinjam')
                                    <tr>
                                        <td class="w-48 pr-4">Denda</td>
                                        <td class="text-red-600 font-semibold">Rp
                                            {{ number_format($item->denda, 0, ',', '.') }}</td>
                                    </tr>
                                @endif
                            </table>

                            <!-- Tombol Review -->
                            @if ($item->status === 'dikembalikan')
                                <a href="{{ route('reviews.create', $item->buku->id) }}"
                                    class="bg-blue-500 text-white px-3 py-1 rounded mt-3 inline-block">
                                    Beri Review
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</x-app-layout>
