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
                        <a href="{{ route('subject.create.view') }}">
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
                        @foreach ($subjects as $key => $subject)
                            <tr class="capitalize {{ $key % 2 == 0 ? 'bg-gray-500' : '' }}">
                                <td class="py-4 text-center">{{ $subject?->name ?? 'Belum ada nama' }}</td>
                                <td class="py-4 flex justify-center items-center h-full">
                                    <div class="flex space-x-3">
                                        <div>
                                            <a href="{{ route('subject.view', ['id' => $subject->id]) }}">
                                                <button type="button"
                                                    class="bg-yellow-400 text-black uppercase text-xs px-4 py-2 rounded-md">VIEW</button>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="{{ route('subject.patch.view', ['id' => $subject->id]) }}">
                                                <button type="button"
                                                    class="bg-cyan-700 text-white uppercase text-xs px-4 py-2 rounded-md">EDIT</button>
                                            </a>
                                        </div>
                                        <div>
                                            <form method="POST"
                                                action="{{ route('subject.delete', ['id' => $subject->id]) }}">
                                                @csrf
                                                <button type="submit"
                                                    class="bg-slate-50 text-black uppercase text-xs px-4 py-2 rounded-md">DELETE</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-table>
            </div>
        </div>
    </div>
</x-app-layout>
