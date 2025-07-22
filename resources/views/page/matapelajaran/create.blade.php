<x-app-layout>
    <div class="max-w-2xl mx-auto py-10">
        <h2 class="text-xl font-bold mb-4">Tambah Mata Pelajaran</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('matapelajaran.store') }}">
            @csrf

            <div class="mb-4">
                <label for="nama_matapelajaran" class="block text-sm font-medium text-gray-700">Nama Mata
                    Pelajaran</label>
                <input type="text" name="nama_matapelajaran" id="matapelajaran"
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm" value="{{ old('matapelajaran') }}"
                    required>
                @error('matapelajaran')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror

                @error('nama_matapelajaran')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
