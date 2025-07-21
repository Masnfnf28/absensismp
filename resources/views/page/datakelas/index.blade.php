<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Kelas') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-1/3 p-4">
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold">
                        FORM INPUT DATA KELAS
                    </div>
                    <div>
                        <form class="max-w-sm mx-5" method="POST" action="{{ route('datakelas.store') }}">
                            @csrf
                            <div class="mb-5">
                                <label for="kodekelas"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Kelas
                                </label>
                                <input type="text" name="kodekelas"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" " />
                            </div>
                            <div class="mb-5">
                                <label for="kelas"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas
                                </label>
                                <input type="text" name="kelas"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" " />
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold text-center">
                        DATA KELAS
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
                                            KODE KELAS
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            KELAS
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
                                    @foreach ($datakelas as $index => $item)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 px-4"
                                            align="center">
                                            <th scope="row"
                                                class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                {{ ($datakelas->currentPage() - 1) * $datakelas->perPage() + $loop->iteration }}
                                            </th>
                                            <td class="px-5 py-3">
                                                {{ $item->kodekelas }}
                                            </td>
                                            <td class="px-5 py-3 bg-gray-100">
                                                {{ $item->kelas }}
                                            </td>
                                            <td class="px-5 py-3">
                                                <button type="button"
                                                    class="bg-amber-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-amber-500"
                                                    onclick="editSourceModal(this)" data-modal-target="sourceModal"
                                                    data-kodekelas="{{ $item->kodekelas }}"
                                                    data-kelas="{{ $item->kelas }}">
                                                    <i class="fi fi-sr-file-edit"></i>
                                                </button>
                                                <button
                                                    class="bg-red-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-red-500"
                                                    onclick="return datakelasDelete('{{ $item->kodekelas }}','{{ $item->kelas }}')">
                                                    <i class="fi fi-sr-delete-document"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $datakelas->links() }}
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
                                Siswa</label>
                            <input type="string" id="kodekelas" name="kodekelas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Jenis">
                        </div>
                        <div class="">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                            <input type="string" id="kelas" name="kelas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Jenis">
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
<script>
    const editSourceModal = (button) => {
        const formModal = document.getElementById('formSourceModal');
        const modalTarget = button.dataset.modalTarget;
        const kodekelas = button.dataset.kodekelas;
        const kelas = button.dataset.kelas;
        let url = "{{ route('datakelas.update', ':kodekelas') }}".replace(':kodekelas', kodekelas);

        let status = document.getElementById(modalTarget);
        document.getElementById('title_source').innerText = `UPDATE SISWA ${kelas}`;

        document.getElementById('kodekelas').value = kodekelas;
        document.getElementById('kelas').value = kelas;

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

    const datakelasDelete = async (kodekelas, kelas) => {
        let tanya = confirm(`Apakah anda yakin untuk menghapus Siswa ${kelas} ?`);
        if (tanya) {
            await axios.post(`/datakelas/${kodekelas}`, {
                    '_method': 'DELETE',
                    '_token': $('meta[name="csrf-token"]').attr('content')
                })
                .then(function(response) {
                    // Handle success
                    location.reload();
                })
                .catch(function(error) {
                    // Handle error
                    alert('Error deleting record');
                    console.log(error);
                });
        }
    }
</script>
