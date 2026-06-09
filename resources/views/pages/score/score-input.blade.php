{{-- HINT BELAJAR:
    File ini menampilkan semua subject untuk satu student.
    Setiap baris punya form kecil untuk update nilai subject tersebut.
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
                        {{ __('Input Nilai') }}: {{ $student->name }}
                    </div>
                    <div>
                        <a href="{{ route('score.list') }}">
                            <x-secondary-button>
                                Back
                            </x-secondary-button>
                        </a>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="mx-8 mb-4 text-sm text-red-600 dark:text-red-400">
                        Score wajib berupa angka antara 0 sampai 100.
                    </div>
                @endif

                <x-table>
                    <x-slot name="tableHead">
                        <tr>
                            <th class="px-4 py-4 capitalize">Subject</th>
                            <th class="px-4 py-4 capitalize">Score</th>
                            <th class="px-4 py-4 capitalize">Action</th>
                        </tr>
                    </x-slot>
                    <x-slot name="tableBody">
                        @foreach ($subjects as $subject)
                            <tr class="capitalize {{ $loop->odd ? 'bg-gray-500' : '' }}">
                                <td class="py-4">{{ $subject->name }}</td>
                                <td class="py-4 text-center">
                                    {{-- HINT BELAJAR:
                                        Form dibuat per subject supaya tombol UPDATE hanya mengubah
                                        satu nilai, bukan semua nilai sekaligus.
                                    --}}
                                    <form id="score-form-{{ $subject->id }}" method="POST"
                                        action="{{ route('score.update.data', ['studentId' => $student->id, 'subjectId' => $subject->id]) }}">
                                        @csrf
                                        <input type="hidden" name="subject_id" value="{{ $subject->id }}">
                                        <input class="w-24 rounded-md text-black" type="number" name="score"
                                            min="0" max="100"
                                            value="{{ old('subject_id') == $subject->id ? old('score') : ($scores[$subject->id] ?? 0) }}"
                                            required>
                                    </form>
                                </td>
                                <td class="py-4 text-center">
                                    <button form="score-form-{{ $subject->id }}" type="submit"
                                        class="bg-cyan-700 text-white uppercase text-xs px-4 py-2 rounded-md">UPDATE</button>
                                </td>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-table>
            </div>
        </div>
    </div>
</x-app-layout>
