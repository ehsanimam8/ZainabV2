<x-filament-panels::page>
    <div>
        <section class="content-view">
            <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                <div>
                    <h1 class="ui-page-title">Gradebook</h1>
                    <p style="color: var(--color-body-gray);">Weighted averages and assessment marks.</p>
                </div>
                <div class="flex gap-4 items-center">
                    <select wire:model.live="selectedCourseId" style="padding: 10px 16px; border: 1px solid var(--color-mid-gray); border-radius: var(--radius-md); font-family: 'Inter', sans-serif;">
                        @foreach($courses as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                    <button wire:click="saveGrades" class="btn btn-primary" style="background-color: #3B82F6; color: white;">
                        <span style="display:flex;align-items:center;gap:6px;">
                            <svg style="width:16px;height:16px" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Save Grades
                        </span>
                    </button>
                    <button class="btn btn-outline" style="color: var(--color-mauve-rose); border-color: var(--color-mauve-rose);">Generate Report Card</button>
                </div>
            </div>

            @if(count($students) > 0)
            <div class="card" style="padding: 0; overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: center;">
                    <thead style="background: var(--color-deep-navy); color: white;">
                        <tr>
                            <th style="padding: 12px 24px; text-align: left;">Student</th>
                            @foreach($assignments as $assignment)
                                <th style="padding: 12px;">{{ $assignment->title }}<br><span style="font-weight: normal; opacity: 0.7;">{{ $assignment->total_points }}pts</span></th>
                            @endforeach
                            <th style="padding: 12px; background: rgba(255,255,255,0.1);">Overall %</th>
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
                            @foreach($assignments as $assignment)
                                <td style="padding: 12px; vertical-align: middle;">
                                    <div style="display:flex;align-items:center;justify-content:center;gap:6px;">
                                        <!-- Score Input -->
                                        <input type="number" 
                                               wire:model.live.debounce.500ms="grades.{{ $student['user_id'] }}.{{ $assignment->id }}"
                                               style="width: 55px; padding:6px; border-radius: 6px; text-align: center; border: 1px solid var(--color-mid-gray); font-family: inherit; font-size: 13px; font-weight: 500;"
                                               max="{{ $assignment->total_points }}" />
                                        
                                        <!-- Letter Grade Bubble -->
                                        @php
                                            $score = $grades[$student['user_id']][$assignment->id] ?? null;
                                            $letter = '-';
                                            $letterColor = '#D1D5DB';
                                            $letterBg = '#F3F4F6';

                                            if ($score !== null && $score !== '') {
                                                $percent = $assignment->total_points > 0 ? ((float)$score / $assignment->total_points) * 100 : 0;
                                                if ($percent >= 90) { $letter = 'A'; $letterBg = '#DBEAFE'; $letterColor = '#2563EB'; }
                                                elseif ($percent >= 80) { $letter = 'B'; $letterBg = '#DCFCE7'; $letterColor = '#16A34A'; }
                                                elseif ($percent >= 70) { $letter = 'C'; $letterBg = '#FEF3C7'; $letterColor = '#D97706'; }
                                                elseif ($percent >= 60) { $letter = 'D'; $letterBg = '#FFEDD5'; $letterColor = '#C2410C'; }
                                                else { $letter = 'F'; $letterBg = '#FEE2E2'; $letterColor = '#DC2626'; }
                                            }
                                        @endphp
                                        <div style="width:24px;height:24px;border-radius:4px;display:flex;align-items:center;justify-content:center;background:{{ $letterBg }};color:{{ $letterColor }};font-weight:700;font-size:11px;">
                                            {{ $letter }}
                                        </div>

                                        <!-- Comment Icon -->
                                        <div x-data="{ open: false }" style="position: relative;">
                                            <button @click="open = !open" type="button" style="color: #9CA3AF; background: none; border: none; cursor: pointer; padding: 2px;">
                                                <svg style="width:16px;height:16px;" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path></svg>
                                            </button>
                                            
                                            <!-- Comment Popover -->
                                            <div x-show="open" @click.away="open = false" style="display:none; position: absolute; bottom: 100%; right: 0; margin-bottom: 8px; width: 200px; padding: 12px; background: white; border-radius: 8px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); border: 1px solid var(--color-mid-gray); z-index: 50;">
                                                <label style="display:block;font-size:11px;font-weight:700;text-align:left;color:var(--color-deep-navy);margin-bottom:4px;">Feedback Comment</label>
                                                <textarea wire:model.defer="comments.{{ $student['user_id'] }}.{{ $assignment->id }}" rows="3" style="width: 100%; padding: 6px; border: 1px solid var(--color-mid-gray); border-radius: 4px; font-size: 12px;"></textarea>
                                                <button @click="open = false" type="button" class="btn btn-primary" style="width:100%;margin-top:8px;padding:6px;font-size:11px;">Done</button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @endforeach
                            @php
                                $overall = $student['overall_percent'];
                                $overallColor = $overall >= 80 ? '#16a34a' : ($overall >= 70 ? '#d97706' : '#dc2626');
                            @endphp
                            <td style="padding: 12px; font-weight: 700; color: {{ $overallColor }};">{{ $overall }}%</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="card" style="text-align: center; padding: 40px; color: var(--color-body-gray);">
                <i data-lucide="book" style="width: 32px; height: 32px; margin: 0 auto 12px; opacity: 0.5;"></i>
                <h3 style="font-weight: 600; color: var(--color-warm-black); margin-bottom: 8px;">No Students Found</h3>
                <p>There are no students enrolled in this course yet, or the course has no assignments.</p>
            </div>
            @endif
        </section>
    </div>
</x-filament-panels::page>
