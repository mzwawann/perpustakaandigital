<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
            {{ __('form peminjaman') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-3 mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('peminjaman.store', $buku->id) }}" method="POST"
        class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg mt-12">
        @csrf

        <div class="flex justify-between items-center mb-2">
            <a href="javascript:void(0);" onclick="window.history.back();" class="hover:underline">&laquo;Kembali</a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-4 overflow-x-auto">
            <table class="min-w-full table-auto border-collapse">
                <tbody>
                    <tr>
                        <td class="p-2 font-semibold text-gray-700">Judul Buku</td>
                        <td>
                            <input type="text" name="judul_buku" id="judul_buku"
                                class="w-full px-4 text-blue-800 py-2 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                value="{{ $buku->judul_buku }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-2 font-semibold text-gray-700">Tanggal Peminjaman</td>
                        <td>
                            <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman"
                                class="w-full px-4 text-blue-800 py-2 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                value="{{ $tanggalHariIni }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-2 font-semibold text-gray-700">Nama Peminjam</td>
                        <td>
                            <input type="text" name="nama_peminjam" id="nama_peminjam"
                                class="w-full px-4 text-blue-800 py-2 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                value="{{ Auth::user()->name }}" readonly>
                        </td>
                    </tr>

                    <tr>
                        <td class="p-2 font-semibold text-gray-700">E-mail</td>
                        <td class="pl-4 text-blue-800 font-medium">{{ Auth::user()->email }}</td>
                    </tr>

                    <tr>
                        <td class="p-2 font-semibold text-gray-700">Kode Buku</td>
                        <td class="pl-4 text-blue-800 font-medium">{{ $buku->id }}</td>
                    </tr>

                    <tr>
                        <td class="p-2 font-semibold text-gray-700">Kategori Buku</td>
                        <td class="pl-4 text-blue-800 font-medium">{{ $buku->category->nama }}</td>
                    </tr>

                    <tr>
                        <td class="p-2 font-semibold text-gray-700">Rak Buku</td>
                        <td class="pl-4 text-blue-800 font-medium">{{ $buku->rack->rack_name }}</td>
                    </tr>

                    <tr>
                        <td class="p-2 font-semibold text-gray-700">Tanggal Pengembalian</td>
                        <td class="p-2">
                            <input type="date" name="tanggal_harus_kembali" id="tanggal_harus_kembali"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                min="{{ date('Y-m-d') }}" required>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>



        <button type="submit"
            class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-200 mt-8">Pinjam
            Buku</button>
    </form>


</x-app-layout>
