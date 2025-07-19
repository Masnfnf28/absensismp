<x-app-layout>
    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 border-b pb-2">Edit Mata Pelajaran</h2>

        @if ($errors->any())
            <div class="mb-4 text-sm text-red-600">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('matapelajaran.update', $matapelajaran->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama_matapelajaran" class="block text-sm font-medium text-gray-700">Nama Mata Pelajaran</label>
                <input type="text" name="nama_matapelajaran" id="nama_matapelajaran"
                    value="{{ old('nama_matapelajaran', $matapelajaran->nama_matapelajaran) }}"
                    class="mt-1 block w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm"
                    required>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('matapelajaran.index') }}"
                    class="inline-flex items-center px-4 py-2 mr-3 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-orange-500 rounded-md hover:bg-orange-600">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
