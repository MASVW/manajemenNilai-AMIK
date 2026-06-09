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
                        <a href="{{ route('student.create.view') }}">
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
                        @foreach ($students as $key => $student)
                            <tr class="capitalize {{ $key % 2 == 0 ? 'bg-gray-500' : '' }}">
                                <td class="py-4">{{ $student?->name ?? 'Belum ada nama' }}</td>
                                <td class="py-4 text-center">{{ $student?->nis ?? 'Belum ada nama' }}</td>
                                <td class="py-4 text-center">{{ $student?->gender ?? 'Belum ada nama' }}</td>
                                <td class="py-4 capitalize text-center">
                                    {{ $student->birthDate?->format('d M Y') ?? 'Belum ada tanggal lahir' }}
                                </td>
                                <td class="py-4 flex justify-center items-center h-full">
                                    <div class="flex space-x-3">

                                        <div>
                                            <a href="{{ route('student.view', ['nis' => $student->nis]) }}">
                                                <button type="button"
                                                    class="bg-yellow-400 text-black uppercase text-xs px-4 py-2 rounded-md">VIEW</button>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="{{ route('student.patch.view', ['nis' => $student->nis]) }}">
                                                <button type="button"
                                                    class="bg-cyan-700 text-white uppercase text-xs px-4 py-2 rounded-md">EDIT</button>
                                            </a>
                                        </div>
                                        <div>
                                            <form method="POST"
                                                action="{{ route('student.delete', ['id' => $student->id]) }}">
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
