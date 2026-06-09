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
                        @foreach ($students as $student)
                            <tr class="capitalize {{ $loop->odd ? 'bg-gray-500' : '' }}">
                                <td class="py-4 text-center">{{ $loop->iteration }}</td>
                                <td class="py-4">{{ $student->name }}</td>
                                <td class="py-4 text-center">
                                    {{ $student->scores->unique('subject_id')->count() }}/{{ $totalSubjects }}
                                </td>
                                <td class="py-4 flex justify-center items-center h-full">
                                    <a href="{{ route('score.input.view', ['studentId' => $student->id]) }}">
                                        <button type="button"
                                            class="bg-cyan-700 text-white uppercase text-xs px-4 py-2 rounded-md">INPUT NILAI</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-table>
            </div>
        </div>
    </div>
</x-app-layout>
