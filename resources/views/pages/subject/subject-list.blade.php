{{-- HINT BELAJAR:
    File ini menerima variable $subjects dari SubjectController@index.
    Polanya mirip student-list, hanya kolomnya lebih sedikit.
--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Subject') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex place-items-center mx-4">
                    <div class="flex-grow p-6 text-gray-900 dark:text-gray-100">
                        {{ __('Subject List') }}
                    </div>
                    <div class="">
                        {{-- TODO MAHASISWA:
                            Ganti href "#" dengan route subject.create.view.
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
                            <th class="px-4 py-4 capitalize">Subject Name</th>
                            <th class="px-4 py-4 capitalize">Action</th>
                        </tr>
                    </x-slot>
                    <x-slot name="tableBody">
                        {{-- HINT BELAJAR:
                            $loop->odd adalah helper Blade untuk mengecek nomor loop ganjil.
                        --}}
                        {{-- TODO MAHASISWA:
                            1. Loop variable $subjects.
                            2. Tampilkan nama subject.
                            3. Buat tombol VIEW, EDIT, dan DELETE.
                            4. Pastikan form DELETE memakai @csrf.
                        --}}
                    </x-slot>
                </x-table>
            </div>
        </div>
    </div>
</x-app-layout>
