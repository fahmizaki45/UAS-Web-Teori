<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Artikel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold">Daftar Artikel</h3>
                    </div>

                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                            <tr>
                                <th class="px-6 py-3">Judul</th>
                                <th class="px-6 py-3">Penulis</th>
                                <th class="px-6 py-3">Kategori</th>
                                <th class="px-6 py-3">Tanggal</th>
                                @if(Auth::user()->role === 'admin')
                                <th class="px-6 py-3">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($artikel as $a)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium text-gray-900 w-1/3">{{ $a->judul }}</td>
                                    <td class="px-6 py-4">{{ $a->penulis->nama ?? '-' }}</td>
                                    <td class="px-6 py-4">{{ $a->kategori->nama_kategori ?? '-' }}</td>
                                    <td class="px-6 py-4">{{ $a->created_at->format('d M Y') }}</td>
                                    @if(Auth::user()->role === 'admin')
                                    <td class="px-6 py-4 flex gap-2">
                                        <a href="{{ route('publik.detail', $a->id) }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a>
                                        <form action="{{ route('artikel.destroy', $a->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus artikel ini?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center">Belum ada artikel.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Form Tambah Artikel HANYA untuk Admin --}}
            @if(Auth::user()->role === 'admin')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Buat Artikel Baru</h3>
                    
                    <form action="{{ route('artikel.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <x-input-label for="judul" value="Judul Artikel" />
                            <x-text-input id="judul" name="judul" type="text" class="mt-1 block w-full" required />
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="id_penulis" value="Pilih Penulis" />
                                <select name="id_penulis" id="id_penulis" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                    <option value="">-- Pilih Penulis --</option>
                                    @foreach($penulis as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <x-input-label for="id_kategori" value="Pilih Kategori" />
                                <select name="id_kategori" id="id_kategori" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($kategori as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <x-input-label for="isi" value="Isi Artikel" />
                            <textarea id="isi" name="isi" rows="6" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required></textarea>
                        </div>

                        <div class="flex items-center gap-4 mt-4">
                            <x-primary-button>Publikasikan Artikel</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
            @endif

        </div>
    </div>
</x-app-layout>
