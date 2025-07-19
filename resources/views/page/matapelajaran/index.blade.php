<x-app-layout>
    <div class="max-w-5xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">📚 Data Mata Pelajaran</h2>

        @if(session('success'))
            <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 border border-green-300 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('matapelajaran.create') }}"
               class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded shadow">
                + Tambah Mapel
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border border-gray-200 shadow-sm rounded-lg overflow-hidden">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Nama Mapel</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $i => $matapelajaran)
                        <tr class="{{ $i % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                            <td class="px-4 py-2 border">{{ $i + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $matapelajaran->nama_matapelajaran }}</td>
                            <td class="px-4 py-2 border space-x-2">
                                <a href="{{ route('matapelajaran.edit', $matapelajaran->id) }}"
                                   class="text-blue-600 hover:underline">Edit</a>

                                <form action="{{ route('matapelajaran.destroy', $matapelajaran->id) }}"
                                      method="POST" class="inline"
                                      onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if($data->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center text-gray-500 py-4">Belum ada data mata pelajaran.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
