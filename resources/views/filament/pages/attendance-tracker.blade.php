<x-filament-panels::page>
    <div class="space-y-6">
        <section>
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white tracking-tight">Attendance</h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Track daily attendance and generate reports.</p>
                </div>
                <div class="flex gap-4 items-center">
                    <select wire:model.live="selectedCourseId" class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 shadow-sm">
                        @foreach($courses as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                    <button wire:click="saveAttendances" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Save Attendance
                    </button>
                    <button class="inline-flex items-center gap-2 px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Generate PDF</button>
                </div>
            </div>

            @if(count($students) > 0)
            <div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm ring-1 ring-gray-950/5 dark:ring-white/10 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-gray-50 dark:bg-gray-800/50 text-gray-900 dark:text-white">
                            <tr>
                                <th class="px-6 py-4 font-semibold">Student</th>
                                @foreach($dates as $date)
                                    <th class="px-4 py-4 text-center">
                                        <div class="font-medium">{{ \Carbon\Carbon::parse($date)->format('D') }}</div>
                                        <div class="text-xs font-normal text-gray-500 dark:text-gray-400 mt-0.5">{{ \Carbon\Carbon::parse($date)->format('M d') }}</div>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-white/5">
                            @foreach($students as $student)
                            <tr class="hover:bg-gray-50 dark:hover:bg-white/5 transition duration-75">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-amber-600 text-white flex items-center justify-center font-bold text-xs ring-2 ring-white dark:ring-gray-900 shadow-sm">
                                            {{ substr($student['name'], 0, 1) }}
                                        </div>
                                        {{ $student['name'] }}
                                    </div>
                                </td>
                                @foreach($dates as $date)
                                    <td class="px-4 py-4 text-center">
                                        <select wire:model.defer="attendances.{{ $student['user_id'] }}.{{ $date }}" 
                                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="">--</option>
                                            <option value="Present">Present</option>
                                            <option value="Absent">Absent</option>
                                            <option value="Late">Late</option>
                                            <option value="Excused">Excused</option>
                                        </select>
                                    </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm ring-1 ring-gray-950/5 dark:ring-white/10 p-12 flex flex-col items-center justify-center text-center">
                <div class="w-12 h-12 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-gray-500 dark:text-gray-400 mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-base font-semibold text-gray-900 dark:text-white">No Students Found</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">There are no students enrolled in this course yet.</p>
            </div>
            @endif
        </section>
    </div>
</x-filament-panels::page>
