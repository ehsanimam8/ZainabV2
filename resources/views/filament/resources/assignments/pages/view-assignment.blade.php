<x-filament-panels::page>
    <div class="content-view">
        <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
            <div>
                <a href="{{ App\Filament\Resources\Assignments\AssignmentResource::getUrl('index') }}" style="font-size:13px;color:var(--color-body-gray);text-decoration:none;">&larr; Assignments</a>
                <h1 class="ui-page-title" style="margin-top:4px;">Assignment: {{ $record->title }}</h1>
                <p style="color: var(--color-body-gray);">{{ $record->course->name ?? 'No Course' }} &middot; Due {{ $record->due_date ? $record->due_date->format('M d, Y') : 'No Due Date' }}</p>
            </div>
            <div class="flex gap-4">
                <button class="btn btn-outline">Export Submissions</button>
                <button class="btn btn-primary">Send Reminder</button>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card" style="text-align: center; display:flex; flex-direction:column; justify-content:center;">
                <div class="stat-value">{{ $totalStudents }}</div>
                <div class="stat-label">Total Students</div>
            </div>
            <div class="stat-card" style="text-align: center; display:flex; flex-direction:column; justify-content:center;">
                <div class="stat-value" style="color: var(--color-deep-teal);">{{ $submissionRate }}%</div>
                <div class="stat-label">Submissions</div>
                <div style="font-size:12px;color:var(--color-body-gray);margin-top:4px;">{{ $submissionsCount }} of {{ $totalStudents }}</div>
            </div>
            <div class="stat-card" style="text-align: center; display:flex; flex-direction:column; justify-content:center;">
                <div class="stat-value" style="color: #6366f1;">{{ $avgScore }}</div>
                <div class="stat-label">Average Score</div>
            </div>
            <div class="stat-card" style="text-align: center; display:flex; flex-direction:column; justify-content:center;">
                <div class="stat-value" style="color: #d97706;">{{ $pendingReview }}</div>
                <div class="stat-label">Pending Review</div>
                <div style="font-size:12px;color:var(--color-body-gray);margin-top:4px;">awaiting grade</div>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 340px; gap: var(--space-6);">
            <!-- Submissions Table -->
            <div class="card" style="padding: 0; overflow: hidden;">
                <div class="flex justify-between items-center p-4" style="border-bottom: 1px solid var(--color-light-gray);">
                    <h3 style="font-size: 16px; font-weight: 700; font-family: 'Playfair Display', serif;">Submissions ({{ $submissionsCount }})</h3>
                    <select style="padding: 6px 12px; border: 1px solid var(--color-mid-gray); border-radius: var(--radius-sm); font-size: 13px;">
                        <option>All</option>
                        <option>Graded</option>
                        <option>Pending</option>
                    </select>
                </div>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Submitted</th>
                            <th>Score</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($record->submissions()->with('user')->get() as $submission)
                        <tr>
                            <td style="text-align: left;">
                                <div style="display:flex;align-items:center;gap:12px;">
                                    <div style="width:32px;height:32px;border-radius:50%;background:var(--color-light-gray);display:flex;align-items:center;justify-content:center;font-weight:700;color:var(--color-deep-teal);font-size:12px;">
                                        {{ substr($submission->user->first_name ?? '?', 0, 1) }}{{ substr($submission->user->last_name ?? '?', 0, 1) }}
                                    </div>
                                    <span style="font-weight:600;">{{ $submission->user->first_name ?? 'Unknown' }} {{ $submission->user->last_name ?? 'Student' }}</span>
                                </div>
                            </td>
                            <td>{{ $submission->submitted_at ? $submission->submitted_at->format('M d, Y') : 'Needs grading' }}</td>
                            <td>
                                @if($submission->status === 'Graded')
                                    <span style="font-weight:700;color:#16A34A;">{{ $submission->earned_points }}</span> / {{ $record->total_points }}
                                @else
                                    <span class="badge badge-warning">{{ $submission->status }}</span>
                                @endif
                            </td>
                            <td><button class="btn btn-outline" style="padding: 4px 12px; font-size: 11px;">View</button></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 20px; color: var(--color-body-gray);">
                                No submissions yet. Students need to submit, or you can assign grades in the Gradebook.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div style="padding: 12px 16px; font-size: 12px; color: var(--color-body-gray); border-top: 1px solid var(--color-light-gray); background: #fafafa;">
                    Showing 0 of 0 submissions
                </div>
            </div>

            <!-- Right Sidebar Panel -->
            <div>
                <div class="card" style="background: #FFFBEB; border: 1px solid #FEF3C7; padding: 16px 20px; margin-bottom: var(--space-4);">
                    <div class="flex justify-between items-center" style="margin-bottom: 16px;">
                        <span style="font-weight: 700; font-size: 14px; color: #92400E;">Not Submitted ({{ $totalStudents - $submissionsCount }})</span>
                        <span style="font-size: 11px; font-weight: 700; color: #D97706;">Due: {{ $record->due_date ? $record->due_date->format('M d') : 'No Date' }}</span>
                    </div>
                    
                    <div style="display: flex; flex-direction: column; gap: 12px; max-height: 250px; overflow-y: auto;">
                        <div style="font-size: 13px; color: #92400E;">
                            @if ($totalStudents == 0)
                                No students enrolled in this course yet.
                            @else
                                Students haven't submitted this assignment.
                            @endif
                        </div>
                    </div>
                    @if ($totalStudents > 0)
                    <button class="btn btn-outline" style="width: 100%; border-color: #D97706; color: #D97706; margin-top: 16px;">Remind All</button>
                    @endif
                </div>

                <div class="card">
                    <h3 style="font-size: 14px; font-weight: 700; font-family: 'Playfair Display', serif; margin-bottom: 16px; letter-spacing: 0.05em; text-transform: uppercase;">Score Distribution</h3>
                    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 8px;">
                        <div style="flex: 1; height: 12px; background: var(--color-light-gray); border-radius: 6px; overflow: hidden;">
                            <div style="width: 0%; height: 100%; background: #16A34A;"></div>
                        </div>
                    </div>
                    <div style="font-size: 11px; color: var(--color-body-gray);">Data not available until submissions are graded.</div>
                </div>
            </div>
        </div>
    </div>
</x-filament-panels::page>
