<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zainab Center – Instructor Portal</title>
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body.teacher { background-color: #f0f9f9; }
        .teacher-sidebar { background: var(--color-deep-navy); color: white; }
        .teacher-sidebar .nav-item { color: rgba(255,255,255,0.7); }
        .teacher-sidebar .nav-item.active { background: rgba(27,107,114,0.3); color: white; border-left: 3px solid var(--color-deep-teal); }
        .teacher-sidebar .nav-item:hover { background: rgba(255,255,255,0.05); color: white; }
        .teacher-sidebar .nav-label { color: rgba(255,255,255,0.4); }
        .section-card { border-left: 4px solid var(--color-deep-teal); }
        .att-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 12px; }
        .att-student { display: flex; align-items: center; justify-content: space-between; padding: 10px 14px; background: white; border-radius: 8px; border: 1px solid var(--color-mid-gray); }
        .att-btn { padding: 4px 10px; border: none; border-radius: 20px; cursor: pointer; font-size: 11px; font-weight: 700; }
        .att-present { background: #dcfce7; color: #16a34a; }
        .att-absent  { background: #fee2e2; color: #dc2626; }
        .att-excused { background: #fef9c3; color: #854d0e; }
    </style>
</head>
<body class="teacher">
    <div class="app-container">
        <!-- Sidebar -->
        <aside class="sidebar teacher-sidebar" id="sidebar" style="background: var(--color-deep-navy);">
            <div class="sidebar-header">
                <div class="flex items-center gap-3">
                    <div class="logo-placeholder">ZC</div>
                    <div>
                        <div class="nav-text brand-font" style="font-size:16px;color:white;font-weight:700;">Zainab Center</div>
                        <div class="nav-text" style="font-size:11px;color:rgba(255,255,255,0.5);">Instructor Portal</div>
                    </div>
                </div>
            </div>
            <div class="nav-group">
                <a href="#teacher-dashboard" class="nav-item active" data-view="teacher-dashboard">
                    <i data-lucide="layout-dashboard" class="nav-icon"></i>
                    <span class="nav-text">Dashboard</span>
                </a>

                <div class="nav-label" style="color:rgba(255,255,255,0.4);">Teaching</div>
                <a href="#teacher-courses" class="nav-item" data-view="teacher-courses">
                    <i data-lucide="book-open" class="nav-icon"></i>
                    <span class="nav-text">My Courses</span>
                </a>
                <a href="#teacher-attendance" class="nav-item" data-view="teacher-attendance">
                    <i data-lucide="calendar-check" class="nav-icon"></i>
                    <span class="nav-text">Attendance</span>
                </a>
                <a href="#teacher-gradebook" class="nav-item" data-view="teacher-gradebook">
                    <i data-lucide="award" class="nav-icon"></i>
                    <span class="nav-text">Gradebook</span>
                </a>
                <a href="#teacher-assignments" class="nav-item" data-view="teacher-assignments">
                    <i data-lucide="clipboard-list" class="nav-icon"></i>
                    <span class="nav-text">Assignments</span>
                </a>
                <a href="#teacher-quizzes" class="nav-item" data-view="teacher-quizzes">
                    <i data-lucide="help-circle" class="nav-icon"></i>
                    <span class="nav-text">Quizzes</span>
                </a>

                <div class="nav-label" style="color:rgba(255,255,255,0.4);">Content</div>
                <a href="#teacher-lessons" class="nav-item" data-view="teacher-lessons">
                    <i data-lucide="play-circle" class="nav-icon"></i>
                    <span class="nav-text">Lessons</span>
                </a>
                <a href="#teacher-calendar" class="nav-item" data-view="teacher-calendar">
                    <i data-lucide="calendar" class="nav-icon"></i>
                    <span class="nav-text">Schedule</span>
                </a>

                <div class="nav-label" style="color:rgba(255,255,255,0.4);">Communication</div>
                <a href="#teacher-messages" class="nav-item" data-view="teacher-messages">
                    <i data-lucide="message-square" class="nav-icon"></i>
                    <span class="nav-text">Messages</span>
                </a>
            </div>
            <div class="sidebar-footer">
                <div style="padding:12px 16px;display:flex;align-items:center;gap:10px;">
                    <div style="width:34px;height:34px;border-radius:50%;background:var(--color-deep-teal);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:13px;color:white;flex-shrink:0;">AK</div>
                    <div style="flex:1;min-width:0;" class="nav-text">
                        <div style="font-weight:600;font-size:13px;color:white;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Ust. {{ $user->first_name }} {{ $user->last_name }}</div>
                        <div style="font-size:11px;color:rgba(255,255,255,0.5);">Instructor</div>
                    </div>
                    <a href="{{ url('/admin') }}" style="color:rgba(255,255,255,0.4);" title="Sign out" class="nav-text"><i data-lucide="log-out" style="width:16px;"></i></a>
                </div>
            </div>
        </aside>

        <!-- Main content -->
        <div class="main-content">
            <!-- Top bar -->
            <header class="topbar">
                <div class="breadcrumbs" id="breadcrumbs">
                    <span style="color:var(--color-deep-teal);font-weight:600;">Dashboard</span>
                </div>
                <div class="topbar-actions">
                    <span style="font-size:13px;color:var(--color-body-gray);">Spring 2026</span>
                </div>
            </header>

            <main style="padding: var(--space-8);">

                <!-- ============================================================
                     VIEW: Teacher Dashboard
                     ============================================================ -->
                <section id="view-teacher-dashboard" class="content-view">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Assalamu Alaikum, {{ $user->first_name }}</h1>
                            <p style="color: var(--color-body-gray);">{{ now()->format('l, F j, Y') }}</p>
                        </div>
                    </div>

                    <!-- Quick stats -->
                    <div class="stats-grid" style="margin-bottom: var(--space-6);">
                        <div class="stat-card" style="border-left: 4px solid var(--color-deep-teal);">
                            <span class="stat-label">Assigned Courses</span>
                            <div class="stat-value">{{ $metrics['total_courses'] }}</div>
                        </div>
                        <div class="stat-card" style="border-left: 4px solid #6366f1;">
                            <span class="stat-label">Total Students</span>
                            <div class="stat-value">{{ $metrics['total_students'] }}</div>
                        </div>
                        <div class="stat-card" style="border-left: 4px solid #d97706;">
                            <span class="stat-label">Pending Grading</span>
                            <div class="stat-value" style="color:#d97706;">{{ $metrics['pending_grades'] }}</div>
                        </div>
                        <div class="stat-card" style="border-left: 4px solid #dc2626;">
                            <span class="stat-label">Attendance Due</span>
                            <div class="stat-value" style="color:#dc2626;">1</div>
                            <div style="font-size:11px;color:var(--color-body-gray);margin-top:4px;">today's session</div>
                        </div>
                    </div>

                    <div style="display:grid;grid-template-columns:2fr 1fr;gap:var(--space-6);">
                        <!-- Today's Schedule -->
                        <div class="card">
                            <h3 style="font-size:15px;font-weight:700;margin-bottom:var(--space-4);">Assigned Sessions</h3>
                            <div style="display:flex;flex-direction:column;gap:12px;">
                                @forelse($sections as $index => $section)
                                <div style="padding:14px 16px;background:{{ $index === 0 ? 'var(--color-warm-ivory)' : 'var(--color-light-gray)' }};border-radius:8px;border-left:4px solid {{ $index === 0 ? 'var(--color-deep-teal)' : 'var(--color-mid-gray)' }};display:flex;justify-content:space-between;align-items:center;opacity:{{ $index === 0 ? '1' : '0.7' }};">
                                    <div>
                                        <div style="font-weight:700;font-size:14px;">{{ $section->course->name }}</div>
                                        <div style="font-size:12px;color:var(--color-body-gray);margin-top:3px;">{{ $section->name }}</div>
                                        <div style="font-size:12px;color:var(--color-body-gray);">{{ is_array($section->days_of_week) ? implode(', ', $section->days_of_week) : '' }} {{ \Carbon\Carbon::parse($section->start_time)->format('g:i A') }} – {{ \Carbon\Carbon::parse($section->end_time)->format('g:i A') }} · {{ $section->room_location }}</div>
                                    </div>
                                    <div class="flex gap-2">
                                        <a href="#teacher-attendance" class="btn btn-primary" style="font-size:12px;padding:6px 14px;" onclick="switchTeacherView('teacher-attendance')">Take Attendance</a>
                                        <a href="#teacher-lessons" class="btn btn-outline" style="font-size:12px;padding:6px 14px;" onclick="switchTeacherView('teacher-lessons')">Lesson</a>
                                    </div>
                                </div>
                                @empty
                                <div style="font-size:13px;color:var(--color-body-gray);">No assigned sessions found.</div>
                                @endforelse
                            </div>
                        </div>

                        <!-- Pending tasks -->
                        <div class="card">
                            <h3 style="font-size:15px;font-weight:700;margin-bottom:var(--space-4);">Action Required</h3>
                            <div style="display:flex;flex-direction:column;gap:10px;">
                                <div style="padding:10px 12px;background:#fff7ed;border-radius:6px;border-left:3px solid #d97706;">
                                    <div style="font-size:13px;font-weight:600;color:#92400e;">6 assignments to grade</div>
                                    <div style="font-size:12px;color:var(--color-body-gray);margin-top:2px;">Essay on Taharah · due Mar 20</div>
                                    <a href="#teacher-assignments" onclick="switchTeacherView('teacher-assignments')" style="font-size:12px;color:var(--color-deep-teal);font-weight:600;text-decoration:none;margin-top:6px;display:block;">Grade now →</a>
                                </div>
                                <div style="padding:10px 12px;background:#fff1f2;border-radius:6px;border-left:3px solid #dc2626;">
                                    <div style="font-size:13px;font-weight:600;color:#991b1b;">Attendance not recorded</div>
                                    <div style="font-size:12px;color:var(--color-body-gray);margin-top:2px;">Arabic Grammar — Session 12</div>
                                    <a href="#teacher-attendance" onclick="switchTeacherView('teacher-attendance')" style="font-size:12px;color:var(--color-deep-teal);font-weight:600;text-decoration:none;margin-top:6px;display:block;">Record now →</a>
                                </div>
                                <div style="padding:10px 12px;background:#f0fdf4;border-radius:6px;border-left:3px solid #16a34a;">
                                    <div style="font-size:13px;font-weight:600;color:#14532d;">Lesson ready to publish</div>
                                    <div style="font-size:12px;color:var(--color-body-gray);margin-top:2px;">Verb Conjugation — Part 3 (Draft)</div>
                                    <a href="#teacher-lessons" onclick="switchTeacherView('teacher-lessons')" style="font-size:12px;color:var(--color-deep-teal);font-weight:600;text-decoration:none;margin-top:6px;display:block;">Review draft →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ============================================================
                     VIEW: My Courses
                     ============================================================ -->
                <section id="view-teacher-courses" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">My Courses</h1>
                            <p style="color: var(--color-body-gray);">Assigned course sections for Spring 2026.</p>
                        </div>
                    </div>

                    <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:var(--space-6);">
                        @forelse($sections as $section)
                        <div class="card section-card">
                            <div class="flex justify-between items-start" style="margin-bottom:var(--space-4);">
                                <div>
                                    <h3 style="font-family:'Inter';font-weight:700;font-size:16px;">{{ $section->course->name }}</h3>
                                    <span class="badge badge-info" style="margin-top:4px;">{{ $section->name }}</span>
                                </div>
                                <span class="badge badge-success">Active</span>
                            </div>
                            <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;font-size:13px;margin-bottom:var(--space-4);">
                                <div><span style="color:var(--color-body-gray);">Enrolled:</span> <strong>{{ $students->count() }}</strong></div>
                                <div><span style="color:var(--color-body-gray);">Capacity:</span> <strong>{{ $section->max_capacity ?? '∞' }}</strong></div>
                                <div><span style="color:var(--color-body-gray);">Schedule:</span> <strong>{{ is_array($section->days_of_week) ? implode(', ', $section->days_of_week) : '' }} {{ \Carbon\Carbon::parse($section->start_time)->format('g:i A') }}</strong></div>
                                <div><span style="color:var(--color-body-gray);">Room:</span> <strong>{{ $section->room_location ?? 'Online' }}</strong></div>
                            </div>
                            <div style="margin-bottom:var(--space-4);">
                                <div style="display:flex;justify-content:space-between;font-size:12px;margin-bottom:4px;"><span>Course Progress</span><span>--%</span></div>
                                <div style="background:var(--color-light-gray);border-radius:99px;height:6px;"><div style="background:var(--color-deep-teal);width:0%;height:6px;border-radius:99px;"></div></div>
                            </div>
                            <div class="flex gap-3">
                                <a href="#teacher-attendance" onclick="switchTeacherView('teacher-attendance')" class="btn btn-outline" style="flex:1;font-size:12px;text-align:center;">Attendance</a>
                                <a href="#teacher-gradebook" onclick="switchTeacherView('teacher-gradebook')" class="btn btn-outline" style="flex:1;font-size:12px;text-align:center;">Gradebook</a>
                                <a href="#teacher-lessons" onclick="switchTeacherView('teacher-lessons')" class="btn btn-primary" style="flex:1;font-size:12px;text-align:center;">Lessons</a>
                            </div>
                        </div>
                        @empty
                        <div style="grid-column:1/-1;background:white;padding:40px;text-align:center;border-radius:12px;border:1px dashed var(--color-mid-gray);">
                            <i data-lucide="book" style="width:32px;color:var(--color-body-gray);margin:0 auto 12px;display:block;"></i>
                            <h3 style="font-size:15px;font-weight:700;color:var(--color-deep-navy);">No courses assigned</h3>
                            <p style="font-size:13px;color:var(--color-body-gray);margin-top:6px;">You have no active sections assigned to your instructor profile this term.</p>
                        </div>
                        @endforelse
                    </div>
                </section>

                <!-- ============================================================
                     VIEW: Attendance
                     ============================================================ -->
                <section id="view-teacher-attendance" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Attendance</h1>
                            <p style="color: var(--color-body-gray);">Record and review session attendance for your courses.</p>
                        </div>
                        <button class="btn btn-primary" onclick="saveAttendance()">Save Attendance</button>
                    </div>

                    <!-- Session selector -->
                    <div class="card flex gap-4 items-center" style="margin-bottom:var(--space-6);">
                        <div>
                            <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;">Course</label>
                            <select style="padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                                <option>Arabic Grammar — Level 2</option>
                                <option>Hanafi Fiqh — Fundamentals</option>
                            </select>
                        </div>
                        <div>
                            <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;">Session</label>
                            <select style="padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                                <option>Session 12 — Mar 15, 2026</option>
                                <option>Session 11 — Mar 13, 2026</option>
                                <option>Session 10 — Mar 11, 2026</option>
                            </select>
                        </div>
                        <div style="align-self:flex-end;display:flex;gap:8px;">
                            <button onclick="markAllAttendance('present')" class="btn btn-outline" style="font-size:12px;padding:8px 14px;color:#16a34a;border-color:#16a34a;">✓ All Present</button>
                            <button onclick="markAllAttendance('absent')" class="btn btn-outline" style="font-size:12px;padding:8px 14px;color:#dc2626;border-color:#dc2626;">✗ All Absent</button>
                        </div>
                    </div>

                    <!-- Student attendance grid -->
                    <div class="card">
                        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;">
                            <h4 style="font-weight:700;">Session 12 · Arabic Grammar — Level 2 · Mar 15, 2026</h4>
                            <span style="font-size:12px;color:var(--color-body-gray);" id="att-summary">26 students</span>
                        </div>
                        <div class="att-grid" id="att-grid">
                            <!-- Student attendance cards -->
                            <div class="att-student"><span style="font-size:13px;font-weight:600;">Zainab Ahmed</span><div class="flex gap-1"><button class="att-btn att-present" onclick="toggleAtt(this,'present')">P</button><button class="att-btn" style="background:#f3f4f6;color:#6b7280;" onclick="toggleAtt(this,'absent')">A</button><button class="att-btn" style="background:#f3f4f6;color:#6b7280;" onclick="toggleAtt(this,'excused')">E</button></div></div>
                            <div class="att-student"><span style="font-size:13px;font-weight:600;">Fatima Al-Hassan</span><div class="flex gap-1"><button class="att-btn att-present" onclick="toggleAtt(this,'present')">P</button><button class="att-btn" style="background:#f3f4f6;color:#6b7280;" onclick="toggleAtt(this,'absent')">A</button><button class="att-btn" style="background:#f3f4f6;color:#6b7280;" onclick="toggleAtt(this,'excused')">E</button></div></div>
                            <div class="att-student"><span style="font-size:13px;font-weight:600;">Omar Khalil</span><div class="flex gap-1"><button class="att-btn" style="background:#f3f4f6;color:#6b7280;" onclick="toggleAtt(this,'present')">P</button><button class="att-btn att-absent" onclick="toggleAtt(this,'absent')">A</button><button class="att-btn" style="background:#f3f4f6;color:#6b7280;" onclick="toggleAtt(this,'excused')">E</button></div></div>
                            <div class="att-student"><span style="font-size:13px;font-weight:600;">Aisha Rahman</span><div class="flex gap-1"><button class="att-btn att-present" onclick="toggleAtt(this,'present')">P</button><button class="att-btn" style="background:#f3f4f6;color:#6b7280;" onclick="toggleAtt(this,'absent')">A</button><button class="att-btn" style="background:#f3f4f6;color:#6b7280;" onclick="toggleAtt(this,'excused')">E</button></div></div>
                            <div class="att-student"><span style="font-size:13px;font-weight:600;">Hassan Karim</span><div class="flex gap-1"><button class="att-btn att-present" onclick="toggleAtt(this,'present')">P</button><button class="att-btn" style="background:#f3f4f6;color:#6b7280;" onclick="toggleAtt(this,'absent')">A</button><button class="att-btn" style="background:#f3f4f6;color:#6b7280;" onclick="toggleAtt(this,'excused')">E</button></div></div>
                            <div class="att-student"><span style="font-size:13px;font-weight:600;">Sara Malik</span><div class="flex gap-1"><button class="att-btn" style="background:#f3f4f6;color:#6b7280;" onclick="toggleAtt(this,'present')">P</button><button class="att-btn" style="background:#f3f4f6;color:#6b7280;" onclick="toggleAtt(this,'absent')">A</button><button class="att-btn att-excused" onclick="toggleAtt(this,'excused')">E</button></div></div>
                            <div class="att-student"><span style="font-size:13px;font-weight:600;">Ibrahim Nour</span><div class="flex gap-1"><button class="att-btn att-present" onclick="toggleAtt(this,'present')">P</button><button class="att-btn" style="background:#f3f4f6;color:#6b7280;" onclick="toggleAtt(this,'absent')">A</button><button class="att-btn" style="background:#f3f4f6;color:#6b7280;" onclick="toggleAtt(this,'excused')">E</button></div></div>
                            <div class="att-student"><span style="font-size:13px;font-weight:600;">Maryam Okonkwo</span><div class="flex gap-1"><button class="att-btn att-present" onclick="toggleAtt(this,'present')">P</button><button class="att-btn" style="background:#f3f4f6;color:#6b7280;" onclick="toggleAtt(this,'absent')">A</button><button class="att-btn" style="background:#f3f4f6;color:#6b7280;" onclick="toggleAtt(this,'excused')">E</button></div></div>
                        </div>
                    </div>
                </section>

                <!-- ============================================================
                     VIEW: Gradebook
                     ============================================================ -->
                <section id="view-teacher-gradebook" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Gradebook</h1>
                            <p style="color: var(--color-body-gray);">View and enter assessment scores for your assigned sections.</p>
                        </div>
                        <button class="btn btn-outline" onclick="showToast('Gradebook exported as CSV')">Export CSV</button>
                    </div>

                    <div class="card" style="margin-bottom:var(--space-4);">
                        <div class="flex gap-3 items-center">
                            <select style="padding:8px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                                <option>Arabic Grammar — Level 2 · Section A</option>
                                <option>Hanafi Fiqh — Fundamentals · Section B</option>
                            </select>
                        </div>
                    </div>

                    <div class="card" style="padding:0;overflow-x:auto;">
                        <table style="width:100%;border-collapse:collapse;font-size:13px;">
                            <thead style="background:var(--color-deep-navy);color:white;">
                                <tr>
                                    <th style="padding:12px 20px;text-align:left;min-width:150px;">Student</th>
                                    <th style="padding:12px;text-align:center;">Quiz 1<br><span style="font-weight:normal;opacity:0.7;font-size:11px;">10 pts</span></th>
                                    <th style="padding:12px;text-align:center;">Assignment 1<br><span style="font-weight:normal;opacity:0.7;font-size:11px;">20 pts</span></th>
                                    <th style="padding:12px;text-align:center;">Quiz 2<br><span style="font-weight:normal;opacity:0.7;font-size:11px;">10 pts</span></th>
                                    <th style="padding:12px;text-align:center;">Midterm<br><span style="font-weight:normal;opacity:0.7;font-size:11px;">50 pts</span></th>
                                    <th style="padding:12px;text-align:center;background:rgba(255,255,255,0.1);">Overall %</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:12px 20px;font-weight:600;">Zainab Ahmed</td>
                                    <td style="padding:12px;text-align:center;background:#f0fdf4;"><input type="number" value="9" min="0" max="10" style="width:48px;text-align:center;border:1px solid #86efac;border-radius:4px;padding:4px;font-size:13px;"></td>
                                    <td style="padding:12px;text-align:center;background:#f0fdf4;"><input type="number" value="20" min="0" max="20" style="width:48px;text-align:center;border:1px solid #86efac;border-radius:4px;padding:4px;font-size:13px;"></td>
                                    <td style="padding:12px;text-align:center;"><input type="number" value="8" min="0" max="10" style="width:48px;text-align:center;border:1px solid var(--color-mid-gray);border-radius:4px;padding:4px;font-size:13px;"></td>
                                    <td style="padding:12px;text-align:center;color:var(--color-body-gray);">—</td>
                                    <td style="padding:12px;text-align:center;font-weight:700;color:var(--color-deep-teal);">92%</td>
                                </tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:12px 20px;font-weight:600;">Fatima Al-Hassan</td>
                                    <td style="padding:12px;text-align:center;background:#fffbeb;"><input type="number" value="7" min="0" max="10" style="width:48px;text-align:center;border:1px solid #fcd34d;border-radius:4px;padding:4px;font-size:13px;"></td>
                                    <td style="padding:12px;text-align:center;background:#fef2f2;"><input type="number" value="12" min="0" max="20" style="width:48px;text-align:center;border:1px solid #fca5a5;border-radius:4px;padding:4px;font-size:13px;"></td>
                                    <td style="padding:12px;text-align:center;"><span style="background:#fef9c3;color:#854d0e;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Pending</span></td>
                                    <td style="padding:12px;text-align:center;color:var(--color-body-gray);">—</td>
                                    <td style="padding:12px;text-align:center;font-weight:700;color:#d97706;">68%</td>
                                </tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:12px 20px;font-weight:600;">Omar Khalil</td>
                                    <td style="padding:12px;text-align:center;background:#f0fdf4;"><input type="number" value="10" min="0" max="10" style="width:48px;text-align:center;border:1px solid #86efac;border-radius:4px;padding:4px;font-size:13px;"></td>
                                    <td style="padding:12px;text-align:center;"><span style="background:#fef9c3;color:#854d0e;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Pending</span></td>
                                    <td style="padding:12px;text-align:center;"><input type="number" value="9" min="0" max="10" style="width:48px;text-align:center;border:1px solid var(--color-mid-gray);border-radius:4px;padding:4px;font-size:13px;"></td>
                                    <td style="padding:12px;text-align:center;color:var(--color-body-gray);">—</td>
                                    <td style="padding:12px;text-align:center;font-weight:700;">—</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="margin-top:var(--space-4);text-align:right;">
                        <button class="btn btn-primary" onclick="showToast('Grades saved')">Save Grades</button>
                    </div>
                </section>

                <!-- ============================================================
                     VIEW: Assignments
                     ============================================================ -->
                <section id="view-teacher-assignments" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Assignments</h1>
                            <p style="color: var(--color-body-gray);">Create assignments and review student submissions.</p>
                        </div>
                        <button class="btn btn-primary" onclick="openNewAssignmentModal()">+ New Assignment</button>
                    </div>

                    <div class="card" style="padding:0;overflow:hidden;">
                        <table style="width:100%;border-collapse:collapse;font-size:13px;">
                            <thead style="background:var(--color-light-gray);border-bottom:2px solid var(--color-mid-gray);">
                                <tr>
                                    <th style="padding:12px 20px;text-align:left;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Assignment</th>
                                    <th style="padding:12px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;text-align:left;">Course</th>
                                    <th style="padding:12px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;text-align:center;">Due</th>
                                    <th style="padding:12px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;text-align:center;">Submitted</th>
                                    <th style="padding:12px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;text-align:center;">Graded</th>
                                    <th style="padding:12px 20px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;text-align:right;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:14px 20px;font-weight:700;">Essay on Taharah</td>
                                    <td style="padding:14px 12px;">Hanafi Fiqh</td>
                                    <td style="padding:14px 12px;text-align:center;font-size:12px;color:#d97706;font-weight:600;">Mar 20</td>
                                    <td style="padding:14px 12px;text-align:center;"><span style="font-weight:700;color:var(--color-deep-teal);">19 / 22</span></td>
                                    <td style="padding:14px 12px;text-align:center;"><span style="background:#fef9c3;color:#854d0e;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">15 graded · 4 pending</span></td>
                                    <td style="padding:14px 20px;text-align:right;"><button class="btn btn-primary" style="font-size:12px;padding:5px 14px;" onclick="switchTeacherView('teacher-assignment-detail')">Grade (4)</button></td>
                                </tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:14px 20px;font-weight:700;">Verb Conjugation Practice Sheet</td>
                                    <td style="padding:14px 12px;">Arabic Grammar</td>
                                    <td style="padding:14px 12px;text-align:center;font-size:12px;color:var(--color-body-gray);">Mar 12</td>
                                    <td style="padding:14px 12px;text-align:center;"><span style="font-weight:700;color:var(--color-deep-teal);">24 / 26</span></td>
                                    <td style="padding:14px 12px;text-align:center;"><span style="background:#dcfce7;color:#16a34a;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">All graded</span></td>
                                    <td style="padding:14px 20px;text-align:right;"><button class="btn btn-outline" style="font-size:12px;padding:5px 14px;" onclick="switchTeacherView('teacher-assignment-detail')">View</button></td>
                                </tr>
                                <tr>
                                    <td style="padding:14px 20px;font-weight:700;">Reflection on Five Pillars</td>
                                    <td style="padding:14px 12px;">Hanafi Fiqh</td>
                                    <td style="padding:14px 12px;text-align:center;font-size:12px;color:var(--color-body-gray);">Mar 28</td>
                                    <td style="padding:14px 12px;text-align:center;color:var(--color-body-gray);">0 / 22</td>
                                    <td style="padding:14px 12px;text-align:center;"><span style="background:#f3f4f6;color:#6b7280;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Not due yet</span></td>
                                    <td style="padding:14px 20px;text-align:right;"><button class="btn btn-outline" style="font-size:12px;padding:5px 14px;" onclick="openNewAssignmentModal()">Edit</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- ============================================================
                     VIEW: Lessons
                     ============================================================ -->
                <section id="view-teacher-lessons" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Lessons</h1>
                            <p style="color: var(--color-body-gray);">Create and publish lesson content for your courses.</p>
                        </div>
                        <button class="btn btn-primary" onclick="openCreateLessonModal()">+ Create Lesson</button>
                    </div>

                    <div class="card" style="padding:0;overflow:hidden;">
                        <table style="width:100%;border-collapse:collapse;font-size:13px;">
                            <thead style="background:var(--color-light-gray);border-bottom:2px solid var(--color-mid-gray);">
                                <tr>
                                    <th style="padding:12px 20px;text-align:left;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Lesson</th>
                                    <th style="padding:12px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;text-align:left;">Course</th>
                                    <th style="padding:12px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Type</th>
                                    <th style="padding:12px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Status</th>
                                    <th style="padding:12px 20px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;text-align:right;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:14px 20px;font-weight:700;"><div class="flex items-center gap-2"><i data-lucide="play-circle" style="width:16px;color:var(--color-deep-teal);"></i>Verb Conjugation — Part 3</div></td>
                                    <td style="padding:14px 12px;">Arabic Grammar</td>
                                    <td style="padding:14px 12px;">Video</td>
                                    <td style="padding:14px 12px;"><span style="background:#fef9c3;color:#854d0e;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Draft</span></td>
                                    <td style="padding:14px 20px;text-align:right;"><div class="flex gap-2" style="justify-content:flex-end;"><button class="btn btn-outline" style="font-size:12px;padding:4px 12px;">Edit</button><button class="btn btn-primary" style="font-size:12px;padding:4px 12px;" onclick="showToast('Lesson published')">Publish</button></div></td>
                                </tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:14px 20px;font-weight:700;"><div class="flex items-center gap-2"><i data-lucide="file-text" style="width:16px;color:#6366f1;"></i>The Rules of Taharah</div></td>
                                    <td style="padding:14px 12px;">Hanafi Fiqh</td>
                                    <td style="padding:14px 12px;">PDF + Quiz</td>
                                    <td style="padding:14px 12px;"><span class="badge badge-success">Published</span></td>
                                    <td style="padding:14px 20px;text-align:right;"><button class="btn btn-outline" style="font-size:12px;padding:4px 12px;">Edit</button></td>
                                </tr>
                                <tr>
                                    <td style="padding:14px 20px;font-weight:700;"><div class="flex items-center gap-2"><i data-lucide="play-circle" style="width:16px;color:var(--color-deep-teal);"></i>Introduction to Sarf</div></td>
                                    <td style="padding:14px 12px;">Arabic Grammar</td>
                                    <td style="padding:14px 12px;">Video</td>
                                    <td style="padding:14px 12px;"><span class="badge badge-success">Published</span></td>
                                    <td style="padding:14px 20px;text-align:right;"><button class="btn btn-outline" style="font-size:12px;padding:4px 12px;">Edit</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- ============================================================
                     VIEW: Schedule (Calendar stub)
                     ============================================================ -->
                <section id="view-teacher-calendar" class="content-view hidden">
                    <div style="margin-bottom: var(--space-6);">
                        <h1 class="ui-page-title">Teaching Schedule</h1>
                        <p style="color: var(--color-body-gray);">Your session schedule for Spring 2026.</p>
                    </div>
                    <div class="card">
                        <div style="display:grid;grid-template-columns:repeat(7,1fr);text-align:center;font-size:11px;font-weight:700;text-transform:uppercase;color:var(--color-body-gray);margin-bottom:8px;">
                            <div>Sun</div><div>Mon</div><div>Tue</div><div>Wed</div><div>Thu</div><div>Fri</div><div>Sat</div>
                        </div>
                        <div style="display:grid;grid-template-columns:repeat(7,1fr);gap:4px;">
                            <!-- Week of Mar 15 -->
                            <div style="min-height:80px;padding:6px;border:1px solid var(--color-light-gray);border-radius:4px;background:rgba(27,107,114,0.05);">
                                <div style="font-size:12px;font-weight:700;margin-bottom:4px;">15</div>
                                <div style="font-size:10px;background:var(--color-deep-teal);color:white;padding:2px 4px;border-radius:3px;margin-bottom:2px;">Arabic Gr. 7PM</div>
                                <div style="font-size:10px;background:#6366f1;color:white;padding:2px 4px;border-radius:3px;">Fiqh 9PM</div>
                            </div>
                            <div style="min-height:80px;padding:6px;border:1px solid var(--color-light-gray);border-radius:4px;"><div style="font-size:12px;font-weight:700;">16</div></div>
                            <div style="min-height:80px;padding:6px;border:1px solid var(--color-light-gray);border-radius:4px;background:rgba(27,107,114,0.05);">
                                <div style="font-size:12px;font-weight:700;margin-bottom:4px;">17</div>
                                <div style="font-size:10px;background:var(--color-deep-teal);color:white;padding:2px 4px;border-radius:3px;">Arabic Gr. 7PM</div>
                            </div>
                            <div style="min-height:80px;padding:6px;border:1px solid var(--color-light-gray);border-radius:4px;"><div style="font-size:12px;font-weight:700;">18</div></div>
                            <div style="min-height:80px;padding:6px;border:1px solid var(--color-light-gray);border-radius:4px;background:rgba(99,102,241,0.05);">
                                <div style="font-size:12px;font-weight:700;margin-bottom:4px;">19</div>
                                <div style="font-size:10px;background:#6366f1;color:white;padding:2px 4px;border-radius:3px;">Fiqh 9PM</div>
                            </div>
                            <div style="min-height:80px;padding:6px;border:1px solid var(--color-light-gray);border-radius:4px;"><div style="font-size:12px;font-weight:700;">20</div></div>
                            <div style="min-height:80px;padding:6px;border:1px solid var(--color-light-gray);border-radius:4px;"><div style="font-size:12px;font-weight:700;">21</div></div>
                        </div>
                    </div>
                </section>

                <!-- ============================================================
                     VIEW: Messages
                     ============================================================ -->
                <section id="view-teacher-messages" class="content-view hidden">
                    <div style="margin-bottom: var(--space-6);">
                        <h1 class="ui-page-title">Messages</h1>
                        <p style="color: var(--color-body-gray);">Send announcements to your course sections.</p>
                    </div>

                    <div class="card">
                        <h4 style="font-size:14px;font-weight:700;margin-bottom:var(--space-4);">Send Announcement to Section</h4>
                        <div style="display:grid;gap:14px;">
                            <div>
                                <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;">Send to</label>
                                <select style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                                    <option>Arabic Grammar — Level 2 (26 students)</option>
                                    <option>Hanafi Fiqh — Fundamentals (22 students)</option>
                                    <option>Both courses (48 students)</option>
                                </select>
                            </div>
                            <div>
                                <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;">Channel</label>
                                <div class="flex gap-3">
                                    <label class="flex items-center gap-2" style="font-size:13px;cursor:pointer;"><input type="checkbox" checked> Portal notification</label>
                                    <label class="flex items-center gap-2" style="font-size:13px;cursor:pointer;"><input type="checkbox"> Email</label>
                                    <label class="flex items-center gap-2" style="font-size:13px;cursor:pointer;"><input type="checkbox"> SMS</label>
                                </div>
                            </div>
                            <div>
                                <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;">Subject</label>
                                <input type="text" placeholder="e.g. Session reschedule notice" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                            </div>
                            <div>
                                <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;">Message</label>
                                <textarea placeholder="Write your announcement here…" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;min-height:100px;resize:vertical;font-family:inherit;"></textarea>
                            </div>
                            <div style="text-align:right;">
                                <button class="btn btn-primary" onclick="showToast('Announcement sent')">Send Announcement</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ============================================================
                     VIEW: Quizzes list
                     ============================================================ -->
                <section id="view-teacher-quizzes" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Quizzes</h1>
                            <p style="color: var(--color-body-gray);">Create and manage quizzes for your courses.</p>
                        </div>
                        <button class="btn btn-primary" onclick="switchTeacherView('teacher-quiz-builder')">
                            <i data-lucide="plus" style="width:14px;vertical-align:middle;margin-right:6px;"></i>Create Quiz
                        </button>
                    </div>

                    <div class="card" style="padding:0;overflow:hidden;">
                        <table style="width:100%;border-collapse:collapse;font-size:13px;">
                            <thead style="background:var(--color-light-gray);border-bottom:2px solid var(--color-mid-gray);">
                                <tr>
                                    <th style="padding:12px 20px;text-align:left;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Quiz</th>
                                    <th style="padding:12px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;text-align:left;">Course</th>
                                    <th style="padding:12px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;text-align:center;">Questions</th>
                                    <th style="padding:12px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;text-align:center;">Attempts</th>
                                    <th style="padding:12px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;text-align:center;">Avg Score</th>
                                    <th style="padding:12px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;text-align:center;">Status</th>
                                    <th style="padding:12px 20px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;text-align:right;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:14px 20px;font-weight:700;">Quiz 1: Pillars of Salah</td>
                                    <td style="padding:14px 12px;">Hanafi Fiqh</td>
                                    <td style="padding:14px 12px;text-align:center;">8</td>
                                    <td style="padding:14px 12px;text-align:center;font-weight:700;color:var(--color-deep-teal);">20 / 22</td>
                                    <td style="padding:14px 12px;text-align:center;font-weight:700;">78%</td>
                                    <td style="padding:14px 12px;text-align:center;"><span class="badge badge-success">Published</span></td>
                                    <td style="padding:14px 20px;text-align:right;">
                                        <div class="flex gap-2" style="justify-content:flex-end;">
                                            <button class="btn btn-outline" style="font-size:12px;padding:4px 12px;" onclick="switchTeacherView('teacher-quiz-builder')">Edit</button>
                                            <button class="btn btn-primary" style="font-size:12px;padding:4px 12px;" onclick="switchTeacherView('teacher-assignment-detail')">Results</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:14px 20px;font-weight:700;">Quiz 2: Verb Conjugation</td>
                                    <td style="padding:14px 12px;">Arabic Grammar</td>
                                    <td style="padding:14px 12px;text-align:center;">10</td>
                                    <td style="padding:14px 12px;text-align:center;font-weight:700;color:var(--color-deep-teal);">24 / 26</td>
                                    <td style="padding:14px 12px;text-align:center;font-weight:700;">85%</td>
                                    <td style="padding:14px 12px;text-align:center;"><span class="badge badge-success">Published</span></td>
                                    <td style="padding:14px 20px;text-align:right;">
                                        <div class="flex gap-2" style="justify-content:flex-end;">
                                            <button class="btn btn-outline" style="font-size:12px;padding:4px 12px;" onclick="switchTeacherView('teacher-quiz-builder')">Edit</button>
                                            <button class="btn btn-primary" style="font-size:12px;padding:4px 12px;" onclick="switchTeacherView('teacher-assignment-detail')">Results</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:14px 20px;font-weight:700;">Quiz 3: Sentence Structure</td>
                                    <td style="padding:14px 12px;">Arabic Grammar</td>
                                    <td style="padding:14px 12px;text-align:center;">6</td>
                                    <td style="padding:14px 12px;text-align:center;color:var(--color-body-gray);">0 / 26</td>
                                    <td style="padding:14px 12px;text-align:center;color:var(--color-body-gray);">—</td>
                                    <td style="padding:14px 12px;text-align:center;"><span style="background:#fef9c3;color:#854d0e;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Draft</span></td>
                                    <td style="padding:14px 20px;text-align:right;">
                                        <div class="flex gap-2" style="justify-content:flex-end;">
                                            <button class="btn btn-outline" style="font-size:12px;padding:4px 12px;" onclick="switchTeacherView('teacher-quiz-builder')">Edit</button>
                                            <button class="btn btn-primary" style="font-size:12px;padding:4px 12px;" onclick="showToast('Quiz published')">Publish</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- ============================================================
                     VIEW: Quiz Builder
                     ============================================================ -->
                <section id="view-teacher-quiz-builder" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <a href="#teacher-quizzes" onclick="switchTeacherView('teacher-quizzes')" style="font-size:13px;color:var(--color-body-gray);text-decoration:none;cursor:pointer;">← Quizzes</a>
                            <h1 class="ui-page-title" style="margin-top:4px;">Quiz Builder</h1>
                            <p style="color: var(--color-body-gray);">Build assessments with multiple question types, time limits, and grading rules.</p>
                        </div>
                        <div class="flex gap-3">
                            <button class="btn btn-outline" onclick="showToast('Quiz saved as draft')">Save Draft</button>
                            <button class="btn btn-primary" onclick="showToast('Quiz published successfully')"><i data-lucide="check" style="width:14px;vertical-align:middle;margin-right:6px;"></i>Publish Quiz</button>
                        </div>
                    </div>

                    <div style="display:grid;grid-template-columns:2fr 1fr;gap:var(--space-6);">
                        <!-- LEFT: Quiz form -->
                        <div>
                            <!-- Quiz settings -->
                            <div class="card" style="margin-bottom:var(--space-4);">
                                <h4 style="font-size:13px;font-weight:700;margin-bottom:16px;color:var(--color-deep-navy);">Quiz Settings</h4>
                                <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
                                    <div style="grid-column:1/-1;">
                                        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;">Quiz Title</label>
                                        <input type="text" placeholder="e.g. Pillars of Salah — Module 2 Quiz" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                                    </div>
                                    <div>
                                        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;">Course</label>
                                        <select style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                                            <option>Arabic Grammar — Level 2</option>
                                            <option>Hanafi Fiqh — Fundamentals</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;">Linked Lesson (optional)</label>
                                        <select style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                                            <option>— None —</option>
                                            <option>The Rules of Taharah</option>
                                            <option>Verb Conjugation — Part 3</option>
                                            <option>Introduction to Sarf</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;">Time Limit (minutes)</label>
                                        <input type="number" value="30" min="0" placeholder="0 = no limit" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                                    </div>
                                    <div>
                                        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;">Max Attempts</label>
                                        <select style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                                            <option>1 (single attempt)</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>Unlimited</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;">Passing Score (%)</label>
                                        <input type="number" value="70" min="0" max="100" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                                    </div>
                                    <div>
                                        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;">Show Results</label>
                                        <select style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                                            <option>Immediately after submission</option>
                                            <option>After due date</option>
                                            <option>Manually release</option>
                                        </select>
                                    </div>
                                    <div style="display:flex;align-items:center;gap:8px;padding-top:20px;">
                                        <input type="checkbox" id="teacher-quiz-shuffle" checked style="width:16px;height:16px;">
                                        <label for="teacher-quiz-shuffle" style="font-size:13px;cursor:pointer;">Shuffle question order</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Questions container -->
                            <div id="teacher-quiz-questions">
                                <!-- Q1: MCQ -->
                                <div class="card" style="margin-bottom:var(--space-4);border-left:4px solid var(--color-deep-teal);">
                                    <div class="flex justify-between items-start" style="margin-bottom:12px;">
                                        <div class="flex items-center gap-3">
                                            <span style="background:var(--color-deep-teal);color:white;width:24px;height:24px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;flex-shrink:0;">1</span>
                                            <select style="padding:5px 10px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:12px;font-weight:600;color:var(--color-deep-teal);">
                                                <option selected>Multiple Choice</option>
                                                <option>True / False</option>
                                                <option>Short Answer</option>
                                            </select>
                                            <span style="font-size:12px;color:var(--color-body-gray);">Points:</span>
                                            <input type="number" value="2" min="0" style="width:52px;padding:5px 8px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:12px;text-align:center;">
                                        </div>
                                        <button onclick="this.closest('.card').remove()" style="background:none;border:none;cursor:pointer;color:#ef4444;font-size:18px;">×</button>
                                    </div>
                                    <textarea placeholder="Enter your question here…" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;min-height:52px;resize:vertical;font-family:inherit;margin-bottom:12px;">What is the first pillar of Islam?</textarea>
                                    <div style="display:flex;flex-direction:column;gap:8px;">
                                        <div class="flex items-center gap-3">
                                            <input type="radio" name="tq1-correct" checked style="flex-shrink:0;">
                                            <input type="text" value="Shahada (Declaration of Faith)" style="flex:1;padding:7px 10px;border:1px solid #86efac;background:#f0fdf4;border-radius:6px;font-size:13px;">
                                            <span style="font-size:11px;color:#16a34a;font-weight:700;">Correct</span>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <input type="radio" name="tq1-correct" style="flex-shrink:0;">
                                            <input type="text" value="Salah (Prayer)" style="flex:1;padding:7px 10px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <input type="radio" name="tq1-correct" style="flex-shrink:0;">
                                            <input type="text" value="Zakat (Charity)" style="flex:1;padding:7px 10px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <input type="radio" name="tq1-correct" style="flex-shrink:0;">
                                            <input type="text" value="Sawm (Fasting)" style="flex:1;padding:7px 10px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                                        </div>
                                        <button style="background:none;border:1px dashed var(--color-mid-gray);border-radius:6px;padding:5px 10px;font-size:12px;cursor:pointer;color:var(--color-body-gray);margin-top:4px;align-self:flex-start;">+ Add option</button>
                                    </div>
                                </div>

                                <!-- Q2: True/False -->
                                <div class="card" style="margin-bottom:var(--space-4);border-left:4px solid var(--color-mauve-rose);">
                                    <div class="flex justify-between items-start" style="margin-bottom:12px;">
                                        <div class="flex items-center gap-3">
                                            <span style="background:var(--color-mauve-rose);color:white;width:24px;height:24px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;flex-shrink:0;">2</span>
                                            <select style="padding:5px 10px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:12px;font-weight:600;color:var(--color-mauve-rose);">
                                                <option>Multiple Choice</option>
                                                <option selected>True / False</option>
                                                <option>Short Answer</option>
                                            </select>
                                            <span style="font-size:12px;color:var(--color-body-gray);">Points:</span>
                                            <input type="number" value="1" min="0" style="width:52px;padding:5px 8px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:12px;text-align:center;">
                                        </div>
                                        <button onclick="this.closest('.card').remove()" style="background:none;border:none;cursor:pointer;color:#ef4444;font-size:18px;">×</button>
                                    </div>
                                    <textarea placeholder="Enter your question here…" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;min-height:52px;resize:vertical;font-family:inherit;margin-bottom:12px;">Wudu is required before every Salah.</textarea>
                                    <div class="flex gap-6">
                                        <label class="flex items-center gap-2" style="cursor:pointer;font-size:13px;">
                                            <input type="radio" name="tq2-correct" checked>
                                            <span style="background:#f0fdf4;color:#16a34a;font-weight:700;padding:4px 16px;border-radius:6px;border:1px solid #86efac;">True ✓</span>
                                        </label>
                                        <label class="flex items-center gap-2" style="cursor:pointer;font-size:13px;">
                                            <input type="radio" name="tq2-correct">
                                            <span style="padding:4px 16px;border-radius:6px;border:1px solid var(--color-mid-gray);">False</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Q3: Short Answer -->
                                <div class="card" style="margin-bottom:var(--space-4);border-left:4px solid #6366f1;">
                                    <div class="flex justify-between items-start" style="margin-bottom:12px;">
                                        <div class="flex items-center gap-3">
                                            <span style="background:#6366f1;color:white;width:24px;height:24px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;flex-shrink:0;">3</span>
                                            <select style="padding:5px 10px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:12px;font-weight:600;color:#6366f1;">
                                                <option>Multiple Choice</option>
                                                <option>True / False</option>
                                                <option selected>Short Answer</option>
                                            </select>
                                            <span style="font-size:12px;color:var(--color-body-gray);">Points:</span>
                                            <input type="number" value="5" min="0" style="width:52px;padding:5px 8px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:12px;text-align:center;">
                                        </div>
                                        <button onclick="this.closest('.card').remove()" style="background:none;border:none;cursor:pointer;color:#ef4444;font-size:18px;">×</button>
                                    </div>
                                    <textarea placeholder="Enter your question here…" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;min-height:52px;resize:vertical;font-family:inherit;margin-bottom:12px;">In your own words, explain the importance of Tawheed in Islamic theology.</textarea>
                                    <div style="background:var(--color-warm-ivory);border-radius:6px;padding:10px 14px;font-size:12px;color:var(--color-body-gray);">
                                        <i data-lucide="info" style="width:13px;vertical-align:middle;margin-right:4px;"></i>Students will see a text input. Grading is <strong>manual</strong> for short-answer questions.
                                    </div>
                                </div>
                            </div>

                            <!-- Add question buttons -->
                            <div class="flex gap-3">
                                <button class="btn btn-outline" style="flex:1;border-style:dashed;" onclick="addTeacherQuizQuestion('mcq')">
                                    <i data-lucide="list" style="width:14px;vertical-align:middle;margin-right:6px;"></i>+ Multiple Choice
                                </button>
                                <button class="btn btn-outline" style="flex:1;border-style:dashed;" onclick="addTeacherQuizQuestion('tf')">
                                    <i data-lucide="toggle-left" style="width:14px;vertical-align:middle;margin-right:6px;"></i>+ True / False
                                </button>
                                <button class="btn btn-outline" style="flex:1;border-style:dashed;" onclick="addTeacherQuizQuestion('sa')">
                                    <i data-lucide="type" style="width:14px;vertical-align:middle;margin-right:6px;"></i>+ Short Answer
                                </button>
                            </div>
                        </div>

                        <!-- RIGHT: Summary panel -->
                        <div>
                            <div class="card" style="position:sticky;top:20px;">
                                <h4 style="font-size:13px;font-weight:700;margin-bottom:14px;color:var(--color-deep-navy);">Quiz Summary</h4>
                                <div style="display:flex;flex-direction:column;gap:10px;font-size:13px;">
                                    <div class="flex justify-between"><span style="color:var(--color-body-gray);">Total Questions</span><span style="font-weight:700;">3</span></div>
                                    <div class="flex justify-between"><span style="color:var(--color-body-gray);">Total Points</span><span style="font-weight:700;">8</span></div>
                                    <div class="flex justify-between"><span style="color:var(--color-body-gray);">Passing Score</span><span style="font-weight:700;">70% (5.6 pts)</span></div>
                                    <div class="flex justify-between"><span style="color:var(--color-body-gray);">Time Limit</span><span style="font-weight:700;">30 min</span></div>
                                    <div class="flex justify-between"><span style="color:var(--color-body-gray);">Max Attempts</span><span style="font-weight:700;">1</span></div>
                                    <div class="flex justify-between"><span style="color:var(--color-body-gray);">Shuffle</span><span style="font-weight:700;">Yes</span></div>
                                </div>
                                <div style="margin-top:16px;padding-top:16px;border-top:1px solid var(--color-light-gray);">
                                    <h5 style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.05em;color:var(--color-body-gray);margin-bottom:10px;">Question Types</h5>
                                    <div style="display:flex;flex-direction:column;gap:6px;font-size:12px;">
                                        <div class="flex justify-between items-center"><span>Multiple Choice</span><span style="background:#dcfce7;color:#16a34a;padding:2px 8px;border-radius:4px;font-weight:700;">1</span></div>
                                        <div class="flex justify-between items-center"><span>True / False</span><span style="background:#fce7f3;color:#9d174d;padding:2px 8px;border-radius:4px;font-weight:700;">1</span></div>
                                        <div class="flex justify-between items-center"><span>Short Answer</span><span style="background:#ede9fe;color:#5b21b6;padding:2px 8px;border-radius:4px;font-weight:700;">1</span></div>
                                    </div>
                                </div>
                                <div style="margin-top:16px;padding:12px;background:var(--color-warm-ivory);border-radius:8px;font-size:12px;color:var(--color-body-gray);">
                                    <i data-lucide="alert-circle" style="width:13px;vertical-align:middle;margin-right:4px;color:#d97706;"></i>
                                    Short-answer questions require manual grading before final scores are released.
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ============================================================
                     VIEW: Assignment Detail / Grading
                     ============================================================ -->
                <section id="view-teacher-assignment-detail" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <a href="#teacher-assignments" onclick="switchTeacherView('teacher-assignments')" style="font-size:13px;color:var(--color-body-gray);text-decoration:none;cursor:pointer;">← Assignments</a>
                            <h1 class="ui-page-title" style="margin-top:4px;" id="assignment-detail-title">Essay on Taharah</h1>
                            <p style="color: var(--color-body-gray);" id="assignment-detail-meta">Hanafi Fiqh — Fundamentals · Due Mar 20, 2026</p>
                        </div>
                        <div class="flex gap-3">
                            <button class="btn btn-outline" onclick="showToast('Submissions exported as CSV')">Export Submissions</button>
                            <button class="btn btn-primary" onclick="showToast('Reminder sent to non-submitters')">Send Reminder</button>
                        </div>
                    </div>

                    <!-- 4-stat bar -->
                    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:var(--space-4);margin-bottom:var(--space-6);">
                        <div class="card" style="text-align:center;padding:20px 12px;">
                            <div style="font-size:32px;font-weight:800;color:var(--color-deep-navy);">22</div>
                            <div style="font-size:11px;color:var(--color-body-gray);text-transform:uppercase;letter-spacing:0.05em;margin-top:4px;">Total Students</div>
                        </div>
                        <div class="card" style="text-align:center;padding:20px 12px;border-top:3px solid var(--color-deep-teal);">
                            <div style="font-size:32px;font-weight:800;color:var(--color-deep-teal);">86%</div>
                            <div style="font-size:11px;color:var(--color-body-gray);text-transform:uppercase;letter-spacing:0.05em;margin-top:4px;">Submissions</div>
                            <div style="font-size:12px;color:var(--color-body-gray);margin-top:2px;">19 of 22</div>
                        </div>
                        <div class="card" style="text-align:center;padding:20px 12px;border-top:3px solid #6366f1;">
                            <div style="font-size:32px;font-weight:800;color:#6366f1;">B+</div>
                            <div style="font-size:11px;color:var(--color-body-gray);text-transform:uppercase;letter-spacing:0.05em;margin-top:4px;">Average Score</div>
                            <div style="font-size:12px;color:var(--color-body-gray);margin-top:2px;">84.2 / 100</div>
                        </div>
                        <div class="card" style="text-align:center;padding:20px 12px;border-top:3px solid #d97706;">
                            <div style="font-size:32px;font-weight:800;color:#d97706;">4</div>
                            <div style="font-size:11px;color:var(--color-body-gray);text-transform:uppercase;letter-spacing:0.05em;margin-top:4px;">Pending Review</div>
                            <div style="font-size:12px;color:var(--color-body-gray);margin-top:2px;">awaiting grade</div>
                        </div>
                    </div>

                    <!-- Two-panel: submissions + non-submitters -->
                    <div style="display:grid;grid-template-columns:3fr 2fr;gap:var(--space-6);">
                        <!-- Submissions table -->
                        <div class="card" style="padding:0;overflow:hidden;">
                            <div style="padding:14px 20px;border-bottom:1px solid var(--color-light-gray);display:flex;justify-content:space-between;align-items:center;">
                                <h4 style="font-weight:700;font-size:14px;">Submissions (19)</h4>
                                <select style="padding:6px 10px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:12px;">
                                    <option>All</option>
                                    <option>Graded</option>
                                    <option>Pending Review</option>
                                </select>
                            </div>
                            <table style="width:100%;border-collapse:collapse;font-size:13px;">
                                <thead style="background:var(--color-light-gray);border-bottom:2px solid var(--color-mid-gray);">
                                    <tr>
                                        <th style="padding:10px 16px;text-align:left;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Student</th>
                                        <th style="padding:10px 12px;text-align:left;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Submitted</th>
                                        <th style="padding:10px 12px;text-align:left;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Score</th>
                                        <th style="padding:10px 12px;text-align:right;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px 16px;font-weight:600;">Zainab Ahmed</td>
                                        <td style="padding:10px 12px;color:var(--color-body-gray);">Mar 18, 2026</td>
                                        <td style="padding:10px 12px;"><span style="background:#dcfce7;color:#16a34a;font-weight:700;font-size:12px;padding:3px 8px;border-radius:4px;">92/100</span></td>
                                        <td style="padding:10px 12px;text-align:right;"><button class="btn btn-outline" style="font-size:11px;padding:3px 10px;" onclick="showToast('Opening submission…')">View</button></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px 16px;font-weight:600;">Fatima Al-Hassan</td>
                                        <td style="padding:10px 12px;color:var(--color-body-gray);">Mar 17, 2026</td>
                                        <td style="padding:10px 12px;"><span style="background:#dcfce7;color:#16a34a;font-weight:700;font-size:12px;padding:3px 8px;border-radius:4px;">88/100</span></td>
                                        <td style="padding:10px 12px;text-align:right;"><button class="btn btn-outline" style="font-size:11px;padding:3px 10px;" onclick="showToast('Opening submission…')">View</button></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px 16px;font-weight:600;">Omar Khalil</td>
                                        <td style="padding:10px 12px;color:var(--color-body-gray);">Mar 19, 2026</td>
                                        <td style="padding:10px 12px;"><span style="background:#fef9c3;color:#854d0e;font-weight:700;font-size:12px;padding:3px 8px;border-radius:4px;">Pending</span></td>
                                        <td style="padding:10px 12px;text-align:right;"><button class="btn btn-primary" style="font-size:11px;padding:3px 10px;" onclick="openGradeModal('Omar Khalil')">Grade</button></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px 16px;font-weight:600;">Aisha Rahman</td>
                                        <td style="padding:10px 12px;color:var(--color-body-gray);">Mar 16, 2026</td>
                                        <td style="padding:10px 12px;"><span style="background:#dcfce7;color:#16a34a;font-weight:700;font-size:12px;padding:3px 8px;border-radius:4px;">76/100</span></td>
                                        <td style="padding:10px 12px;text-align:right;"><button class="btn btn-outline" style="font-size:11px;padding:3px 10px;" onclick="showToast('Opening submission…')">View</button></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px 16px;font-weight:600;">Hassan Karim</td>
                                        <td style="padding:10px 12px;color:var(--color-body-gray);">Mar 19, 2026</td>
                                        <td style="padding:10px 12px;"><span style="background:#fef9c3;color:#854d0e;font-weight:700;font-size:12px;padding:3px 8px;border-radius:4px;">Pending</span></td>
                                        <td style="padding:10px 12px;text-align:right;"><button class="btn btn-primary" style="font-size:11px;padding:3px 10px;" onclick="openGradeModal('Hassan Karim')">Grade</button></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px 16px;font-weight:600;">Mariam Hussain</td>
                                        <td style="padding:10px 12px;color:var(--color-body-gray);">Mar 15, 2026</td>
                                        <td style="padding:10px 12px;"><span style="background:#dcfce7;color:#16a34a;font-weight:700;font-size:12px;padding:3px 8px;border-radius:4px;">90/100</span></td>
                                        <td style="padding:10px 12px;text-align:right;"><button class="btn btn-outline" style="font-size:11px;padding:3px 10px;" onclick="showToast('Opening submission…')">View</button></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:10px 16px;font-weight:600;">Ibrahim Nour</td>
                                        <td style="padding:10px 12px;color:var(--color-body-gray);">Mar 18, 2026</td>
                                        <td style="padding:10px 12px;"><span style="background:#fef9c3;color:#854d0e;font-weight:700;font-size:12px;padding:3px 8px;border-radius:4px;">Pending</span></td>
                                        <td style="padding:10px 12px;text-align:right;"><button class="btn btn-primary" style="font-size:11px;padding:3px 10px;" onclick="openGradeModal('Ibrahim Nour')">Grade</button></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div style="padding:10px 16px;background:var(--color-light-gray);border-top:1px solid var(--color-mid-gray);font-size:12px;color:var(--color-body-gray);">Showing 7 of 19 submissions</div>
                        </div>

                        <!-- Right panel: non-submitters + score distribution -->
                        <div>
                            <div class="card" style="padding:0;overflow:hidden;margin-bottom:var(--space-4);">
                                <div style="padding:14px 20px;border-bottom:1px solid var(--color-light-gray);background:#fef3c7;display:flex;justify-content:space-between;align-items:center;">
                                    <h4 style="font-weight:700;font-size:14px;color:#92400e;">Not Submitted (3)</h4>
                                    <span style="font-size:11px;color:#d97706;font-weight:600;">Due: Mar 20</span>
                                </div>
                                <div style="display:flex;flex-direction:column;">
                                    <div style="padding:10px 16px;border-bottom:1px solid var(--color-light-gray);display:flex;justify-content:space-between;align-items:center;">
                                        <div style="font-size:13px;font-weight:600;">Sara Malik</div>
                                        <button class="btn btn-outline" style="font-size:11px;padding:3px 10px;color:#d97706;border-color:#d97706;" onclick="showToast('Reminder sent to Sara Malik')">Remind</button>
                                    </div>
                                    <div style="padding:10px 16px;border-bottom:1px solid var(--color-light-gray);display:flex;justify-content:space-between;align-items:center;">
                                        <div style="font-size:13px;font-weight:600;">Khalil Ahmed</div>
                                        <button class="btn btn-outline" style="font-size:11px;padding:3px 10px;color:#d97706;border-color:#d97706;" onclick="showToast('Reminder sent to Khalil Ahmed')">Remind</button>
                                    </div>
                                    <div style="padding:10px 16px;display:flex;justify-content:space-between;align-items:center;">
                                        <div style="font-size:13px;font-weight:600;">Yasmin Hassan</div>
                                        <button class="btn btn-outline" style="font-size:11px;padding:3px 10px;color:#d97706;border-color:#d97706;" onclick="showToast('Reminder sent to Yasmin Hassan')">Remind</button>
                                    </div>
                                </div>
                                <div style="padding:12px 16px;background:var(--color-light-gray);border-top:1px solid var(--color-mid-gray);">
                                    <button class="btn btn-outline" style="width:100%;font-size:12px;color:#d97706;border-color:#d97706;" onclick="showToast('Reminder sent to all 3 students')">Remind All</button>
                                </div>
                            </div>

                            <!-- Score distribution -->
                            <div class="card">
                                <h4 style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:0.05em;color:var(--color-body-gray);margin-bottom:14px;">Score Distribution</h4>
                                <div style="display:flex;flex-direction:column;gap:8px;font-size:12px;">
                                    <div class="flex items-center gap-3">
                                        <span style="width:36px;color:var(--color-body-gray);">90–100</span>
                                        <div style="flex:1;background:var(--color-light-gray);border-radius:4px;height:14px;"><div style="background:#16a34a;width:42%;height:14px;border-radius:4px;"></div></div>
                                        <span style="width:16px;text-align:right;font-weight:600;">8</span>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <span style="width:36px;color:var(--color-body-gray);">80–89</span>
                                        <div style="flex:1;background:var(--color-light-gray);border-radius:4px;height:14px;"><div style="background:#0d9488;width:26%;height:14px;border-radius:4px;"></div></div>
                                        <span style="width:16px;text-align:right;font-weight:600;">5</span>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <span style="width:36px;color:var(--color-body-gray);">70–79</span>
                                        <div style="flex:1;background:var(--color-light-gray);border-radius:4px;height:14px;"><div style="background:#d97706;width:21%;height:14px;border-radius:4px;"></div></div>
                                        <span style="width:16px;text-align:right;font-weight:600;">4</span>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <span style="width:36px;color:var(--color-body-gray);">&lt;70</span>
                                        <div style="flex:1;background:var(--color-light-gray);border-radius:4px;height:14px;"><div style="background:#dc2626;width:10%;height:14px;border-radius:4px;"></div></div>
                                        <span style="width:16px;text-align:right;font-weight:600;">2</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </main>
        </div>
    </div>

    <!-- New Assignment Modal -->
    <div id="modal-new-assignment" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.45);z-index:1000;align-items:center;justify-content:center;">
        <div style="background:white;border-radius:16px;width:100%;max-width:560px;margin:0 20px;box-shadow:0 20px 60px rgba(0,0,0,0.2);overflow:hidden;">
            <div style="padding:20px 24px;border-bottom:1px solid var(--color-light-gray);display:flex;justify-content:space-between;align-items:center;">
                <h3 style="font-size:16px;font-weight:700;color:var(--color-deep-navy);">New Assignment</h3>
                <button onclick="closeNewAssignmentModal()" style="background:none;border:none;cursor:pointer;color:var(--color-body-gray);font-size:20px;line-height:1;">×</button>
            </div>
            <div style="padding:24px;display:grid;gap:16px;">
                <div>
                    <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;color:var(--color-deep-navy);">Title <span style="color:#dc2626;">*</span></label>
                    <input type="text" placeholder="e.g. Essay on Taharah" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
                    <div>
                        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;color:var(--color-deep-navy);">Course <span style="color:#dc2626;">*</span></label>
                        <select style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                            <option>Arabic Grammar — Level 2</option>
                            <option>Hanafi Fiqh — Fundamentals</option>
                        </select>
                    </div>
                    <div>
                        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;color:var(--color-deep-navy);">Due Date <span style="color:#dc2626;">*</span></label>
                        <input type="date" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                    </div>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
                    <div>
                        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;color:var(--color-deep-navy);">Total Points</label>
                        <input type="number" value="100" min="1" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                    </div>
                    <div>
                        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;color:var(--color-deep-navy);">Submission Type</label>
                        <select style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                            <option>Text / Written</option>
                            <option>File Upload</option>
                            <option>Text + File</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;color:var(--color-deep-navy);">Instructions</label>
                    <textarea placeholder="Describe the assignment in detail…" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;min-height:90px;resize:vertical;font-family:inherit;"></textarea>
                </div>
                <div style="display:flex;align-items:center;gap:8px;">
                    <input type="checkbox" id="assign-notify" checked style="width:15px;height:15px;">
                    <label for="assign-notify" style="font-size:13px;cursor:pointer;">Notify students when published</label>
                </div>
            </div>
            <div style="padding:16px 24px;border-top:1px solid var(--color-light-gray);display:flex;justify-content:flex-end;gap:12px;">
                <button class="btn btn-outline" onclick="closeNewAssignmentModal()">Cancel</button>
                <button class="btn btn-outline" onclick="saveAssignmentDraft()">Save as Draft</button>
                <button class="btn btn-primary" onclick="publishAssignment()">Publish Assignment</button>
            </div>
        </div>
    </div>

    <!-- Grade submission modal -->
    <div id="modal-grade-submission" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.45);z-index:1000;align-items:center;justify-content:center;">
        <div style="background:white;border-radius:16px;width:100%;max-width:480px;margin:0 20px;box-shadow:0 20px 60px rgba(0,0,0,0.2);overflow:hidden;">
            <div style="padding:20px 24px;border-bottom:1px solid var(--color-light-gray);display:flex;justify-content:space-between;align-items:center;">
                <div>
                    <h3 style="font-size:16px;font-weight:700;color:var(--color-deep-navy);">Grade Submission</h3>
                    <p style="font-size:13px;color:var(--color-body-gray);margin-top:2px;" id="grade-modal-student">Student name</p>
                </div>
                <button onclick="closeGradeModal()" style="background:none;border:none;cursor:pointer;color:var(--color-body-gray);font-size:20px;line-height:1;">×</button>
            </div>
            <div style="padding:24px;display:grid;gap:16px;">
                <div style="background:var(--color-light-gray);border-radius:10px;padding:14px 16px;font-size:13px;color:var(--color-body-gray);">
                    <i data-lucide="file-text" style="width:14px;vertical-align:middle;margin-right:6px;color:var(--color-deep-teal);"></i>
                    Submission received Mar 19, 2026 at 11:47 PM
                    <a href="#" onclick="showToast('Opening submission file…');return false;" style="display:block;margin-top:8px;color:var(--color-deep-teal);font-weight:600;font-size:12px;">View student submission →</a>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
                    <div>
                        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;color:var(--color-deep-navy);">Score <span style="color:#dc2626;">*</span></label>
                        <div style="display:flex;align-items:center;gap:8px;">
                            <input type="number" id="grade-score-input" placeholder="0" min="0" max="100" style="width:70px;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:15px;font-weight:700;text-align:center;">
                            <span style="font-size:13px;color:var(--color-body-gray);">/ 100</span>
                        </div>
                    </div>
                    <div>
                        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;color:var(--color-deep-navy);">Grade</label>
                        <select style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                            <option>Pass</option>
                            <option>Fail</option>
                            <option>Distinction</option>
                            <option>Incomplete</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;color:var(--color-deep-navy);">Feedback to Student</label>
                    <textarea placeholder="Optional written feedback…" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;min-height:80px;resize:vertical;font-family:inherit;"></textarea>
                </div>
                <div style="display:flex;align-items:center;gap:8px;">
                    <input type="checkbox" id="grade-notify" checked style="width:15px;height:15px;">
                    <label for="grade-notify" style="font-size:13px;cursor:pointer;">Notify student of grade</label>
                </div>
            </div>
            <div style="padding:16px 24px;border-top:1px solid var(--color-light-gray);display:flex;justify-content:flex-end;gap:12px;">
                <button class="btn btn-outline" onclick="closeGradeModal()">Cancel</button>
                <button class="btn btn-primary" onclick="submitGrade()">Save Grade</button>
            </div>
        </div>
    </div>

    <!-- Create Lesson Modal -->
    <div id="modal-create-lesson" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.45);z-index:1000;align-items:center;justify-content:center;">
        <div style="background:white;border-radius:16px;width:100%;max-width:600px;margin:0 20px;box-shadow:0 20px 60px rgba(0,0,0,0.2);overflow:hidden;max-height:90vh;overflow-y:auto;">
            <div style="padding:20px 24px;border-bottom:1px solid var(--color-light-gray);display:flex;justify-content:space-between;align-items:center;position:sticky;top:0;background:white;z-index:1;">
                <h2 style="font-family:'Playfair Display',serif;font-size:20px;color:var(--color-deep-navy);">Create New Lesson</h2>
                <button onclick="closeCreateLessonModal()" style="background:none;border:none;font-size:22px;cursor:pointer;color:var(--color-body-gray);">×</button>
            </div>
            <div style="padding:24px;display:grid;gap:16px;">
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
                    <div style="grid-column:1/-1;">
                        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;color:var(--color-deep-navy);">Lesson Title *</label>
                        <input id="lesson-title-input" type="text" placeholder="e.g. The Pillars of Salah — Part 3" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;font-family:inherit;">
                    </div>
                    <div>
                        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;color:var(--color-deep-navy);">Course *</label>
                        <select style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;font-family:inherit;">
                            <option>Hanafi Fiqh — Fundamentals</option>
                            <option>Arabic Grammar — Level 2</option>
                        </select>
                    </div>
                    <div>
                        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;color:var(--color-deep-navy);">Lesson Type</label>
                        <select id="lesson-type-select" onchange="updateLessonContentHint()" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;font-family:inherit;">
                            <option value="video">📹 Video Lesson</option>
                            <option value="pdf">📄 PDF / Reading</option>
                            <option value="live">🔴 Live Session</option>
                            <option value="quiz">📝 Quiz / Assessment</option>
                        </select>
                    </div>
                    <div>
                        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;color:var(--color-deep-navy);">Module / Week</label>
                        <select style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;font-family:inherit;">
                            <option>Week 1 — Introduction</option>
                            <option>Week 2 — Purification</option>
                            <option selected>Week 3 — Pillars of Salah</option>
                            <option>Week 4 — Fasting</option>
                        </select>
                    </div>
                    <div style="grid-column:1/-1;">
                        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;color:var(--color-deep-navy);">Description / Learning Objectives</label>
                        <textarea rows="3" placeholder="What will students learn in this lesson?" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;font-family:inherit;resize:vertical;"></textarea>
                    </div>
                </div>

                <!-- Dynamic content area based on lesson type -->
                <div id="lesson-content-area" style="background:var(--color-light-gray);border-radius:10px;padding:16px;border:2px dashed var(--color-mid-gray);">
                    <div style="text-align:center;color:var(--color-body-gray);font-size:13px;">
                        <i data-lucide="upload-cloud" style="width:28px;display:block;margin:0 auto 8px;color:var(--color-deep-teal);"></i>
                        <strong>Upload Video File</strong><br>
                        <span style="font-size:12px;">MP4, MOV, or paste a YouTube/Vimeo link below</span>
                    </div>
                    <input type="text" placeholder="Or paste video URL (YouTube, Vimeo, Zoom recording…)" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;font-family:inherit;margin-top:10px;">
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
                    <div>
                        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;color:var(--color-deep-navy);">Attach Supplementary File (optional)</label>
                        <div onclick="showToast('File picker opened')" style="border:1px solid var(--color-mid-gray);border-radius:6px;padding:9px 12px;font-size:13px;color:var(--color-body-gray);cursor:pointer;display:flex;align-items:center;gap:8px;">
                            <i data-lucide="paperclip" style="width:14px;"></i> Attach PDF / Notes
                        </div>
                    </div>
                    <div>
                        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;color:var(--color-deep-navy);">Estimated Duration</label>
                        <input type="text" placeholder="e.g. 45 min" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;font-family:inherit;">
                    </div>
                </div>

                <div style="display:flex;align-items:center;gap:8px;padding:10px;background:#f0fdf4;border-radius:8px;border:1px solid #bbf7d0;">
                    <input type="checkbox" id="lesson-notify" checked style="width:15px;height:15px;cursor:pointer;">
                    <label for="lesson-notify" style="font-size:13px;cursor:pointer;color:var(--color-deep-navy);">Notify enrolled students when published</label>
                </div>
            </div>
            <div style="padding:16px 24px;border-top:1px solid var(--color-light-gray);display:flex;justify-content:flex-end;gap:12px;position:sticky;bottom:0;background:white;">
                <button class="btn btn-outline" onclick="closeCreateLessonModal()">Cancel</button>
                <button class="btn btn-outline" onclick="saveLesonDraft()"><i data-lucide="save" style="width:14px;vertical-align:middle;margin-right:4px;"></i>Save Draft</button>
                <button class="btn btn-primary" onclick="publishLesson()"><i data-lucide="send" style="width:14px;vertical-align:middle;margin-right:4px;"></i>Publish Lesson</button>
            </div>
        </div>
    </div>

    <!-- Toast -->
    <div id="toast" class="toast">
        <span class="toast-icon">✓</span>
        <span id="toast-msg">Saved</span>
    </div>

    <script src="{{ asset("js/app.js") }}"></script>
    <script>
        lucide.createIcons();

        /* ---- Teacher Portal routing ---- */
        const teacherViewMap = {
            'teacher-dashboard':          'view-teacher-dashboard',
            'teacher-courses':            'view-teacher-courses',
            'teacher-attendance':         'view-teacher-attendance',
            'teacher-gradebook':          'view-teacher-gradebook',
            'teacher-assignments':        'view-teacher-assignments',
            'teacher-quizzes':            'view-teacher-quizzes',
            'teacher-quiz-builder':       'view-teacher-quiz-builder',
            'teacher-assignment-detail':  'view-teacher-assignment-detail',
            'teacher-lessons':            'view-teacher-lessons',
            'teacher-calendar':           'view-teacher-calendar',
            'teacher-messages':           'view-teacher-messages',
        };
        const teacherBc = {
            'teacher-dashboard':          'Home',
            'teacher-courses':            'My Courses',
            'teacher-attendance':         'Attendance',
            'teacher-gradebook':          'Gradebook',
            'teacher-assignments':        'Assignments',
            'teacher-quizzes':            'Quizzes',
            'teacher-quiz-builder':       'Quizzes · Quiz Builder',
            'teacher-assignment-detail':  'Assignments · Detail',
            'teacher-lessons':            'Lessons',
            'teacher-calendar':           'Schedule',
            'teacher-messages':           'Messages',
        };

        function switchTeacherView(viewId) {
            Object.values(teacherViewMap).forEach(id => {
                const el = document.getElementById(id);
                if (el) el.classList.add('hidden');
            });
            const targetId = teacherViewMap[viewId] || 'view-teacher-dashboard';
            const target = document.getElementById(targetId);
            if (target) target.classList.remove('hidden');
            document.querySelectorAll('.nav-item[data-view]').forEach(item => {
                item.classList.toggle('active', item.dataset.view === viewId);
            });
            const bc = document.getElementById('breadcrumbs');
            if (bc) {
                if (viewId === 'teacher-dashboard') {
                    bc.innerHTML = `<span style="color:var(--color-deep-teal);font-weight:600;">Dashboard</span>`;
                } else {
                    bc.innerHTML = `<a href="#teacher-dashboard">Home</a> <span class="separator">›</span> <span>${teacherBc[viewId] || viewId}</span>`;
                }
            }
            if (typeof lucide !== 'undefined') lucide.createIcons();
        }

        document.querySelectorAll('.nav-item[data-view]').forEach(item => {
            item.addEventListener('click', () => {
                const v = item.dataset.view;
                if (v) switchTeacherView(v);
            });
        });
        const h = window.location.hash ? window.location.hash.substring(1) : 'teacher-dashboard';
        switchTeacherView(h);
        window.addEventListener('hashchange', () => switchTeacherView(window.location.hash.substring(1)));

        /* ---- Attendance helpers ---- */
        function toggleAtt(btn, type) {
            const parent = btn.closest('.att-student').querySelectorAll('.att-btn');
            parent.forEach(b => { b.className = 'att-btn'; b.style.background = '#f3f4f6'; b.style.color = '#6b7280'; });
            btn.classList.add('att-' + type);
            const colors = { present: ['#dcfce7','#16a34a'], absent: ['#fee2e2','#dc2626'], excused: ['#fef9c3','#854d0e'] };
            if (colors[type]) { btn.style.background = colors[type][0]; btn.style.color = colors[type][1]; }
        }
        function markAllAttendance(type) {
            document.querySelectorAll('.att-student').forEach(row => {
                row.querySelectorAll('.att-btn').forEach(b => { b.className = 'att-btn'; b.style.background = '#f3f4f6'; b.style.color = '#6b7280'; });
                const btn = row.querySelector(`.att-btn:nth-child(${type==='present'?1:type==='absent'?2:3})`);
                if (btn) toggleAtt(btn, type);
            });
        }
        function saveAttendance() { showToast('Attendance saved for Session 12'); }

        /* ---- New Assignment modal ---- */
        function openNewAssignmentModal() {
            const m = document.getElementById('modal-new-assignment');
            m.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
        function closeNewAssignmentModal() {
            document.getElementById('modal-new-assignment').style.display = 'none';
            document.body.style.overflow = '';
        }
        function saveAssignmentDraft() {
            closeNewAssignmentModal();
            showToast('Assignment saved as draft');
        }
        function publishAssignment() {
            closeNewAssignmentModal();
            showToast('Assignment published — students notified');
        }

        /* ---- Grade submission modal ---- */
        function openGradeModal(studentName) {
            const m = document.getElementById('modal-grade-submission');
            document.getElementById('grade-modal-student').textContent = studentName;
            m.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            if (typeof lucide !== 'undefined') lucide.createIcons();
        }
        function closeGradeModal() {
            document.getElementById('modal-grade-submission').style.display = 'none';
            document.body.style.overflow = '';
        }
        function submitGrade() {
            const score = document.getElementById('grade-score-input').value;
            const name  = document.getElementById('grade-modal-student').textContent;
            closeGradeModal();
            showToast('Grade saved — ' + name + ': ' + (score || '—') + ' / 100');
        }

        /* ---- Quiz Builder (teacher) ---- */
        function addTeacherQuizQuestion(type) {
            const container = document.getElementById('teacher-quiz-questions');
            if (!container) return;
            const qnum = container.querySelectorAll('.card').length + 1;
            const colors = { mcq: 'var(--color-deep-teal)', tf: 'var(--color-mauve-rose)', sa: '#6366f1' };
            const typeLabels = { mcq: 'Multiple Choice', tf: 'True / False', sa: 'Short Answer' };
            const selOpts = Object.entries(typeLabels).map(([k,v]) => `<option${type===k?' selected':''}>${v}</option>`).join('');
            const bodyHtml = type === 'tf'
                ? `<div class="flex gap-6"><label class="flex items-center gap-2" style="cursor:pointer;font-size:13px;"><input type="radio" name="tq${qnum}-c" checked><span style="background:#f0fdf4;color:#16a34a;font-weight:700;padding:4px 16px;border-radius:6px;border:1px solid #86efac;">True ✓</span></label><label class="flex items-center gap-2" style="cursor:pointer;font-size:13px;"><input type="radio" name="tq${qnum}-c"><span style="padding:4px 16px;border-radius:6px;border:1px solid var(--color-mid-gray);">False</span></label></div>`
                : type === 'sa'
                ? `<div style="background:var(--color-warm-ivory);border-radius:6px;padding:10px 14px;font-size:12px;color:var(--color-body-gray);">Students will type their answer. Grading is <strong>manual</strong>.</div>`
                : `<div style="display:flex;flex-direction:column;gap:8px;"><div class="flex items-center gap-3"><input type="radio" name="tq${qnum}-c" checked><input type="text" placeholder="Correct answer" style="flex:1;padding:7px 10px;border:1px solid #86efac;background:#f0fdf4;border-radius:6px;font-size:13px;"></div><div class="flex items-center gap-3"><input type="radio" name="tq${qnum}-c"><input type="text" placeholder="Wrong answer" style="flex:1;padding:7px 10px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;"></div></div>`;
            const div = document.createElement('div');
            div.className = 'card';
            div.style.cssText = `margin-bottom:var(--space-4);border-left:4px solid ${colors[type]};`;
            div.innerHTML = `<div class="flex justify-between items-start" style="margin-bottom:12px;"><div class="flex items-center gap-3"><span style="background:${colors[type]};color:white;width:24px;height:24px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;flex-shrink:0;">${qnum}</span><select style="padding:5px 10px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:12px;font-weight:600;color:${colors[type]};">${selOpts}</select><span style="font-size:12px;color:var(--color-body-gray);">Points:</span><input type="number" value="2" min="0" style="width:52px;padding:5px 8px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:12px;text-align:center;"></div><button onclick="this.closest('.card').remove()" style="background:none;border:none;cursor:pointer;color:#ef4444;font-size:18px;">×</button></div><textarea placeholder="Enter your question here…" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;min-height:52px;resize:vertical;font-family:inherit;margin-bottom:12px;"></textarea>${bodyHtml}`;
            container.appendChild(div);
            if (typeof lucide !== 'undefined') lucide.createIcons();
        }

        /* ---- Close modals on overlay click ---- */
        document.getElementById('modal-new-assignment').addEventListener('click', function(e) {
            if (e.target === this) closeNewAssignmentModal();
        });
        document.getElementById('modal-grade-submission').addEventListener('click', function(e) {
            if (e.target === this) closeGradeModal();
        });
        document.getElementById('modal-create-lesson').addEventListener('click', function(e) {
            if (e.target === this) closeCreateLessonModal();
        });

        /* ---- Create Lesson modal ---- */
        function openCreateLessonModal() {
            const m = document.getElementById('modal-create-lesson');
            m.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            lucide.createIcons();
        }
        function closeCreateLessonModal() {
            document.getElementById('modal-create-lesson').style.display = 'none';
            document.body.style.overflow = '';
        }
        function updateLessonContentHint() {
            const type = document.getElementById('lesson-type-select').value;
            const area = document.getElementById('lesson-content-area');
            const hints = {
                video: `<div style="text-align:center;color:var(--color-body-gray);font-size:13px;">
                            <i data-lucide="upload-cloud" style="width:28px;display:block;margin:0 auto 8px;color:var(--color-deep-teal);"></i>
                            <strong>Upload Video File</strong><br><span style="font-size:12px;">MP4, MOV, or paste a video link below</span>
                        </div>
                        <input type="text" placeholder="Or paste video URL (YouTube, Vimeo, Zoom…)" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;font-family:inherit;margin-top:10px;">`,
                pdf:   `<div style="text-align:center;color:var(--color-body-gray);font-size:13px;">
                            <i data-lucide="file-text" style="width:28px;display:block;margin:0 auto 8px;color:var(--color-deep-teal);"></i>
                            <strong>Upload PDF or Document</strong><br><span style="font-size:12px;">PDF, DOCX, or external link</span>
                        </div>
                        <input type="text" placeholder="Or paste document URL…" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;font-family:inherit;margin-top:10px;">`,
                live:  `<div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-top:4px;">
                            <div><label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;">Date & Time</label>
                            <input type="datetime-local" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;font-family:inherit;"></div>
                            <div><label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;">Meeting Link (Zoom / Google Meet)</label>
                            <input type="text" placeholder="https://zoom.us/j/…" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;font-family:inherit;"></div>
                        </div>`,
                quiz:  `<div style="font-size:13px;color:var(--color-body-gray);text-align:center;padding:8px 0;">
                            <i data-lucide="external-link" style="width:20px;display:block;margin:0 auto 8px;color:var(--color-deep-teal);"></i>
                            This lesson type will link to the <strong>Quiz Builder</strong>.
                        </div>
                        <button class="btn btn-outline" onclick="switchTeacherView('teacher-quiz-builder');closeCreateLessonModal();" style="width:100%;margin-top:8px;font-size:13px;">Open Quiz Builder →</button>`
            };
            area.innerHTML = hints[type] || '';
            lucide.createIcons();
        }
        function saveLesonDraft() {
            const title = document.getElementById('lesson-title-input').value || 'Untitled Lesson';
            closeCreateLessonModal();
            showToast('Draft saved: ' + title);
        }
        function publishLesson() {
            const title = document.getElementById('lesson-title-input').value || 'New Lesson';
            closeCreateLessonModal();
            showToast('Published: ' + title + ' — students notified');
        }

        /* ---- Toast ---- */
        function showToast(msg) {
            const toast = document.getElementById('toast');
            document.getElementById('toast-msg').textContent = msg;
            toast.classList.add('show');
            setTimeout(() => toast.classList.remove('show'), 3000);
        }
    </script>
</body>
</html>
