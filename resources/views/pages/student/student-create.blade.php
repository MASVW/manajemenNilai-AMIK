{{-- HINT BELAJAR:
    File ini adalah form tambah student. Form mengirim data ke
    route student.create.data, lalu diproses oleh StudentController@createData.
--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Student Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10">
                <div class="flex place-items-center mx-4">
                    <div class="flex-grow p-6 text-gray-900 dark:text-gray-100">
                        {{ __('New Student Data') }}
                    </div>
                </div>

                {{-- TODO MAHASISWA:
                    Ganti action "#" dengan route student.create.data.
                --}}
                <form class="space-y-5 px-5" action="#" method="POST">
                    {{-- HINT BELAJAR:
                        @csrf wajib untuk form POST di Laravel.
                        Tanpa ini, request biasanya ditolak dengan status 419.
                    --}}
                    @csrf
                    <div class="w-full grid grid-cols-3 gap-x-5">
                        {{-- TODO MAHASISWA:
                            Buat input untuk:
                            - name menggunakan x-text-input.
                            - gender menggunakan select male/female.
                            - birthDate menggunakan input type date.
                            Jangan lupa tampilkan x-input-error untuk setiap field.
                        --}}
                    </div>
                    <div class="grid justify-items-end">
                        <x-primary-button>
                            Submit
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
