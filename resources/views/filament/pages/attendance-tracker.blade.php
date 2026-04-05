<x-filament-panels::page>
    <div class="space-y-6">
        <section class="content-view">
            <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                <div>
                    <h1 class="ui-page-title">Daily Attendance</h1>
                    <p style="color: var(--color-body-gray);">Fast, single-click session marking.</p>
                </div>
                <div class="flex gap-4 items-center">
                    <select wire:model.live="selectedCourseId" style="padding: 10px 16px; border: 1px solid var(--color-mid-gray); border-radius: var(--radius-md); font-family: 'Inter', sans-serif;">
                        @foreach($courses as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                    <input type="date" wire:model.live="selectedDate" style="padding: 10px 16px; border: 1px solid var(--color-mid-gray); border-radius: var(--radius-md); font-family: 'Inter', sans-serif;" />
                    
                    <button wire:click="markAll('Present')" class="btn btn-primary" style="background-color: #10B981; border: none;">
                        <span style="display:flex;align-items:center;gap:6px;">
                            <svg style="width:16px;height:16px" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Mark All Present
                        </span>
                    </button>
                    <button wire:click="markAll('Absent')" class="btn btn-outline" style="color: #EF4444; border-color: #EF4444;">
                        Mark All Absent
                    </button>
                </div>
            </div>

            @if(count($students) > 0)
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px;">
                @foreach($students as $student)
                    @php
                        $state = $attendances[$student['user_id']] ?? null;
                        
                        $isP = $state === 'Present';
                        $isA = $state === 'Absent';
                        $isE = $state === 'Excused';
                        
                        $cardBg = '#ffffff';
                        $borderClass = 'border: 1px solid var(--color-light-gray);';
                        
                        if ($isP) {
                            $cardBg = '#F0FDF4'; 
                            $borderClass = 'border: 1px solid #10B981;';
                        } elseif ($isA) {
                            $cardBg = '#FEF2F2';
                            $borderClass = 'border: 1px solid #EF4444;';
                        } elseif ($isE) {
                            $cardBg = '#EFF6FF';
                            $borderClass = 'border: 1px solid #3B82F6;';
                        }
                    @endphp
                    <div class="card" style="padding: 20px; transition: all 0.2s ease; background-color: {{ $cardBg }}; {{ $borderClass }}">
                        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
                            <div style="width:40px;height:40px;border-radius:50%;background:var(--color-burnt-gold);color:white;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:16px;">
                                {{ substr($student['name'], 0, 1) }}
                            </div>
                            <div>
                                <div style="font-weight:700;color:var(--color-warm-black);font-size:15px;">{{ $student['name'] }}</div>
                                <div style="font-size:12px;color:var(--color-body-gray);">ID: {{ substr($student['user_id'], 0, 8) }}...</div>
                            </div>
                        </div>
                        
                        <div style="display: flex; gap: 8px;">
                            <!-- Present Button -->
                            <button wire:click="toggleAttendance('{{ $student['user_id'] }}', 'Present')" 
                                    style="flex:1; padding:10px 0; border-radius:6px; font-weight:700; font-size:14px; cursor:pointer; transition:all 0.15s;
                                           {{ $isP ? 'background:#10B981; color:white; border:1px solid #10B981;' : 'background:white; color:#6B7280; border:1px solid #E5E7EB;' }}">
                                P
                            </button>
                            <!-- Absent Button -->
                            <button wire:click="toggleAttendance('{{ $student['user_id'] }}', 'Absent')" 
                                    style="flex:1; padding:10px 0; border-radius:6px; font-weight:700; font-size:14px; cursor:pointer; transition:all 0.15s;
                                           {{ $isA ? 'background:#EF4444; color:white; border:1px solid #EF4444;' : 'background:white; color:#6B7280; border:1px solid #E5E7EB;' }}">
                                A
                            </button>
                            <!-- Excused Button -->
                            <button wire:click="toggleAttendance('{{ $student['user_id'] }}', 'Excused')" 
                                    style="flex:1; padding:10px 0; border-radius:6px; font-weight:700; font-size:14px; cursor:pointer; transition:all 0.15s;
                                           {{ $isE ? 'background:#3B82F6; color:white; border:1px solid #3B82F6;' : 'background:white; color:#6B7280; border:1px solid #E5E7EB;' }}">
                                E
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
            @else
            <div class="card" style="text-align: center; padding: 40px; color: var(--color-body-gray);">
                <i data-lucide="users" style="width: 32px; height: 32px; margin: 0 auto 12px; opacity: 0.5;"></i>
                <h3 style="font-weight: 600; color: var(--color-warm-black); margin-bottom: 8px;">No Students Found</h3>
                <p>There are no students enrolled in this course yet.</p>
            </div>
            @endif
        </section>
    </div>
</x-filament-panels::page>
