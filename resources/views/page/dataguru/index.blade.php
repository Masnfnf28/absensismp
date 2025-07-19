<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Guru') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-1/3 p-4">
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold">
                        FORM INPUT DATA GURU
                    </div>
                    <div>
                        <form class="max-w-sm mx-5" method="POST" action="{{ route('dataguru.store') }}">
                            @csrf
                            <div class="mb-5">
                                <label for="nip"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Induk
                                    Pegawai
                                </label>
                                <input type="integer" name="nip"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" " required />
                            </div>
                            <div class="mb-5">
                                <label for="nama"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Guru
                                </label>
                                <input type="text" name="nama"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" "
                                    required />
                            </div>
                            <div class="mb-5">
                                <label for="jenis_kelamin"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                    Kelamin</label>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6" required
                                    name="jenis_kelamin" data-placeholder="Pilih Jenis Kelamin" required>
                                    <option value="">Pilih...</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-5">
                                <label for="alamat"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                                </label>
                                <input type="text" name="alamat"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" " required />
                            </div>
                            <div class="mb-5">
                                <label for="tgl_lahir"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir
                                </label>
                                <input type="date" name="tgl_lahir"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" "
                                    required />
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold text-center">
                        DATA GURU
                    </div>
                    <div>
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                                    <tr>
                                        <th scope="col" class="px-4 py-3 bg-gray-100">
                                            NO
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            NIP
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            NAMA
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            JENIS KELAMIN
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            ALAMAT
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            TANGGAL LAHIR
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            ACTION
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($dataguru as $index => $item)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 px-4"
                                            align="center">
                                            <th scope="row"
                                                class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                {{ ($dataguru->currentPage() - 1) * $dataguru->perPage() + $loop->iteration }}
                                            </th>
                                            <td class="px-5 py-3">
                                                {{ $item->nip }}
                                            </td>
                                            <td class="px-5 py-3 bg-gray-100">
                                                {{ $item->nama }}
                                            </td>
                                            <td class="px-5 py-3 bg-gray-100">
                                                {{ $item->jenis_kelamin }}
                                            </td>
                                            <td class="px-5 py-3 bg-gray-100">
                                                {{ $item->alamat }}
                                            </td>
                                            <td class="px-5 py-3 bg-gray-100">
                                                {{ $item->tgl_lahir }}
                                            </td>
                                            <td class="px-5 py-3">
                                                <button type="button"
                                                    class="bg-amber-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-amber-500"
                                                    onclick="editSourceModal(this)" data-modal-target="sourceModal"
                                                    data-nip="{{ $item->nip }}" data-nama="{{ $item->nama }}"
                                                    data-jenis_kelamin="{{ $item->jenis_kelamin }}"
                                                    data-alamat="{{ $item->alamat }}"
                                                    data-tgl_lahir="{{ $item->tgl_lahir }}">
                                                    <i class="fi fi-sr-file-edit"></i>
                                                </button>
                                                <button
                                                    class="bg-red-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-red-500"
                                                    onclick="return dataguruDelete('{{ $item->nip }}','{{ $item->nama }}')">
                                                    <i class="fi fi-sr-delete-document"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $dataguru->links() }}
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Update Sumber Database
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="flex flex-col  p-4 space-y-6">
                        <div class="">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Nomor Induk
                                Pegawai</label>
                            <input type="text" id="nip" name="nip"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Jenis">
                        </div>
                        <div class="">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                Guru</label>
                            <input type="string" id="nama" name="nama"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Jenis">
                        </div>
                        <div class="">
                            <label for="jenis_kelamin"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                Kelamin</label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                name="jenis_kelamin" id="jenis_kelamin" data-placeholder="Pilih Jenis Kelamin"
                                required>
                                <option value="">Pilih...</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                            <input type="text" id="alamat" name="alamat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="">
                            <label for="tgl_lahir" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                                Lahir</label>
                            <input type="date" id="tgl_lahir" name="tgl_lahir"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($errors->has('nip'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'NIP Duplikat!',
            text: '{{ $errors->first('nip') }}',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@if (session('message_insert'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('message_insert') }}',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
@endif

@if (session('message_update'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Diperbarui!',
            text: '{{ session('message_update') }}',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
@endif

{{-- @if (session('message_delete'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Dihapus!',
            text: '{{ session('message_delete') }}',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
@endif --}}


<script>
    const editSourceModal = (button) => {
        const formModal = document.getElementById('formSourceModal');
        const modalTarget = button.dataset.modalTarget;
        // const id = button.dataset.id;
        const nip = button.dataset.nip;
        const nama = button.dataset.nama;
        const jenis_kelamin = button.dataset.jenis_kelamin;
        const alamat = button.dataset.alamat;
        const tgl_lahir = button.dataset.tgl_lahir;
        let url = "{{ route('dataguru.update', ':nip') }}".replace(':nip', nip);

        let status = document.getElementById(modalTarget);
        document.getElementById('title_source').innerText = `UPDATE SISWA ${nama}`;

        document.getElementById('nip').value = nip;
        document.getElementById('nama').value = nama;
        // document.getElementById('jenis_kelamin').value = jenis_kelamin;

        $('#jenis_kelamin').val(jenis_kelamin).trigger('change');
        document.getElementById('jenis_kelamin').value = jenis_kelamin;

        document.getElementById('alamat').value = alamat;
        document.getElementById('tgl_lahir').value = tgl_lahir;

        document.getElementById('formSourceButton').innerText = 'Simpan';
        document.getElementById('formSourceModal').setAttribute('action', url);
        let csrfToken = document.createElement('input');
        csrfToken.setAttribute('type', 'hidden');
        csrfToken.setAttribute('value', '{{ csrf_token() }}');
        formModal.appendChild(csrfToken);

        let methodInput = document.createElement('input');
        methodInput.setAttribute('type', 'hidden');
        methodInput.setAttribute('name', '_method');
        methodInput.setAttribute('value', 'PATCH');
        formModal.appendChild(methodInput);

        status.classList.toggle('hidden');
    }

    const sourceModalClose = (button) => {
        const modalTarget = button.dataset.modalTarget;
        let status = document.getElementById(modalTarget);
        status.classList.toggle('hidden');
    }

    // const dataguruDelete = async (id, nama) => {
    //     let tanya = confirm(`Apakah anda yakin untuk menghapus Guru ${nama} ?`);
    //     if (tanya) {
    //         await axios.post(`/dataguru/${id}`, {
    //                 '_method': 'DELETE',
    //                 '_token': $('meta[name="csrf-token"]').attr('content')
    //             })
    //             .then(function(response) {
    //                 // Handle success
    //                 location.reload();
    //             })
    //             .catch(function(error) {
    //                 // Handle error
    //                 alert('Error deleting record');
    //                 console.log(error);
    //             });
    //     }
    // }

    const dataguruDelete = async (id, nama) => {
        Swal.fire({
            title: `Yakin ingin menghapus guru ${nama}?`,
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post(`/dataguru/${id}`, {
                        '_method': 'DELETE',
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    })
                    .then(function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Terhapus!',
                            text: `Data guru ${nama} berhasil dihapus.`,
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload();
                        });
                    })
                    .catch(function(error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat menghapus data.'
                        });
                        console.error(error);
                    });
            }
        });
    }
</script>
