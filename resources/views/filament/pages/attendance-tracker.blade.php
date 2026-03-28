<x-filament-panels::page>
    <div>
        <section class="content-view">
            <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                <div>
                    <h1 class="ui-page-title">Attendance</h1>
                    <p style="color: var(--color-body-gray);">Track daily attendance and generate reports.</p>
                </div>
                <div class="flex gap-4 items-center">
                    <select wire:model.live="selectedCourseId" style="padding: 10px 16px; border: 1px solid var(--color-mid-gray); border-radius: var(--radius-md); font-family: inherit;">
                        @foreach($courses as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                    <button wire:click="saveAttendances" class="btn btn-primary" style="background-color: #3B82F6; color: white;">
                        <span style="display:flex;align-items:center;gap:6px;">
                            <svg style="width:16px;height:16px" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Save Attendance
                        </span>
                    </button>
                    <button class="btn btn-outline" style="color: var(--color-mauve-rose); border-color: var(--color-mauve-rose);">Generate PDF Report</button>
                </div>
            </div>

            @if(count($students) > 0)
            <div class="card" style="padding: 0; overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: center;">
                    <thead style="background: var(--color-deep-navy); color: white;">
                        <tr>
                            <th style="padding: 12px 24px; text-align: left;">Student</th>
                            @foreach($dates as $date)
                                <th style="padding: 12px;">{{ \Carbon\Carbon::parse($date)->format('D') }}<br><span style="font-weight: normal; opacity: 0.7;">{{ \Carbon\Carbon::parse($date)->format('M d') }}</span></th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr style="border-bottom: 1px solid var(--color-light-gray);">
                            <td style="padding: 12px 24px; text-align: left; font-weight: 600;">
                                <div style="display:flex;align-items:center;gap:12px;">
                                    <div style="width:28px;height:28px;border-radius:50%;background:var(--color-burnt-gold);color:white;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:11px;">
                                        {{ substr($student['name'], 0, 1) }}
                                    </div>
                                    {{ $student['name'] }}
                                </div>
                            </td>
                            @foreach($dates as $date)
                                <td style="padding: 12px; vertical-align: middle;">
                                    <select wire:model.defer="attendances.{{ $student['user_id'] }}.{{ $date }}" 
                                            style="width: 90px; padding: 4px; border-radius: 4px; border: 1px solid var(--color-mid-gray); font-size: 12px; font-family: inherit;">
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
            @else
            <div class="card" style="text-align: center; padding: 40px; color: var(--color-body-gray);">
                <i data-lucide="calendar" style="width: 32px; height: 32px; margin: 0 auto 12px; opacity: 0.5;"></i>
                <h3 style="font-weight: 600; color: var(--color-warm-black); margin-bottom: 8px;">No Students Found</h3>
                <p>There are no students enrolled in this course yet.</p>
            </div>
            @endif
        </section>
    </div>
</x-filament-panels::page>
