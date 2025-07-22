<x-app-layout>
    <div class="max-w-2xl mx-auto py-10">
        <h2 class="text-2xl font-semibold mb-6">Tambah Mata Pelajaran</h2>

        {{-- Tampilkan Error Validasi --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form method="POST" action="{{ route('matapelajaran.store') }}">
            @csrf
            {{-- Kode Mapel --}}
            <div class="mb-5">
                <label for="kode_mapel" class="block text-sm font-medium text-gray-700 mb-1">
                    Kode Mapel
                </label>
                <input type="text" name="kode_mapel" id="kode_mapel" value="{{ old('kode_mapel') }}"
                    class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring focus:border-blue-500"
                    required>
                @error('kode_mapel')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Nama Mata Pelajaran --}}
            <div class="mb-5">
                <label for="nama_mapel" class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Mata Pelajaran
                </label>
                <input type="text" name="nama_mapel" id="nama_mapel" value="{{ old('nama_mapel') }}"
                    class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring focus:border-blue-500"
                    required>
                @error('nama_mapel')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol Simpan --}}
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded">
                    SImpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
