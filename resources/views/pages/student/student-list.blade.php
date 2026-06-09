{{-- HINT BELAJAR:
    File ini menerima variable $students dari StudentController@index.
    Tugas view list adalah melakukan loop data dan menampilkan tombol action.
--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex place-items-center mx-4">
                    <div class="flex-grow p-6 text-gray-900 dark:text-gray-100">
                        {{ __('Student List') }}
                    </div>
                    <div class="">
                        {{-- TODO MAHASISWA:
                            Ganti href "#" dengan route untuk membuka form create student.
                        --}}
                        <a href="#">
                            <x-primary-button>
                                Create New Data
                            </x-primary-button>
                        </a>
                    </div>
                </div>

                <x-table>
                    <x-slot name="tableHead">
                        <tr>
                            <th class="px-4 py-4 capitalize">name</th>
                            <th class="px-4 py-4 uppercase">nis</th>
                            <th class="px-4 py-4 capitalize">gender</th>
                            <th class="px-4 py-4 capitalize">Birth Date</th>
                            <th class="px-4 py-4 capitalize">Action</th>
                        </tr>
                    </x-slot>
                    <x-slot name="tableBody">
                        {{-- HINT BELAJAR:
                            @foreach dipakai untuk menampilkan satu baris tabel
                            untuk setiap student yang ada di database.
                        --}}
                        {{-- TODO MAHASISWA:
                            1. Loop variable $students.
                            2. Tampilkan name, nis, gender, dan birthDate.
                            3. Buat tombol VIEW menuju student.view.
                            4. Buat tombol EDIT menuju student.patch.view.
                            5. Buat form DELETE menuju student.delete dan jangan lupa @csrf.
                        --}}
                    </x-slot>
                </x-table>
            </div>
        </div>
    </div>
</x-app-layout>
