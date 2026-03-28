<x-filament-panels::page>
                <section id="view-calendar" class="content-view">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Calendar</h1>
                            <p style="color: var(--color-body-gray);">March 2026 — Class schedule and institutional events.</p>
                        </div>
                        <div class="flex gap-3">
                            <button class="btn btn-outline">← Prev</button>
                            <button class="btn btn-outline">Today</button>
                            <button class="btn btn-outline">Next →</button>
                            <button class="btn btn-primary">+ Add Event</button>
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
                                <!-- Row 1 -->
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray); color: var(--color-mid-gray);">23</div>
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray); color: var(--color-mid-gray);">24</div>
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray); color: var(--color-mid-gray);">25</div>
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray); color: var(--color-mid-gray);">26</div>
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray); color: var(--color-mid-gray);">27</div>
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray); color: var(--color-mid-gray);">28</div>
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray);">
                                    <div style="font-weight:700;">1</div>
                                </div>
                                <!-- Row 2 -->
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray);">
                                    <div style="font-weight:700;">2</div>
                                </div>
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray);">
                                    <div style="font-weight:700;">3</div>
                                    <div style="font-size:11px; background: rgba(27,107,114,0.1); color: var(--color-deep-teal); border-radius:4px; padding:2px 6px; margin-top:4px;">Hanafi Fiqh 6pm</div>
                                </div>
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray);"><div style="font-weight:700;">4</div></div>
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray);">
                                    <div style="font-weight:700;">5</div>
                                    <div style="font-size:11px; background: rgba(168,93,136,0.1); color: var(--color-mauve-rose); border-radius:4px; padding:2px 6px; margin-top:4px;">Arabic Gram. 5:30pm</div>
                                </div>
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray);"><div style="font-weight:700;">6</div></div>
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray);"><div style="font-weight:700;">7</div></div>
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray);">
                                    <div style="font-weight:700;">8</div>
                                    <div style="font-size:11px; background:#FEF3C7; color:#D97706; border-radius:4px; padding:2px 6px; margin-top:4px;">Staff Meeting 10am</div>
                                </div>
                                <!-- Row 3 -->
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray);"><div style="font-weight:700;">9</div></div>
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray);">
                                    <div style="font-weight:700;">10</div>
                                    <div style="font-size:11px; background: rgba(27,107,114,0.1); color: var(--color-deep-teal); border-radius:4px; padding:2px 6px; margin-top:4px;">Hanafi Fiqh 6pm</div>
                                </div>
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray);"><div style="font-weight:700;">11</div></div>
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray);">
                                    <div style="font-weight:700;">12</div>
                                    <div style="font-size:11px; background: rgba(168,93,136,0.1); color: var(--color-mauve-rose); border-radius:4px; padding:2px 6px; margin-top:4px;">Arabic Gram. 5:30pm</div>
                                </div>
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray);"><div style="font-weight:700;">13</div></div>
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray);"><div style="font-weight:700;">14</div></div>
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray);">
                                    <div style="font-weight:700; color: var(--color-deep-teal);">15 ●</div>
                                    <div style="font-size:11px; background:#DBEAFE; color:#2563EB; border-radius:4px; padding:2px 6px; margin-top:4px;">Today</div>
                                </div>
                                <!-- Row 4 -->
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray);"><div style="font-weight:700;">16</div></div>
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray);">
                                    <div style="font-weight:700;">17</div>
                                    <div style="font-size:11px; background: rgba(27,107,114,0.1); color: var(--color-deep-teal); border-radius:4px; padding:2px 6px; margin-top:4px;">Hanafi Fiqh 6pm</div>
                                </div>
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray);">
                                    <div style="font-weight:700;">18</div>
                                    <div style="font-size:11px; background:#FEE2E2; color:#DC2626; border-radius:4px; padding:2px 6px; margin-top:4px;">Quiz Deadline</div>
                                </div>
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray);">
                                    <div style="font-weight:700;">19</div>
                                    <div style="font-size:11px; background: rgba(168,93,136,0.1); color: var(--color-mauve-rose); border-radius:4px; padding:2px 6px; margin-top:4px;">Arabic Gram. 5:30pm</div>
                                </div>
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray);"><div style="font-weight:700;">20</div></div>
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray);"><div style="font-weight:700;">21</div></div>
                                <div style="min-height:90px; padding:8px; border:1px solid var(--color-light-gray);"><div style="font-weight:700;">22</div></div>
                            </div>
                        </div>

                        <!-- Upcoming Events Sidebar -->
                        <div>
                            <div class="card">
                                <h3 style="font-size:14px; font-weight:700; margin-bottom:var(--space-4);">Upcoming Events</h3>
                                <div style="display:grid; gap:var(--space-3);">
                                    <div style="display:flex; gap:12px; align-items:flex-start;">
                                        <div style="text-align:center; min-width:36px; background: var(--color-deep-teal); color:white; border-radius:6px; padding:4px 6px;">
                                            <div style="font-size:14px; font-weight:700;">17</div>
                                            <div style="font-size:9px; text-transform:uppercase;">Mar</div>
                                        </div>
                                        <div>
                                            <div style="font-size:13px; font-weight:600;">Hanafi Fiqh — Section A</div>
                                            <div style="font-size:11px; color: var(--color-body-gray);">6:00 PM · Online</div>
                                        </div>
                                    </div>
                                    <div style="display:flex; gap:12px; align-items:flex-start;">
                                        <div style="text-align:center; min-width:36px; background: #DC2626; color:white; border-radius:6px; padding:4px 6px;">
                                            <div style="font-size:14px; font-weight:700;">18</div>
                                            <div style="font-size:9px; text-transform:uppercase;">Mar</div>
                                        </div>
                                        <div>
                                            <div style="font-size:13px; font-weight:600;">Quiz 1 Deadline</div>
                                            <div style="font-size:11px; color: var(--color-body-gray);">All Fiqh Students</div>
                                        </div>
                                    </div>
                                    <div style="display:flex; gap:12px; align-items:flex-start;">
                                        <div style="text-align:center; min-width:36px; background: var(--color-mauve-rose); color:white; border-radius:6px; padding:4px 6px;">
                                            <div style="font-size:14px; font-weight:700;">19</div>
                                            <div style="font-size:9px; text-transform:uppercase;">Mar</div>
                                        </div>
                                        <div>
                                            <div style="font-size:13px; font-weight:600;">Arabic Grammar 101</div>
                                            <div style="font-size:11px; color: var(--color-body-gray);">5:30 PM · Online</div>
                                        </div>
                                    </div>
                                    <div style="display:flex; gap:12px; align-items:flex-start;">
                                        <div style="text-align:center; min-width:36px; background: #D97706; color:white; border-radius:6px; padding:4px 6px;">
                                            <div style="font-size:14px; font-weight:700;">25</div>
                                            <div style="font-size:9px; text-transform:uppercase;">Mar</div>
                                        </div>
                                        <div>
                                            <div style="font-size:13px; font-weight:600;">Auto-charge Day</div>
                                            <div style="font-size:11px; color: var(--color-body-gray);">21 invoices · $3,150</div>
                                        </div>
                                    </div>
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