{{-- HINT BELAJAR:
    Form tambah subject hanya punya satu input, yaitu name.
    Ini contoh CRUD paling sederhana di project.
--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Subject Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10">
                <div class="flex place-items-center mx-4">
                    <div class="flex-grow p-6 text-gray-900 dark:text-gray-100">
                        {{ __('New Subject Data') }}
                    </div>
                </div>

                {{-- TODO MAHASISWA:
                    Ganti action "#" dengan route subject.create.data.
                --}}
                <form class="space-y-5 px-5" action="#" method="POST">
                    @csrf
                    <div class="w-full grid grid-cols-1 gap-x-5">
                        {{-- TODO MAHASISWA:
                            Buat input name untuk nama subject.
                            Gunakan x-input-label, x-text-input, dan x-input-error.
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
