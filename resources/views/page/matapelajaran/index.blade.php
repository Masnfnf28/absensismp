<x-app-layout>
    <div class="max-w-5xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">📚 Data Mata Pelajaran</h2>

        {{-- SweetAlert Feedback --}}
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    timer: 2000,
                    showConfirmButton: false
                });
            </script>
        @endif

        {{-- Tombol Tambah --}}
        <div class="mb-4">
            <a href="{{ route('matapelajaran.create') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                Tambah Mapel
            </a>
        </div>

        {{-- Tabel Mata Pelajaran --}}
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
                    @foreach ($data as $i => $item)
                        <tr class="{{ $i % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                            <td class="px-4 py-2 border">{{ $i + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $item->nama_matapelajaran }}</td>
                            <td class="px-4 py-2 border flex space-x-2">
                                {{-- Tombol Edit --}}
                                <button onclick="openModal({{ $item->id }}, '{{ $item->nama_matapelajaran }}')"
                                    class="bg-amber-400 p-2 w-10 h-10 rounded-xl text-white flex items-center justify-center hover:bg-amber-500"
                                    title="Edit">
                                    <i class="fi fi-sr-file-edit"></i>
                                </button>

                                {{-- Tombol Hapus --}}
                                <form id="form-hapus-{{ $item->id }}"
                                    action="{{ route('matapelajaran.destroy', $item->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="konfirmasiHapus({{ $item->id }})"
                                        class="bg-red-400 p-2 w-10 h-10 rounded-xl text-white flex items-center justify-center hover:bg-red-500"
                                        title="Hapus">
                                        <i class="fi fi-sr-delete-document"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($data->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center text-gray-500 py-4">Belum ada data mata pelajaran.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Edit --}}
    <div id="modal-edit" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg w-full max-w-md shadow-lg p-6 relative">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Edit Mata Pelajaran</h2>
            <form id="form-edit" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="edit_nama_matapelajaran" class="block text-sm font-medium text-gray-700">Nama
                        Mapel</label>
                    <input type="text" name="nama_matapelajaran" id="edit_nama_matapelajaran"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        required>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
                    <button type="button" onclick="closeModal()"
                        class="mr-2 px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Batal</button>
                </div>
            </form>
            <button onclick="closeModal()"
                class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-xl">&times;</button>
        </div>
    </div>

    {{-- Script Konfirmasi Hapus --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function konfirmasiHapus(id) {
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Data akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-hapus-' + id).submit();
                }
            });
        }

        function openModal(id, nama) {
            const modal = document.getElementById('modal-edit');
            const form = document.getElementById('form-edit');
            const inputNama = document.getElementById('edit_nama_matapelajaran');

            inputNama.value = nama;
            form.action = `/matapelajaran/${id}`;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal() {
            const modal = document.getElementById('modal-edit');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }
    </script>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    timer: 2000,
                    showConfirmButton: false
                });
            });
        </script>
    @endif

</x-app-layout>
