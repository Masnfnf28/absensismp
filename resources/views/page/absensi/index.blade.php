<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Input Absensi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold">
                        <div class="flex items-center justify-between">
                            <div class="w-full">
                                Daftar Absensi
                            </div>
                            {{-- <div>
                                <a href="{{ route('absensi.create') }}"
                                    class="bg-sky-400 p-1 text-white rounded-xl px-4">Tambah</a>
                            </div> --}}
                        </div>
                    </div>
                    <div>
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            NO
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            MATA PELAJARAN
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            WAKTU MULAI
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            WAKTU SELESAI
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
                                    @foreach ($data as $f)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                {{ $no++ }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $f->konsumen->nama_konsumen }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $f->tanggal }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                <a href="{{ route('absensi.create') }}"
                                                    class="bg-sky-400 p-1 text-white rounded-xl px-4">Tambah</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="detailModal" class="fixed z-50 inset-0 overflow-y-auto hidden">
        <div class="fixed inset-0 bg-black opacity-50" onclick="closeModal()"></div>

        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl relative z-50">
                <div class="p-4 border-b flex justify-between items-center">
                    <h3 class="text-lg font-bold">Detail Barang Keluar</h3>
                    <button onclick="closeModal()" class="text-gray-500 hover:text-red-600">&times;</button>
                </div>
                <div class="p-4">
                    <p><strong>Konsumen:</strong> <span id="modalKonsumen"></span></p>
                    <p><strong>Tanggal Penjualan:</strong> <span id="modalTanggal"></span></p>
                    <div class="mt-4">
                        <strong>Detail Barang:</strong>
                        <ul id="modalDetailList" class="list-disc list-inside mt-2 text-sm text-gray-700">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
