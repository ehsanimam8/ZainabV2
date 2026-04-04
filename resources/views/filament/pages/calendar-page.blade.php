<x-filament-panels::page>
                <section id="view-calendar" class="content-view">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Calendar</h1>
                            <p style="color: var(--color-body-gray);">{{ $monthName }} — Class schedule and institutional events.</p>
                        </div>
                        <div class="flex gap-3">
                            <button wire:click="previousMonth" type="button" class="btn btn-outline">← Prev</button>
                            <button wire:click="today" type="button" class="btn btn-outline">Today</button>
                            <button wire:click="nextMonth" type="button" class="btn btn-outline">Next →</button>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 280px; gap: var(--space-6);">
                        <!-- Calendar Grid -->
                        <div class="card" style="padding: 0; overflow: hidden;">
                            <!-- Day headers -->
                            <div style="display: grid; grid-template-columns: repeat(7, 1fr); background: var(--color-deep-navy); color: white; font-size: 12px; font-weight: 700;">
                                <div style="padding: 12px; text-align:center;">SUN</div>
                                <div style="padding: 12px; text-align:center;">MON</div>
                                <div style="padding: 12px; text-align:center;">TUE</div>
                                <div style="padding: 12px; text-align:center;">WED</div>
                                <div style="padding: 12px; text-align:center;">THU</div>
                                <div style="padding: 12px; text-align:center;">FRI</div>
                                <div style="padding: 12px; text-align:center;">SAT</div>
                            </div>
                            <!-- Week rows -->
                            <div style="display: grid; grid-template-columns: repeat(7, 1fr);">
                                @foreach($calendarGrid as $day)
                                    <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray); {{ !$day['isCurrentMonth'] ? 'color: var(--color-mid-gray); background: #fafafa;' : '' }}">
                                        @if($day['isToday'])
                                            <div style="font-weight:700; color: var(--color-deep-teal);">{{ $day['day'] }} ●</div>
                                            <div style="font-size:11px; background:#DBEAFE; color:#2563EB; border-radius:4px; padding:2px 4px; margin-top:2px; display:inline-block;">Today</div>
                                        @else
                                            <div style="font-weight:700;">{{ $day['day'] }}</div>
                                        @endif

                                        @foreach($day['events'] as $event)
                                            @php
                                                $bgColors = [
                                                    'System' => ['bg' => '#FEE2E2', 'text' => '#DC2626'],
                                                    'Academic' => ['bg' => 'rgba(27,107,114,0.1)', 'text' => 'var(--color-deep-teal)'],
                                                    'Administrative' => ['bg' => '#FEF3C7', 'text' => '#D97706'],
                                                ];
                                                $style = $bgColors[$event['type']] ?? ['bg' => '#E5E7EB', 'text' => '#374151'];
                                            @endphp
                                            <div style="font-size:10px; font-weight:600; background: {{ $style['bg'] }}; color: {{ $style['text'] }}; border-radius:4px; padding:2px 6px; margin-top:4px; line-height:1.2;">
                                                <div style="white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $event['title'] }}</div>
                                                <div style="font-size:9px; opacity:0.8;">{{ $event['time'] }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Upcoming Events Sidebar -->
                        <div>
                            <div class="card">
                                <h3 style="font-size:14px; font-weight:700; margin-bottom:var(--space-4);">Upcoming Events</h3>
                                <div style="display:grid; gap:var(--space-3);">
                                    @forelse($upcomingEvents as $upEvent)
                                        <div style="display:flex; gap:12px; align-items:flex-start;">
                                            <div style="text-align:center; min-width:36px; background: var(--color-deep-teal); color:white; border-radius:6px; padding:4px 6px;">
                                                <div style="font-size:14px; font-weight:700;">{{ \Carbon\Carbon::parse($upEvent->start_time)->format('d') }}</div>
                                                <div style="font-size:9px; text-transform:uppercase;">{{ \Carbon\Carbon::parse($upEvent->start_time)->format('M') }}</div>
                                            </div>
                                            <div>
                                                <div style="font-size:13px; font-weight:600; line-height:1.2;">{{ $upEvent->title }}</div>
                                                <div style="font-size:11px; color: var(--color-body-gray);">{{ \Carbon\Carbon::parse($upEvent->start_time)->format('g:ia') }} · {{ $upEvent->location ?? 'Online' }}</div>
                                            </div>
                                        </div>
                                    @empty
                                        <div style="font-size:12px; color: var(--color-body-gray); text-align:center;">No upcoming events.</div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="card" style="margin-top: var(--space-4);">
                                <h3 style="font-size:14px; font-weight:700; margin-bottom:var(--space-3);">Legend</h3>
                                <div style="display:grid; gap:8px; font-size:12px;">
                                    <div class="flex items-center gap-3"><span style="width:12px; height:12px; border-radius:3px; background:rgba(27,107,114,0.3); display:inline-block;"></span>Class Session</div>
                                    <div class="flex items-center gap-3"><span style="width:12px; height:12px; border-radius:3px; background:#FEE2E2; display:inline-block;"></span>Assessment Deadline</div>
                                    <div class="flex items-center gap-3"><span style="width:12px; height:12px; border-radius:3px; background:#FEF3C7; display:inline-block;"></span>Admin / Staff Event</div>
                                    <div class="flex items-center gap-3"><span style="width:12px; height:12px; border-radius:3px; background:#DBEAFE; display:inline-block;"></span>Today</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

</x-filament-panels::page>