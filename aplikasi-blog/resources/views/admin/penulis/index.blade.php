<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Penulis') }}
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
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold">Daftar Penulis</h3>
                    </div>

                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                            <tr>
                                <th class="px-6 py-3">Nama</th>
                                <th class="px-6 py-3">Email</th>
                                <th class="px-6 py-3">Telepon</th>
                                @if(Auth::user()->role === 'admin')
                                <th class="px-6 py-3">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($penulis as $p)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium text-gray-900">{{ $p->nama }}</td>
                                    <td class="px-6 py-4">{{ $p->email ?? '-' }}</td>
                                    <td class="px-6 py-4">{{ $p->telepon ?? '-' }}</td>
                                    @if(Auth::user()->role === 'admin')
                                    <td class="px-6 py-4">
                                        <form action="{{ route('penulis.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center">Belum ada data penulis.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Form Tambah Penulis HANYA untuk Admin --}}
            @if(Auth::user()->role === 'admin')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Tambah Penulis Baru</h3>
                    
                    <form action="{{ route('penulis.store') }}" method="POST" class="space-y-4 max-w-lg">
                        @csrf
                        <div>
                            <x-input-label for="nama" value="Nama Penulis" />
                            <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full" required />
                        </div>
                        <div>
                            <x-input-label for="email" value="Email (Opsional)" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="telepon" value="No. Telepon (Opsional)" />
                            <x-text-input id="telepon" name="telepon" type="text" class="mt-1 block w-full" />
                        </div>
                        <div class="flex items-center gap-4 mt-4">
                            <x-primary-button>Simpan Penulis</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
            @endif

        </div>
    </div>
</x-app-layout>
