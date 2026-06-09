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
                        <a href="{{ route('subject.patch.view', ['id' => $subject->id]) }}">
                            <x-primary-button>
                                Update data
                            </x-primary-button>
                        </a>
                    </div>
                    <div class="grid justify-items-end">
                        <form action="{{ route('subject.delete', ['id' => $subject->id]) }}" method="POST">
                            @csrf
                            <x-primary-button>
                                Delete Data
                            </x-primary-button>
                        </form>
                    </div>
                </div>

                <form class="space-y-5 px-5">
                    <div class="w-full grid grid-cols-1 gap-x-5">
                        <div>
                            <x-input-label for="name" :value="__('Subject Name')" />
                            <x-text-input disabled id="name" class="block mt-1 w-full" type="text"
                                name="name" :value="$subject->name" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
