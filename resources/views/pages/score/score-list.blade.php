{{-- HINT BELAJAR:
    File ini menerima $students dan $totalSubjects dari ScoreController@index.
    Kolom keterangan menghitung berapa subject yang sudah punya score.
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
                        {{ __('Student Score List') }}
                    </div>
                </div>

                <x-table>
                    <x-slot name="tableHead">
                        <tr>
                            <th class="px-4 py-4 capitalize">No</th>
                            <th class="px-4 py-4 capitalize">Nama</th>
                            <th class="px-4 py-4 capitalize">Keterangan</th>
                            <th class="px-4 py-4 capitalize">Action</th>
                        </tr>
                    </x-slot>
                    <x-slot name="tableBody">
                        {{-- HINT BELAJAR:
                            unique('subject_id')->count() mencegah subject yang sama
                            dihitung dua kali jika ada data score duplikat.
                        --}}
                        {{-- TODO MAHASISWA:
                            1. Loop variable $students.
                            2. Tampilkan nomor, nama student, dan keterangan nilai.
                            3. Format keterangan: jumlah score terisi / total subject.
                            4. Buat tombol INPUT NILAI menuju score.input.view.
                        --}}
                    </x-slot>
                </x-table>
            </div>
        </div>
    </div>
</x-app-layout>
