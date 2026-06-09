{{-- HINT BELAJAR:
    Detail subject menampilkan data yang tidak bisa diedit langsung.
    Untuk mengubah data, user masuk ke halaman edit.
--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Subject Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10">
                <div class="flex place-items-center mx-4 space-x-5">
                    <div class="flex-grow p-6 text-gray-900 dark:text-gray-100">
                        {{ __('Subject Detail') }}
                    </div>
                    <div class="grid justify-items-end">
                        {{-- TODO MAHASISWA:
                            Ganti href "#" dengan route subject.patch.view dan parameter id.
                        --}}
                        <a href="#">
                            <x-primary-button>
                                Update data
                            </x-primary-button>
                        </a>
                    </div>
                    <div class="grid justify-items-end">
                        {{-- TODO MAHASISWA:
                            Ganti action "#" dengan route subject.delete dan parameter id.
                        --}}
                        <form action="#" method="POST">
                            @csrf
                            <x-primary-button>
                                Delete Data
                            </x-primary-button>
                        </form>
                    </div>
                </div>

                <form class="space-y-5 px-5">
                    <div class="w-full grid grid-cols-1 gap-x-5">
                        {{-- TODO MAHASISWA:
                            Tampilkan name subject dalam input disabled.
                        --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
