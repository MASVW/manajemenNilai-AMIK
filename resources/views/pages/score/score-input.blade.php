{{-- HINT BELAJAR:
    File ini menampilkan semua subject untuk satu student.
    Setiap baris punya form kecil untuk update nilai subject tersebut.
--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Input Nilai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex place-items-center mx-4">
                    <div class="flex-grow p-6 text-gray-900 dark:text-gray-100">
                        {{ __('Input Nilai') }}
                        {{-- TODO MAHASISWA:
                            Tampilkan nama student di sini setelah data $student dikirim dari controller.
                        --}}
                    </div>
                    <div>
                        {{-- TODO MAHASISWA:
                            Ganti href "#" dengan route score.list.
                        --}}
                        <a href="#">
                            <x-secondary-button>
                                Back
                            </x-secondary-button>
                        </a>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="mx-8 mb-4 text-sm text-red-600 dark:text-red-400">
                        Score wajib berupa angka antara 0 sampai 100.
                    </div>
                @endif

                <x-table>
                    <x-slot name="tableHead">
                        <tr>
                            <th class="px-4 py-4 capitalize">Subject</th>
                            <th class="px-4 py-4 capitalize">Score</th>
                            <th class="px-4 py-4 capitalize">Action</th>
                        </tr>
                    </x-slot>
                    <x-slot name="tableBody">
                        {{-- HINT BELAJAR:
                            Form dibuat per subject supaya tombol UPDATE hanya mengubah
                            satu nilai, bukan semua nilai sekaligus.
                        --}}
                        {{-- TODO MAHASISWA:
                            1. Loop variable $subjects.
                            2. Tampilkan nama subject.
                            3. Buat form POST per subject menuju score.update.data.
                            4. Isi input number score dengan nilai lama jika sudah ada, atau 0 jika belum ada.
                            5. Buat tombol UPDATE yang submit form pada baris tersebut.
                        --}}
                    </x-slot>
                </x-table>
            </div>
        </div>
    </div>
</x-app-layout>
