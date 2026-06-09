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

                <form class="space-y-5 px-5" action="{{ route('student.create.data') }}" method="POST">
                    @csrf
                    <div class="w-full grid grid-cols-3 gap-x-5">
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <!-- Gender -->
                        <div class="w-full">
                            <x-input-label for="gender" :value="__('Gender')" />
                            <select class="w-full rounded-md" name="gender" id="gender" value="none">
                                <option disabled selected value="none">Pilih gender</option>
                                <option value="male" {{ old('gender') === 'male' ? 'selected' : null }}>Male</option>
                                <option value="female" {{ old('gender') === 'female' ? 'selected' : null }}>Female
                                </option>
                            </select>
                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                        </div>
                        <!-- Birth Date -->
                        <div class="w-full">
                            <x-input-label for="birthDate" :value="__('Birth Date')" />
                            <input class="w-full rounded-md" type="date" name="birthDate"
                                value="{{ old('birthDate') }}" autofocus required>
                            <x-input-error :messages="$errors->get('birthDate')" class="mt-2" />
                        </div>
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
