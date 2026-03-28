<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zainab Center Unified Platform - Mockup</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body>
    <div class="app-container">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="flex items-center gap-4">
                    <div class="logo-placeholder">ZC</div>
                    <span class="nav-text brand-font" style="font-size: 18px; color: white;">Zainab Center</span>
                    <button onclick="toggleSidebar()" class="nav-text" style="margin-left:auto;background:none;border:none;cursor:pointer;color:rgba(255,255,255,0.5);padding:4px;" title="Collapse sidebar">
                        <i data-lucide="panel-left-close" style="width:16px;"></i>
                    </button>
                </div>
                <!-- School Code Chip -->
                <div class="nav-text" style="margin-top:10px;display:flex;align-items:center;gap:8px;">
                    <span style="background:rgba(255,255,255,0.1);border-radius:6px;padding:3px 10px;font-size:12px;font-weight:700;letter-spacing:0.06em;color:rgba(255,255,255,0.75);">ZC2026</span>
                    <button onclick="copySchoolCode()" style="background:none;border:none;cursor:pointer;color:rgba(255,255,255,0.4);padding:2px;" title="Copy school code">
                        <i data-lucide="copy" style="width:13px;"></i>
                    </button>
                    <span id="code-copied" style="font-size:11px;color:#4ade80;display:none;">Copied!</span>
                </div>
            </div>

            <!-- Navigation Groups -->
            <div class="nav-group">
                <a href="#dashboard" class="nav-item active" data-view="dashboard">
                    <i data-lucide="layout-dashboard" class="nav-icon"></i>
                    <span class="nav-text">Dashboard</span>
                </a>

                <!-- People Group -->
                <div class="nav-label">People</div>
                <div class="nav-item" onclick="toggleNavGroup('people')">
                    <i data-lucide="users" class="nav-icon"></i>
                    <span class="nav-text">Management</span>
                    <i data-lucide="chevron-down" style="width: 14px; margin-left: auto;"></i>
                </div>
                <div id="nav-group-people" class="nav-collapsible">
                    <a href="#admins" class="nav-item" data-view="admins">
                        <span class="nav-text">Admins</span>
                    </a>
                    <a href="#teachers" class="nav-item" data-view="teachers">
                        <span class="nav-text">Teachers</span>
                    </a>
                    <a href="#students" class="nav-item" data-view="students">
                        <span class="nav-text">Students</span>
                    </a>
                    <a href="#parents" class="nav-item" data-view="parents">
                        <span class="nav-text">Parents / Contacts</span>
                    </a>
                </div>

                <!-- Academic Group -->
                <div class="nav-label">Academic</div>
                <a href="#programs" class="nav-item" data-view="programs">
                    <i data-lucide="library" class="nav-icon"></i>
                    <span class="nav-text">Programs</span>
                </a>
                <a href="#courses" class="nav-item" data-view="courses">
                    <i data-lucide="book-open" class="nav-icon"></i>
                    <span class="nav-text">Courses</span>
                </a>
                <a href="#attendance" class="nav-item" data-view="attendance">
                    <i data-lucide="calendar-check" class="nav-icon"></i>
                    <span class="nav-text">Attendance</span>
                </a>

                <!-- LMS Group -->
                <div class="nav-label">LMS</div>
                <a href="#lessons" class="nav-item" data-view="lessons">
                    <i data-lucide="play-circle" class="nav-icon"></i>
                    <span class="nav-text">Lessons</span>
                </a>
                <a href="#grades" class="nav-item" data-view="grades">
                    <i data-lucide="award" class="nav-icon"></i>
                    <span class="nav-text">Gradebook</span>
                </a>
                <a href="#calendar" class="nav-item" data-view="calendar">
                    <span class="nav-icon"><i data-lucide="calendar"></i></span>
                    <span class="nav-text">Calendar</span>
                </a>

                <!-- Operations Group -->
                <div class="nav-label">Operations</div>
                <a href="#enrollment" class="nav-item" data-view="enrollment">
                    <span class="nav-icon"><i data-lucide="clipboard-list"></i></span>
                    <span class="nav-text">Enrollment</span>
                </a>
                <a href="#billing" class="nav-item" data-view="billing">
                    <span class="nav-icon"><i data-lucide="credit-card"></i></span>
                    <span class="nav-text">Billing & Payments</span>
                </a>
                <a href="#crm" class="nav-item" data-view="crm">
                    <span class="nav-icon"><i data-lucide="funnel"></i></span>
                    <span class="nav-text">CRM</span>
                </a>
                <a href="#crm-events" class="nav-item" data-view="crm-events">
                    <span class="nav-icon"><i data-lucide="calendar-range"></i></span>
                    <span class="nav-text">Events</span>
                </a>
                <a href="#donations" class="nav-item" data-view="donations">
                    <span class="nav-icon"><i data-lucide="heart-handshake"></i></span>
                    <span class="nav-text">Donations</span>
                </a>
                <a href="#notifications" class="nav-item" data-view="notifications">
                    <span class="nav-icon"><i data-lucide="bell"></i></span>
                    <span class="nav-text">Notifications</span>
                </a>
                <a href="#announcements" class="nav-item" data-view="announcements">
                    <span class="nav-icon"><i data-lucide="megaphone"></i></span>
                    <span class="nav-text">Announcements</span>
                </a>
                <a href="#reports" class="nav-item" data-view="reports">
                    <span class="nav-icon"><i data-lucide="bar-chart-3"></i></span>
                    <span class="nav-text">Reports</span>
                </a>
                <a href="#settings" class="nav-item" data-view="settings">
                    <span class="nav-icon"><i data-lucide="settings"></i></span>
                    <span class="nav-text">Settings</span>
                </a>

                <!-- Content (CMS) Group -->
                <div class="nav-label">Content</div>
                <a href="#cms-pages" class="nav-item" data-view="cms-pages">
                    <span class="nav-icon"><i data-lucide="file-text"></i></span>
                    <span class="nav-text">Pages</span>
                </a>
                <a href="#cms-posts" class="nav-item" data-view="cms-posts">
                    <span class="nav-icon"><i data-lucide="newspaper"></i></span>
                    <span class="nav-text">Posts & Blog</span>
                </a>
                <a href="#cms-nav-builder" class="nav-item" data-view="cms-nav-builder">
                    <span class="nav-icon"><i data-lucide="list-ordered"></i></span>
                    <span class="nav-text">Navigation Builder</span>
                </a>
                <a href="#custom-fields" class="nav-item" data-view="custom-fields">
                    <span class="nav-icon"><i data-lucide="sliders-horizontal"></i></span>
                    <span class="nav-text">Custom Fields</span>
                </a>
            </div><!-- /nav-group -->

            <div class="sidebar-footer">
                <div style="padding: 6px 24px 4px; font-size: 11px; text-transform: uppercase; color: rgba(255,255,255,0.4); letter-spacing: 0.1em;">Portal</div>
                <a href="{{ url('/portal') }}" class="nav-item">
                    <span class="nav-icon" style="color: var(--color-mauve-rose);"><i data-lucide="external-link"></i></span>
                    <span class="nav-text" style="color: var(--color-mauve-rose); font-weight: 700;">Student Portal</span>
                </a>
                <a href="#" class="nav-item" style="color: #ef4444;">
                    <span class="nav-icon"><i data-lucide="log-out"></i></span>
                    <span class="nav-text">Logout</span>
                </a>
            </div><!-- /sidebar-footer -->
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Breadcrumbs -->
            <div class="breadcrumb-trail" id="breadcrumbs">
                <a href="#dashboard">Dashboard</a> <span class="separator">></span> <span>Home</span>
            </div>

            <!-- View: Dashboard -->
            <section id="view-dashboard" class="content-view">
                <div id="dashboard-inner">
                <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                    <div>
                        <h1 class="ui-page-title">Dashboard</h1>
                        <p style="color: var(--color-body-gray);">Welcome back, Administrator.</p>
                    </div>
                </div>

                <!-- Admin Profile Card -->
                <div class="card flex justify-between items-center">
                    <div class="flex items-center gap-4">
                        <div
                            style="width: 64px; height: 64px; border-radius: 8px; background: var(--color-deep-teal); color: white; display: flex; align-items: center; justify-content: center; font-size: 24px; font-weight: bold;">
                            AD
                        </div>
                        <div>
                            <h2 style="font-size: 20px; font-family: 'Inter'; font-weight: 700;">Admin User</h2>
                            <p style="color: var(--color-body-gray); font-size: 14px;">Administrator at Zainab Center
                            </p>
                            <div class="flex gap-4"
                                style="margin-top: 4px; font-size: 13px; color: var(--color-body-gray);">
                                <span><i data-lucide="mail" style="width: 14px; vertical-align: middle;"></i>
                                    admin@zainabcenter.com</span>
                                <span><i data-lucide="building" style="width: 14px; vertical-align: middle;"></i> Main
                                    Campus</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <button class="btn btn-outline">Edit Profile</button>
                    </div>
                </div>

                <!-- Stats Bar -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="flex justify-between items-start">
                            <span class="stat-label">Students</span>
                            <i data-lucide="users" style="color: var(--color-deep-teal);"></i>
                        </div>
                        <div class="stat-value">1,024</div>
                    </div>
                    <div class="stat-card">
                        <div class="flex justify-between items-start">
                            <span class="stat-label">Teachers</span>
                            <i data-lucide="graduation-cap" style="color: var(--color-deep-teal);"></i>
                        </div>
                        <div class="stat-value">48</div>
                    </div>
                    <div class="stat-card">
                        <div class="flex justify-between items-start">
                            <span class="stat-label">Active Courses</span>
                            <i data-lucide="book-open" style="color: var(--color-deep-teal);"></i>
                        </div>
                        <div class="stat-value">32</div>
                    </div>
                    <div class="stat-card">
                        <div class="flex justify-between items-start">
                            <span class="stat-label">Pending Enrollments</span>
                            <i data-lucide="clock" style="color: var(--color-mauve-rose);"></i>
                        </div>
                        <div class="stat-value" style="color: var(--color-mauve-rose);">12</div>
                    </div>
                </div>

                <!-- Quick Actions Grid -->
                <h3 style="font-family: 'Inter'; font-weight: 700; font-size: 16px; margin-bottom: var(--space-4);">⚡
                    Quick Actions</h3>
                <div class="quick-actions-grid">
                    <div class="action-card">
                        <i data-lucide="user-plus" style="color: var(--color-deep-teal);"></i>
                        <span>Enroll Student</span>
                    </div>
                    <div class="action-card">
                        <i data-lucide="user-round" style="color: var(--color-deep-teal);"></i>
                        <span>Add Teacher</span>
                    </div>
                    <div class="action-card">
                        <i data-lucide="book" style="color: var(--color-deep-teal);"></i>
                        <span>Create Course</span>
                    </div>
                    <div class="action-card">
                        <i data-lucide="megaphone" style="color: var(--color-deep-teal);"></i>
                        <span>Announcement</span>
                    </div>
                    <div class="action-card">
                        <i data-lucide="check-square" style="color: var(--color-deep-teal);"></i>
                        <span>Attendance</span>
                    </div>
                    <div class="action-card">
                        <i data-lucide="calendar" style="color: var(--color-deep-teal);"></i>
                        <span>Calendar</span>
                    </div>
                    <div class="action-card">
                        <i data-lucide="bar-chart-3" style="color: var(--color-mauve-rose);"></i>
                        <span>Report</span>
                    </div>
                    <div class="action-card">
                        <i data-lucide="receipt" style="color: var(--color-mauve-rose);"></i>
                        <span>Billing</span>
                    </div>
                </div>

                <!-- Dashboard Content Area -->
                <div class="flex gap-6" style="margin-top: var(--space-8);">
                    <div style="flex: 2;">
                        <div class="card">
                            <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                                <h3 style="font-size: 16px; font-weight: 700;">Attendance Overview</h3>
                                <a href="#attendance"
                                    style="font-size: 12px; color: var(--color-deep-teal); text-decoration: none;">View
                                    All →</a>
                            </div>
                            <div class="flex gap-8">
                                <div style="flex: 1;">
                                    <div style="font-size: 32px; font-weight: 700; color: var(--color-deep-teal);">94%
                                    </div>
                                    <div class="flex items-center gap-2" style="font-size: 12px; margin-top: 4px;">
                                        <span
                                            style="display: inline-block; width: 8px; height: 8px; background: #16A34A; border-radius: 50%;"></span>
                                        38 present
                                        <span
                                            style="display: inline-block; width: 8px; height: 8px; background: #DC2626; border-radius: 50%; margin-left: 8px;"></span>
                                        2 absent
                                    </div>
                                    <p
                                        style="font-size: 11px; color: var(--color-body-gray); margin-top: 8px; text-transform: uppercase;">
                                        Today</p>
                                </div>
                                <div style="flex: 1.5;">
                                    <div class="flex justify-between items-center" style="margin-bottom: 8px;">
                                        <span style="font-size: 12px; font-weight: 700;">This Week Average</span>
                                        <span style="font-size: 12px; color: var(--color-body-gray);">80 of 94
                                            marked</span>
                                    </div>
                                    <div
                                        style="height: 8px; background: var(--color-light-gray); border-radius: 4px; overflow: hidden;">
                                        <div style="width: 85%; height: 100%; background: var(--color-deep-teal);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card" style="margin-top: var(--space-6);">
                            <h3 style="font-size: 16px; font-weight: 700; margin-bottom: var(--space-4);">Recent
                                Announcements</h3>
                            <div class="announcement-item flex gap-4"
                                style="border-left: 3px solid var(--color-deep-teal); padding-left: 16px; margin-bottom: var(--space-4);">
                                <div style="color: var(--color-deep-teal);"><i data-lucide="megaphone"
                                        style="width: 20px;"></i></div>
                                <div>
                                    <h4 style="font-size: 14px; font-weight: 700; font-family: 'Inter';">Ramadan Break
                                        Schedule 2026</h4>
                                    <div class="flex gap-2" style="margin: 4px 0;">
                                        <span
                                            style="font-size: 10px; font-weight: 700; color: var(--color-deep-teal); background: rgba(27, 107, 114, 0.1); padding: 2px 6px; border-radius: 4px;">STUDENTS</span>
                                    </div>
                                    <span style="font-size: 11px; color: var(--color-body-gray);">March 12, 2026</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="flex: 1;">
                        <div class="card" style="padding: var(--space-4);">
                            <div class="flex justify-between items-center" style="margin-bottom: var(--space-4);">
                                <h3 style="font-size: 14px; font-weight: 700;">Recent Activity</h3>
                                <i data-lucide="rotate-cw"
                                    style="width: 14px; color: var(--color-body-gray); cursor: pointer;"></i>
                            </div>
                            <div class="activity-feed">
                                <div class="activity-item flex gap-3" style="margin-bottom: var(--space-4);">
                                    <div
                                        style="width: 32px; height: 32px; border-radius: 50%; background: var(--color-deep-teal); color: white; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700; flex-shrink: 0;">
                                        ZA</div>
                                    <div>
                                        <p style="font-size: 13px;"><strong>Zainab Ahmed</strong> enrolled in Theology
                                        </p>
                                        <span style="font-size: 11px; color: var(--color-body-gray);">2 mins ago</span>
                                    </div>
                                </div>
                                <div class="activity-item flex gap-3" style="margin-bottom: var(--space-4);">
                                    <div
                                        style="width: 32px; height: 32px; border-radius: 50%; background: var(--color-mauve-rose); color: white; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700; flex-shrink: 0;">
                                        SK</div>
                                    <div>
                                        <p style="font-size: 13px;"><strong>Sara Khan</strong> paid invoice #8271</p>
                                        <span style="font-size: 11px; color: var(--color-body-gray);">15 mins ago</span>
                                    </div>
                                </div>
                                <div class="activity-item flex gap-3">
                                    <div
                                        style="width: 32px; height: 32px; border-radius: 50%; background: var(--color-deep-teal); color: white; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700; flex-shrink: 0;">
                                        MK</div>
                                    <div>
                                        <p style="font-size: 13px;"><strong>Mariam K.</strong> submitted Quiz 1</p>
                                        <span style="font-size: 11px; color: var(--color-body-gray);">1 hour ago</span>
                                    </div>
                                </div>
                            </div>
                            <a href="#"
                                style="display: block; text-align: center; font-size: 12px; color: var(--color-deep-teal); margin-top: var(--space-4); text-decoration: none; font-weight: 600;">View
                                All Activity</a>
                        </div>
                    </div>
                </div>
                </div><!-- /dashboard-inner -->
                <!-- View: Students -->
                <section id="view-students" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Students</h1>
                            <p style="color: var(--color-body-gray);">Manage all enrolled and prospective students.</p>
                        </div>
                        <button class="btn btn-primary" onclick="openModal('modal-add-student')">+ Add Student</button>
                    </div>

                    <div class="card flex gap-4" style="margin-bottom: var(--space-6);">
                        <div style="flex: 1; position: relative;">
                            <i data-lucide="search"
                                style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 16px; color: var(--color-body-gray);"></i>
                            <input type="text" placeholder="Search by name or email..."
                                style="width: 100%; padding: 10px 10px 10px 36px; border: 1px solid var(--color-mid-gray); border-radius: 8px;">
                        </div>
                        <select style="padding: 8px 12px; border: 1px solid var(--color-mid-gray); border-radius: 8px;">
                            <option>All Statuses</option>
                            <option>Enrolled</option>
                            <option>Pending</option>
                            <option>Withdrawn</option>
                        </select>
                        <select style="padding: 8px 12px; border: 1px solid var(--color-mid-gray); border-radius: 8px;">
                            <option>All Programs</option>
                        </select>
                    </div>

                    <div class="card" style="padding: 0; overflow: hidden;">
                        <table style="width: 100%; border-collapse: collapse; text-align: left;">
                            <thead
                                style="background: var(--color-light-gray); border-bottom: 2px solid var(--color-mid-gray);">
                                <tr>
                                    <th
                                        style="padding: 12px 24px; font-size: 12px; color: var(--color-body-gray); text-transform: uppercase;">
                                        Name</th>
                                    <th
                                        style="padding: 12px; font-size: 12px; color: var(--color-body-gray); text-transform: uppercase;">
                                        Program</th>
                                    <th
                                        style="padding: 12px; font-size: 12px; color: var(--color-body-gray); text-transform: uppercase;">
                                        Status</th>
                                    <th
                                        style="padding: 12px; font-size: 12px; color: var(--color-body-gray); text-transform: uppercase;">
                                        Enrolled Date</th>
                                    <th
                                        style="padding: 12px 24px; font-size: 12px; color: var(--color-body-gray); text-transform: uppercase; text-align: right;">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom: 1px solid var(--color-light-gray);">
                                    <td style="padding: 16px 24px;">
                                        <div class="flex items-center gap-3">
                                            <div
                                                style="width: 36px; height: 36px; border-radius: 50%; background: var(--color-deep-teal); color: white; display: flex; align-items: center; justify-content: center; font-weight: 700;">
                                                ZA</div>
                                            <div>
                                                <div style="font-weight: 700; font-size: 14px;">Zainab Ahmed</div>
                                                <div style="font-size: 12px; color: var(--color-body-gray);">
                                                    zainab@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="padding: 12px;">
                                        <span
                                            style="font-size: 11px; padding: 2px 8px; border: 1px solid var(--color-deep-teal); color: var(--color-deep-teal); border-radius: 12px; font-weight: 600;">Islamic
                                            Theology</span>
                                    </td>
                                    <td style="padding: 12px;">
                                        <span class="badge badge-success">Enrolled</span>
                                    </td>
                                    <td style="padding: 12px; font-size: 14px;">Jan 12, 2026</td>
                                    <td style="padding: 16px 24px; text-align: right;">
                                        <button class="btn btn-outline"
                                            onclick="openStudentProfile('Zainab Ahmed','ZA','#1B6B72','Islamic Theology · Active')"
                                            style="padding: 4px 12px; font-size: 12px;">View</button>
                                    </td>
                                </tr>
                                <tr style="border-bottom: 1px solid var(--color-light-gray);">
                                    <td style="padding: 16px 24px;">
                                        <div class="flex items-center gap-3">
                                            <div
                                                style="width: 36px; height: 36px; border-radius: 50%; background: var(--color-mauve-rose); color: white; display: flex; align-items: center; justify-content: center; font-weight: 700;">
                                                SA</div>
                                            <div>
                                                <div style="font-weight: 700; font-size: 14px;">Sara Ahmed</div>
                                                <div style="font-size: 12px; color: var(--color-body-gray);">
                                                    sara@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="padding: 12px;">
                                        <span
                                            style="font-size: 11px; padding: 2px 8px; border: 1px solid var(--color-deep-teal); color: var(--color-deep-teal); border-radius: 12px; font-weight: 600;">Arabic
                                            Grammar</span>
                                    </td>
                                    <td style="padding: 12px;">
                                        <span class="badge badge-warning">Pending</span>
                                    </td>
                                    <td style="padding: 12px; font-size: 14px;">Feb 05, 2026</td>
                                    <td style="padding: 16px 24px; text-align: right;">
                                        <button class="btn btn-outline"
                                            onclick="openStudentProfile('Sara Ahmed','SA','#A85D88','Arabic Grammar · Pending')"
                                            style="padding: 4px 12px; font-size: 12px;">View</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- View: Programs -->
                <section id="view-programs" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Academic Programs</h1>
                            <p style="color: var(--color-body-gray);">Top-level academic groupings and terms.</p>
                        </div>
                        <button class="btn btn-primary" onclick="openModal('modal-add-program')">+ Create Program</button>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: var(--space-6);">
                        <div class="card">
                            <div class="flex justify-between items-start" style="margin-bottom: var(--space-4);">
                                <div>
                                    <h3 style="font-family: 'Inter'; font-weight: 700;">Full-time Islamic Theology</h3>
                                    <span class="badge badge-info" style="margin-top: 4px;">THEO-FT</span>
                                </div>
                                <div style="text-align: right;">
                                    <div
                                        style="font-size: 11px; color: var(--color-body-gray); text-transform: uppercase;">
                                        Current Term</div>
                                    <div style="font-size: 14px; font-weight: 700; color: var(--color-deep-teal);">Fall
                                        2026</div>
                                </div>
                            </div>
                            <div style="font-size: 13px; color: var(--color-body-gray); margin-bottom: var(--space-6);">
                                A comprehensive program covering Aqeedah, Fiqh, and Hadith.
                            </div>
                            <div class="flex justify-between items-center"
                                style="border-top: 1px solid var(--color-light-gray); padding-top: var(--space-4);">
                                <span style="font-size: 12px; font-weight: 600;">8 Courses • 124 Students</span>
                                <button class="btn btn-outline"
                                    style="padding: 6px 12px; font-size: 12px;" onclick="showToast('Opening Full-time Islamic Theology program…'); location.hash='courses'">Manage</button>
                            </div>
                        </div>

                        <div class="card">
                            <div class="flex justify-between items-start" style="margin-bottom: var(--space-4);">
                                <div>
                                    <h3 style="font-family: 'Inter'; font-weight: 700;">Quranic Studies</h3>
                                    <span class="badge badge-info" style="margin-top: 4px;">QRN-PART</span>
                                </div>
                                <div style="text-align: right;">
                                    <div
                                        style="font-size: 11px; color: var(--color-body-gray); text-transform: uppercase;">
                                        Current Term</div>
                                    <div style="font-size: 14px; font-weight: 700; color: var(--color-deep-teal);">Fall
                                        2026</div>
                                </div>
                            </div>
                            <div style="font-size: 13px; color: var(--color-body-gray); margin-bottom: var(--space-6);">
                                Part-time evening and weekend Quran memorization.
                            </div>
                            <div class="flex justify-between items-center"
                                style="border-top: 1px solid var(--color-light-gray); padding-top: var(--space-4);">
                                <span style="font-size: 12px; font-weight: 600;">4 Courses • 86 Students</span>
                                <button class="btn btn-outline"
                                    style="padding: 6px 12px; font-size: 12px;" onclick="showToast('Opening Quranic Studies program…'); location.hash='courses'">Manage</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- View: Courses -->
                <section id="view-courses" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Course Management</h1>
                            <p style="color: var(--color-body-gray);">Manage individual courses, sections, and teachers.
                            </p>
                        </div>
                        <button class="btn btn-primary" onclick="openModal('modal-add-course')">+ New Course</button>
                    </div>

                    <div class="card" style="padding: 0; overflow: hidden;">
                        <table style="width: 100%; border-collapse: collapse; text-align: left;">
                            <thead
                                style="background: var(--color-light-gray); border-bottom: 2px solid var(--color-mid-gray);">
                                <tr>
                                    <th style="padding: 12px 24px; font-size: 12px; color: var(--color-body-gray);">
                                        COURSE NAME</th>
                                    <th style="padding: 12px; font-size: 12px; color: var(--color-body-gray);">PROGRAM
                                    </th>
                                    <th style="padding: 12px; font-size: 12px; color: var(--color-body-gray);">SECTIONS
                                    </th>
                                    <th style="padding: 12px; font-size: 12px; color: var(--color-body-gray);">
                                        ENROLLMENT</th>
                                    <th style="padding: 12px; font-size: 12px; color: var(--color-body-gray);">STATUS
                                    </th>
                                    <th
                                        style="padding: 12px 24px; font-size: 12px; color: var(--color-body-gray); text-align: right;">
                                        ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom: 1px solid var(--color-light-gray);">
                                    <td style="padding: 16px 24px; font-weight: 700; font-size: 14px;">Theology 101</td>
                                    <td style="padding: 12px; font-size: 14px;">Full-time Theology</td>
                                    <td style="padding: 12px; font-size: 14px;">2 Sections</td>
                                    <td style="padding: 12px;">
                                        <div style="font-size: 13px; font-weight: 600;">32 / 40</div>
                                        <div
                                            style="width: 60px; height: 4px; background: #eee; border-radius: 2px; margin-top: 4px;">
                                            <div style="width: 80%; height: 100%; background: var(--color-deep-teal);">
                                            </div>
                                        </div>
                                    </td>
                                    <td style="padding: 12px;">
                                        <span class="badge badge-success">Open</span>
                                    </td>
                                    <td style="padding: 16px 24px; text-align: right;">
                                        <button class="btn btn-outline"
                                            style="padding: 4px 12px; font-size: 12px;" onclick="showToast('Opening Theology 101 course settings…')">Manage</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- View: Enrollment -->
                <section id="view-enrollment" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Enrollment</h1>
                            <p style="color: var(--color-body-gray);">Manage applications, review submissions, and monitor the enrollment pipeline.</p>
                        </div>
                        <button class="btn btn-primary" onclick="openModal('modal-add-student')">+ Enroll Student</button>
                    </div>

                    <!-- Enrollment Link Banner -->
                    <div class="card flex items-center gap-6" style="margin-bottom: var(--space-6); background: linear-gradient(135deg, #f0fdfa 0%, var(--color-warm-ivory) 100%); border-left: 4px solid var(--color-deep-teal);">
                        <div style="flex:1;">
                            <div style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:0.06em;color:var(--color-body-gray);margin-bottom:4px;">Public Enrollment Link</div>
                            <div class="flex items-center gap-3">
                                <code style="font-size:13px;color:var(--color-deep-teal);background:rgba(27,107,114,0.08);padding:6px 12px;border-radius:6px;flex:1;">https://zainabcenter.org/enroll</code>
                                <button class="btn btn-outline" style="font-size:12px;padding:6px 14px;" onclick="saveAndClose('','Link copied to clipboard')">
                                    <i data-lucide="copy" style="width:13px;margin-right:5px;vertical-align:middle;"></i>Copy
                                </button>
                            </div>
                        </div>
                        <div style="display:flex;flex-direction:column;align-items:center;gap:8px;">
                            <div style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.06em;color:var(--color-body-gray);">Enrollment</div>
                            <div id="enroll-toggle" onclick="toggleEnrollment(this)" style="width:52px;height:28px;border-radius:99px;background:var(--color-deep-teal);cursor:pointer;position:relative;transition:background 0.2s;" title="Click to close enrollment">
                                <div style="position:absolute;right:4px;top:4px;width:20px;height:20px;border-radius:50%;background:white;transition:transform 0.2s;"></div>
                            </div>
                            <span id="enroll-toggle-label" style="font-size:11px;font-weight:700;color:var(--color-deep-teal);">OPEN</span>
                        </div>
                    </div>

                    <!-- Pipeline Stats -->
                    <div style="display:grid;grid-template-columns:repeat(5,1fr);gap:var(--space-4);margin-bottom:var(--space-6);">
                        <div class="card" style="text-align:center;padding:16px 12px;">
                            <div style="font-size:28px;font-weight:700;color:var(--color-deep-navy);">47</div>
                            <div style="font-size:11px;color:var(--color-body-gray);text-transform:uppercase;letter-spacing:0.05em;margin-top:4px;">Total</div>
                        </div>
                        <div class="card" style="text-align:center;padding:16px 12px;border-top:3px solid #f59e0b;">
                            <div style="font-size:28px;font-weight:700;color:#d97706;">14</div>
                            <div style="font-size:11px;color:var(--color-body-gray);text-transform:uppercase;letter-spacing:0.05em;margin-top:4px;">Pending</div>
                        </div>
                        <div class="card" style="text-align:center;padding:16px 12px;border-top:3px solid #3b82f6;">
                            <div style="font-size:28px;font-weight:700;color:#2563eb;">8</div>
                            <div style="font-size:11px;color:var(--color-body-gray);text-transform:uppercase;letter-spacing:0.05em;margin-top:4px;">Under Review</div>
                        </div>
                        <div class="card" style="text-align:center;padding:16px 12px;border-top:3px solid var(--color-deep-teal);">
                            <div style="font-size:28px;font-weight:700;color:var(--color-deep-teal);">21</div>
                            <div style="font-size:11px;color:var(--color-body-gray);text-transform:uppercase;letter-spacing:0.05em;margin-top:4px;">Accepted</div>
                        </div>
                        <div class="card" style="text-align:center;padding:16px 12px;border-top:3px solid #ef4444;">
                            <div style="font-size:28px;font-weight:700;color:#dc2626;">4</div>
                            <div style="font-size:11px;color:var(--color-body-gray);text-transform:uppercase;letter-spacing:0.05em;margin-top:4px;">Rejected</div>
                        </div>
                    </div>

                    <!-- Pipeline Tabs + Table -->
                    <div class="card" style="padding:0;overflow:hidden;">
                        <!-- Tab bar -->
                        <div style="display:flex;border-bottom:2px solid var(--color-light-gray);padding:0 20px;background:white;">
                            <button onclick="filterEnrollTab(this,'all')" class="enroll-tab" style="padding:12px 16px;background:none;border:none;cursor:pointer;font-weight:600;font-size:13px;color:var(--color-deep-teal);border-bottom:3px solid var(--color-deep-teal);margin-bottom:-2px;">All (47)</button>
                            <button onclick="filterEnrollTab(this,'pending')" class="enroll-tab" style="padding:12px 16px;background:none;border:none;cursor:pointer;font-size:13px;color:var(--color-body-gray);">Pending (14)</button>
                            <button onclick="filterEnrollTab(this,'review')" class="enroll-tab" style="padding:12px 16px;background:none;border:none;cursor:pointer;font-size:13px;color:var(--color-body-gray);">Under Review (8)</button>
                            <button onclick="filterEnrollTab(this,'accepted')" class="enroll-tab" style="padding:12px 16px;background:none;border:none;cursor:pointer;font-size:13px;color:var(--color-body-gray);">Accepted (21)</button>
                            <button onclick="filterEnrollTab(this,'waitlisted')" class="enroll-tab" style="padding:12px 16px;background:none;border:none;cursor:pointer;font-size:13px;color:var(--color-body-gray);">Waitlisted (0)</button>
                            <button onclick="filterEnrollTab(this,'rejected')" class="enroll-tab" style="padding:12px 16px;background:none;border:none;cursor:pointer;font-size:13px;color:var(--color-body-gray);">Rejected (4)</button>
                            <div style="flex:1;"></div>
                            <div style="display:flex;align-items:center;gap:8px;padding:8px 0;">
                                <input type="text" placeholder="Search applicant…" style="padding:7px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;width:180px;">
                                <select style="padding:7px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                                    <option>All Programs</option>
                                    <option>Islamic Theology</option>
                                    <option>Arabic Language</option>
                                </select>
                            </div>
                        </div>
                        <!-- Applications table -->
                        <table style="width:100%;border-collapse:collapse;">
                            <thead style="background:var(--color-light-gray);border-bottom:2px solid var(--color-mid-gray);">
                                <tr>
                                    <th style="padding:11px 20px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;text-align:left;">Applicant</th>
                                    <th style="padding:11px 12px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;text-align:left;">Program</th>
                                    <th style="padding:11px 12px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;text-align:left;">Submitted</th>
                                    <th style="padding:11px 12px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;text-align:left;">Status</th>
                                    <th style="padding:11px 20px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;text-align:right;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Pending row -->
                                <tr style="border-bottom:1px solid var(--color-light-gray);" onclick="openEnrollDetail('Nadia Rahman','NR','#1B6B72')" style="cursor:pointer;">
                                    <td style="padding:14px 20px;">
                                        <div class="flex items-center gap-3">
                                            <div style="width:34px;height:34px;border-radius:50%;background:var(--color-deep-teal);color:white;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:12px;">NR</div>
                                            <div><div style="font-weight:700;font-size:14px;">Nadia Rahman</div><div style="font-size:12px;color:var(--color-body-gray);">nadia@email.com</div></div>
                                        </div>
                                    </td>
                                    <td style="padding:14px 12px;font-size:13px;">Islamic Theology</td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">Mar 13, 2026</td>
                                    <td style="padding:14px 12px;"><span style="background:#fef3c7;color:#d97706;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;">Pending</span></td>
                                    <td style="padding:14px 20px;text-align:right;">
                                        <div class="flex gap-2" style="justify-content:flex-end;">
                                            <button class="btn btn-outline" style="padding:4px 10px;font-size:11px;color:var(--color-deep-teal);border-color:var(--color-deep-teal);" onclick="event.stopPropagation();enrollAction(this,'Accepted')">Accept</button>
                                            <button class="btn btn-outline" style="padding:4px 10px;font-size:11px;color:#d97706;border-color:#d97706;" onclick="event.stopPropagation();enrollAction(this,'Waitlisted')">Waitlist</button>
                                            <button class="btn btn-outline" style="padding:4px 10px;font-size:11px;color:#dc2626;border-color:#dc2626;" onclick="event.stopPropagation();enrollAction(this,'Rejected')">Reject</button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Under Review row -->
                                <tr style="border-bottom:1px solid var(--color-light-gray);cursor:pointer;" onclick="openEnrollDetail('Hassan Al-Farsi','HF','#A85D88')">
                                    <td style="padding:14px 20px;">
                                        <div class="flex items-center gap-3">
                                            <div style="width:34px;height:34px;border-radius:50%;background:var(--color-mauve-rose);color:white;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:12px;">HF</div>
                                            <div><div style="font-weight:700;font-size:14px;">Hassan Al-Farsi</div><div style="font-size:12px;color:var(--color-body-gray);">hassan@email.com</div></div>
                                        </div>
                                    </td>
                                    <td style="padding:14px 12px;font-size:13px;">Arabic Language</td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">Mar 10, 2026</td>
                                    <td style="padding:14px 12px;"><span style="background:#dbeafe;color:#2563eb;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;">Under Review</span></td>
                                    <td style="padding:14px 20px;text-align:right;">
                                        <div class="flex gap-2" style="justify-content:flex-end;">
                                            <button class="btn btn-outline" style="padding:4px 10px;font-size:11px;color:var(--color-deep-teal);border-color:var(--color-deep-teal);" onclick="event.stopPropagation();enrollAction(this,'Accepted')">Accept</button>
                                            <button class="btn btn-outline" style="padding:4px 10px;font-size:11px;color:#dc2626;border-color:#dc2626;" onclick="event.stopPropagation();enrollAction(this,'Rejected')">Reject</button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Accepted row -->
                                <tr style="border-bottom:1px solid var(--color-light-gray);cursor:pointer;" onclick="openEnrollDetail('Layla Mustafa','LM','#1B6B72')">
                                    <td style="padding:14px 20px;">
                                        <div class="flex items-center gap-3">
                                            <div style="width:34px;height:34px;border-radius:50%;background:#0d9488;color:white;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:12px;">LM</div>
                                            <div><div style="font-weight:700;font-size:14px;">Layla Mustafa</div><div style="font-size:12px;color:var(--color-body-gray);">layla@email.com</div></div>
                                        </div>
                                    </td>
                                    <td style="padding:14px 12px;font-size:13px;">Quranic Studies</td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">Mar 5, 2026</td>
                                    <td style="padding:14px 12px;"><span style="background:#dcfce7;color:#16a34a;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;">Accepted</span></td>
                                    <td style="padding:14px 20px;text-align:right;">
                                        <div class="flex gap-2" style="justify-content:flex-end;">
                                            <button class="btn btn-outline" style="padding:4px 10px;font-size:11px;" onclick="event.stopPropagation();openEnrollDetail('Layla Mustafa','LM','#0d9488')">View</button>
                                            <button class="btn btn-primary" style="padding:4px 12px;font-size:11px;" onclick="event.stopPropagation();saveAndClose('','Payment link sent to layla@email.com')">Send Payment Link</button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Accepted + Paid row -->
                                <tr style="border-bottom:1px solid var(--color-light-gray);cursor:pointer;" onclick="openEnrollDetail('Yusuf Ibrahim','YI','#1A2F4A')">
                                    <td style="padding:14px 20px;">
                                        <div class="flex items-center gap-3">
                                            <div style="width:34px;height:34px;border-radius:50%;background:var(--color-deep-navy);color:white;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:12px;">YI</div>
                                            <div><div style="font-weight:700;font-size:14px;">Yusuf Ibrahim</div><div style="font-size:12px;color:var(--color-body-gray);">yusuf@email.com</div></div>
                                        </div>
                                    </td>
                                    <td style="padding:14px 12px;font-size:13px;">Islamic Theology</td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">Feb 28, 2026</td>
                                    <td style="padding:14px 12px;">
                                        <span style="background:#dcfce7;color:#16a34a;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;">Accepted</span>
                                        <span style="background:#f0fdf4;color:#16a34a;font-size:10px;font-weight:600;padding:2px 6px;border-radius:4px;margin-left:4px;border:1px solid #86efac;">Paid</span>
                                    </td>
                                    <td style="padding:14px 20px;text-align:right;">
                                        <button class="btn btn-outline" style="padding:4px 10px;font-size:11px;" onclick="event.stopPropagation();openEnrollDetail('Yusuf Ibrahim','YI','#1A2F4A')">View</button>
                                    </td>
                                </tr>
                                <!-- Rejected row -->
                                <tr style="cursor:pointer;opacity:0.7;" onclick="openEnrollDetail('Amira Siddiqui','AS','#6b7280')">
                                    <td style="padding:14px 20px;">
                                        <div class="flex items-center gap-3">
                                            <div style="width:34px;height:34px;border-radius:50%;background:#9ca3af;color:white;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:12px;">AS</div>
                                            <div><div style="font-weight:700;font-size:14px;">Amira Siddiqui</div><div style="font-size:12px;color:var(--color-body-gray);">amira@email.com</div></div>
                                        </div>
                                    </td>
                                    <td style="padding:14px 12px;font-size:13px;">Arabic Language</td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">Feb 20, 2026</td>
                                    <td style="padding:14px 12px;"><span style="background:#fee2e2;color:#dc2626;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;">Rejected</span></td>
                                    <td style="padding:14px 20px;text-align:right;">
                                        <button class="btn btn-outline" style="padding:4px 10px;font-size:11px;" onclick="event.stopPropagation();openEnrollDetail('Amira Siddiqui','AS','#6b7280')">View</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="padding:14px 20px;background:var(--color-light-gray);border-top:1px solid var(--color-mid-gray);font-size:13px;color:var(--color-body-gray);">Showing 5 of 47 applications · <a href="#" style="color:var(--color-deep-teal);font-weight:600;">Load more</a></div>
                    </div>
                </section>

                <!-- Invoice Creator slide-over (two-panel) -->
    <div id="invoice-creator-panel" style="position:fixed;inset:0;z-index:900;display:none;">
        <div onclick="closeInvoiceCreator()" style="position:absolute;inset:0;background:rgba(26,47,74,0.4);"></div>
        <div style="position:absolute;right:0;top:0;bottom:0;width:960px;max-width:97vw;background:#f8f7f4;overflow:hidden;box-shadow:-8px 0 32px rgba(0,0,0,0.15);display:flex;flex-direction:column;">
            <!-- Header -->
            <div style="background:var(--color-deep-navy);color:white;padding:16px 28px;display:flex;align-items:center;gap:12px;flex-shrink:0;">
                <i data-lucide="file-text" style="width:20px;opacity:0.8;"></i>
                <h2 style="font-family:'Inter';font-size:17px;font-weight:700;flex:1;">Create Invoice</h2>
                <button onclick="closeInvoiceCreator()" style="background:none;border:none;cursor:pointer;color:rgba(255,255,255,0.6);font-size:20px;">✕</button>
            </div>
            <!-- Two-panel body -->
            <div style="display:flex;flex:1;overflow:hidden;">
                <!-- LEFT: Builder -->
                <div style="width:50%;padding:24px;overflow-y:auto;border-right:1px solid var(--color-mid-gray);background:white;">
                    <h4 style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:0.06em;color:var(--color-body-gray);margin-bottom:16px;">Invoice Details</h4>

                    <div style="display:grid;gap:14px;margin-bottom:20px;">
                        <div>
                            <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;">Student / Billing Contact</label>
                            <select id="inv-student" onchange="updateInvPreview()" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                                <option value="">— Select student —</option>
                                <option value="Zainab Ahmed">Zainab Ahmed · zainab@example.com</option>
                                <option value="Fatima Al-Hassan">Fatima Al-Hassan · fatima@email.com</option>
                                <option value="Omar Farooq">Omar Farooq · omar@email.com</option>
                                <option value="Aisha Siddiqui">Aisha Siddiqui · aisha@email.com</option>
                            </select>
                        </div>
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
                            <div>
                                <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;">Invoice Date</label>
                                <input type="date" id="inv-date" onchange="updateInvPreview()" value="2026-03-15" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                            </div>
                            <div>
                                <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;">Due Date</label>
                                <input type="date" id="inv-due" onchange="updateInvPreview()" value="2026-03-25" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                            </div>
                        </div>
                    </div>

                    <!-- Quick-Add presets -->
                    <h4 style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:0.06em;color:var(--color-body-gray);margin-bottom:10px;">Quick Add</h4>
                    <div style="display:flex;flex-wrap:wrap;gap:8px;margin-bottom:20px;">
                        <button class="btn btn-outline" style="font-size:12px;padding:5px 12px;" onclick="addInvLine('Monthly Tuition', 150)">+ Tuition $150</button>
                        <button class="btn btn-outline" style="font-size:12px;padding:5px 12px;" onclick="addInvLine('Registration Fee', 50)">+ Registration $50</button>
                        <button class="btn btn-outline" style="font-size:12px;padding:5px 12px;" onclick="addInvLine('Course Materials', 25)">+ Materials $25</button>
                        <button class="btn btn-outline" style="font-size:12px;padding:5px 12px;" onclick="addInvLine('Late Fee', 20)">+ Late Fee $20</button>
                        <button class="btn btn-outline" style="font-size:12px;padding:5px 12px;" onclick="addInvLine('Exam Fee', 35)">+ Exam Fee $35</button>
                    </div>

                    <!-- Line items -->
                    <h4 style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:0.06em;color:var(--color-body-gray);margin-bottom:10px;">Line Items</h4>
                    <table style="width:100%;border-collapse:collapse;font-size:13px;margin-bottom:10px;">
                        <thead>
                            <tr style="border-bottom:2px solid var(--color-light-gray);">
                                <th style="text-align:left;padding:8px 4px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Description</th>
                                <th style="text-align:right;padding:8px 4px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Qty</th>
                                <th style="text-align:right;padding:8px 4px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Unit Price</th>
                                <th style="text-align:right;padding:8px 4px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Total</th>
                                <th style="width:24px;"></th>
                            </tr>
                        </thead>
                        <tbody id="inv-lines">
                            <tr data-line style="border-bottom:1px solid var(--color-light-gray);">
                                <td style="padding:6px 4px;"><input type="text" value="Monthly Tuition" oninput="updateInvPreview()" style="width:100%;padding:5px 8px;border:1px solid var(--color-mid-gray);border-radius:4px;font-size:12px;"></td>
                                <td style="padding:6px 4px;text-align:right;"><input type="number" value="1" min="1" oninput="updateInvPreview()" style="width:48px;padding:5px 8px;border:1px solid var(--color-mid-gray);border-radius:4px;font-size:12px;text-align:right;"></td>
                                <td style="padding:6px 4px;text-align:right;"><input type="number" value="150" min="0" oninput="updateInvPreview()" style="width:72px;padding:5px 8px;border:1px solid var(--color-mid-gray);border-radius:4px;font-size:12px;text-align:right;"></td>
                                <td style="padding:6px 4px;text-align:right;font-weight:600;" data-linetotal>$150.00</td>
                                <td style="padding:6px 4px;text-align:center;"><button onclick="removeInvLine(this)" style="background:none;border:none;cursor:pointer;color:#ef4444;font-size:16px;">×</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-outline" style="font-size:12px;padding:5px 14px;border-style:dashed;width:100%;" onclick="addInvLine('', 0)">+ Add Custom Line</button>

                    <div style="margin-top:16px;">
                        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;">Notes (optional)</label>
                        <textarea id="inv-notes" placeholder="Payment terms, instructions, thank you note…" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;min-height:60px;resize:vertical;font-family:inherit;"></textarea>
                    </div>
                </div>

                <!-- RIGHT: Live Preview -->
                <div style="width:50%;padding:24px;overflow-y:auto;background:var(--color-warm-ivory);">
                    <h4 style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:0.06em;color:var(--color-body-gray);margin-bottom:16px;">Preview</h4>
                    <div style="background:white;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.08);padding:28px;">
                        <!-- Invoice header -->
                        <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:24px;">
                            <div>
                                <div style="font-size:22px;font-weight:800;color:var(--color-deep-navy);letter-spacing:-0.03em;">INVOICE</div>
                                <div id="prev-invnum" style="font-size:13px;color:var(--color-body-gray);margin-top:2px;">#INV-0099</div>
                            </div>
                            <div style="text-align:right;">
                                <div style="font-weight:700;font-size:14px;color:var(--color-deep-teal);">Zainab Center</div>
                                <div style="font-size:12px;color:var(--color-body-gray);">zainabcenter.org</div>
                            </div>
                        </div>
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:20px;font-size:13px;">
                            <div>
                                <div style="font-size:10px;font-weight:700;text-transform:uppercase;color:var(--color-body-gray);margin-bottom:4px;">Bill To</div>
                                <div id="prev-student" style="font-weight:600;">—</div>
                            </div>
                            <div style="text-align:right;">
                                <div style="font-size:10px;font-weight:700;text-transform:uppercase;color:var(--color-body-gray);margin-bottom:4px;">Due Date</div>
                                <div id="prev-due" style="font-weight:600;color:var(--color-deep-navy);">Mar 25, 2026</div>
                            </div>
                        </div>
                        <table style="width:100%;border-collapse:collapse;font-size:13px;margin-bottom:16px;">
                            <thead>
                                <tr style="border-bottom:2px solid var(--color-light-gray);">
                                    <th style="text-align:left;padding:8px 0;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Description</th>
                                    <th style="text-align:right;padding:8px 0;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Qty</th>
                                    <th style="text-align:right;padding:8px 0;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Price</th>
                                    <th style="text-align:right;padding:8px 0;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Total</th>
                                </tr>
                            </thead>
                            <tbody id="prev-lines">
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:8px 0;">Monthly Tuition</td>
                                    <td style="padding:8px 0;text-align:right;">1</td>
                                    <td style="padding:8px 0;text-align:right;">$150.00</td>
                                    <td style="padding:8px 0;text-align:right;font-weight:600;">$150.00</td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="display:flex;flex-direction:column;align-items:flex-end;gap:4px;font-size:13px;">
                            <div class="flex justify-between" style="width:200px;"><span style="color:var(--color-body-gray);">Subtotal</span><span id="prev-subtotal" style="font-weight:600;">$150.00</span></div>
                            <div class="flex justify-between" style="width:200px;border-top:2px solid var(--color-deep-navy);padding-top:6px;margin-top:4px;"><span style="font-weight:700;font-size:15px;">Total</span><span id="prev-total" style="font-weight:800;font-size:15px;color:var(--color-deep-teal);">$150.00</span></div>
                        </div>
                        <div id="prev-notes" style="margin-top:20px;padding-top:16px;border-top:1px solid var(--color-light-gray);font-size:12px;color:var(--color-body-gray);display:none;"></div>
                    </div>
                </div>
            </div>
            <!-- Footer actions -->
            <div style="padding:14px 28px;background:white;border-top:1px solid var(--color-mid-gray);display:flex;justify-content:flex-end;gap:12px;flex-shrink:0;">
                <button class="btn btn-outline" onclick="closeInvoiceCreator()">Cancel</button>
                <button class="btn btn-outline" onclick="saveAndClose('','Invoice saved as draft')">Save Draft</button>
                <button class="btn btn-primary" onclick="saveAndClose('','Invoice created and sent to student')"><i data-lucide="send" style="width:14px;margin-right:6px;vertical-align:middle;"></i>Create & Send</button>
            </div>
        </div>
    </div>

    <!-- Enrollment Application Detail slide-over -->
                <div id="enroll-detail-panel" style="position:fixed;inset:0;z-index:900;display:none;">
                    <div onclick="closeEnrollDetail()" style="position:absolute;inset:0;background:rgba(26,47,74,0.4);"></div>
                    <div style="position:absolute;right:0;top:0;bottom:0;width:680px;max-width:95vw;background:var(--color-warm-ivory);overflow-y:auto;box-shadow:-8px 0 32px rgba(0,0,0,0.15);display:flex;flex-direction:column;">
                        <!-- Header -->
                        <div style="background:var(--color-deep-navy);color:white;padding:20px 28px;display:flex;align-items:center;gap:16px;flex-shrink:0;">
                            <div id="ed-avatar" style="width:48px;height:48px;border-radius:10px;background:var(--color-deep-teal);display:flex;align-items:center;justify-content:center;font-size:18px;font-weight:700;">NR</div>
                            <div style="flex:1;">
                                <h2 id="ed-name" style="font-family:'Inter';font-size:18px;font-weight:700;">Nadia Rahman</h2>
                                <p style="font-size:13px;opacity:0.7;">Application · Submitted Mar 13, 2026</p>
                            </div>
                            <button onclick="closeEnrollDetail()" style="background:none;border:none;cursor:pointer;color:rgba(255,255,255,0.6);font-size:22px;">✕</button>
                        </div>
                        <!-- Status bar -->
                        <div style="background:white;padding:12px 28px;border-bottom:1px solid var(--color-light-gray);display:flex;align-items:center;gap:12px;">
                            <span style="font-size:12px;font-weight:700;color:var(--color-body-gray);">STATUS</span>
                            <span id="ed-status-badge" style="background:#fef3c7;color:#d97706;font-size:12px;font-weight:700;padding:4px 14px;border-radius:20px;">Pending</span>
                            <div style="flex:1;"></div>
                            <button class="btn btn-outline" style="font-size:12px;padding:6px 14px;color:var(--color-deep-teal);border-color:var(--color-deep-teal);" onclick="enrollAction(this,'Accepted');closeEnrollDetail()">✓ Accept</button>
                            <button class="btn btn-outline" style="font-size:12px;padding:6px 14px;color:#d97706;border-color:#d97706;" onclick="enrollAction(this,'Waitlisted');closeEnrollDetail()">Waitlist</button>
                            <button class="btn btn-outline" style="font-size:12px;padding:6px 14px;color:#dc2626;border-color:#dc2626;" onclick="enrollAction(this,'Rejected');closeEnrollDetail()">Reject</button>
                        </div>
                        <!-- Body -->
                        <div style="padding:28px;display:grid;grid-template-columns:1fr 1fr;gap:var(--space-4);">
                            <div class="card">
                                <h4 style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:0.05em;color:var(--color-deep-teal);margin-bottom:14px;">Applicant Details</h4>
                                <div style="display:flex;flex-direction:column;gap:10px;font-size:14px;">
                                    <div class="flex justify-between"><span style="color:var(--color-body-gray);">Full Name</span><span style="font-weight:500;">Nadia Rahman</span></div>
                                    <div class="flex justify-between"><span style="color:var(--color-body-gray);">Email</span><span style="font-weight:500;">nadia@email.com</span></div>
                                    <div class="flex justify-between"><span style="color:var(--color-body-gray);">Phone</span><span style="font-weight:500;">+1 (555) 399-2211</span></div>
                                    <div class="flex justify-between"><span style="color:var(--color-body-gray);">Enrolling</span><span style="font-weight:500;">Herself (Adult)</span></div>
                                    <div class="flex justify-between"><span style="color:var(--color-body-gray);">Date of Birth</span><span style="font-weight:500;">Nov 3, 1998</span></div>
                                    <div class="flex justify-between"><span style="color:var(--color-body-gray);">Country</span><span style="font-weight:500;">Canada</span></div>
                                </div>
                            </div>
                            <div class="card">
                                <h4 style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:0.05em;color:var(--color-deep-teal);margin-bottom:14px;">Program Selected</h4>
                                <div style="display:flex;flex-direction:column;gap:10px;font-size:14px;">
                                    <div class="flex justify-between"><span style="color:var(--color-body-gray);">Program</span><span style="font-weight:500;">Islamic Theology</span></div>
                                    <div class="flex justify-between"><span style="color:var(--color-body-gray);">Term</span><span style="font-weight:500;">Fall 2026</span></div>
                                    <div class="flex justify-between"><span style="color:var(--color-body-gray);">Fee</span><span style="font-weight:500;">$450.00</span></div>
                                    <div class="flex justify-between"><span style="color:var(--color-body-gray);">Payment</span><span style="background:#fee2e2;color:#dc2626;font-size:11px;font-weight:700;padding:2px 8px;border-radius:4px;">Awaiting Acceptance</span></div>
                                </div>
                            </div>
                            <div class="card" style="grid-column:1/-1;">
                                <h4 style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:0.05em;color:var(--color-deep-teal);margin-bottom:14px;">Islamic Background (Custom Fields)</h4>
                                <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;font-size:14px;">
                                    <div class="flex justify-between"><span style="color:var(--color-body-gray);">Quran Level</span><span style="font-weight:500;">Juz 1–5</span></div>
                                    <div class="flex justify-between"><span style="color:var(--color-body-gray);">Prior Institution</span><span style="font-weight:500;">Self-taught</span></div>
                                    <div class="flex justify-between"><span style="color:var(--color-body-gray);">Years Studying</span><span style="font-weight:500;">3 years</span></div>
                                    <div class="flex justify-between"><span style="color:var(--color-body-gray);">Learning Goals</span><span style="font-weight:500;">Deepen knowledge of Fiqh</span></div>
                                </div>
                            </div>
                            <div class="card" style="grid-column:1/-1;">
                                <h4 style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:0.05em;color:var(--color-deep-teal);margin-bottom:14px;">Admin Notes</h4>
                                <textarea placeholder="Add internal notes about this application…" style="width:100%;padding:10px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;min-height:80px;resize:vertical;font-family:inherit;"></textarea>
                                <button class="btn btn-outline" style="margin-top:10px;font-size:12px;padding:6px 14px;" onclick="saveAndClose('','Note saved')">Save Note</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- View: Parent Households -->
                <section id="view-parents" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Parent Households</h1>
                            <p style="color: var(--color-body-gray);">Manage family groups and billing contacts.</p>
                        </div>
                        <button class="btn btn-primary" onclick="openModal('modal-add-household')">+ New Household</button>
                    </div>

                    <!-- Household Card (§20) -->
                    <div class="card" style="margin-bottom: var(--space-6);">
                        <div class="flex justify-between items-start"
                            style="border-bottom: 1px solid var(--color-light-gray); padding-bottom: var(--space-4); margin-bottom: var(--space-4);">
                            <div class="flex gap-4">
                                <div
                                    style="width: 48px; height: 48px; border-radius: 50%; background: var(--color-warm-ivory); border: 2px solid var(--color-deep-teal); display: flex; align-items: center; justify-content: center; color: var(--color-deep-teal); font-weight: 700;">
                                    MA</div>
                                <div>
                                    <h3 style="font-family: 'Inter'; font-weight: 700;">Maryam Ahmed</h3>
                                    <div class="flex gap-4"
                                        style="font-size: 12px; color: var(--color-body-gray); margin-top: 4px;">
                                        <span><i data-lucide="mail" style="width: 12px; vertical-align: middle;"></i>
                                            maryam@example.com</span>
                                        <span><i data-lucide="phone" style="width: 12px; vertical-align: middle;"></i>
                                            +1 (555) 012-3456</span>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: right;">
                                <span class="badge badge-info" style="margin-bottom: 4px;">HH-001</span>
                                <div style="font-size: 12px; font-weight: 600; color: var(--color-deep-navy);">Bal:
                                    $450.00</div>
                            </div>
                        </div>

                        <div class="flex gap-8">
                            <div style="flex: 1;">
                                <h4
                                    style="font-size: 11px; text-transform: uppercase; color: var(--color-body-gray); margin-bottom: var(--space-4); letter-spacing: 0.05em;">
                                    Children (Students)</h4>
                                <div class="flex flex-col gap-2">
                                    <div class="card"
                                        style="padding: 10px; background: var(--color-warm-ivory); border: 1px solid var(--color-mid-gray);">
                                        <div class="flex justify-between items-center">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    style="width: 24px; height: 24px; border-radius: 50%; background: var(--color-deep-teal); color: white; display: flex; align-items: center; justify-content: center; font-size: 10px; font-weight: 700;">
                                                    ZA</div>
                                                <span style="font-size: 13px; font-weight: 600;">Zainab Ahmed</span>
                                            </div>
                                            <span class="badge badge-success"
                                                style="font-size: 9px; padding: 2px 6px;">Enrolled</span>
                                        </div>
                                    </div>
                                    <div class="card"
                                        style="padding: 10px; background: var(--color-warm-ivory); border: 1px solid var(--color-mid-gray);">
                                        <div class="flex justify-between items-center">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    style="width: 24px; height: 24px; border-radius: 50%; background: var(--color-deep-teal); color: white; display: flex; align-items: center; justify-content: center; font-size: 10px; font-weight: 700;">
                                                    SA</div>
                                                <span style="font-size: 13px; font-weight: 600;">Sara Ahmed</span>
                                            </div>
                                            <span class="badge badge-warning"
                                                style="font-size: 9px; padding: 2px 6px;">Pending</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                style="flex: 1; border-left: 1px solid var(--color-light-gray); padding-left: var(--space-8);">
                                <h4
                                    style="font-size: 11px; text-transform: uppercase; color: var(--color-body-gray); margin-bottom: var(--space-4); letter-spacing: 0.05em;">
                                    Billing & Access</h4>
                                <div class="flex flex-col gap-3">
                                    <div class="flex justify-between items-center" style="font-size: 13px;">
                                        <span style="color: var(--color-body-gray);">Default Method</span>
                                        <span style="font-weight: 600;"><i data-lucide="credit-card"
                                                style="width: 14px; vertical-align: middle;"></i> Visa **** 4242</span>
                                    </div>
                                    <div class="flex justify-between items-center" style="font-size: 13px;">
                                        <span style="color: var(--color-body-gray);">Auto-Enroll</span>
                                        <span class="badge badge-success" style="font-size: 9px;">Active</span>
                                    </div>
                                    <button class="btn btn-outline"
                                        style="font-size: 12px; padding: 6px; width: 100%; margin-top: 8px;">View
                                        Invoices</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- View: Teachers -->
                <section id="view-teachers" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Teachers</h1>
                            <p style="color: var(--color-body-gray);">Manage faculty and assigned course sections.</p>
                        </div>
                        <button class="btn btn-primary" onclick="openModal('modal-add-teacher')">+ Add Teacher</button>
                    </div>

                    <div class="card" style="padding: 0; overflow: hidden;">
                        <table style="width: 100%; border-collapse: collapse; text-align: left;">
                            <thead
                                style="background: var(--color-light-gray); border-bottom: 2px solid var(--color-mid-gray);">
                                <tr>
                                    <th
                                        style="padding: 12px 24px; font-size: 12px; color: var(--color-body-gray); text-transform: uppercase;">
                                        Teacher</th>
                                    <th
                                        style="padding: 12px; font-size: 12px; color: var(--color-body-gray); text-transform: uppercase;">
                                        Department</th>
                                    <th
                                        style="padding: 12px; font-size: 12px; color: var(--color-body-gray); text-transform: uppercase;">
                                        Assigned Sections</th>
                                    <th
                                        style="padding: 12px; font-size: 12px; color: var(--color-body-gray); text-transform: uppercase;">
                                        Status</th>
                                    <th
                                        style="padding: 12px 24px; font-size: 12px; color: var(--color-body-gray); text-transform: uppercase; text-align: right;">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom: 1px solid var(--color-light-gray);">
                                    <td style="padding: 16px 24px;">
                                        <div class="flex items-center gap-3">
                                            <div
                                                style="width: 36px; height: 36px; border-radius: 50%; background: var(--color-deep-navy); color: white; display: flex; align-items: center; justify-content: center; font-weight: 700;">
                                                SF</div>
                                            <div>
                                                <div style="font-weight: 700; font-size: 14px;">Sheikh Faisal</div>
                                                <div style="font-size: 12px; color: var(--color-body-gray);">
                                                    faisal@zainabcenter.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="padding: 12px; font-size: 14px;">Islamic Studies</td>
                                    <td style="padding: 12px; font-size: 14px;">Theology 101, Fiqh 1</td>
                                    <td style="padding: 12px;">
                                        <span class="badge badge-success">Active</span>
                                    </td>
                                    <td style="padding: 16px 24px; text-align: right;" class="flex gap-2 justify-end">
                                        <a href="{{ url('/teacher') }}" target="_blank" class="btn btn-outline" style="padding: 4px 12px; font-size: 12px;"><i data-lucide="external-link" style="width:12px;vertical-align:middle;margin-right:4px;"></i>Portal</a>
                                        <button class="btn btn-outline" style="padding: 4px 12px; font-size: 12px;" onclick="openModal('modal-add-teacher')">Edit</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- View: Lessons -->
                <section id="view-lessons" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Lesson Library</h1>
                            <p style="color: var(--color-body-gray);">Manage course curriculum and digital content.</p>
                        </div>
                        <div class="flex gap-3">
                            <a href="#quiz-builder" class="btn btn-outline"><i data-lucide="help-circle" style="width:14px;vertical-align:middle;margin-right:6px;"></i>Quiz Builder</a>
                            <a href="#assignment-detail" class="btn btn-outline"><i data-lucide="clipboard-check" style="width:14px;vertical-align:middle;margin-right:6px;"></i>Assignments</a>
                            <button class="btn btn-primary">+ Create Lesson</button>
                        </div>
                    </div>

                    <div class="card" style="padding: 0; overflow: hidden;">
                        <table style="width: 100%; border-collapse: collapse; text-align: left;">
                            <thead
                                style="background: var(--color-light-gray); border-bottom: 2px solid var(--color-mid-gray);">
                                <tr>
                                    <th style="padding: 12px 24px; font-size: 12px; color: var(--color-body-gray);">
                                        LESSON TITLE</th>
                                    <th style="padding: 12px; font-size: 12px; color: var(--color-body-gray);">COURSE
                                    </th>
                                    <th style="padding: 12px; font-size: 12px; color: var(--color-body-gray);">TYPE</th>
                                    <th style="padding: 12px; font-size: 12px; color: var(--color-body-gray);">STATUS
                                    </th>
                                    <th
                                        style="padding: 12px 24px; font-size: 12px; color: var(--color-body-gray); text-align: right;">
                                        ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom: 1px solid var(--color-light-gray);">
                                    <td style="padding: 16px 24px;">
                                        <div class="flex items-center gap-3">
                                            <i data-lucide="play-circle"
                                                style="width: 18px; color: var(--color-deep-teal);"></i>
                                            <span style="font-weight: 700; font-size: 14px;">Introduction to
                                                Aqeedah</span>
                                        </div>
                                    </td>
                                    <td style="padding: 12px; font-size: 14px;">Theology 101</td>
                                    <td style="padding: 12px; font-size: 14px;">Video + Quiz</td>
                                    <td style="padding: 12px;">
                                        <span class="badge badge-success">Published</span>
                                    </td>
                                    <td style="padding: 16px 24px; text-align: right;">
                                        <button class="btn btn-outline"
                                            style="padding: 4px 12px; font-size: 12px;">Edit</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- View: Communications -->
                <section id="view-communications" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Broadcast Center</h1>
                            <p style="color: var(--color-body-gray);">Send SMS, Email, and Portal announcements to students, parents, and staff.</p>
                        </div>
                        <button class="btn btn-primary" onclick="openCompose()"><i data-lucide="send" style="width:14px;vertical-align:middle;margin-right:6px;"></i>New Broadcast</button>
                    </div>

                    <!-- Stats Bar -->
                    <div class="stats-grid" style="grid-template-columns:repeat(4,1fr); margin-bottom:var(--space-6);">
                        <div class="stat-card" style="border-left:4px solid var(--color-deep-teal);">
                            <span class="stat-label">Sent This Month</span>
                            <div class="stat-value">14</div>
                            <div style="font-size:11px;color:var(--color-body-gray);margin-top:4px;">broadcasts</div>
                        </div>
                        <div class="stat-card" style="border-left:4px solid #16A34A;">
                            <span class="stat-label">Avg Delivery Rate</span>
                            <div class="stat-value" style="color:#16A34A;">98.2%</div>
                            <div style="font-size:11px;color:var(--color-body-gray);margin-top:4px;">↑ vs last month</div>
                        </div>
                        <div class="stat-card" style="border-left:4px solid #2563EB;">
                            <span class="stat-label">Email Open Rate</span>
                            <div class="stat-value" style="color:#2563EB;">61%</div>
                            <div style="font-size:11px;color:var(--color-body-gray);margin-top:4px;">industry avg: 42%</div>
                        </div>
                        <div class="stat-card" style="border-left:4px solid #D97706;">
                            <span class="stat-label">Unsubscribes</span>
                            <div class="stat-value" style="color:#D97706;">3</div>
                            <div style="font-size:11px;color:var(--color-body-gray);margin-top:4px;">this month</div>
                        </div>
                    </div>

                    <!-- Main 2-col layout -->
                    <div style="display:grid;grid-template-columns:1fr 300px;gap:var(--space-6);">

                        <!-- Left: Compose + History -->
                        <div>
                            <!-- Compose Panel -->
                            <div class="card" id="compose-panel" style="border:2px solid var(--color-deep-teal);margin-bottom:var(--space-6);">
                                <div class="flex justify-between items-center" style="margin-bottom:var(--space-4);">
                                    <h3 style="font-size:15px;font-weight:700;">Compose Broadcast</h3>
                                    <button onclick="closeCompose()" style="background:none;border:none;cursor:pointer;color:var(--color-body-gray);font-size:18px;" title="Minimize">×</button>
                                </div>
                                <div style="display:grid;gap:var(--space-4);">
                                    <!-- Subject -->
                                    <div class="form-group">
                                        <label>Subject / Title</label>
                                        <input type="text" id="bc-subject" placeholder="e.g. Ramadan Schedule Update" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:14px;font-family:inherit;">
                                    </div>
                                    <!-- Channels -->
                                    <div>
                                        <label style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:0.04em;color:var(--color-body-gray);display:block;margin-bottom:8px;">Channels</label>
                                        <div class="flex gap-3">
                                            <label style="display:flex;align-items:center;gap:6px;font-size:13px;cursor:pointer;padding:8px 14px;border:1px solid var(--color-mid-gray);border-radius:8px;">
                                                <input type="checkbox" checked style="accent-color:var(--color-deep-teal);"> <i data-lucide="mail" style="width:14px;"></i> Email
                                            </label>
                                            <label style="display:flex;align-items:center;gap:6px;font-size:13px;cursor:pointer;padding:8px 14px;border:1px solid var(--color-mid-gray);border-radius:8px;">
                                                <input type="checkbox" style="accent-color:var(--color-deep-teal);"> <i data-lucide="message-square" style="width:14px;"></i> SMS
                                            </label>
                                            <label style="display:flex;align-items:center;gap:6px;font-size:13px;cursor:pointer;padding:8px 14px;border:1px solid var(--color-mid-gray);border-radius:8px;">
                                                <input type="checkbox" checked style="accent-color:var(--color-deep-teal);"> <i data-lucide="bell" style="width:14px;"></i> Portal
                                            </label>
                                        </div>
                                    </div>
                                    <!-- Recipients -->
                                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:var(--space-3);">
                                        <div class="form-group">
                                            <label>Audience</label>
                                            <select id="bc-audience" onchange="updateRecipientCount()" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:14px;font-family:inherit;">
                                                <option value="1247">All Students (1,247)</option>
                                                <option value="312">All Parents / Guardians (312)</option>
                                                <option value="18">All Staff & Teachers (18)</option>
                                                <option value="124">Program: Full-time Theology (124)</option>
                                                <option value="86">Program: Quranic Studies (86)</option>
                                                <option value="210">Program: Arabic Language (210)</option>
                                                <option value="34">Status: Payment Failed (34)</option>
                                                <option value="47">Status: Suspended (47)</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Schedule</label>
                                            <select id="bc-schedule" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:14px;font-family:inherit;">
                                                <option>Send Immediately</option>
                                                <option>Schedule for Later</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Message Body -->
                                    <div class="form-group">
                                        <label>Message Body</label>
                                        <textarea id="bc-body" rows="4" placeholder="Type your message here…" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:14px;font-family:inherit;resize:vertical;"></textarea>
                                    </div>
                                    <!-- Recipient preview -->
                                    <div style="background:var(--color-light-gray);border-radius:8px;padding:10px 14px;font-size:13px;display:flex;align-items:center;justify-content:space-between;">
                                        <span>Sending to: <strong id="recipient-count">1,247 recipients</strong></span>
                                        <div class="flex gap-3">
                                            <button class="btn btn-outline" style="font-size:12px;padding:6px 16px;" onclick="saveAndClose('','Broadcast saved as draft')">Save Draft</button>
                                            <button class="btn btn-primary" style="font-size:12px;padding:6px 16px;" onclick="sendBroadcast()"><i data-lucide="send" style="width:12px;vertical-align:middle;margin-right:5px;"></i>Send Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Broadcast History -->
                            <div class="card" style="padding:0;overflow:hidden;">
                                <div style="padding:16px 20px;border-bottom:1px solid var(--color-light-gray);display:flex;justify-content:space-between;align-items:center;">
                                    <h3 style="font-size:15px;font-weight:700;">Broadcast History</h3>
                                    <select style="padding:6px 10px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:12px;">
                                        <option>All Channels</option>
                                        <option>Email Only</option>
                                        <option>SMS Only</option>
                                        <option>Portal Only</option>
                                    </select>
                                </div>
                                <table style="width:100%;border-collapse:collapse;font-size:13px;">
                                    <thead style="background:var(--color-light-gray);">
                                        <tr>
                                            <th style="padding:10px 20px;text-align:left;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Subject</th>
                                            <th style="padding:10px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Channels</th>
                                            <th style="padding:10px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Audience</th>
                                            <th style="padding:10px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;text-align:center;">Delivered</th>
                                            <th style="padding:10px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;text-align:center;">Opened</th>
                                            <th style="padding:10px 20px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Sent</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="border-bottom:1px solid var(--color-light-gray);">
                                            <td style="padding:12px 20px;font-weight:600;">Ramadan Schedule Update</td>
                                            <td style="padding:12px;">
                                                <div class="flex gap-1">
                                                    <span class="badge badge-info" style="font-size:10px;padding:2px 6px;">Email</span>
                                                    <span class="badge" style="background:#dcfce7;color:#16a34a;font-size:10px;padding:2px 6px;">SMS</span>
                                                </div>
                                            </td>
                                            <td style="padding:12px;font-size:12px;color:var(--color-body-gray);">All Students</td>
                                            <td style="padding:12px;text-align:center;font-weight:600;color:#16A34A;">1,221 / 1,247</td>
                                            <td style="padding:12px;text-align:center;">780 (64%)</td>
                                            <td style="padding:12px 20px;font-size:12px;color:var(--color-body-gray);">Mar 14, 2026</td>
                                        </tr>
                                        <tr style="border-bottom:1px solid var(--color-light-gray);">
                                            <td style="padding:12px 20px;font-weight:600;">March Payment Reminder</td>
                                            <td style="padding:12px;">
                                                <div class="flex gap-1">
                                                    <span class="badge badge-info" style="font-size:10px;padding:2px 6px;">Email</span>
                                                    <span class="badge" style="background:#ede9fe;color:#7c3aed;font-size:10px;padding:2px 6px;">Portal</span>
                                                </div>
                                            </td>
                                            <td style="padding:12px;font-size:12px;color:var(--color-body-gray);">Payment Failed (34)</td>
                                            <td style="padding:12px;text-align:center;font-weight:600;color:#16A34A;">34 / 34</td>
                                            <td style="padding:12px;text-align:center;">22 (65%)</td>
                                            <td style="padding:12px 20px;font-size:12px;color:var(--color-body-gray);">Mar 12, 2026</td>
                                        </tr>
                                        <tr style="border-bottom:1px solid var(--color-light-gray);">
                                            <td style="padding:12px 20px;font-weight:600;">Spring 2026 Enrollment Now Open</td>
                                            <td style="padding:12px;">
                                                <div class="flex gap-1">
                                                    <span class="badge badge-info" style="font-size:10px;padding:2px 6px;">Email</span>
                                                    <span class="badge" style="background:#dcfce7;color:#16a34a;font-size:10px;padding:2px 6px;">SMS</span>
                                                    <span class="badge" style="background:#ede9fe;color:#7c3aed;font-size:10px;padding:2px 6px;">Portal</span>
                                                </div>
                                            </td>
                                            <td style="padding:12px;font-size:12px;color:var(--color-body-gray);">All Parents (312)</td>
                                            <td style="padding:12px;text-align:center;font-weight:600;color:#16A34A;">308 / 312</td>
                                            <td style="padding:12px;text-align:center;">199 (65%)</td>
                                            <td style="padding:12px 20px;font-size:12px;color:var(--color-body-gray);">Mar 01, 2026</td>
                                        </tr>
                                        <tr style="border-bottom:1px solid var(--color-light-gray);">
                                            <td style="padding:12px 20px;font-weight:600;">Arabic Grammar — New Lesson Released</td>
                                            <td style="padding:12px;">
                                                <span class="badge" style="background:#ede9fe;color:#7c3aed;font-size:10px;padding:2px 6px;">Portal</span>
                                            </td>
                                            <td style="padding:12px;font-size:12px;color:var(--color-body-gray);">Arabic Language (210)</td>
                                            <td style="padding:12px;text-align:center;font-weight:600;color:#16A34A;">210 / 210</td>
                                            <td style="padding:12px;text-align:center;">154 (73%)</td>
                                            <td style="padding:12px 20px;font-size:12px;color:var(--color-body-gray);">Feb 28, 2026</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:12px 20px;font-weight:600;">Emergency: Friday Class Cancelled</td>
                                            <td style="padding:12px;">
                                                <div class="flex gap-1">
                                                    <span class="badge badge-info" style="font-size:10px;padding:2px 6px;">Email</span>
                                                    <span class="badge" style="background:#dcfce7;color:#16a34a;font-size:10px;padding:2px 6px;">SMS</span>
                                                </div>
                                            </td>
                                            <td style="padding:12px;font-size:12px;color:var(--color-body-gray);">Full-time Theology (124)</td>
                                            <td style="padding:12px;text-align:center;font-weight:600;color:#16A34A;">121 / 124</td>
                                            <td style="padding:12px;text-align:center;">—</td>
                                            <td style="padding:12px 20px;font-size:12px;color:var(--color-body-gray);">Feb 21, 2026</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Right: Templates Sidebar -->
                        <div>
                            <div class="card" style="margin-bottom:var(--space-4);">
                                <h3 style="font-size:14px;font-weight:700;margin-bottom:var(--space-4);">Quick Templates</h3>
                                <div style="display:flex;flex-direction:column;gap:8px;">
                                    <button onclick="loadTemplate('enrollment-welcome')" style="padding:10px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:12px;cursor:pointer;background:white;text-align:left;transition:border-color 0.15s;" onmouseover="this.style.borderColor='var(--color-deep-teal)'" onmouseout="this.style.borderColor='var(--color-mid-gray)'">
                                        <div style="font-weight:700;margin-bottom:2px;">Enrollment Welcome</div>
                                        <div style="color:var(--color-body-gray);font-size:11px;">New student onboarding message</div>
                                    </button>
                                    <button onclick="loadTemplate('payment-reminder')" style="padding:10px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:12px;cursor:pointer;background:white;text-align:left;" onmouseover="this.style.borderColor='var(--color-deep-teal)'" onmouseout="this.style.borderColor='var(--color-mid-gray)'">
                                        <div style="font-weight:700;margin-bottom:2px;">Payment Reminder</div>
                                        <div style="color:var(--color-body-gray);font-size:11px;">Upcoming or overdue invoice</div>
                                    </button>
                                    <button onclick="loadTemplate('class-cancellation')" style="padding:10px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:12px;cursor:pointer;background:white;text-align:left;" onmouseover="this.style.borderColor='var(--color-deep-teal)'" onmouseout="this.style.borderColor='var(--color-mid-gray)'">
                                        <div style="font-weight:700;margin-bottom:2px;">Class Cancellation</div>
                                        <div style="color:var(--color-body-gray);font-size:11px;">Alert students of schedule change</div>
                                    </button>
                                    <button onclick="loadTemplate('new-lesson')" style="padding:10px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:12px;cursor:pointer;background:white;text-align:left;" onmouseover="this.style.borderColor='var(--color-deep-teal)'" onmouseout="this.style.borderColor='var(--color-mid-gray)'">
                                        <div style="font-weight:700;margin-bottom:2px;">New Lesson Available</div>
                                        <div style="color:var(--color-body-gray);font-size:11px;">Notify course students of new content</div>
                                    </button>
                                    <button onclick="loadTemplate('event-invite')" style="padding:10px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:12px;cursor:pointer;background:white;text-align:left;" onmouseover="this.style.borderColor='var(--color-deep-teal)'" onmouseout="this.style.borderColor='var(--color-mid-gray)'">
                                        <div style="font-weight:700;margin-bottom:2px;">Event Invitation</div>
                                        <div style="color:var(--color-body-gray);font-size:11px;">Invite to an upcoming event</div>
                                    </button>
                                    <button onclick="loadTemplate('graduation')" style="padding:10px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:12px;cursor:pointer;background:white;text-align:left;" onmouseover="this.style.borderColor='var(--color-deep-teal)'" onmouseout="this.style.borderColor='var(--color-mid-gray)'">
                                        <div style="font-weight:700;margin-bottom:2px;">Graduation Announcement</div>
                                        <div style="color:var(--color-body-gray);font-size:11px;">Program completion congratulations</div>
                                    </button>
                                </div>
                                <button class="btn btn-outline" style="width:100%;margin-top:var(--space-4);font-size:12px;padding:8px;" onclick="showToast('Opening template editor…')">
                                    <i data-lucide="plus" style="width:12px;vertical-align:middle;margin-right:4px;"></i>New Template
                                </button>
                            </div>

                            <!-- Channel Info -->
                            <div class="card">
                                <h3 style="font-size:13px;font-weight:700;margin-bottom:var(--space-3);">Channel Status</h3>
                                <div style="display:flex;flex-direction:column;gap:10px;font-size:12px;">
                                    <div class="flex justify-between items-center">
                                        <span class="flex items-center gap-2"><i data-lucide="mail" style="width:13px;"></i> Email (SendGrid)</span>
                                        <span class="badge badge-success">Connected</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="flex items-center gap-2"><i data-lucide="message-square" style="width:13px;"></i> SMS (Twilio)</span>
                                        <span class="badge badge-success">Connected</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="flex items-center gap-2"><i data-lucide="bell" style="width:13px;"></i> Portal Push</span>
                                        <span class="badge badge-success">Connected</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="flex items-center gap-2"><i data-lucide="smartphone" style="width:13px;"></i> WhatsApp</span>
                                        <span class="badge badge-warning">Not configured</span>
                                    </div>
                                </div>
                                <a href="#settings" class="btn btn-outline" style="display:block;text-align:center;width:100%;margin-top:var(--space-3);font-size:11px;padding:6px;text-decoration:none;" onclick="location.hash='settings'">Configure in Settings →</a>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- View: Attendance -->
                <section id="view-attendance" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Attendance Tracking</h1>
                            <p style="color: var(--color-body-gray);">Session-based attendance marking for all courses.
                            </p>
                        </div>
                        <div class="flex gap-4">
                            <button class="btn btn-outline">Export</button>
                            <button class="btn btn-primary">+ Mark Attendance</button>
                        </div>
                    </div>

                    <div class="card" style="padding: 0; overflow-x: auto;">
                        <div style="padding: var(--space-4); border-bottom: 1px solid var(--color-light-gray);"
                            class="flex gap-4">
                            <select
                                style="padding: 8px 12px; border: 1px solid var(--color-mid-gray); border-radius: 6px;">
                                <option>Intro to Theology (Fall 2026)</option>
                                <option>Arabic Grammar 101</option>
                            </select>
                            <button class="btn btn-outline" style="font-size: 13px; padding: 6px 12px;">Mark All
                                Present</button>
                        </div>
                        <table style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: center;">
                            <thead style="background: var(--color-deep-navy); color: white;">
                                <tr>
                                    <th
                                        style="padding: 12px 24px; text-align: left; position: sticky; left: 0; background: var(--color-deep-navy);">
                                        Student</th>
                                    <th style="padding: 12px; font-size: 11px;">Mar 10<br><span
                                            style="font-weight: normal; opacity: 0.7;">Week 1</span></th>
                                    <th style="padding: 12px; font-size: 11px;">Mar 12<br><span
                                            style="font-weight: normal; opacity: 0.7;">Week 1</span></th>
                                    <th style="padding: 12px; font-size: 11px;">Mar 17<br><span
                                            style="font-weight: normal; opacity: 0.7;">Week 2</span></th>
                                    <th style="padding: 12px; font-size: 11px;">Mar 19<br><span
                                            style="font-weight: normal; opacity: 0.7;">Week 2</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom: 1px solid var(--color-light-gray);">
                                    <td
                                        style="padding: 12px 24px; text-align: left; font-weight: 600; position: sticky; left: 0; background: white;">
                                        Zainab Ahmed</td>
                                    <td style="padding: 12px;">
                                        <div
                                            style="width: 28px; height: 28px; background: #dcfce7; color: #16a34a; border-radius: 4px; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-weight: bold; cursor: pointer;">
                                            P</div>
                                    </td>
                                    <td style="padding: 12px;">
                                        <div
                                            style="width: 28px; height: 28px; background: #dcfce7; color: #16a34a; border-radius: 4px; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-weight: bold; cursor: pointer;">
                                            P</div>
                                    </td>
                                    <td style="padding: 12px;">
                                        <div
                                            style="width: 28px; height: 28px; background: #f3f4f6; color: #9ca3af; border-radius: 4px; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-weight: bold; cursor: pointer;">
                                            —</div>
                                    </td>
                                    <td style="padding: 12px;">
                                        <div
                                            style="width: 28px; height: 28px; background: #f3f4f6; color: #9ca3af; border-radius: 4px; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-weight: bold; cursor: pointer;">
                                            —</div>
                                    </td>
                                </tr>
                                <tr style="border-bottom: 1px solid var(--color-light-gray);">
                                    <td
                                        style="padding: 12px 24px; text-align: left; font-weight: 600; position: sticky; left: 0; background: white;">
                                        Fatima Al-Hassan</td>
                                    <td style="padding: 12px;">
                                        <div
                                            style="width: 28px; height: 28px; background: #fee2e2; color: #dc2626; border-radius: 4px; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-weight: bold; cursor: pointer;">
                                            A</div>
                                    </td>
                                    <td style="padding: 12px;">
                                        <div
                                            style="width: 28px; height: 28px; background: #dcfce7; color: #16a34a; border-radius: 4px; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-weight: bold; cursor: pointer;">
                                            P</div>
                                    </td>
                                    <td style="padding: 12px;">
                                        <div
                                            style="width: 28px; height: 28px; background: #f3f4f6; color: #9ca3af; border-radius: 4px; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-weight: bold; cursor: pointer;">
                                            —</div>
                                    </td>
                                    <td style="padding: 12px;">
                                        <div
                                            style="width: 28px; height: 28px; background: #f3f4f6; color: #9ca3af; border-radius: 4px; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-weight: bold; cursor: pointer;">
                                            —</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- View: Grades -->
                <section id="view-grades" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Gradebook</h1>
                            <p style="color: var(--color-body-gray);">Weighted averages and assessment marks.</p>
                        </div>
                        <div class="flex gap-4">
                            <button class="btn btn-outline"
                                style="color: var(--color-mauve-rose); border-color: var(--color-mauve-rose);">Generate
                                Report Card</button>
                        </div>
                    </div>

                    <div class="card" style="padding: 0; overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: center;">
                            <thead style="background: var(--color-deep-navy); color: white;">
                                <tr>
                                    <th style="padding: 12px 24px; text-align: left;">Student</th>
                                    <th style="padding: 12px;">Quiz 1<br><span
                                            style="font-weight: normal; opacity: 0.7;">10pts</span></th>
                                    <th style="padding: 12px;">Quiz 2<br><span
                                            style="font-weight: normal; opacity: 0.7;">10pts</span></th>
                                    <th style="padding: 12px;">Assignment 1<br><span
                                            style="font-weight: normal; opacity: 0.7;">20pts</span></th>
                                    <th style="padding: 12px;">Exam<br><span
                                            style="font-weight: normal; opacity: 0.7;">100pts</span></th>
                                    <th style="padding: 12px; background: rgba(255,255,255,0.1);">Overall %</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom: 1px solid var(--color-light-gray);">
                                    <td style="padding: 12px 24px; text-align: left; font-weight: 600;">Zainab Ahmed</td>
                                    <td style="padding: 12px; background: #f0fdf4;">9</td>
                                    <td style="padding: 12px; background: #f0fdf4;">8</td>
                                    <td style="padding: 12px; background: #f0fdf4;">20</td>
                                    <td style="padding: 12px;">—</td>
                                    <td style="padding: 12px; font-weight: 700; color: #16a34a;">92%</td>
                                </tr>
                                <tr style="border-bottom: 1px solid var(--color-light-gray);">
                                    <td style="padding: 12px 24px; text-align: left; font-weight: 600;">Fatima Al-Hassan</td>
                                    <td style="padding: 12px; background: #fffbeb;">7</td>
                                    <td style="padding: 12px; background: #fffbeb;">6</td>
                                    <td style="padding: 12px; background: #fef2f2;">12</td>
                                    <td style="padding: 12px;">—</td>
                                    <td style="padding: 12px; font-weight: 700; color: #d97706;">63%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>



                <!-- View: Quiz Builder -->
                <section id="view-quiz-builder" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <a href="#lessons" style="font-size:13px;color:var(--color-body-gray);text-decoration:none;">← Lesson Library</a>
                            <h1 class="ui-page-title" style="margin-top:4px;">Quiz Builder</h1>
                            <p style="color: var(--color-body-gray);">Build assessments with multiple question types, time limits, and grading rules.</p>
                        </div>
                        <div class="flex gap-3">
                            <button class="btn btn-outline" onclick="saveAndClose('','Quiz saved as draft')">Save Draft</button>
                            <button class="btn btn-primary" onclick="saveAndClose('','Quiz published successfully')"><i data-lucide="check" style="width:14px;vertical-align:middle;margin-right:6px;"></i>Publish Quiz</button>
                        </div>
                    </div>

                    <div style="display:grid;grid-template-columns:2fr 1fr;gap:var(--space-6);">
                        <!-- LEFT: Quiz form -->
                        <div>
                            <!-- Quiz settings card -->
                            <div class="card" style="margin-bottom:var(--space-4);">
                                <h4 style="font-size:13px;font-weight:700;margin-bottom:16px;color:var(--color-deep-navy);">Quiz Settings</h4>
                                <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
                                    <div style="grid-column:1/-1;">
                                        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;">Quiz Title</label>
                                        <input type="text" placeholder="e.g. Aqeedah — Module 1 Quiz" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                                    </div>
                                    <div>
                                        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;">Course</label>
                                        <select style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                                            <option>Theology 101</option>
                                            <option>Arabic Grammar — Level 2</option>
                                            <option>Hanafi Fiqh</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:4px;">Linked Lesson (optional)</label>
                                        <select style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                                            <option>— None —</option>
                                            <option>Intro to Aqeedah</option>
                                            <option>Pillars of Faith</option>
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
                                        <input type="checkbox" id="quiz-shuffle" checked style="width:16px;height:16px;">
                                        <label for="quiz-shuffle" style="font-size:13px;cursor:pointer;">Shuffle question order</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Questions -->
                            <div id="quiz-questions">
                                <!-- Q1: MCQ -->
                                <div class="card" style="margin-bottom:var(--space-4);border-left:4px solid var(--color-deep-teal);">
                                    <div class="flex justify-between items-start" style="margin-bottom:12px;">
                                        <div class="flex items-center gap-3">
                                            <span style="background:var(--color-deep-teal);color:white;width:24px;height:24px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;flex-shrink:0;">1</span>
                                            <select style="padding:5px 10px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:12px;font-weight:600;color:var(--color-deep-teal);">
                                                <option>Multiple Choice</option>
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
                                            <input type="radio" name="q1-correct" checked style="flex-shrink:0;">
                                            <input type="text" value="Shahada (Declaration of Faith)" style="flex:1;padding:7px 10px;border:1px solid #86efac;background:#f0fdf4;border-radius:6px;font-size:13px;">
                                            <span style="font-size:11px;color:#16a34a;font-weight:700;">Correct</span>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <input type="radio" name="q1-correct" style="flex-shrink:0;">
                                            <input type="text" value="Salah (Prayer)" style="flex:1;padding:7px 10px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <input type="radio" name="q1-correct" style="flex-shrink:0;">
                                            <input type="text" value="Zakat (Charity)" style="flex:1;padding:7px 10px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;">
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <input type="radio" name="q1-correct" style="flex-shrink:0;">
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
                                    <textarea placeholder="Enter your question here…" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;min-height:52px;resize:vertical;font-family:inherit;margin-bottom:12px;">Islam has six pillars of faith (Arkan al-Iman).</textarea>
                                    <div class="flex gap-6">
                                        <label class="flex items-center gap-2" style="cursor:pointer;font-size:13px;">
                                            <input type="radio" name="q2-correct" checked>
                                            <span style="background:#f0fdf4;color:#16a34a;font-weight:700;padding:4px 16px;border-radius:6px;border:1px solid #86efac;">True ✓</span>
                                        </label>
                                        <label class="flex items-center gap-2" style="cursor:pointer;font-size:13px;">
                                            <input type="radio" name="q2-correct">
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

                            <!-- Add Question buttons -->
                            <div class="flex gap-3">
                                <button class="btn btn-outline" style="flex:1;border-style:dashed;" onclick="addQuizQuestion('mcq')">
                                    <i data-lucide="list" style="width:14px;vertical-align:middle;margin-right:6px;"></i>+ Multiple Choice
                                </button>
                                <button class="btn btn-outline" style="flex:1;border-style:dashed;" onclick="addQuizQuestion('tf')">
                                    <i data-lucide="toggle-left" style="width:14px;vertical-align:middle;margin-right:6px;"></i>+ True / False
                                </button>
                                <button class="btn btn-outline" style="flex:1;border-style:dashed;" onclick="addQuizQuestion('sa')">
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

                <!-- View: Assignment Detail -->
                <section id="view-assignment-detail" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <a href="#lessons" style="font-size:13px;color:var(--color-body-gray);text-decoration:none;">← Lesson Library</a>
                            <h1 class="ui-page-title" style="margin-top:4px;">Assignment: Essay on Taharah</h1>
                            <p style="color: var(--color-body-gray);">Hanafi Fiqh — Fundamentals · Due Mar 20, 2026</p>
                        </div>
                        <div class="flex gap-3">
                            <button class="btn btn-outline">Export Submissions</button>
                            <button class="btn btn-primary" onclick="saveAndClose('','Reminder sent to non-submitters')">Send Reminder</button>
                        </div>
                    </div>

                    <!-- 4-stat bar -->
                    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:var(--space-4);margin-bottom:var(--space-6);">
                        <div class="card" style="text-align:center;padding:20px 12px;">
                            <div style="font-size:32px;font-weight:800;color:var(--color-deep-navy);">24</div>
                            <div style="font-size:11px;color:var(--color-body-gray);text-transform:uppercase;letter-spacing:0.05em;margin-top:4px;">Total Students</div>
                        </div>
                        <div class="card" style="text-align:center;padding:20px 12px;border-top:3px solid var(--color-deep-teal);">
                            <div style="font-size:32px;font-weight:800;color:var(--color-deep-teal);">79%</div>
                            <div style="font-size:11px;color:var(--color-body-gray);text-transform:uppercase;letter-spacing:0.05em;margin-top:4px;">Submissions</div>
                            <div style="font-size:12px;color:var(--color-body-gray);margin-top:2px;">19 of 24</div>
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

                    <!-- Two-panel: Submissions + Non-submitters -->
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
                                        <td style="padding:10px 12px;text-align:right;"><button class="btn btn-outline" style="font-size:11px;padding:3px 10px;">View</button></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px 16px;font-weight:600;">Fatima Al-Hassan</td>
                                        <td style="padding:10px 12px;color:var(--color-body-gray);">Mar 17, 2026</td>
                                        <td style="padding:10px 12px;"><span style="background:#dcfce7;color:#16a34a;font-weight:700;font-size:12px;padding:3px 8px;border-radius:4px;">88/100</span></td>
                                        <td style="padding:10px 12px;text-align:right;"><button class="btn btn-outline" style="font-size:11px;padding:3px 10px;">View</button></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px 16px;font-weight:600;">Omar Khalil</td>
                                        <td style="padding:10px 12px;color:var(--color-body-gray);">Mar 19, 2026</td>
                                        <td style="padding:10px 12px;"><span style="background:#fef9c3;color:#854d0e;font-weight:700;font-size:12px;padding:3px 8px;border-radius:4px;">Pending</span></td>
                                        <td style="padding:10px 12px;text-align:right;"><button class="btn btn-primary" style="font-size:11px;padding:3px 10px;">Grade</button></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px 16px;font-weight:600;">Aisha Rahman</td>
                                        <td style="padding:10px 12px;color:var(--color-body-gray);">Mar 16, 2026</td>
                                        <td style="padding:10px 12px;"><span style="background:#dcfce7;color:#16a34a;font-weight:700;font-size:12px;padding:3px 8px;border-radius:4px;">76/100</span></td>
                                        <td style="padding:10px 12px;text-align:right;"><button class="btn btn-outline" style="font-size:11px;padding:3px 10px;">View</button></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:10px 16px;font-weight:600;">Hassan Karim</td>
                                        <td style="padding:10px 12px;color:var(--color-body-gray);">Mar 19, 2026</td>
                                        <td style="padding:10px 12px;"><span style="background:#fef9c3;color:#854d0e;font-weight:700;font-size:12px;padding:3px 8px;border-radius:4px;">Pending</span></td>
                                        <td style="padding:10px 12px;text-align:right;"><button class="btn btn-primary" style="font-size:11px;padding:3px 10px;">Grade</button></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div style="padding:10px 16px;background:var(--color-light-gray);border-top:1px solid var(--color-mid-gray);font-size:12px;color:var(--color-body-gray);">Showing 5 of 19 submissions</div>
                        </div>

                        <!-- Non-submitters panel -->
                        <div>
                            <div class="card" style="padding:0;overflow:hidden;margin-bottom:var(--space-4);">
                                <div style="padding:14px 20px;border-bottom:1px solid var(--color-light-gray);background:#fef3c7;display:flex;justify-content:space-between;align-items:center;">
                                    <h4 style="font-weight:700;font-size:14px;color:#92400e;">Not Submitted (5)</h4>
                                    <span style="font-size:11px;color:#d97706;font-weight:600;">Due: Mar 20</span>
                                </div>
                                <div style="display:flex;flex-direction:column;">
                                    <div style="padding:10px 16px;border-bottom:1px solid var(--color-light-gray);display:flex;justify-content:space-between;align-items:center;">
                                        <div style="font-size:13px;font-weight:600;">Sara Malik</div>
                                        <button class="btn btn-outline" style="font-size:11px;padding:3px 10px;color:#d97706;border-color:#d97706;">Remind</button>
                                    </div>
                                    <div style="padding:10px 16px;border-bottom:1px solid var(--color-light-gray);display:flex;justify-content:space-between;align-items:center;">
                                        <div style="font-size:13px;font-weight:600;">Ibrahim Nour</div>
                                        <button class="btn btn-outline" style="font-size:11px;padding:3px 10px;color:#d97706;border-color:#d97706;">Remind</button>
                                    </div>
                                    <div style="padding:10px 16px;border-bottom:1px solid var(--color-light-gray);display:flex;justify-content:space-between;align-items:center;">
                                        <div style="font-size:13px;font-weight:600;">Maryam Okonkwo</div>
                                        <button class="btn btn-outline" style="font-size:11px;padding:3px 10px;color:#d97706;border-color:#d97706;">Remind</button>
                                    </div>
                                    <div style="padding:10px 16px;border-bottom:1px solid var(--color-light-gray);display:flex;justify-content:space-between;align-items:center;">
                                        <div style="font-size:13px;font-weight:600;">Khalil Ahmed</div>
                                        <button class="btn btn-outline" style="font-size:11px;padding:3px 10px;color:#d97706;border-color:#d97706;">Remind</button>
                                    </div>
                                    <div style="padding:10px 16px;display:flex;justify-content:space-between;align-items:center;">
                                        <div style="font-size:13px;font-weight:600;">Yasmin Hassan</div>
                                        <button class="btn btn-outline" style="font-size:11px;padding:3px 10px;color:#d97706;border-color:#d97706;">Remind</button>
                                    </div>
                                </div>
                                <div style="padding:12px 16px;background:var(--color-light-gray);border-top:1px solid var(--color-mid-gray);">
                                    <button class="btn btn-outline" style="width:100%;font-size:12px;color:#d97706;border-color:#d97706;" onclick="saveAndClose('','Reminder sent to all 5 students')">Remind All</button>
                                </div>
                            </div>

                            <!-- Score distribution mini-chart -->
                            <div class="card">
                                <h4 style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:0.05em;color:var(--color-body-gray);margin-bottom:14px;">Score Distribution</h4>
                                <div style="display:flex;flex-direction:column;gap:8px;font-size:12px;">
                                    <div class="flex items-center gap-3">
                                        <span style="width:36px;color:var(--color-body-gray);">90–100</span>
                                        <div style="flex:1;background:var(--color-light-gray);border-radius:4px;height:14px;"><div style="background:#16a34a;width:40%;height:14px;border-radius:4px;"></div></div>
                                        <span style="width:16px;text-align:right;font-weight:600;">7</span>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <span style="width:36px;color:var(--color-body-gray);">80–89</span>
                                        <div style="flex:1;background:var(--color-light-gray);border-radius:4px;height:14px;"><div style="background:#0d9488;width:30%;height:14px;border-radius:4px;"></div></div>
                                        <span style="width:16px;text-align:right;font-weight:600;">5</span>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <span style="width:36px;color:var(--color-body-gray);">70–79</span>
                                        <div style="flex:1;background:var(--color-light-gray);border-radius:4px;height:14px;"><div style="background:#d97706;width:20%;height:14px;border-radius:4px;"></div></div>
                                        <span style="width:16px;text-align:right;font-weight:600;">4</span>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <span style="width:36px;color:var(--color-body-gray);">&lt;70</span>
                                        <div style="flex:1;background:var(--color-light-gray);border-radius:4px;height:14px;"><div style="background:#dc2626;width:15%;height:14px;border-radius:4px;"></div></div>
                                        <span style="width:16px;text-align:right;font-weight:600;">3</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- View: Admins / RBAC -->
                <section id="view-admins" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Admin Users & Roles</h1>
                            <p style="color: var(--color-body-gray);">Manage staff access and role-based permissions.</p>
                        </div>
                        <button class="btn btn-primary" onclick="openModal('modal-invite-admin')"><i data-lucide="user-plus" style="width:14px; vertical-align:middle; margin-right:6px;"></i>Invite Admin</button>
                    </div>

                    <!-- Role Summary -->
                    <div class="stats-grid">
                        <div class="stat-card"><span class="stat-label">Super Admins</span><div class="stat-value">2</div></div>
                        <div class="stat-card"><span class="stat-label">Academic Admins</span><div class="stat-value">5</div></div>
                        <div class="stat-card"><span class="stat-label">Finance Admins</span><div class="stat-value">3</div></div>
                        <div class="stat-card"><span class="stat-label">Enrollment Staff</span><div class="stat-value">4</div></div>
                    </div>

                    <!-- Role Permission Matrix -->
                    <div class="card" style="margin-bottom: var(--space-6);">
                        <h3 style="font-size: 15px; font-weight: 700; margin-bottom: var(--space-4);">Role Permission Matrix</h3>
                        <div style="overflow-x: auto;">
                            <table class="data-table" style="width:100%; border-collapse: collapse; font-size: 13px;">
                                <thead>
                                    <tr style="background: var(--color-deep-navy); color: white;">
                                        <th style="padding:10px 16px; text-align:left;">Permission</th>
                                        <th style="padding:10px; text-align:center;">Super Admin</th>
                                        <th style="padding:10px; text-align:center;">Academic Admin</th>
                                        <th style="padding:10px; text-align:center;">Finance Admin</th>
                                        <th style="padding:10px; text-align:center;">Enrollment Staff</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px 16px; font-weight:600;">Manage Students</td>
                                        <td style="padding:10px; text-align:center; color:#16A34A;">✓ Full</td>
                                        <td style="padding:10px; text-align:center; color:#16A34A;">✓ Full</td>
                                        <td style="padding:10px; text-align:center; color:#D97706;">View Only</td>
                                        <td style="padding:10px; text-align:center; color:#D97706;">Enroll/Edit</td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px 16px; font-weight:600;">Manage Billing</td>
                                        <td style="padding:10px; text-align:center; color:#16A34A;">✓ Full</td>
                                        <td style="padding:10px; text-align:center; color:#DC2626;">✗</td>
                                        <td style="padding:10px; text-align:center; color:#16A34A;">✓ Full</td>
                                        <td style="padding:10px; text-align:center; color:#DC2626;">✗</td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px 16px; font-weight:600;">Manage Courses / LMS</td>
                                        <td style="padding:10px; text-align:center; color:#16A34A;">✓ Full</td>
                                        <td style="padding:10px; text-align:center; color:#16A34A;">✓ Full</td>
                                        <td style="padding:10px; text-align:center; color:#DC2626;">✗</td>
                                        <td style="padding:10px; text-align:center; color:#DC2626;">✗</td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px 16px; font-weight:600;">Manage Admin Users</td>
                                        <td style="padding:10px; text-align:center; color:#16A34A;">✓ Full</td>
                                        <td style="padding:10px; text-align:center; color:#DC2626;">✗</td>
                                        <td style="padding:10px; text-align:center; color:#DC2626;">✗</td>
                                        <td style="padding:10px; text-align:center; color:#DC2626;">✗</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:10px 16px; font-weight:600;">View Reports</td>
                                        <td style="padding:10px; text-align:center; color:#16A34A;">✓ Full</td>
                                        <td style="padding:10px; text-align:center; color:#16A34A;">✓ Full</td>
                                        <td style="padding:10px; text-align:center; color:#16A34A;">✓ Full</td>
                                        <td style="padding:10px; text-align:center; color:#D97706;">Enrollment Only</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Admin Users List -->
                    <div class="card">
                        <div class="flex justify-between items-center" style="margin-bottom: var(--space-4);">
                            <h3 style="font-size: 15px; font-weight: 700;">Active Admin Users</h3>
                            <input type="text" placeholder="Search admins…" style="padding: 8px 12px; border: 1px solid var(--color-mid-gray); border-radius: 8px; font-size: 13px; width: 220px;">
                        </div>
                        <table style="width:100%; border-collapse:collapse; font-size:13px;">
                            <thead>
                                <tr style="border-bottom: 2px solid var(--color-light-gray); text-align:left;">
                                    <th style="padding:10px;">Name</th>
                                    <th style="padding:10px;">Email</th>
                                    <th style="padding:10px;">Role</th>
                                    <th style="padding:10px;">Last Active</th>
                                    <th style="padding:10px;">Status</th>
                                    <th style="padding:10px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:10px; font-weight:600;">Ehsan Ahmad</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">ehsan@zainabcenter.com</td>
                                    <td style="padding:10px;"><span class="badge" style="background:#1A2F4A; color:white;">Super Admin</span></td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Today</td>
                                    <td style="padding:10px;"><span class="badge badge-success">Active</span></td>
                                    <td style="padding:10px;"><button class="btn btn-outline" style="font-size:11px; padding:4px 10px;">Edit</button></td>
                                </tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:10px; font-weight:600;">Fatima Hassan</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">fatima@zainabcenter.com</td>
                                    <td style="padding:10px;"><span class="badge badge-info">Academic Admin</span></td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Yesterday</td>
                                    <td style="padding:10px;"><span class="badge badge-success">Active</span></td>
                                    <td style="padding:10px;"><button class="btn btn-outline" style="font-size:11px; padding:4px 10px;">Edit</button></td>
                                </tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:10px; font-weight:600;">Mariam Iqbal</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">mariam@zainabcenter.com</td>
                                    <td style="padding:10px;"><span class="badge badge-warning">Finance Admin</span></td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Mar 13</td>
                                    <td style="padding:10px;"><span class="badge badge-success">Active</span></td>
                                    <td style="padding:10px;"><button class="btn btn-outline" style="font-size:11px; padding:4px 10px;">Edit</button></td>
                                </tr>
                                <tr>
                                    <td style="padding:10px; font-weight:600;">Nadia Khan</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">nadia@zainabcenter.com</td>
                                    <td style="padding:10px;"><span class="badge" style="background:#EDD4E4; color:#A85D88;">Enrollment Staff</span></td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Mar 10</td>
                                    <td style="padding:10px;"><span class="badge badge-warning">Invited</span></td>
                                    <td style="padding:10px;"><button class="btn btn-outline" style="font-size:11px; padding:4px 10px; border-color:#D97706; color:#D97706;">Resend</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- View: Billing & Payments -->
                <section id="view-billing" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Billing & Payments</h1>
                            <p style="color: var(--color-body-gray);">Manage tuition, invoices, and payment states.</p>
                        </div>
                        <div class="flex gap-4">
                            <button class="btn btn-outline" onclick="showToast('Invoice list exported to CSV')">Export</button>
                            <button class="btn btn-primary" onclick="openInvoiceCreator()"><i data-lucide="plus" style="width:14px; vertical-align:middle; margin-right:6px;"></i>New Invoice</button>
                        </div>
                    </div>

                    <!-- Stats Bar -->
                    <div class="stats-grid">
                        <div class="stat-card" style="border-left: 4px solid var(--color-deep-teal);">
                            <span class="stat-label">Outstanding Balance</span>
                            <div class="stat-value" style="color: var(--color-deep-teal);">$8,450</div>
                            <div style="font-size:11px; color: var(--color-body-gray); margin-top:4px;">across 34 students</div>
                        </div>
                        <div class="stat-card" style="border-left: 4px solid #16A34A;">
                            <span class="stat-label">Collected This Month</span>
                            <div class="stat-value" style="color: #16A34A;">$12,300</div>
                            <div style="font-size:11px; color: var(--color-body-gray); margin-top:4px;">↑ 8% vs last month</div>
                        </div>
                        <div class="stat-card" style="border-left: 4px solid #DC2626;">
                            <span class="stat-label">Failed Payments</span>
                            <div class="stat-value" style="color: #DC2626;">7</div>
                            <div style="font-size:11px; color: var(--color-body-gray); margin-top:4px;">require follow-up</div>
                        </div>
                        <div class="stat-card" style="border-left: 4px solid #D97706;">
                            <span class="stat-label">Auto-charges (7 days)</span>
                            <div class="stat-value" style="color: #D97706;">$3,150</div>
                            <div style="font-size:11px; color: var(--color-body-gray); margin-top:4px;">21 invoices due</div>
                        </div>
                    </div>

                    <!-- Payment State Legend -->
                    <div class="card" style="margin-bottom: var(--space-6);">
                        <h3 style="font-size: 14px; font-weight:700; margin-bottom: var(--space-3);">Enrollment Payment States</h3>
                        <div class="flex gap-3" style="flex-wrap: wrap;">
                            <span class="badge" style="background:#EFF6FF; color:#2563EB;">Pending</span>
                            <span class="badge badge-success">Active</span>
                            <span class="badge badge-error">Payment Failed</span>
                            <span class="badge badge-warning">Suspended</span>
                            <span class="badge" style="background:#F3F4F6; color:#6B7280;">Expired</span>
                            <span class="badge" style="background:#F3F4F6; color:#6B7280;">Withdrawn</span>
                            <span class="badge" style="background:#ECFDF5; color:#059669;">Completed</span>
                            <span class="badge" style="background:#FEF3C7; color:#B45309;">Abandoned</span>
                        </div>
                        <p style="font-size:12px; color: var(--color-body-gray); margin-top: var(--space-3);">
                            <strong>Note:</strong> Reactivation is a transition event (Suspended → Active), tracked via <code>reactivation_count</code>. Abandoned state sends a resume-enrollment deep link (not a magic link).
                        </p>
                    </div>

                    <!-- Filters + Invoice List -->
                    <div class="card">
                        <div class="flex justify-between items-center" style="margin-bottom: var(--space-4); flex-wrap: wrap; gap: var(--space-3);">
                            <h3 style="font-size: 15px; font-weight:700;">Invoice List</h3>
                            <div class="flex gap-3" style="flex-wrap:wrap;">
                                <select style="padding: 8px 12px; border: 1px solid var(--color-mid-gray); border-radius: 8px; font-size: 13px;">
                                    <option>All States</option>
                                    <option>Pending</option>
                                    <option>Active</option>
                                    <option>Payment Failed</option>
                                    <option>Suspended</option>
                                    <option>Abandoned</option>
                                </select>
                                <input type="text" placeholder="Search student…" style="padding: 8px 12px; border: 1px solid var(--color-mid-gray); border-radius: 8px; font-size: 13px; width:180px;">
                            </div>
                        </div>
                        <div style="overflow-x: auto;">
                            <table style="width:100%; border-collapse:collapse; font-size:13px;">
                                <thead>
                                    <tr style="border-bottom:2px solid var(--color-light-gray); text-align:left;">
                                        <th style="padding:10px;">Invoice #</th>
                                        <th style="padding:10px;">Student</th>
                                        <th style="padding:10px;">Program</th>
                                        <th style="padding:10px;">Amount</th>
                                        <th style="padding:10px;">Due Date</th>
                                        <th style="padding:10px;">State</th>
                                        <th style="padding:10px;">Reactivations</th>
                                        <th style="padding:10px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px; font-weight:600;">#INV-0091</td>
                                        <td style="padding:10px;">Zainab Ahmed</td>
                                        <td style="padding:10px; color: var(--color-body-gray);">Islamic Theology</td>
                                        <td style="padding:10px; font-weight:700;">$150.00</td>
                                        <td style="padding:10px; color: var(--color-body-gray);">Mar 25, 2026</td>
                                        <td style="padding:10px;"><span class="badge badge-success">Active</span></td>
                                        <td style="padding:10px; text-align:center;">0</td>
                                        <td style="padding:10px;"><button class="btn btn-outline" style="font-size:11px; padding:4px 10px;" onclick="showToast('Opening invoice #INV-0091…')">View</button></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px; font-weight:600;">#INV-0087</td>
                                        <td style="padding:10px;">Omar Farooq</td>
                                        <td style="padding:10px; color: var(--color-body-gray);">Arabic Language</td>
                                        <td style="padding:10px; font-weight:700;">$299.00</td>
                                        <td style="padding:10px; color: #DC2626; font-weight:600;">Mar 01, 2026 ⚠</td>
                                        <td style="padding:10px;"><span class="badge badge-error">Payment Failed</span></td>
                                        <td style="padding:10px; text-align:center;">1</td>
                                        <td style="padding:10px;"><button class="btn btn-primary" style="font-size:11px; padding:4px 10px;" onclick="showToast('Retry payment queued for Omar Farooq')">Retry</button></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px; font-weight:600;">#INV-0083</td>
                                        <td style="padding:10px;">Aisha Siddiqui</td>
                                        <td style="padding:10px; color: var(--color-body-gray);">Quranic Studies</td>
                                        <td style="padding:10px; font-weight:700;">$200.00</td>
                                        <td style="padding:10px; color: var(--color-body-gray);">Feb 15, 2026</td>
                                        <td style="padding:10px;"><span class="badge badge-warning">Suspended</span></td>
                                        <td style="padding:10px; text-align:center;">2</td>
                                        <td style="padding:10px;"><button class="btn btn-outline" style="font-size:11px; padding:4px 10px; color: #16A34A; border-color:#16A34A;" onclick="showToast('Aisha Siddiqui reactivated — enrollment resumed')">Reactivate</button></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px; font-weight:600;">#INV-0079</td>
                                        <td style="padding:10px;">Hassan Malik</td>
                                        <td style="padding:10px; color: var(--color-body-gray);">Islamic Theology</td>
                                        <td style="padding:10px; font-weight:700;">$450.00</td>
                                        <td style="padding:10px; color: var(--color-body-gray);">Jan 10, 2026</td>
                                        <td style="padding:10px;"><span class="badge" style="background:#FEF3C7; color:#B45309;">Abandoned</span></td>
                                        <td style="padding:10px; text-align:center;">0</td>
                                        <td style="padding:10px;"><button class="btn btn-outline" style="font-size:11px; padding:4px 10px;" onclick="showToast('Resume enrollment link sent to Hassan Malik')">Send Resume Link</button></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:10px; font-weight:600;">#INV-0072</td>
                                        <td style="padding:10px;">Sara Khan</td>
                                        <td style="padding:10px; color: var(--color-body-gray);">Arabic Language</td>
                                        <td style="padding:10px; font-weight:700;">$299.00</td>
                                        <td style="padding:10px; color: var(--color-body-gray);">Dec 01, 2025</td>
                                        <td style="padding:10px;"><span class="badge" style="background:#ECFDF5; color:#059669;">Completed</span></td>
                                        <td style="padding:10px; text-align:center;">0</td>
                                        <td style="padding:10px;"><button class="btn btn-outline" style="font-size:11px; padding:4px 10px;" onclick="showToast('Receipt for #INV-0072 downloaded')">Receipt</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <!-- View: CRM -->
                <section id="view-crm" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">CRM — Inquiry Pipeline</h1>
                            <p style="color: var(--color-body-gray);">Track prospects from first inquiry through to active enrollment.</p>
                        </div>
                        <button class="btn btn-primary" onclick="openModal('modal-add-household')"><i data-lucide="plus" style="width:14px; vertical-align:middle; margin-right:6px;"></i>Log Inquiry</button>
                    </div>

                    <!-- Pipeline Stats -->
                    <div class="stats-grid">
                        <div class="stat-card"><span class="stat-label">New Inquiries</span><div class="stat-value" style="color: #2563EB;">18</div></div>
                        <div class="stat-card"><span class="stat-label">In Contact</span><div class="stat-value" style="color: #D97706;">11</div></div>
                        <div class="stat-card"><span class="stat-label">Application Rx</span><div class="stat-value" style="color: #7C3AED;">6</div></div>
                        <div class="stat-card"><span class="stat-label">Enrolled (Month)</span><div class="stat-value" style="color: #16A34A;">9</div></div>
                    </div>

                    <!-- Pipeline Kanban -->
                    <div style="display: grid; grid-template-columns: repeat(5, 1fr); gap: var(--space-4); overflow-x: auto;">
                        <!-- Col 1: New Inquiry -->
                        <div>
                            <div style="background: #EFF6FF; border-radius: 8px 8px 0 0; padding: 8px 12px; font-size: 12px; font-weight: 700; color: #2563EB;">NEW INQUIRY <span style="background: #2563EB; color: white; border-radius: 10px; padding: 1px 7px; margin-left: 6px;">18</span></div>
                            <div style="background: var(--color-light-gray); border-radius: 0 0 8px 8px; padding: var(--space-3); display: grid; gap: var(--space-2); min-height: 200px;">
                                <div class="card" style="padding: 12px; margin-bottom:0; box-shadow: var(--shadow-sm); cursor:pointer;" onclick="showCRMDetail('Yasmin Osman')">
                                    <div style="font-weight:700; font-size:13px;">Yasmin Osman</div>
                                    <div style="font-size:11px; color: var(--color-body-gray); margin-top:2px;">Islamic Theology · Web Form</div>
                                    <div style="font-size:11px; color: var(--color-body-gray); margin-top:4px;">Mar 14, 2026</div>
                                </div>
                                <div class="card" style="padding: 12px; margin-bottom:0; box-shadow: var(--shadow-sm); cursor:pointer;" onclick="showCRMDetail('Bilal Rauf')">
                                    <div style="font-weight:700; font-size:13px;">Bilal Rauf</div>
                                    <div style="font-size:11px; color: var(--color-body-gray); margin-top:2px;">Arabic Language · Referral</div>
                                    <div style="font-size:11px; color: var(--color-body-gray); margin-top:4px;">Mar 13, 2026</div>
                                </div>
                            </div>
                        </div>
                        <!-- Col 2: Contacted -->
                        <div>
                            <div style="background: #FEF3C7; border-radius: 8px 8px 0 0; padding: 8px 12px; font-size: 12px; font-weight: 700; color: #D97706;">CONTACTED <span style="background: #D97706; color: white; border-radius: 10px; padding: 1px 7px; margin-left: 6px;">11</span></div>
                            <div style="background: var(--color-light-gray); border-radius: 0 0 8px 8px; padding: var(--space-3); display: grid; gap: var(--space-2); min-height: 200px;">
                                <div class="card" style="padding: 12px; margin-bottom:0; box-shadow: var(--shadow-sm); cursor:pointer;" onclick="showCRMDetail('Amina Sheikh')">
                                    <div style="font-weight:700; font-size:13px;">Amina Sheikh</div>
                                    <div style="font-size:11px; color: var(--color-body-gray); margin-top:2px;">Quranic Studies · WhatsApp</div>
                                    <div style="font-size:11px; color: #D97706; margin-top:4px;">Follow-up due today</div>
                                </div>
                            </div>
                        </div>
                        <!-- Col 3: Application Received -->
                        <div>
                            <div style="background: #EDE9FE; border-radius: 8px 8px 0 0; padding: 8px 12px; font-size: 12px; font-weight: 700; color: #7C3AED;">APPLICATION RX <span style="background: #7C3AED; color: white; border-radius: 10px; padding: 1px 7px; margin-left: 6px;">6</span></div>
                            <div style="background: var(--color-light-gray); border-radius: 0 0 8px 8px; padding: var(--space-3); display: grid; gap: var(--space-2); min-height: 200px;">
                                <div class="card" style="padding: 12px; margin-bottom:0; box-shadow: var(--shadow-sm); cursor:pointer;" onclick="showCRMDetail('Khalid Noor')">
                                    <div style="font-weight:700; font-size:13px;">Khalid Noor</div>
                                    <div style="font-size:11px; color: var(--color-body-gray); margin-top:2px;">Islamic Theology · Email</div>
                                    <div style="font-size:11px; color: var(--color-body-gray); margin-top:4px;">Under review</div>
                                </div>
                            </div>
                        </div>
                        <!-- Col 4: Enrollment Review -->
                        <div>
                            <div style="background: #DCFCE7; border-radius: 8px 8px 0 0; padding: 8px 12px; font-size: 12px; font-weight: 700; color: #16A34A;">ENROLLMENT REVIEW <span style="background: #16A34A; color: white; border-radius: 10px; padding: 1px 7px; margin-left: 6px;">3</span></div>
                            <div style="background: var(--color-light-gray); border-radius: 0 0 8px 8px; padding: var(--space-3); display: grid; gap: var(--space-2); min-height: 200px;">
                                <div class="card" style="padding: 12px; margin-bottom:0; box-shadow: var(--shadow-sm); border-left: 3px solid #16A34A;">
                                    <div style="font-weight:700; font-size:13px;">Noor Rahman</div>
                                    <div style="font-size:11px; color: var(--color-body-gray); margin-top:2px;">Arabic Language</div>
                                    <div style="font-size:11px; color: #16A34A; margin-top:4px;">Ready to enroll ✓</div>
                                </div>
                            </div>
                        </div>
                        <!-- Col 5: Enrolled -->
                        <div>
                            <div style="background: var(--color-deep-navy); border-radius: 8px 8px 0 0; padding: 8px 12px; font-size: 12px; font-weight: 700; color: white;">ENROLLED <span style="background: rgba(255,255,255,0.2); color: white; border-radius: 10px; padding: 1px 7px; margin-left: 6px;">9</span></div>
                            <div style="background: var(--color-light-gray); border-radius: 0 0 8px 8px; padding: var(--space-3); display: grid; gap: var(--space-2); min-height: 200px;">
                                <div class="card" style="padding: 12px; margin-bottom:0; box-shadow: var(--shadow-sm);">
                                    <div style="font-weight:700; font-size:13px;">Zainab Ahmed</div>
                                    <div style="font-size:11px; color: var(--color-body-gray); margin-top:2px;">Islamic Theology</div>
                                    <div style="font-size:11px; color: #16A34A; margin-top:4px;">Enrolled Mar 12</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Inquiries Table -->
                    <div class="card" style="margin-top: var(--space-8);">
                        <h3 style="font-size:15px; font-weight:700; margin-bottom: var(--space-4);">All Inquiries</h3>
                        <table style="width:100%; border-collapse:collapse; font-size:13px;">
                            <thead>
                                <tr style="border-bottom:2px solid var(--color-light-gray); text-align:left;">
                                    <th style="padding:10px;">Name</th>
                                    <th style="padding:10px;">Email</th>
                                    <th style="padding:10px;">Program Interest</th>
                                    <th style="padding:10px;">Source</th>
                                    <th style="padding:10px;">Stage</th>
                                    <th style="padding:10px;">Date</th>
                                    <th style="padding:10px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:10px; font-weight:600;">Yasmin Osman</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">yasmin@email.com</td>
                                    <td style="padding:10px;">Islamic Theology</td>
                                    <td style="padding:10px;"><span class="badge badge-info">Web Form</span></td>
                                    <td style="padding:10px;"><span class="badge" style="background:#EFF6FF; color:#2563EB;">New Inquiry</span></td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Mar 14</td>
                                    <td style="padding:10px;"><button class="btn btn-outline" style="font-size:11px; padding:4px 10px;">Open</button></td>
                                </tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:10px; font-weight:600;">Amina Sheikh</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">amina@email.com</td>
                                    <td style="padding:10px;">Quranic Studies</td>
                                    <td style="padding:10px;"><span class="badge badge-success">Referral</span></td>
                                    <td style="padding:10px;"><span class="badge badge-warning">Contacted</span></td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Mar 11</td>
                                    <td style="padding:10px;"><button class="btn btn-outline" style="font-size:11px; padding:4px 10px;">Open</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- View: Calendar -->
                <section id="view-calendar" class="content-view hidden">
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

                <!-- View: Notification Center / CE Config -->
                <section id="view-notifications" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Notification Center</h1>
                            <p style="color: var(--color-body-gray);">Configure system notifications and Communication Engine rules.</p>
                        </div>
                        <button class="btn btn-primary">+ Add Rule</button>
                    </div>

                    <!-- Tabs -->
                    <div style="display:flex; gap:0; border-bottom: 2px solid var(--color-light-gray); margin-bottom: var(--space-6);">
                        <button onclick="switchNotifTab('templates', this)" style="padding: 10px 20px; font-size:13px; font-weight:700; border:none; background:none; border-bottom: 3px solid var(--color-deep-teal); color: var(--color-deep-teal); cursor:pointer;" id="tab-templates">Templates</button>
                        <button onclick="switchNotifTab('rules', this)" style="padding: 10px 20px; font-size:13px; font-weight:700; border:none; background:none; color: var(--color-body-gray); cursor:pointer;" id="tab-rules">CE Rules</button>
                        <button onclick="switchNotifTab('log', this)" style="padding: 10px 20px; font-size:13px; font-weight:700; border:none; background:none; color: var(--color-body-gray); cursor:pointer;" id="tab-log">Send Log</button>
                    </div>

                    <!-- Templates Panel -->
                    <div id="notif-panel-templates">
                        <div style="display:grid; gap: var(--space-4);">
                            <!-- Template row helper -->
                            <div class="card" style="padding: var(--space-4);">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <div style="font-size:14px; font-weight:700;">Welcome Email — New Student (Active)</div>
                                        <div style="font-size:12px; color: var(--color-body-gray); margin-top:4px;">Trigger: Enrollment state → <strong>Active</strong>. Includes magic link. Sent once per enrollment.</div>
                                    </div>
                                    <div class="flex gap-3 items-center">
                                        <span class="badge badge-success">Enabled</span>
                                        <button class="btn btn-outline" style="font-size:11px; padding:4px 10px;">Edit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="padding: var(--space-4);">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <div style="font-size:14px; font-weight:700;">Payment Failed — Student &amp; Parent</div>
                                        <div style="font-size:12px; color: var(--color-body-gray); margin-top:4px;">Trigger: Enrollment state → <strong>Payment Failed</strong>. Sent to household email.</div>
                                    </div>
                                    <div class="flex gap-3 items-center">
                                        <span class="badge badge-success">Enabled</span>
                                        <button class="btn btn-outline" style="font-size:11px; padding:4px 10px;">Edit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="padding: var(--space-4);">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <div style="font-size:14px; font-weight:700;">Suspension Notice</div>
                                        <div style="font-size:12px; color: var(--color-body-gray); margin-top:4px;">Trigger: Enrollment state → <strong>Suspended</strong>. Includes reactivation instructions.</div>
                                    </div>
                                    <div class="flex gap-3 items-center">
                                        <span class="badge badge-success">Enabled</span>
                                        <button class="btn btn-outline" style="font-size:11px; padding:4px 10px;">Edit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="padding: var(--space-4);">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <div style="font-size:14px; font-weight:700;">Abandoned Enrollment — Resume Link</div>
                                        <div style="font-size:12px; color: var(--color-body-gray); margin-top:4px;">Trigger: Enrollment state → <strong>Abandoned</strong> (after 72h inactivity). Sends deep link, <em>not</em> a magic link.</div>
                                    </div>
                                    <div class="flex gap-3 items-center">
                                        <span class="badge badge-success">Enabled</span>
                                        <button class="btn btn-outline" style="font-size:11px; padding:4px 10px;">Edit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="padding: var(--space-4);">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <div style="font-size:14px; font-weight:700;">New Lesson Published — Feed Update</div>
                                        <div style="font-size:12px; color: var(--color-body-gray); margin-top:4px;">Trigger: Lesson status → <strong>Published</strong>. Feed updates unconditionally for all enrolled students.</div>
                                    </div>
                                    <div class="flex gap-3 items-center">
                                        <span class="badge badge-success">Enabled</span>
                                        <button class="btn btn-outline" style="font-size:11px; padding:4px 10px;">Edit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="padding: var(--space-4);">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <div style="font-size:14px; font-weight:700;">Child Account Welcome Email</div>
                                        <div style="font-size:12px; color: var(--color-body-gray); margin-top:4px;">Trigger: Child student account created. Sent to <strong>parent email only</strong>. Does not go to child.</div>
                                    </div>
                                    <div class="flex gap-3 items-center">
                                        <span class="badge badge-success">Enabled</span>
                                        <button class="btn btn-outline" style="font-size:11px; padding:4px 10px;">Edit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="padding: var(--space-4); opacity:0.7;">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <div style="font-size:14px; font-weight:700;">Assignment Reminder</div>
                                        <div style="font-size:12px; color: var(--color-body-gray); margin-top:4px;">Trigger: 48h before assignment deadline.</div>
                                    </div>
                                    <div class="flex gap-3 items-center">
                                        <span class="badge badge-warning">Disabled</span>
                                        <button class="btn btn-outline" style="font-size:11px; padding:4px 10px;">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CE Rules Panel (hidden by default) -->
                    <div id="notif-panel-rules" style="display:none;">
                        <div class="card">
                            <h3 style="font-size:15px; font-weight:700; margin-bottom:var(--space-4);">Communication Engine Rules</h3>
                            <p style="font-size:13px; color: var(--color-body-gray); margin-bottom:var(--space-4);">CE rules define conditional logic for sending communications. Rules are evaluated in priority order.</p>
                            <table style="width:100%; border-collapse:collapse; font-size:13px;">
                                <thead><tr style="border-bottom:2px solid var(--color-light-gray); text-align:left;">
                                    <th style="padding:10px;">Priority</th>
                                    <th style="padding:10px;">Rule Name</th>
                                    <th style="padding:10px;">Condition</th>
                                    <th style="padding:10px;">Action</th>
                                    <th style="padding:10px;">Status</th>
                                </tr></thead>
                                <tbody>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px; font-weight:700;">1</td>
                                        <td style="padding:10px; font-weight:600;">Payment 3-day warning</td>
                                        <td style="padding:10px; color: var(--color-body-gray);">Invoice due in ≤ 3 days AND state = Active</td>
                                        <td style="padding:10px;">Send email + push to student &amp; parent</td>
                                        <td style="padding:10px;"><span class="badge badge-success">Active</span></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px; font-weight:700;">2</td>
                                        <td style="padding:10px; font-weight:600;">Grade posted</td>
                                        <td style="padding:10px; color: var(--color-body-gray);">Assessment graded = true</td>
                                        <td style="padding:10px;">Send in-app notification to student</td>
                                        <td style="padding:10px;"><span class="badge badge-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:10px; font-weight:700;">3</td>
                                        <td style="padding:10px; font-weight:600;">Low attendance alert</td>
                                        <td style="padding:10px; color: var(--color-body-gray);">Student attendance &lt; 75% for active term</td>
                                        <td style="padding:10px;">Send email to parent</td>
                                        <td style="padding:10px;"><span class="badge badge-warning">Disabled</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Send Log Panel (hidden by default) -->
                    <div id="notif-panel-log" style="display:none;">
                        <div class="card">
                            <h3 style="font-size:15px; font-weight:700; margin-bottom:var(--space-4);">Recent Notifications Sent</h3>
                            <table style="width:100%; border-collapse:collapse; font-size:13px;">
                                <thead><tr style="border-bottom:2px solid var(--color-light-gray); text-align:left;">
                                    <th style="padding:10px;">Timestamp</th>
                                    <th style="padding:10px;">Template</th>
                                    <th style="padding:10px;">Recipient</th>
                                    <th style="padding:10px;">Channel</th>
                                    <th style="padding:10px;">Status</th>
                                </tr></thead>
                                <tbody>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px; color: var(--color-body-gray);">Mar 15 09:14</td>
                                        <td style="padding:10px;">Welcome Email — New Student</td>
                                        <td style="padding:10px;">Zainab Ahmed</td>
                                        <td style="padding:10px;"><span class="badge badge-info">Email</span></td>
                                        <td style="padding:10px;"><span class="badge badge-success">Delivered</span></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px; color: var(--color-body-gray);">Mar 15 08:00</td>
                                        <td style="padding:10px;">Payment 3-day warning</td>
                                        <td style="padding:10px;">Omar Farooq</td>
                                        <td style="padding:10px;"><span class="badge badge-info">Email</span></td>
                                        <td style="padding:10px;"><span class="badge badge-success">Delivered</span></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:10px; color: var(--color-body-gray);">Mar 14 20:32</td>
                                        <td style="padding:10px;">Grade posted</td>
                                        <td style="padding:10px;">Fatima Al-Hassan</td>
                                        <td style="padding:10px;"><span class="badge" style="background:#EDE9FE; color:#7C3AED;">In-App</span></td>
                                        <td style="padding:10px;"><span class="badge badge-success">Delivered</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <!-- View: Reports -->
                <section id="view-reports" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Reports</h1>
                            <p style="color: var(--color-body-gray);">Generate, filter, and download institutional reports.</p>
                        </div>
                        <button class="btn btn-outline" onclick="showToast('Scheduled report export queued')"><i data-lucide="clock" style="width:14px;vertical-align:middle;margin-right:6px;"></i>Schedule Export</button>
                    </div>

                    <!-- Global Filters Bar -->
                    <div class="card flex items-center gap-4" style="margin-bottom:var(--space-6);flex-wrap:wrap;padding:14px 20px;">
                        <span style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:0.06em;color:var(--color-body-gray);white-space:nowrap;">Filter by:</span>
                        <div class="flex gap-3 flex-wrap flex-1">
                            <select id="rpt-term" onchange="applyReportFilters()" style="padding:7px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:13px;background:white;">
                                <option value="">All Terms</option>
                                <option value="spring-2026" selected>Spring 2026</option>
                                <option value="fall-2025">Fall 2025</option>
                                <option value="spring-2025">Spring 2025</option>
                            </select>
                            <select id="rpt-program" onchange="applyReportFilters()" style="padding:7px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:13px;background:white;">
                                <option value="">All Programs</option>
                                <option value="theology">Full-time Theology</option>
                                <option value="arabic">Arabic Language</option>
                                <option value="quran">Quranic Studies</option>
                            </select>
                            <select id="rpt-format" style="padding:7px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:13px;background:white;">
                                <option value="pdf">PDF</option>
                                <option value="excel">Excel (CSV)</option>
                            </select>
                            <div style="display:flex;gap:8px;align-items:center;background:var(--color-light-gray);border-radius:8px;padding:4px 8px;">
                                <label style="font-size:12px;font-weight:600;white-space:nowrap;">Date Range:</label>
                                <input type="date" id="rpt-from" value="2026-01-01" style="border:none;background:transparent;font-size:12px;font-family:inherit;">
                                <span style="color:var(--color-body-gray);">–</span>
                                <input type="date" id="rpt-to" value="2026-03-15" style="border:none;background:transparent;font-size:12px;font-family:inherit;">
                            </div>
                        </div>
                        <div id="rpt-filter-badge" style="font-size:12px;color:var(--color-deep-teal);font-weight:600;white-space:nowrap;">Spring 2026 · All Programs</div>
                    </div>

                    <!-- Report Type Cards -->
                    <h3 style="font-size:14px; font-weight:700; margin-bottom: var(--space-4);">Generate a Report</h3>
                    <div class="quick-actions-grid" style="grid-template-columns: repeat(4, 1fr); margin-bottom: var(--space-8);">
                        <div class="action-card" style="align-items:flex-start; padding: var(--space-4);" onclick="generateReport('Enrollment Report')">
                            <i data-lucide="users" style="color: var(--color-deep-teal); width:28px; height:28px;"></i>
                            <span style="font-size:13px; text-align:left;">Enrollment Report</span>
                            <span style="font-size:11px; color: var(--color-body-gray); text-align:left;">Enrollment by program, state, and term.</span>
                        </div>
                        <div class="action-card" style="align-items:flex-start; padding: var(--space-4);" onclick="generateReport('Financial Report')">
                            <i data-lucide="credit-card" style="color: var(--color-mauve-rose); width:28px; height:28px;"></i>
                            <span style="font-size:13px; text-align:left;">Financial Report</span>
                            <span style="font-size:11px; color: var(--color-body-gray); text-align:left;">Collections, outstanding, and payment states.</span>
                        </div>
                        <div class="action-card" style="align-items:flex-start; padding: var(--space-4);" onclick="generateReport('Attendance Report')">
                            <i data-lucide="calendar-check" style="color: var(--color-deep-teal); width:28px; height:28px;"></i>
                            <span style="font-size:13px; text-align:left;">Attendance Report</span>
                            <span style="font-size:11px; color: var(--color-body-gray); text-align:left;">Per-student and per-course attendance.</span>
                        </div>
                        <div class="action-card" style="align-items:flex-start; padding: var(--space-4);" onclick="generateReport('Academic Progress Report')">
                            <i data-lucide="award" style="color: var(--color-mauve-rose); width:28px; height:28px;"></i>
                            <span style="font-size:13px; text-align:left;">Academic Progress</span>
                            <span style="font-size:11px; color: var(--color-body-gray); text-align:left;">Gradebook summary and completion rates.</span>
                        </div>
                        <div class="action-card" style="align-items:flex-start; padding: var(--space-4);" onclick="generateReport('Bulk Transcripts')">
                            <i data-lucide="scroll" style="color: var(--color-deep-teal); width:28px; height:28px;"></i>
                            <span style="font-size:13px; text-align:left;">Transcripts (Bulk)</span>
                            <span style="font-size:11px; color: var(--color-body-gray); text-align:left;">Per-student PDF transcripts for completed programs.</span>
                        </div>
                        <div class="action-card" style="align-items:flex-start; padding: var(--space-4);" onclick="generateReport('CRM Funnel Report')">
                            <i data-lucide="funnel" style="color: var(--color-deep-teal); width:28px; height:28px;"></i>
                            <span style="font-size:13px; text-align:left;">CRM Funnel Report</span>
                            <span style="font-size:11px; color: var(--color-body-gray); text-align:left;">Inquiry-to-enrollment conversion rates.</span>
                        </div>
                        <div class="action-card" style="align-items:flex-start; padding: var(--space-4);" onclick="generateReport('Notification Log')">
                            <i data-lucide="bell" style="color: var(--color-deep-teal); width:28px; height:28px;"></i>
                            <span style="font-size:13px; text-align:left;">Notification Log</span>
                            <span style="font-size:11px; color: var(--color-body-gray); text-align:left;">Delivery and open rate by template.</span>
                        </div>
                        <div class="action-card" style="align-items:flex-start; padding: var(--space-4);" onclick="generateReport('Custom Report')">
                            <i data-lucide="bar-chart-3" style="color: var(--color-mauve-rose); width:28px; height:28px;"></i>
                            <span style="font-size:13px; text-align:left;">Custom Report</span>
                            <span style="font-size:11px; color: var(--color-body-gray); text-align:left;">Build a report with custom filters and fields.</span>
                        </div>
                    </div>

                    <!-- Generating indicator (hidden by default) -->
                    <div id="rpt-generating" class="hidden" style="background:var(--color-deep-teal);color:white;border-radius:8px;padding:14px 20px;margin-bottom:var(--space-4);display:flex;align-items:center;gap:12px;">
                        <i data-lucide="loader" style="width:16px;animation:spin 1s linear infinite;"></i>
                        <span id="rpt-generating-label">Generating Enrollment Report…</span>
                        <span style="font-size:12px;opacity:0.7;margin-left:auto;">Spring 2026 · All Programs · PDF</span>
                    </div>

                    <!-- Recent Reports -->
                    <div class="card" style="padding:0;overflow:hidden;">
                        <div style="padding:16px 20px;border-bottom:1px solid var(--color-light-gray);display:flex;justify-content:space-between;align-items:center;">
                            <h3 style="font-size:15px;font-weight:700;">Recently Generated</h3>
                            <input type="text" placeholder="Search reports…" oninput="filterReportHistory(this.value)" style="padding:6px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:12px;width:200px;">
                        </div>
                        <table style="width:100%; border-collapse:collapse; font-size:13px;">
                            <thead style="background:var(--color-light-gray);">
                                <tr style="border-bottom:2px solid var(--color-mid-gray);text-align:left;">
                                    <th style="padding:10px 20px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Report Name</th>
                                    <th style="padding:10px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Filters Applied</th>
                                    <th style="padding:10px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Generated By</th>
                                    <th style="padding:10px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Date</th>
                                    <th style="padding:10px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Format</th>
                                    <th style="padding:10px 20px;"></th>
                                </tr>
                            </thead>
                            <tbody id="rpt-history-tbody">
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:10px 20px; font-weight:600;">Enrollment Report</td>
                                    <td style="padding:10px; font-size:12px; color:var(--color-body-gray);">Spring 2026 · All Programs</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Ehsan Ahmad</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Mar 15, 2026</td>
                                    <td style="padding:10px;"><span class="badge badge-error">PDF</span></td>
                                    <td style="padding:10px 20px;"><button class="btn btn-outline" style="font-size:11px; padding:4px 10px;" onclick="showToast('Downloading Enrollment Report PDF…')">Download</button></td>
                                </tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:10px 20px; font-weight:600;">Financial Report</td>
                                    <td style="padding:10px; font-size:12px; color:var(--color-body-gray);">Feb 2026 · All Programs</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Mariam Iqbal</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Mar 01, 2026</td>
                                    <td style="padding:10px;"><span class="badge badge-success">Excel</span></td>
                                    <td style="padding:10px 20px;"><button class="btn btn-outline" style="font-size:11px; padding:4px 10px;" onclick="showToast('Downloading Financial Report CSV…')">Download</button></td>
                                </tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:10px 20px; font-weight:600;">Attendance Report</td>
                                    <td style="padding:10px; font-size:12px; color:var(--color-body-gray);">Week of Mar 10 · Full-time Theology</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Fatima Hassan</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Mar 14, 2026</td>
                                    <td style="padding:10px;"><span class="badge badge-error">PDF</span></td>
                                    <td style="padding:10px 20px;"><button class="btn btn-outline" style="font-size:11px; padding:4px 10px;" onclick="showToast('Downloading Attendance Report PDF…')">Download</button></td>
                                </tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:10px 20px; font-weight:600;">Academic Progress Report</td>
                                    <td style="padding:10px; font-size:12px; color:var(--color-body-gray);">Fall 2025 · Arabic Language</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Ehsan Ahmad</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Jan 10, 2026</td>
                                    <td style="padding:10px;"><span class="badge badge-success">Excel</span></td>
                                    <td style="padding:10px 20px;"><button class="btn btn-outline" style="font-size:11px; padding:4px 10px;" onclick="showToast('Downloading Academic Progress CSV…')">Download</button></td>
                                </tr>
                                <tr>
                                    <td style="padding:10px 20px; font-weight:600;">CRM Funnel Report</td>
                                    <td style="padding:10px; font-size:12px; color:var(--color-body-gray);">Q4 2025 · All Programs</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Mariam Iqbal</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Dec 30, 2025</td>
                                    <td style="padding:10px;"><span class="badge badge-error">PDF</span></td>
                                    <td style="padding:10px 20px;"><button class="btn btn-outline" style="font-size:11px; padding:4px 10px;" onclick="showToast('Downloading CRM Funnel PDF…')">Download</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- View: Settings -->
                <section id="view-settings" class="content-view hidden">
                    <div style="margin-bottom: var(--space-6);">
                        <h1 class="ui-page-title">Settings</h1>
                        <p style="color: var(--color-body-gray);">Configure organizational settings, academic year, and integrations.</p>
                    </div>

                    <!-- Settings Tabs -->
                    <div style="display:flex; gap:0; border-bottom: 2px solid var(--color-light-gray); margin-bottom: var(--space-6);">
                        <button onclick="switchSettingsTab('general', this)" style="padding:10px 20px; font-size:13px; font-weight:700; border:none; background:none; border-bottom: 3px solid var(--color-deep-teal); color: var(--color-deep-teal); cursor:pointer;" id="stab-general">General</button>
                        <button onclick="switchSettingsTab('academic', this)" style="padding:10px 20px; font-size:13px; font-weight:700; border:none; background:none; color: var(--color-body-gray); cursor:pointer;" id="stab-academic">Academic Year</button>
                        <button onclick="switchSettingsTab('payments', this)" style="padding:10px 20px; font-size:13px; font-weight:700; border:none; background:none; color: var(--color-body-gray); cursor:pointer;" id="stab-payments">Payments</button>
                        <button onclick="switchSettingsTab('portal', this)" style="padding:10px 20px; font-size:13px; font-weight:700; border:none; background:none; color: var(--color-body-gray); cursor:pointer;" id="stab-portal">Portal</button>
                        <button onclick="switchSettingsTab('integrations', this)" style="padding:10px 20px; font-size:13px; font-weight:700; border:none; background:none; color: var(--color-body-gray); cursor:pointer;" id="stab-integrations">Integrations</button>
                    </div>

                    <!-- General Panel -->
                    <div id="settings-panel-general">
                        <div class="card" style="max-width:640px;">
                            <h3 style="font-size:15px; font-weight:700; margin-bottom:var(--space-6);">Organization</h3>
                            <div style="display:grid; gap:var(--space-4);">
                                <div>
                                    <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Organization Name</label>
                                    <input type="text" value="Zainab Center" style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                </div>
                                <div>
                                    <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Support Email</label>
                                    <input type="email" value="info@zainabcenter.com" style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                </div>
                                <div>
                                    <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Timezone</label>
                                    <select style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                        <option selected>America/Toronto (EST/EDT)</option>
                                        <option>America/New_York</option>
                                        <option>Europe/London</option>
                                    </select>
                                </div>
                                <div>
                                    <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Default Language</label>
                                    <select style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                        <option selected>English</option>
                                        <option>Arabic</option>
                                        <option>Urdu</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary" style="margin-top:var(--space-6);">Save Changes</button>
                        </div>
                    </div>

                    <!-- Academic Year Panel (hidden) -->
                    <div id="settings-panel-academic" style="display:none;">
                        <div class="card" style="max-width:640px;">
                            <h3 style="font-size:15px; font-weight:700; margin-bottom:var(--space-4);">Academic Year Configuration</h3>
                            <div style="display:grid; gap:var(--space-4);">
                                <div class="flex gap-4">
                                    <div style="flex:1;">
                                        <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Academic Year Start</label>
                                        <input type="date" value="2026-09-01" style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                    </div>
                                    <div style="flex:1;">
                                        <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Academic Year End</label>
                                        <input type="date" value="2027-06-30" style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                    </div>
                                </div>
                                <div>
                                    <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Term Structure</label>
                                    <select style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                        <option>Semester (2 per year)</option>
                                        <option selected>Trimester (3 per year)</option>
                                        <option>Quarters (4 per year)</option>
                                        <option>Rolling (no fixed terms)</option>
                                    </select>
                                </div>
                                <div>
                                    <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Current Term</label>
                                    <input type="text" value="Spring 2026" style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                </div>
                            </div>
                            <button class="btn btn-primary" style="margin-top:var(--space-6);">Save Changes</button>
                        </div>
                    </div>

                    <!-- Payments Panel (hidden) -->
                    <div id="settings-panel-payments" style="display:none;">
                        <div class="card" style="max-width:640px;">
                            <h3 style="font-size:15px; font-weight:700; margin-bottom:var(--space-4);">Payment Configuration</h3>
                            <div style="display:grid; gap:var(--space-4);">
                                <div>
                                    <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Payment Processor</label>
                                    <select style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                        <option selected>Stripe</option>
                                        <option>Moneris</option>
                                        <option>PayPal</option>
                                    </select>
                                </div>
                                <div>
                                    <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Auto-charge Day of Month</label>
                                    <input type="number" value="25" min="1" max="28" style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                </div>
                                <div>
                                    <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Abandoned Cart Timeout (hours)</label>
                                    <input type="number" value="72" style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                </div>
                                <div style="display:flex; justify-content:space-between; align-items:center; padding:12px 14px; background: var(--color-light-gray); border-radius:8px;">
                                    <div>
                                        <div style="font-size:13px; font-weight:700;">Enable Installment Plans</div>
                                        <div style="font-size:11px; color: var(--color-body-gray); margin-top:2px;">Allow students to pay tuition in monthly installments</div>
                                    </div>
                                    <div style="width:44px; height:24px; background: var(--color-deep-teal); border-radius:12px; cursor:pointer; position:relative;">
                                        <div style="width:18px; height:18px; background:white; border-radius:50%; position:absolute; top:3px; right:3px;"></div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" style="margin-top:var(--space-6);">Save Changes</button>
                        </div>
                    </div>

                    <!-- Portal Panel (hidden) -->
                    <div id="settings-panel-portal" style="display:none;">
                        <div class="card" style="max-width:640px;">
                            <h3 style="font-size:15px; font-weight:700; margin-bottom:var(--space-4);">Student Portal Settings</h3>
                            <div style="display:grid; gap:var(--space-4);">
                                <div style="display:flex; justify-content:space-between; align-items:center; padding:12px 14px; background: var(--color-light-gray); border-radius:8px;">
                                    <div>
                                        <div style="font-size:13px; font-weight:700;">Allow Independent Student Login</div>
                                        <div style="font-size:11px; color: var(--color-body-gray); margin-top:2px;"><code>independent_login</code> — toggled per-student, no age threshold automation</div>
                                    </div>
                                    <div style="width:44px; height:24px; background: var(--color-deep-teal); border-radius:12px; cursor:pointer; position:relative;">
                                        <div style="width:18px; height:18px; background:white; border-radius:50%; position:absolute; top:3px; right:3px;"></div>
                                    </div>
                                </div>
                                <div style="display:flex; justify-content:space-between; align-items:center; padding:12px 14px; background: var(--color-light-gray); border-radius:8px;">
                                    <div>
                                        <div style="font-size:13px; font-weight:700;">Show Transcript Download on Portal</div>
                                        <div style="font-size:11px; color: var(--color-body-gray); margin-top:2px;">Transcript scoped per completed program only</div>
                                    </div>
                                    <div style="width:44px; height:24px; background: var(--color-deep-teal); border-radius:12px; cursor:pointer; position:relative;">
                                        <div style="width:18px; height:18px; background:white; border-radius:50%; position:absolute; top:3px; right:3px;"></div>
                                    </div>
                                </div>
                                <div style="display:flex; justify-content:space-between; align-items:center; padding:12px 14px; background: var(--color-light-gray); border-radius:8px;">
                                    <div>
                                        <div style="font-size:13px; font-weight:700;">Enable Coaching Track Indicator</div>
                                        <div style="font-size:11px; color: var(--color-body-gray); margin-top:2px;"><code>is_coaching</code> flag — shows coaching badge on student profile</div>
                                    </div>
                                    <div style="width:44px; height:24px; background: var(--color-mid-gray); border-radius:12px; cursor:pointer; position:relative;">
                                        <div style="width:18px; height:18px; background:white; border-radius:50%; position:absolute; top:3px; left:3px;"></div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" style="margin-top:var(--space-6);">Save Changes</button>
                        </div>
                    </div>

                    <!-- Integrations Panel (hidden) -->
                    <div id="settings-panel-integrations" style="display:none;">
                        <div style="display:grid; grid-template-columns: 1fr 1fr; gap: var(--space-4);">
                            <div class="card" style="display:flex; gap:var(--space-4); align-items:center;">
                                <div style="width:48px; height:48px; border-radius:8px; background:#635BFF; color:white; display:flex; align-items:center; justify-content:center; font-weight:900; font-size:16px;">S</div>
                                <div style="flex:1;">
                                    <div style="font-size:14px; font-weight:700;">Stripe</div>
                                    <div style="font-size:12px; color: var(--color-body-gray);">Payment processing</div>
                                </div>
                                <span class="badge badge-success">Connected</span>
                            </div>
                            <div class="card" style="display:flex; gap:var(--space-4); align-items:center;">
                                <div style="width:48px; height:48px; border-radius:8px; background:#4A154B; color:white; display:flex; align-items:center; justify-content:center; font-weight:900; font-size:16px;">Sl</div>
                                <div style="flex:1;">
                                    <div style="font-size:14px; font-weight:700;">Slack</div>
                                    <div style="font-size:12px; color: var(--color-body-gray);">Staff notifications</div>
                                </div>
                                <button class="btn btn-outline" style="font-size:11px; padding:4px 10px;">Connect</button>
                            </div>
                            <div class="card" style="display:flex; gap:var(--space-4); align-items:center;">
                                <div style="width:48px; height:48px; border-radius:8px; background:#EA4335; color:white; display:flex; align-items:center; justify-content:center; font-weight:900; font-size:16px;">G</div>
                                <div style="flex:1;">
                                    <div style="font-size:14px; font-weight:700;">Google Meet</div>
                                    <div style="font-size:12px; color: var(--color-body-gray);">Online class sessions</div>
                                </div>
                                <span class="badge badge-success">Connected</span>
                            </div>
                            <div class="card" style="display:flex; gap:var(--space-4); align-items:center;">
                                <div style="width:48px; height:48px; border-radius:8px; background:#1A2F4A; color:white; display:flex; align-items:center; justify-content:center; font-weight:900; font-size:14px;">SMTP</div>
                                <div style="flex:1;">
                                    <div style="font-size:14px; font-weight:700;">SMTP / Mailgun</div>
                                    <div style="font-size:12px; color: var(--color-body-gray);">Transactional email</div>
                                </div>
                                <span class="badge badge-success">Connected</span>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ==================== VIEW: CMS PAGES ==================== -->
                <section id="view-cms-pages" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom:var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Pages</h1>
                            <p style="color:var(--color-body-gray);">Create and manage public website pages. Publish to make them live.</p>
                        </div>
                        <button class="btn btn-primary" onclick="openModal('modal-create-page')">+ New Page</button>
                    </div>

                    <!-- Status tabs -->
                    <div style="display:flex;gap:0;border-bottom:2px solid var(--color-light-gray);margin-bottom:var(--space-6);">
                        <button onclick="filterPages(this,'all')" class="cms-tab active-tab" style="padding:10px 20px;background:none;border:none;cursor:pointer;font-weight:600;font-size:14px;color:var(--color-deep-teal);border-bottom:3px solid var(--color-deep-teal);margin-bottom:-2px;">All <span style="background:var(--color-deep-teal);color:white;border-radius:10px;padding:1px 7px;font-size:11px;margin-left:4px;">8</span></button>
                        <button onclick="filterPages(this,'published')" class="cms-tab" style="padding:10px 20px;background:none;border:none;cursor:pointer;font-size:14px;color:var(--color-body-gray);">Published <span style="background:#16a34a;color:white;border-radius:10px;padding:1px 7px;font-size:11px;margin-left:4px;">5</span></button>
                        <button onclick="filterPages(this,'draft')" class="cms-tab" style="padding:10px 20px;background:none;border:none;cursor:pointer;font-size:14px;color:var(--color-body-gray);">Draft <span style="background:var(--color-body-gray);color:white;border-radius:10px;padding:1px 7px;font-size:11px;margin-left:4px;">2</span></button>
                        <button onclick="filterPages(this,'archived')" class="cms-tab" style="padding:10px 20px;background:none;border:none;cursor:pointer;font-size:14px;color:var(--color-body-gray);">Archived <span style="background:var(--color-mid-gray);color:white;border-radius:10px;padding:1px 7px;font-size:11px;margin-left:4px;">1</span></button>
                    </div>

                    <div class="card" style="padding:0;overflow:hidden;">
                        <table style="width:100%;border-collapse:collapse;text-align:left;">
                            <thead style="background:var(--color-light-gray);border-bottom:2px solid var(--color-mid-gray);">
                                <tr>
                                    <th style="padding:12px 24px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Title</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Slug / URL</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">In Nav</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Status</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Last Modified</th>
                                    <th style="padding:12px 24px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;text-align:right;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:14px 24px;"><span style="font-weight:600;color:var(--color-deep-navy);">Home</span><br><span style="font-size:12px;color:var(--color-body-gray);">Main landing page</span></td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-deep-teal);">/</td>
                                    <td style="padding:14px 12px;"><span style="background:#dcfce7;color:#16a34a;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Yes</span></td>
                                    <td style="padding:14px 12px;"><span class="status-pill status-enrolled">Published</span></td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">Mar 12, 2026</td>
                                    <td style="padding:14px 24px;text-align:right;"><a href="{{ url('/') }}" target="_blank" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Preview</a><a href="#" style="color:var(--color-deep-teal);font-size:13px;" onclick="openModal('modal-create-page')">Edit</a></td>
                                </tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:14px 24px;"><span style="font-weight:600;color:var(--color-deep-navy);">About Us</span><br><span style="font-size:12px;color:var(--color-body-gray);">About Zainab Center</span></td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-deep-teal);">/about</td>
                                    <td style="padding:14px 12px;"><span style="background:#dcfce7;color:#16a34a;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Yes</span></td>
                                    <td style="padding:14px 12px;"><span class="status-pill status-enrolled">Published</span></td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">Mar 10, 2026</td>
                                    <td style="padding:14px 24px;text-align:right;"><a href="#" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Preview</a><a href="#" style="color:var(--color-deep-teal);font-size:13px;" onclick="openModal('modal-create-page')">Edit</a></td>
                                </tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:14px 24px;"><span style="font-weight:600;color:var(--color-deep-navy);">Programs</span><br><span style="font-size:12px;color:var(--color-body-gray);">Course catalog listing</span></td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-deep-teal);">/programs</td>
                                    <td style="padding:14px 12px;"><span style="background:#dcfce7;color:#16a34a;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Yes</span></td>
                                    <td style="padding:14px 12px;"><span class="status-pill status-enrolled">Published</span></td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">Mar 14, 2026</td>
                                    <td style="padding:14px 24px;text-align:right;"><a href="#" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Preview</a><a href="#" style="color:var(--color-deep-teal);font-size:13px;" onclick="openModal('modal-create-page')">Edit</a></td>
                                </tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:14px 24px;"><span style="font-weight:600;color:var(--color-deep-navy);">Events</span><br><span style="font-size:12px;color:var(--color-body-gray);">Upcoming events & registration</span></td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-deep-teal);">/events</td>
                                    <td style="padding:14px 12px;"><span style="background:#dcfce7;color:#16a34a;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Yes</span></td>
                                    <td style="padding:14px 12px;"><span class="status-pill status-enrolled">Published</span></td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">Mar 15, 2026</td>
                                    <td style="padding:14px 24px;text-align:right;"><a href="#" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Preview</a><a href="#" style="color:var(--color-deep-teal);font-size:13px;" onclick="openModal('modal-create-page')">Edit</a></td>
                                </tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:14px 24px;"><span style="font-weight:600;color:var(--color-deep-navy);">Contact</span><br><span style="font-size:12px;color:var(--color-body-gray);">Contact form & details</span></td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-deep-teal);">/contact</td>
                                    <td style="padding:14px 12px;"><span style="background:#dcfce7;color:#16a34a;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Yes</span></td>
                                    <td style="padding:14px 12px;"><span class="status-pill status-enrolled">Published</span></td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">Mar 8, 2026</td>
                                    <td style="padding:14px 24px;text-align:right;"><a href="#" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Preview</a><a href="#" style="color:var(--color-deep-teal);font-size:13px;" onclick="openModal('modal-create-page')">Edit</a></td>
                                </tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:14px 24px;"><span style="font-weight:600;color:var(--color-deep-navy);">Scholarship Program</span><br><span style="font-size:12px;color:var(--color-body-gray);">Scholarship info & application</span></td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">/scholarships</td>
                                    <td style="padding:14px 12px;"><span style="background:var(--color-light-gray);color:var(--color-body-gray);font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">No</span></td>
                                    <td style="padding:14px 12px;"><span class="status-pill" style="background:#fef3c7;color:#d97706;">Draft</span></td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">Mar 5, 2026</td>
                                    <td style="padding:14px 24px;text-align:right;"><a href="#" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Preview</a><a href="#" style="color:var(--color-deep-teal);font-size:13px;" onclick="openModal('modal-create-page')">Edit</a></td>
                                </tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:14px 24px;"><span style="font-weight:600;color:var(--color-deep-navy);">Donate</span><br><span style="font-size:12px;color:var(--color-body-gray);">Donation & zakat page</span></td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">/donate</td>
                                    <td style="padding:14px 12px;"><span style="background:var(--color-light-gray);color:var(--color-body-gray);font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">No</span></td>
                                    <td style="padding:14px 12px;"><span class="status-pill" style="background:#fef3c7;color:#d97706;">Draft</span></td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">Mar 2, 2026</td>
                                    <td style="padding:14px 24px;text-align:right;"><a href="#" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Preview</a><a href="#" style="color:var(--color-deep-teal);font-size:13px;" onclick="openModal('modal-create-page')">Edit</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- ==================== VIEW: CMS POSTS ==================== -->
                <section id="view-cms-posts" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom:var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Posts & Blog</h1>
                            <p style="color:var(--color-body-gray);">Announcements, articles, and blog posts for the public website.</p>
                        </div>
                        <button class="btn btn-primary" onclick="openModal('modal-create-post')">+ New Post</button>
                    </div>
                    <div class="card" style="padding:0;overflow:hidden;">
                        <table style="width:100%;border-collapse:collapse;text-align:left;">
                            <thead style="background:var(--color-light-gray);border-bottom:2px solid var(--color-mid-gray);">
                                <tr>
                                    <th style="padding:12px 24px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Title</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Category</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Status</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Scheduled</th>
                                    <th style="padding:12px 24px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;text-align:right;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:14px 24px;"><span style="font-weight:600;">Ramadan 2026 Program Schedule</span><br><span style="font-size:12px;color:var(--color-body-gray);">By Admin · Mar 15</span></td>
                                    <td style="padding:14px 12px;"><span style="background:var(--color-blush);color:var(--color-mauve-rose);font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Announcement</span></td>
                                    <td style="padding:14px 12px;"><span class="status-pill status-enrolled">Published</span></td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">—</td>
                                    <td style="padding:14px 24px;text-align:right;"><a href="#" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Edit</a><a href="#" style="color:#dc2626;font-size:13px;">Unpublish</a></td>
                                </tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:14px 24px;"><span style="font-weight:600;">New Hifz Track — Enrollment Now Open</span><br><span style="font-size:12px;color:var(--color-body-gray);">By Admin · Mar 10</span></td>
                                    <td style="padding:14px 12px;"><span style="background:#dbeafe;color:#1d4ed8;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Program Update</span></td>
                                    <td style="padding:14px 12px;"><span class="status-pill status-enrolled">Published</span></td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">—</td>
                                    <td style="padding:14px 24px;text-align:right;"><a href="#" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Edit</a><a href="#" style="color:#dc2626;font-size:13px;">Unpublish</a></td>
                                </tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:14px 24px;"><span style="font-weight:600;">Understanding the Maqasid al-Shari'ah</span><br><span style="font-size:12px;color:var(--color-body-gray);">By Ustadha K. Nour · Mar 3</span></td>
                                    <td style="padding:14px 12px;"><span style="background:#f0fdf4;color:#15803d;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Article</span></td>
                                    <td style="padding:14px 12px;"><span class="status-pill" style="background:#fef3c7;color:#d97706;">Draft</span></td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">Apr 1, 2026</td>
                                    <td style="padding:14px 24px;text-align:right;"><a href="#" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Edit</a><a href="#" style="color:var(--color-deep-teal);font-size:13px;">Publish Now</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- ==================== VIEW: CMS NAVIGATION BUILDER ==================== -->
                <section id="view-cms-nav-builder" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom:var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Navigation Builder</h1>
                            <p style="color:var(--color-body-gray);">Control which pages appear in the public website navigation bar and their order.</p>
                        </div>
                        <button class="btn btn-primary" onclick="saveAndClose(null,'Navigation saved successfully')">Save Changes</button>
                    </div>
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:var(--space-6);">
                        <!-- Current Nav -->
                        <div class="card">
                            <h3 style="font-size:16px;font-weight:700;color:var(--color-deep-navy);margin-bottom:var(--space-4);">Current Navigation <span style="font-size:12px;color:var(--color-body-gray);font-weight:400;">(drag to reorder)</span></h3>
                            <div id="nav-builder-list">
                                <div class="nav-builder-item" style="display:flex;align-items:center;gap:12px;padding:12px 16px;border:1px solid var(--color-mid-gray);border-radius:8px;margin-bottom:8px;background:white;cursor:grab;">
                                    <i data-lucide="grip-vertical" style="width:16px;color:var(--color-body-gray);flex-shrink:0;"></i>
                                    <span style="flex:1;font-weight:600;font-size:14px;">Home</span>
                                    <span style="font-size:12px;color:var(--color-body-gray);">/</span>
                                    <button onclick="this.closest('.nav-builder-item').remove()" style="background:none;border:none;cursor:pointer;color:#dc2626;font-size:16px;" title="Remove from nav">✕</button>
                                </div>
                                <div class="nav-builder-item" style="display:flex;align-items:center;gap:12px;padding:12px 16px;border:1px solid var(--color-mid-gray);border-radius:8px;margin-bottom:8px;background:white;cursor:grab;">
                                    <i data-lucide="grip-vertical" style="width:16px;color:var(--color-body-gray);flex-shrink:0;"></i>
                                    <span style="flex:1;font-weight:600;font-size:14px;">Programs</span>
                                    <span style="font-size:12px;color:var(--color-body-gray);">/programs</span>
                                    <button onclick="this.closest('.nav-builder-item').remove()" style="background:none;border:none;cursor:pointer;color:#dc2626;font-size:16px;" title="Remove from nav">✕</button>
                                </div>
                                <div class="nav-builder-item" style="display:flex;align-items:center;gap:12px;padding:12px 16px;border:1px solid var(--color-mid-gray);border-radius:8px;margin-bottom:8px;background:white;cursor:grab;">
                                    <i data-lucide="grip-vertical" style="width:16px;color:var(--color-body-gray);flex-shrink:0;"></i>
                                    <span style="flex:1;font-weight:600;font-size:14px;">Events</span>
                                    <span style="font-size:12px;color:var(--color-body-gray);">/events</span>
                                    <button onclick="this.closest('.nav-builder-item').remove()" style="background:none;border:none;cursor:pointer;color:#dc2626;font-size:16px;" title="Remove from nav">✕</button>
                                </div>
                                <div class="nav-builder-item" style="display:flex;align-items:center;gap:12px;padding:12px 16px;border:1px solid var(--color-mid-gray);border-radius:8px;margin-bottom:8px;background:white;cursor:grab;">
                                    <i data-lucide="grip-vertical" style="width:16px;color:var(--color-body-gray);flex-shrink:0;"></i>
                                    <span style="flex:1;font-weight:600;font-size:14px;">About</span>
                                    <span style="font-size:12px;color:var(--color-body-gray);">/about</span>
                                    <button onclick="this.closest('.nav-builder-item').remove()" style="background:none;border:none;cursor:pointer;color:#dc2626;font-size:16px;" title="Remove from nav">✕</button>
                                </div>
                                <div class="nav-builder-item" style="display:flex;align-items:center;gap:12px;padding:12px 16px;border:1px solid var(--color-mid-gray);border-radius:8px;margin-bottom:8px;background:white;cursor:grab;">
                                    <i data-lucide="grip-vertical" style="width:16px;color:var(--color-body-gray);flex-shrink:0;"></i>
                                    <span style="flex:1;font-weight:600;font-size:14px;">Contact</span>
                                    <span style="font-size:12px;color:var(--color-body-gray);">/contact</span>
                                    <button onclick="this.closest('.nav-builder-item').remove()" style="background:none;border:none;cursor:pointer;color:#dc2626;font-size:16px;" title="Remove from nav">✕</button>
                                </div>
                            </div>
                            <p style="font-size:12px;color:var(--color-body-gray);margin-top:var(--space-3);">Enroll button always appears at the far right of the nav automatically.</p>
                        </div>
                        <!-- Add from pages -->
                        <div class="card">
                            <h3 style="font-size:16px;font-weight:700;color:var(--color-deep-navy);margin-bottom:var(--space-4);">Available Pages</h3>
                            <p style="font-size:13px;color:var(--color-body-gray);margin-bottom:var(--space-4);">Click a page to add it to the navigation.</p>
                            <div style="display:flex;flex-direction:column;gap:8px;">
                                <div style="display:flex;justify-content:space-between;align-items:center;padding:10px 14px;border:1px dashed var(--color-mid-gray);border-radius:8px;">
                                    <div><span style="font-weight:600;font-size:14px;">Scholarship Program</span><span style="font-size:12px;color:var(--color-body-gray);margin-left:8px;">/scholarships</span></div>
                                    <button onclick="saveAndClose(null,'Page added to navigation')" class="btn btn-outline" style="font-size:12px;padding:4px 12px;">+ Add</button>
                                </div>
                                <div style="display:flex;justify-content:space-between;align-items:center;padding:10px 14px;border:1px dashed var(--color-mid-gray);border-radius:8px;">
                                    <div><span style="font-weight:600;font-size:14px;">Donate</span><span style="font-size:12px;color:var(--color-body-gray);margin-left:8px;">/donate</span></div>
                                    <button onclick="saveAndClose(null,'Page added to navigation')" class="btn btn-outline" style="font-size:12px;padding:4px 12px;">+ Add</button>
                                </div>
                            </div>
                            <div style="margin-top:var(--space-6);padding-top:var(--space-4);border-top:1px solid var(--color-light-gray);">
                                <p style="font-size:13px;font-weight:600;color:var(--color-deep-navy);margin-bottom:var(--space-3);">Or add a custom link</p>
                                <div class="form-group" style="margin-bottom:8px;"><label>Label</label><input type="text" placeholder="e.g. Donate"></div>
                                <div class="form-group" style="margin-bottom:12px;"><label>URL</label><input type="text" placeholder="e.g. /donate or https://..."></div>
                                <button onclick="saveAndClose(null,'Custom link added to navigation')" class="btn btn-primary" style="width:100%;">Add Custom Link</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ==================== VIEW: CRM EVENTS ==================== -->
                <section id="view-crm-events" class="content-view hidden">
                    <div id="crm-events-list-panel">
                        <div class="flex justify-between items-center" style="margin-bottom:var(--space-6);">
                            <div>
                                <h1 class="ui-page-title">Events</h1>
                                <p style="color:var(--color-body-gray);">One-time gatherings — seminars, open days, fundraisers, workshops — with public registration.</p>
                            </div>
                            <button class="btn btn-primary" onclick="openModal('modal-create-event')">+ Create Event</button>
                        </div>

                        <!-- Stats strip -->
                        <div class="stats-grid" style="margin-bottom:var(--space-6);">
                            <div class="stat-card"><span class="stat-label">Upcoming Events</span><div class="stat-value">4</div></div>
                            <div class="stat-card"><span class="stat-label">Total Registrants</span><div class="stat-value">312</div></div>
                            <div class="stat-card"><span class="stat-label">Paid Revenue</span><div class="stat-value" style="color:var(--color-deep-teal);">$2,480</div></div>
                            <div class="stat-card"><span class="stat-label">Pending Payment</span><div class="stat-value" style="color:var(--color-mauve-rose);">7</div></div>
                        </div>

                        <div class="card" style="padding:0;overflow:hidden;">
                            <table style="width:100%;border-collapse:collapse;text-align:left;">
                                <thead style="background:var(--color-light-gray);border-bottom:2px solid var(--color-mid-gray);">
                                    <tr>
                                        <th style="padding:12px 24px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Event</th>
                                        <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Date & Time</th>
                                        <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Type</th>
                                        <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Registrants</th>
                                        <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Status</th>
                                        <th style="padding:12px 24px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;text-align:right;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:14px 24px;"><span style="font-weight:600;color:var(--color-deep-navy);">Ramadan Fundraising Dinner</span><br><span style="font-size:12px;color:var(--color-body-gray);">Annual fundraiser + lecture</span></td>
                                        <td style="padding:14px 12px;font-size:13px;">Mar 28, 2026<br><span style="color:var(--color-body-gray);">6:30 PM – 10:00 PM</span></td>
                                        <td style="padding:14px 12px;"><span style="background:#fef9c3;color:#854d0e;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Paid · $50</span></td>
                                        <td style="padding:14px 12px;"><button onclick="showEventDetail('Ramadan Fundraising Dinner')" style="background:none;border:none;cursor:pointer;color:var(--color-deep-teal);font-weight:600;">148 <span style="font-weight:400;font-size:12px;">view →</span></button></td>
                                        <td style="padding:14px 12px;"><span class="status-pill status-enrolled">Registration Open</span></td>
                                        <td style="padding:14px 24px;text-align:right;"><a href="#" onclick="openModal('modal-create-event')" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Edit</a><a href="#" style="color:#dc2626;font-size:13px;">Close Reg.</a></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:14px 24px;"><span style="font-weight:600;color:var(--color-deep-navy);">Arabic Language Open Day</span><br><span style="font-size:12px;color:var(--color-body-gray);">Free intro session + Q&A</span></td>
                                        <td style="padding:14px 12px;font-size:13px;">Apr 5, 2026<br><span style="color:var(--color-body-gray);">2:00 PM – 4:00 PM</span></td>
                                        <td style="padding:14px 12px;"><span style="background:#dcfce7;color:#166534;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Free</span></td>
                                        <td style="padding:14px 12px;"><button onclick="showEventDetail('Arabic Language Open Day')" style="background:none;border:none;cursor:pointer;color:var(--color-deep-teal);font-weight:600;">87 <span style="font-weight:400;font-size:12px;">view →</span></button></td>
                                        <td style="padding:14px 12px;"><span class="status-pill status-enrolled">Registration Open</span></td>
                                        <td style="padding:14px 24px;text-align:right;"><a href="#" onclick="openModal('modal-create-event')" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Edit</a><a href="#" style="color:#dc2626;font-size:13px;">Close Reg.</a></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:14px 24px;"><span style="font-weight:600;color:var(--color-deep-navy);">Fiqh Workshop — Spring 2026</span><br><span style="font-size:12px;color:var(--color-body-gray);">2-day intensive with Sheikh Ahmad</span></td>
                                        <td style="padding:14px 12px;font-size:13px;">Apr 19–20, 2026<br><span style="color:var(--color-body-gray);">9:00 AM – 5:00 PM</span></td>
                                        <td style="padding:14px 12px;"><span style="background:#fef9c3;color:#854d0e;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Paid · $120</span></td>
                                        <td style="padding:14px 12px;"><button onclick="showEventDetail('Fiqh Workshop')" style="background:none;border:none;cursor:pointer;color:var(--color-deep-teal);font-weight:600;">45 <span style="font-weight:400;font-size:12px;">view →</span></button></td>
                                        <td style="padding:14px 12px;"><span class="status-pill status-enrolled">Registration Open</span></td>
                                        <td style="padding:14px 24px;text-align:right;"><a href="#" onclick="openModal('modal-create-event')" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Edit</a><a href="#" style="color:#dc2626;font-size:13px;">Close Reg.</a></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:14px 24px;"><span style="font-weight:600;color:var(--color-deep-navy);">Annual Graduation Ceremony</span><br><span style="font-size:12px;color:var(--color-body-gray);">Graduating class of 2025–2026</span></td>
                                        <td style="padding:14px 12px;font-size:13px;">Jun 14, 2026<br><span style="color:var(--color-body-gray);">4:00 PM – 8:00 PM</span></td>
                                        <td style="padding:14px 12px;"><span style="background:#dcfce7;color:#166534;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Free</span></td>
                                        <td style="padding:14px 12px;"><span style="color:var(--color-body-gray);font-size:13px;">32</span></td>
                                        <td style="padding:14px 12px;"><span class="status-pill" style="background:#fef3c7;color:#d97706;">Coming Soon</span></td>
                                        <td style="padding:14px 24px;text-align:right;"><a href="#" onclick="openModal('modal-create-event')" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Edit</a><a href="#" style="color:var(--color-deep-teal);font-size:13px;">Open Reg.</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Event Detail Sub-panel (hidden by default) -->
                    <div id="crm-event-detail-panel" style="display:none;">
                        <div style="margin-bottom:var(--space-4);">
                            <button onclick="hideEventDetail()" style="background:none;border:none;cursor:pointer;color:var(--color-deep-teal);font-size:14px;font-weight:600;display:flex;align-items:center;gap:6px;">
                                <i data-lucide="arrow-left" style="width:16px;"></i> Back to Events
                            </button>
                        </div>
                        <div class="flex justify-between items-center" style="margin-bottom:var(--space-6);">
                            <div>
                                <h1 class="ui-page-title" id="event-detail-title">Event Name</h1>
                                <p style="color:var(--color-body-gray);" id="event-detail-meta">Date · Location · Type</p>
                            </div>
                            <div class="flex gap-3">
                                <button class="btn btn-outline">Export CSV</button>
                                <button class="btn btn-primary" onclick="openModal('modal-create-event')">Edit Event</button>
                            </div>
                        </div>
                        <!-- Event stats -->
                        <div class="stats-grid" style="margin-bottom:var(--space-6);">
                            <div class="stat-card"><span class="stat-label">Total Registered</span><div class="stat-value">148</div></div>
                            <div class="stat-card"><span class="stat-label">Paid</span><div class="stat-value" style="color:var(--color-deep-teal);">141</div></div>
                            <div class="stat-card"><span class="stat-label">Pending Payment</span><div class="stat-value" style="color:var(--color-mauve-rose);">7</div></div>
                            <div class="stat-card"><span class="stat-label">Attended</span><div class="stat-value">—</div></div>
                        </div>
                        <!-- Registrant table -->
                        <div class="card" style="padding:0;overflow:hidden;">
                            <div style="padding:16px 24px;border-bottom:1px solid var(--color-light-gray);display:flex;justify-content:space-between;align-items:center;">
                                <h3 style="font-size:16px;font-weight:700;color:var(--color-deep-navy);">Registrants</h3>
                                <input type="text" placeholder="Search registrants..." style="padding:8px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:13px;width:220px;">
                            </div>
                            <table style="width:100%;border-collapse:collapse;text-align:left;">
                                <thead style="background:var(--color-light-gray);border-bottom:2px solid var(--color-mid-gray);">
                                    <tr>
                                        <th style="padding:12px 24px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Name</th>
                                        <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Email</th>
                                        <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Registered</th>
                                        <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Payment</th>
                                        <th style="padding:12px 24px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Attendance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:12px 24px;font-weight:600;">Fatima Al-Hassan</td>
                                        <td style="padding:12px;font-size:13px;color:var(--color-body-gray);">fatima@email.com</td>
                                        <td style="padding:12px;font-size:13px;">Mar 10, 2026</td>
                                        <td style="padding:12px;"><span class="status-pill status-enrolled">Paid</span></td>
                                        <td style="padding:12px 24px;"><select style="padding:4px 8px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:12px;"><option>—</option><option>Attended</option><option>No-show</option></select></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:12px 24px;font-weight:600;">Maryam Khalid</td>
                                        <td style="padding:12px;font-size:13px;color:var(--color-body-gray);">maryam@email.com</td>
                                        <td style="padding:12px;font-size:13px;">Mar 12, 2026</td>
                                        <td style="padding:12px;"><span class="status-pill status-enrolled">Paid</span></td>
                                        <td style="padding:12px 24px;"><select style="padding:4px 8px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:12px;"><option>—</option><option>Attended</option><option>No-show</option></select></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:12px 24px;font-weight:600;">Sara Al-Amin</td>
                                        <td style="padding:12px;font-size:13px;color:var(--color-body-gray);">sara@email.com</td>
                                        <td style="padding:12px;font-size:13px;">Mar 14, 2026</td>
                                        <td style="padding:12px;"><span class="status-pill" style="background:#fef3c7;color:#d97706;">Pending</span></td>
                                        <td style="padding:12px 24px;"><select style="padding:4px 8px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:12px;"><option>—</option><option>Attended</option><option>No-show</option></select></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <!-- ==================== VIEW: DONATIONS ==================== -->
                <section id="view-donations" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom:var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Donations</h1>
                            <p style="color:var(--color-body-gray);">All sadaqah, zakat, and scholarship contributions received via the public donate page.</p>
                        </div>
                        <div style="display:flex;gap:10px;">
                            <button class="btn btn-outline" onclick="exportDonationsCsv()"><i data-lucide="download" style="width:13px;vertical-align:middle;margin-right:6px;"></i>Export CSV</button>
                            <button class="btn btn-primary" onclick="showToast('Opening manual donation entry…')"><i data-lucide="plus" style="width:13px;vertical-align:middle;margin-right:6px;"></i>Log Manual Gift</button>
                        </div>
                    </div>

                    <!-- Summary Stats -->
                    <div class="stats-grid" id="donations-stats" style="margin-bottom:var(--space-6);">
                        <div class="stat-card"><span class="stat-label">Total Raised</span><div class="stat-value" style="color:var(--color-deep-teal);" id="stat-total-raised">$48,000</div></div>
                        <div class="stat-card"><span class="stat-label">Donations (This Year)</span><div class="stat-value" id="stat-count">—</div></div>
                        <div class="stat-card"><span class="stat-label">Avg. Gift Size</span><div class="stat-value" id="stat-avg">—</div></div>
                        <div class="stat-card"><span class="stat-label">Monthly Recurring</span><div class="stat-value" id="stat-recurring">—</div></div>
                    </div>

                    <!-- Category filter -->
                    <div style="display:flex;gap:8px;margin-bottom:var(--space-4);flex-wrap:wrap;">
                        <button class="btn btn-outline don-filter-btn active-filter" onclick="filterDonations('all',this)" style="font-size:12px;padding:5px 14px;">All</button>
                        <button class="btn btn-outline don-filter-btn" onclick="filterDonations('sadaqah',this)" style="font-size:12px;padding:5px 14px;">Sadaqah</button>
                        <button class="btn btn-outline don-filter-btn" onclick="filterDonations('zakat',this)" style="font-size:12px;padding:5px 14px;">Zakat</button>
                        <button class="btn btn-outline don-filter-btn" onclick="filterDonations('scholarship',this)" style="font-size:12px;padding:5px 14px;">Scholarship</button>
                        <button class="btn btn-outline don-filter-btn" onclick="filterDonations('building',this)" style="font-size:12px;padding:5px 14px;">Building Fund</button>
                        <div style="margin-left:auto;">
                            <input type="text" id="donation-search" placeholder="Search by name or email…" oninput="searchDonations()" style="padding:7px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:13px;width:220px;">
                        </div>
                    </div>

                    <!-- Donations Table -->
                    <div class="card" style="padding:0;overflow:hidden;">
                        <table style="width:100%;border-collapse:collapse;text-align:left;" id="donations-table">
                            <thead style="background:var(--color-light-gray);border-bottom:2px solid var(--color-mid-gray);">
                                <tr>
                                    <th style="padding:12px 20px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Ref</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Donor</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Email</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Amount</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Category</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Frequency</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Date</th>
                                    <th style="padding:12px 20px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Status</th>
                                </tr>
                            </thead>
                            <tbody id="donations-tbody">
                                <!-- Seed rows — shown when no localStorage data exists -->
                                <tr class="seed-row" style="border-bottom:1px solid var(--color-light-gray);" data-category="sadaqah" data-name="mariam hussain" data-email="mariam@example.com">
                                    <td style="padding:12px 20px;font-size:12px;color:var(--color-body-gray);font-weight:600;">DON-SEED1</td>
                                    <td style="padding:12px;font-weight:600;">Mariam Hussain</td>
                                    <td style="padding:12px;font-size:13px;color:var(--color-body-gray);">mariam@example.com</td>
                                    <td style="padding:12px;font-weight:700;color:var(--color-deep-teal);">$100.00</td>
                                    <td style="padding:12px;"><span style="background:#fdf4ff;color:#A85D88;font-size:11px;font-weight:700;padding:3px 9px;border-radius:10px;">Sadaqah</span></td>
                                    <td style="padding:12px;font-size:13px;">One-Time</td>
                                    <td style="padding:12px;font-size:13px;color:var(--color-body-gray);">Mar 15, 2026</td>
                                    <td style="padding:12px 20px;"><span class="status-pill status-enrolled">Received</span></td>
                                </tr>
                                <tr class="seed-row" style="border-bottom:1px solid var(--color-light-gray);" data-category="scholarship" data-name="omar farooq" data-email="omar.f@example.com">
                                    <td style="padding:12px 20px;font-size:12px;color:var(--color-body-gray);font-weight:600;">DON-SEED2</td>
                                    <td style="padding:12px;font-weight:600;">Omar Farooq</td>
                                    <td style="padding:12px;font-size:13px;color:var(--color-body-gray);">omar.f@example.com</td>
                                    <td style="padding:12px;font-weight:700;color:var(--color-deep-teal);">$500.00</td>
                                    <td style="padding:12px;"><span style="background:#dbeafe;color:#1d4ed8;font-size:11px;font-weight:700;padding:3px 9px;border-radius:10px;">Scholarship</span></td>
                                    <td style="padding:12px;font-size:13px;">Monthly</td>
                                    <td style="padding:12px;font-size:13px;color:var(--color-body-gray);">Mar 14, 2026</td>
                                    <td style="padding:12px 20px;"><span class="status-pill status-enrolled">Received</span></td>
                                </tr>
                                <tr class="seed-row" style="border-bottom:1px solid var(--color-light-gray);" data-category="zakat" data-name="anonymous" data-email="">
                                    <td style="padding:12px 20px;font-size:12px;color:var(--color-body-gray);font-weight:600;">DON-SEED3</td>
                                    <td style="padding:12px;font-weight:600;">Anonymous</td>
                                    <td style="padding:12px;font-size:13px;color:var(--color-body-gray);">—</td>
                                    <td style="padding:12px;font-weight:700;color:var(--color-deep-teal);">$250.00</td>
                                    <td style="padding:12px;"><span style="background:#dcfce7;color:#166534;font-size:11px;font-weight:700;padding:3px 9px;border-radius:10px;">Zakat</span></td>
                                    <td style="padding:12px;font-size:13px;">One-Time</td>
                                    <td style="padding:12px;font-size:13px;color:var(--color-body-gray);">Mar 12, 2026</td>
                                    <td style="padding:12px 20px;"><span class="status-pill status-enrolled">Received</span></td>
                                </tr>
                            </tbody>
                        </table>
                        <div id="donations-empty" style="display:none;text-align:center;padding:48px;color:var(--color-body-gray);">
                            <i data-lucide="inbox" style="width:40px;height:40px;opacity:0.3;margin-bottom:12px;display:block;margin:0 auto 12px;"></i>
                            No donations match the current filter.
                        </div>
                    </div>
                </section>

                <!-- ==================== VIEW: CUSTOM FIELDS ENGINE ==================== -->
                <section id="view-custom-fields" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom:var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Custom Fields</h1>
                            <p style="color:var(--color-body-gray);">Define additional data fields for any entity. Fields auto-render in forms, profiles, and registration screens.</p>
                        </div>
                        <button class="btn btn-primary" onclick="openModal('modal-add-custom-field')">+ Add Field</button>
                    </div>

                    <!-- Entity tabs -->
                    <div style="display:flex;gap:0;border-bottom:2px solid var(--color-light-gray);margin-bottom:var(--space-6);">
                        <button onclick="switchCFEntity(this,'cf-student')" class="cf-tab" style="padding:10px 20px;background:none;border:none;cursor:pointer;font-weight:600;font-size:14px;color:var(--color-deep-teal);border-bottom:3px solid var(--color-deep-teal);margin-bottom:-2px;">Student Profile</button>
                        <button onclick="switchCFEntity(this,'cf-crm')" class="cf-tab" style="padding:10px 20px;background:none;border:none;cursor:pointer;font-size:14px;color:var(--color-body-gray);">CRM Contact</button>
                        <button onclick="switchCFEntity(this,'cf-program')" class="cf-tab" style="padding:10px 20px;background:none;border:none;cursor:pointer;font-size:14px;color:var(--color-body-gray);">Program</button>
                        <button onclick="switchCFEntity(this,'cf-course')" class="cf-tab" style="padding:10px 20px;background:none;border:none;cursor:pointer;font-size:14px;color:var(--color-body-gray);">Course</button>
                        <button onclick="switchCFEntity(this,'cf-event')" class="cf-tab" style="padding:10px 20px;background:none;border:none;cursor:pointer;font-size:14px;color:var(--color-body-gray);">Event Registration</button>
                    </div>

                    <!-- Student Profile fields -->
                    <div id="cf-student">
                        <div class="card" style="padding:0;overflow:hidden;">
                            <table style="width:100%;border-collapse:collapse;text-align:left;">
                                <thead style="background:var(--color-light-gray);border-bottom:2px solid var(--color-mid-gray);">
                                    <tr>
                                        <th style="padding:12px 24px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Field Name</th>
                                        <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Type</th>
                                        <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Visibility</th>
                                        <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Appears In</th>
                                        <th style="padding:12px 24px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;text-align:right;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:14px 24px;"><i data-lucide="grip-vertical" style="width:14px;color:var(--color-mid-gray);margin-right:10px;cursor:grab;"></i><span style="font-weight:600;">Quran Memorization Level</span></td>
                                        <td style="padding:14px 12px;"><span style="background:#dbeafe;color:#1d4ed8;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Select</span></td>
                                        <td style="padding:14px 12px;"><span style="background:#dcfce7;color:#166534;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Optional</span></td>
                                        <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">Profile · Registration</td>
                                        <td style="padding:14px 24px;text-align:right;"><a href="#" onclick="openModal('modal-add-custom-field')" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Edit</a><a href="#" style="color:#dc2626;font-size:13px;">Delete</a></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:14px 24px;"><i data-lucide="grip-vertical" style="width:14px;color:var(--color-mid-gray);margin-right:10px;cursor:grab;"></i><span style="font-weight:600;">Prior Islamic Institution</span></td>
                                        <td style="padding:14px 12px;"><span style="background:#dbeafe;color:#1d4ed8;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Text</span></td>
                                        <td style="padding:14px 12px;"><span style="background:#dcfce7;color:#166534;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Optional</span></td>
                                        <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">Profile</td>
                                        <td style="padding:14px 24px;text-align:right;"><a href="#" onclick="openModal('modal-add-custom-field')" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Edit</a><a href="#" style="color:#dc2626;font-size:13px;">Delete</a></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:14px 24px;"><i data-lucide="grip-vertical" style="width:14px;color:var(--color-mid-gray);margin-right:10px;cursor:grab;"></i><span style="font-weight:600;">Islamic Studies Background</span></td>
                                        <td style="padding:14px 12px;"><span style="background:#dbeafe;color:#1d4ed8;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Textarea</span></td>
                                        <td style="padding:14px 12px;"><span style="background:#dcfce7;color:#166534;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Optional</span></td>
                                        <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">Profile · Registration</td>
                                        <td style="padding:14px 24px;text-align:right;"><a href="#" onclick="openModal('modal-add-custom-field')" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Edit</a><a href="#" style="color:#dc2626;font-size:13px;">Delete</a></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:14px 24px;"><i data-lucide="grip-vertical" style="width:14px;color:var(--color-mid-gray);margin-right:10px;cursor:grab;"></i><span style="font-weight:600;">Country of Origin</span></td>
                                        <td style="padding:14px 12px;"><span style="background:#dbeafe;color:#1d4ed8;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Select</span></td>
                                        <td style="padding:14px 12px;"><span style="background:#fef3c7;color:#d97706;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Required</span></td>
                                        <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">Profile · Registration</td>
                                        <td style="padding:14px 24px;text-align:right;"><a href="#" onclick="openModal('modal-add-custom-field')" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Edit</a><a href="#" style="color:#dc2626;font-size:13px;">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:14px 24px;"><i data-lucide="grip-vertical" style="width:14px;color:var(--color-mid-gray);margin-right:10px;cursor:grab;"></i><span style="font-weight:600;">Admin Notes (Internal)</span></td>
                                        <td style="padding:14px 12px;"><span style="background:#dbeafe;color:#1d4ed8;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Textarea</span></td>
                                        <td style="padding:14px 12px;"><span style="background:#f0f0f0;color:#374151;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Admin Only</span></td>
                                        <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">Profile</td>
                                        <td style="padding:14px 24px;text-align:right;"><a href="#" onclick="openModal('modal-add-custom-field')" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Edit</a><a href="#" style="color:#dc2626;font-size:13px;">Delete</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Other entity panels (hidden by default) -->
                    <div id="cf-crm" style="display:none;"><div class="card" style="text-align:center;padding:48px;color:var(--color-body-gray);">No custom fields defined for CRM Contacts yet. <button onclick="openModal('modal-add-custom-field')" style="background:none;border:none;cursor:pointer;color:var(--color-deep-teal);font-weight:600;">Add the first one →</button></div></div>
                    <div id="cf-program" style="display:none;"><div class="card" style="text-align:center;padding:48px;color:var(--color-body-gray);">No custom fields defined for Programs yet. <button onclick="openModal('modal-add-custom-field')" style="background:none;border:none;cursor:pointer;color:var(--color-deep-teal);font-weight:600;">Add the first one →</button></div></div>
                    <div id="cf-course" style="display:none;"><div class="card" style="text-align:center;padding:48px;color:var(--color-body-gray);">No custom fields defined for Courses yet. <button onclick="openModal('modal-add-custom-field')" style="background:none;border:none;cursor:pointer;color:var(--color-deep-teal);font-weight:600;">Add the first one →</button></div></div>
                    <div id="cf-event" style="display:none;">
                        <div class="card" style="padding:0;overflow:hidden;">
                            <table style="width:100%;border-collapse:collapse;text-align:left;">
                                <thead style="background:var(--color-light-gray);border-bottom:2px solid var(--color-mid-gray);">
                                    <tr>
                                        <th style="padding:12px 24px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Field Name</th>
                                        <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Type</th>
                                        <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Visibility</th>
                                        <th style="padding:12px 24px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;text-align:right;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:14px 24px;"><span style="font-weight:600;">Dietary Requirements</span></td>
                                        <td style="padding:14px 12px;"><span style="background:#dbeafe;color:#1d4ed8;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Select</span></td>
                                        <td style="padding:14px 12px;"><span style="background:#dcfce7;color:#166534;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Optional</span></td>
                                        <td style="padding:14px 24px;text-align:right;"><a href="#" onclick="openModal('modal-add-custom-field')" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Edit</a><a href="#" style="color:#dc2626;font-size:13px;">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:14px 24px;"><span style="font-weight:600;">Will You Bring Children?</span></td>
                                        <td style="padding:14px 12px;"><span style="background:#dbeafe;color:#1d4ed8;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Checkbox</span></td>
                                        <td style="padding:14px 12px;"><span style="background:#dcfce7;color:#166534;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Optional</span></td>
                                        <td style="padding:14px 24px;text-align:right;"><a href="#" onclick="openModal('modal-add-custom-field')" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Edit</a><a href="#" style="color:#dc2626;font-size:13px;">Delete</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

            </section><!-- /view-dashboard shell -->

        </main>
    </div>

    <!-- ============================================================
         CREATE / ADD MODALS
         ============================================================ -->

    <!-- CREATE PAGE -->
    <div id="modal-create-page" class="modal-overlay" onclick="overlayClose(event,this)">
        <div class="modal modal-lg">
            <div class="modal-header"><h2>Create / Edit Page</h2><button class="modal-close" onclick="closeModal('modal-create-page')">✕</button></div>
            <div class="modal-body">
                <div class="form-section-title">Page Content</div>
                <div class="form-row full"><div class="form-group"><label>Page Title *</label><input type="text" placeholder="e.g. Scholarship Program"></div></div>
                <div class="form-row full"><div class="form-group"><label>Slug / URL *</label><input type="text" placeholder="e.g. scholarships"><span class="form-hint">Will be accessible at: zainabcenter.com/scholarships</span></div></div>
                <div class="form-row full"><div class="form-group"><label>Page Content</label><textarea style="min-height:160px;" placeholder="Write the page content here. Supports basic formatting — bold, italic, bullet lists, and headings."></textarea><span class="form-hint">Rich text editor (Bold / Italic / Headings / Links / Lists)</span></div></div>
                <div class="form-section-title">Navigation & Visibility</div>
                <div class="form-row">
                    <div class="form-group"><label>Status</label><select><option>Draft</option><option>Published</option><option>Archived</option></select></div>
                    <div class="form-group"><label>Add to Public Navigation?</label><select><option>No</option><option>Yes — add to main nav</option><option>Yes — add to footer</option></select></div>
                </div>
                <div class="form-row full"><div class="form-group"><label>Scheduled Publish Date (optional)</label><input type="datetime-local"><span class="form-hint">Leave blank to publish immediately when status is set to Published.</span></div></div>
                <div class="form-section-title">SEO Settings</div>
                <div class="form-row full"><div class="form-group"><label>Meta Title</label><input type="text" placeholder="60 chars max — shown in browser tab and search results"></div></div>
                <div class="form-row full"><div class="form-group"><label>Meta Description</label><textarea style="min-height:60px;" placeholder="160 chars max — shown below the title in search results"></textarea></div></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="closeModal('modal-create-page')">Cancel</button>
                <button class="btn" style="background:var(--color-light-gray);color:var(--color-body-gray);border-radius:var(--radius-md);padding:9px 18px;cursor:pointer;font-weight:600;" onclick="saveAndClose('modal-create-page','Page saved as draft')">Save Draft</button>
                <button class="btn btn-primary" onclick="saveAndClose('modal-create-page','Page published successfully')">Publish Page</button>
            </div>
        </div>
    </div>

    <!-- CREATE POST -->
    <div id="modal-create-post" class="modal-overlay" onclick="overlayClose(event,this)">
        <div class="modal modal-lg">
            <div class="modal-header"><h2>New Post</h2><button class="modal-close" onclick="closeModal('modal-create-post')">✕</button></div>
            <div class="modal-body">
                <div class="form-row full"><div class="form-group"><label>Post Title *</label><input type="text" placeholder="e.g. Ramadan 2026 Program Schedule"></div></div>
                <div class="form-row">
                    <div class="form-group"><label>Category</label><select><option>Announcement</option><option>Article</option><option>Program Update</option><option>Event</option><option>Newsletter</option></select></div>
                    <div class="form-group"><label>Status</label><select><option>Draft</option><option>Published</option></select></div>
                </div>
                <div class="form-row full"><div class="form-group"><label>Content *</label><textarea style="min-height:180px;" placeholder="Write the post content..."></textarea></div></div>
                <div class="form-row full"><div class="form-group"><label>Scheduled Publish Date (optional)</label><input type="datetime-local"></div></div>
                <div class="form-row full"><div class="form-group"><label>Tags (comma separated)</label><input type="text" placeholder="e.g. ramadan, announcement, 2026"></div></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="closeModal('modal-create-post')">Cancel</button>
                <button class="btn btn-primary" onclick="saveAndClose('modal-create-post','Post created successfully')">Create Post</button>
            </div>
        </div>
    </div>

    <!-- CREATE EVENT -->
    <div id="modal-create-event" class="modal-overlay" onclick="overlayClose(event,this)">
        <div class="modal modal-lg">
            <div class="modal-header"><h2>Create Event</h2><button class="modal-close" onclick="closeModal('modal-create-event')">✕</button></div>
            <div class="modal-body">
                <div class="form-section-title">Event Details</div>
                <div class="form-row full"><div class="form-group"><label>Event Name *</label><input type="text" placeholder="e.g. Fiqh Workshop — Spring 2026"></div></div>
                <div class="form-row full"><div class="form-group"><label>Description</label><textarea placeholder="What is this event? Who is it for? What will attendees experience?"></textarea></div></div>
                <div class="form-row">
                    <div class="form-group"><label>Event Type</label><select><option>Workshop</option><option>Seminar / Lecture</option><option>Open Day</option><option>Fundraiser</option><option>Graduation</option><option>Other</option></select></div>
                    <div class="form-group"><label>Location / Link</label><input type="text" placeholder="e.g. Main Hall or https://zoom.us/..."></div>
                </div>
                <div class="form-row">
                    <div class="form-group"><label>Start Date & Time *</label><input type="datetime-local"></div>
                    <div class="form-group"><label>End Date & Time *</label><input type="datetime-local"></div>
                </div>

                <div class="form-section-title">Registration</div>
                <div class="form-row">
                    <div class="form-group"><label>Registration Opens</label><input type="datetime-local"></div>
                    <div class="form-group"><label>Registration Closes</label><input type="datetime-local"></div>
                </div>
                <div class="form-row">
                    <div class="form-group"><label>Pricing</label>
                        <select onchange="document.getElementById('event-price-field').style.display=this.value==='paid'?'block':'none'">
                            <option value="free">Free</option>
                            <option value="paid">Paid</option>
                        </select>
                    </div>
                    <div class="form-group" id="event-price-field" style="display:none;"><label>Ticket Price ($)</label><input type="number" placeholder="e.g. 50.00" min="0" step="0.01"></div>
                </div>
                <div style="background:var(--color-warm-ivory);border:1px solid var(--color-mid-gray);border-radius:var(--radius-md);padding:12px 16px;font-size:13px;color:var(--color-body-gray);">
                    <strong style="color:var(--color-deep-navy);">Note on paid events:</strong> Payment must be confirmed before the event date. Failed payments are flagged "Pending Payment" and the Finance Admin is notified. No grace period applies.
                </div>

                <div class="form-section-title">Custom Registration Fields</div>
                <p style="font-size:13px;color:var(--color-body-gray);margin-bottom:12px;">Fields defined under <strong>Custom Fields → Event Registration</strong> will auto-appear on the public registration form for this event.</p>
                <div style="display:flex;gap:8px;flex-wrap:wrap;">
                    <span style="background:var(--color-light-gray);color:var(--color-body-gray);font-size:12px;padding:4px 10px;border-radius:20px;">Dietary Requirements</span>
                    <span style="background:var(--color-light-gray);color:var(--color-body-gray);font-size:12px;padding:4px 10px;border-radius:20px;">Will You Bring Children?</span>
                    <a href="#custom-fields" onclick="closeModal('modal-create-event')" style="font-size:12px;color:var(--color-deep-teal);padding:4px 10px;">+ Manage fields →</a>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="closeModal('modal-create-event')">Cancel</button>
                <button class="btn" style="background:var(--color-light-gray);color:var(--color-body-gray);border-radius:var(--radius-md);padding:9px 18px;cursor:pointer;font-weight:600;" onclick="saveAndClose('modal-create-event','Event saved as draft')">Save Draft</button>
                <button class="btn btn-primary" onclick="saveAndClose('modal-create-event','Event created and registration opened')">Create & Open Registration</button>
            </div>
        </div>
    </div>

    <!-- ADD CUSTOM FIELD -->
    <div id="modal-add-custom-field" class="modal-overlay" onclick="overlayClose(event,this)">
        <div class="modal">
            <div class="modal-header"><h2>Add Custom Field</h2><button class="modal-close" onclick="closeModal('modal-add-custom-field')">✕</button></div>
            <div class="modal-body">
                <div class="form-row full"><div class="form-group"><label>Field Name *</label><input type="text" placeholder="e.g. Quran Memorization Level"></div></div>
                <div class="form-row">
                    <div class="form-group"><label>Entity (appears on)</label>
                        <select>
                            <option>Student Profile</option><option>CRM Contact</option><option>Program</option><option>Course</option><option>Event Registration</option>
                        </select>
                    </div>
                    <div class="form-group"><label>Field Type</label>
                        <select onchange="toggleCFOptions(this.value)">
                            <option value="text">Text</option><option value="textarea">Textarea</option><option value="number">Number</option><option value="date">Date</option><option value="select">Select (single)</option><option value="multiselect">Multi-select</option><option value="checkbox">Checkbox</option><option value="file">File Upload</option><option value="url">URL</option><option value="richtext">Rich Text</option>
                        </select>
                    </div>
                </div>
                <div id="cf-select-options" style="display:none;" class="form-row full">
                    <div class="form-group"><label>Options (one per line)</label>
                        <textarea placeholder="Juz 1-5&#10;Juz 6-15&#10;Juz 16-25&#10;Complete (30 Juz)"></textarea>
                        <span class="form-hint">Each line becomes one selectable option.</span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group"><label>Visibility</label>
                        <select>
                            <option>Optional — shown to student</option>
                            <option>Required — student must fill in</option>
                            <option>Admin Only — hidden from student</option>
                        </select>
                    </div>
                    <div class="form-group"><label>Placeholder Text</label><input type="text" placeholder="e.g. Select your level..."></div>
                </div>
                <div class="form-row full">
                    <div class="form-group"><label>Show On</label>
                        <div style="display:flex;gap:16px;margin-top:4px;">
                            <label class="checkbox-item"><input type="checkbox" checked> Registration Form</label>
                            <label class="checkbox-item"><input type="checkbox" checked> Profile Page</label>
                            <label class="checkbox-item"><input type="checkbox"> Admin-only panel</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="closeModal('modal-add-custom-field')">Cancel</button>
                <button class="btn btn-primary" onclick="saveAndClose('modal-add-custom-field','Custom field added successfully')">Save Field</button>
            </div>
        </div>
    </div>

    <!-- ADD STUDENT -->
    <div id="modal-add-student" class="modal-overlay" onclick="overlayClose(event, this)">
        <div class="modal modal-lg">
            <div class="modal-header">
                <h2>Add New Student</h2>
                <button class="modal-close" onclick="closeModal('modal-add-student')">✕</button>
            </div>
            <div class="modal-body">
                <div class="form-section-title">Personal Information</div>
                <div class="form-row">
                    <div class="form-group">
                        <label>First Name *</label>
                        <input type="text" placeholder="e.g. Fatima">
                    </div>
                    <div class="form-group">
                        <label>Last Name *</label>
                        <input type="text" placeholder="e.g. Al-Hassan">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Email Address *</label>
                        <input type="email" placeholder="student@email.com">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="tel" placeholder="+1 (555) 000-0000">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select>
                            <option value="">Select...</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Prefer not to say</option>
                        </select>
                    </div>
                </div>

                <div class="form-section-title">Enrollment</div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Program *</label>
                        <select>
                            <option value="">Select program...</option>
                            <option>Arabic Language — Beginner</option>
                            <option>Arabic Language — Intermediate</option>
                            <option>Quran Memorization (Hifz)</option>
                            <option>Hanafi Fiqh Studies</option>
                            <option>Islamic Studies — Youth</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Enrollment Status</label>
                        <select>
                            <option>Pending</option>
                            <option>Enrolled</option>
                            <option>Waitlist</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Payment Plan</label>
                        <select>
                            <option>Full (one-time)</option>
                            <option>Monthly Installments</option>
                            <option>Scholarship / Waived</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Enrollment Start Date</label>
                        <input type="date">
                    </div>
                </div>

                <div class="form-section-title">Parent / Guardian (if enrolling a child)</div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Guardian Name</label>
                        <input type="text" placeholder="Parent or guardian full name">
                    </div>
                    <div class="form-group">
                        <label>Guardian Email</label>
                        <input type="email" placeholder="parent@email.com">
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label>Notes</label>
                        <textarea placeholder="Any additional notes about this student..."></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="closeModal('modal-add-student')">Cancel</button>
                <button class="btn btn-primary" onclick="saveAndClose('modal-add-student', 'Student added successfully')">Save Student</button>
            </div>
        </div>
    </div>

    <!-- ADD TEACHER -->
    <div id="modal-add-teacher" class="modal-overlay" onclick="overlayClose(event, this)">
        <div class="modal modal-lg">
            <div class="modal-header">
                <h2>Add New Teacher</h2>
                <button class="modal-close" onclick="closeModal('modal-add-teacher')">✕</button>
            </div>
            <div class="modal-body">
                <div class="form-section-title">Personal Information</div>
                <div class="form-row">
                    <div class="form-group">
                        <label>First Name *</label>
                        <input type="text" placeholder="e.g. Sheikh Ahmad">
                    </div>
                    <div class="form-group">
                        <label>Last Name *</label>
                        <input type="text" placeholder="e.g. Al-Farsi">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Email Address *</label>
                        <input type="email" placeholder="teacher@zainabcenter.com">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="tel" placeholder="+1 (555) 000-0000">
                    </div>
                </div>

                <div class="form-section-title">Role & Qualifications</div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Title / Role</label>
                        <select>
                            <option>Teacher</option>
                            <option>Senior Teacher</option>
                            <option>Ustadh / Sheikh</option>
                            <option>Teaching Assistant</option>
                            <option>Volunteer Instructor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Employment Type</label>
                        <select>
                            <option>Full-time</option>
                            <option>Part-time</option>
                            <option>Volunteer</option>
                            <option>Contract</option>
                        </select>
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label>Subjects / Specialization</label>
                        <input type="text" placeholder="e.g. Arabic Grammar, Quran Recitation, Islamic Jurisprudence">
                        <span class="form-hint">Comma-separated list of subjects</span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="date">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select>
                            <option value="">Select...</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label>Short Bio</label>
                        <textarea placeholder="Brief background, qualifications, and teaching experience..."></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="closeModal('modal-add-teacher')">Cancel</button>
                <button class="btn btn-primary" onclick="saveAndClose('modal-add-teacher', 'Teacher added successfully')">Save Teacher</button>
            </div>
        </div>
    </div>

    <!-- CREATE PROGRAM -->
    <div id="modal-add-program" class="modal-overlay" onclick="overlayClose(event, this)">
        <div class="modal modal-lg">
            <div class="modal-header">
                <h2>Create New Program</h2>
                <button class="modal-close" onclick="closeModal('modal-add-program')">✕</button>
            </div>
            <div class="modal-body">
                <div class="form-section-title">Program Details</div>
                <div class="form-row full">
                    <div class="form-group">
                        <label>Program Name *</label>
                        <input type="text" placeholder="e.g. Arabic Language — Intermediate Level">
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea placeholder="What will students learn? Who is it for? Any prerequisites?"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Program Category</label>
                        <select>
                            <option>Arabic Language</option>
                            <option>Quran Studies</option>
                            <option>Islamic Studies</option>
                            <option>Fiqh & Jurisprudence</option>
                            <option>Youth Program</option>
                            <option>Children's Program</option>
                            <option>Sisters' Program</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Academic Term</label>
                        <select>
                            <option>Spring 2026</option>
                            <option>Summer 2026</option>
                            <option>Fall 2026</option>
                            <option>Year-Round</option>
                        </select>
                    </div>
                </div>

                <div class="form-section-title">Schedule & Capacity</div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="date">
                    </div>
                    <div class="form-group">
                        <label>End Date</label>
                        <input type="date">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Maximum Enrollment</label>
                        <input type="number" placeholder="e.g. 25" min="1">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select>
                            <option>Draft</option>
                            <option>Active</option>
                            <option>Archived</option>
                        </select>
                    </div>
                </div>

                <div class="form-section-title">Pricing</div>
                <div class="form-row thirds">
                    <div class="form-group">
                        <label>Registration Fee ($)</label>
                        <input type="number" placeholder="0.00" min="0" step="0.01">
                    </div>
                    <div class="form-group">
                        <label>Monthly Fee ($)</label>
                        <input type="number" placeholder="0.00" min="0" step="0.01">
                    </div>
                    <div class="form-group">
                        <label>Full Program Fee ($)</label>
                        <input type="number" placeholder="0.00" min="0" step="0.01">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="closeModal('modal-add-program')">Cancel</button>
                <button class="btn" style="background:var(--color-light-gray); color:var(--color-body-gray); border-radius:var(--radius-md); padding:9px 18px; cursor:pointer; font-weight:600;" onclick="saveAndClose('modal-add-program', 'Program saved as draft')">Save as Draft</button>
                <button class="btn btn-primary" onclick="saveAndClose('modal-add-program', 'Program created and published')">Publish Program</button>
            </div>
        </div>
    </div>

    <!-- ADD COURSE -->
    <div id="modal-add-course" class="modal-overlay" onclick="overlayClose(event, this)">
        <div class="modal modal-lg">
            <div class="modal-header">
                <h2>New Course / Section</h2>
                <button class="modal-close" onclick="closeModal('modal-add-course')">✕</button>
            </div>
            <div class="modal-body">
                <div class="form-section-title">Course Details</div>
                <div class="form-row full">
                    <div class="form-group">
                        <label>Course Name *</label>
                        <input type="text" placeholder="e.g. Arabic 101 — Monday / Wednesday Section">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Program *</label>
                        <select>
                            <option value="">Select program...</option>
                            <option>Arabic Language — Beginner</option>
                            <option>Arabic Language — Intermediate</option>
                            <option>Quran Memorization (Hifz)</option>
                            <option>Hanafi Fiqh Studies</option>
                            <option>Islamic Studies — Youth</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Lead Teacher *</label>
                        <select>
                            <option value="">Assign teacher...</option>
                            <option>Sheikh Ahmad Al-Farsi</option>
                            <option>Ustadha Khadijah Nour</option>
                            <option>Brother Yusuf Ibrahim</option>
                            <option>Sister Maryam Khalid</option>
                        </select>
                    </div>
                </div>

                <div class="form-section-title">Schedule</div>
                <div class="form-group" style="margin-bottom: 16px;">
                    <label>Days of the Week</label>
                    <div class="checkbox-grid" style="margin-top:8px;">
                        <label class="checkbox-item"><input type="checkbox"> Sunday</label>
                        <label class="checkbox-item"><input type="checkbox" checked> Monday</label>
                        <label class="checkbox-item"><input type="checkbox"> Tuesday</label>
                        <label class="checkbox-item"><input type="checkbox" checked> Wednesday</label>
                        <label class="checkbox-item"><input type="checkbox"> Thursday</label>
                        <label class="checkbox-item"><input type="checkbox"> Friday</label>
                        <label class="checkbox-item"><input type="checkbox"> Saturday</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Start Time</label>
                        <input type="time" value="18:00">
                    </div>
                    <div class="form-group">
                        <label>End Time</label>
                        <input type="time" value="19:30">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Room / Location</label>
                        <input type="text" placeholder="e.g. Room 104, Main Building">
                    </div>
                    <div class="form-group">
                        <label>Max Capacity</label>
                        <input type="number" placeholder="e.g. 20" min="1">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="date">
                    </div>
                    <div class="form-group">
                        <label>End Date</label>
                        <input type="date">
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label>Notes (optional)</label>
                        <textarea placeholder="Any special requirements, prerequisites, or notes about this section..."></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="closeModal('modal-add-course')">Cancel</button>
                <button class="btn btn-primary" onclick="saveAndClose('modal-add-course', 'Course created successfully')">Create Course</button>
            </div>
        </div>
    </div>

    <!-- ADD HOUSEHOLD / PARENT -->
    <div id="modal-add-household" class="modal-overlay" onclick="overlayClose(event, this)">
        <div class="modal">
            <div class="modal-header">
                <h2>New Parent Household</h2>
                <button class="modal-close" onclick="closeModal('modal-add-household')">✕</button>
            </div>
            <div class="modal-body">
                <div class="form-section-title">Primary Contact</div>
                <div class="form-row">
                    <div class="form-group">
                        <label>First Name *</label>
                        <input type="text" placeholder="e.g. Omar">
                    </div>
                    <div class="form-group">
                        <label>Last Name *</label>
                        <input type="text" placeholder="e.g. Al-Rashid">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Email Address *</label>
                        <input type="email" placeholder="parent@email.com">
                    </div>
                    <div class="form-group">
                        <label>Mobile Phone *</label>
                        <input type="tel" placeholder="+1 (555) 000-0000">
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label>Home Address</label>
                        <input type="text" placeholder="123 Main St, City, State ZIP">
                    </div>
                </div>

                <div class="form-section-title">Children Linked to this Household</div>
                <div class="form-row full">
                    <div class="form-group">
                        <label>Student Names (existing or new)</label>
                        <textarea placeholder="List the names of children enrolled or to be enrolled. Separate by line.&#10;e.g. Zainab Al-Rashid (Age 10)&#10;Hassan Al-Rashid (Age 8)"></textarea>
                        <span class="form-hint">You can link students to this household later from the Students view.</span>
                    </div>
                </div>

                <div class="form-section-title">Communication Preferences</div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Preferred Language</label>
                        <select>
                            <option>English</option>
                            <option>Arabic</option>
                            <option>Urdu</option>
                            <option>French</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Contact Preference</label>
                        <select>
                            <option>Email</option>
                            <option>SMS / Text</option>
                            <option>WhatsApp</option>
                            <option>Phone Call</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="closeModal('modal-add-household')">Cancel</button>
                <button class="btn btn-primary" onclick="saveAndClose('modal-add-household', 'Household created successfully')">Create Household</button>
            </div>
        </div>
    </div>

    <!-- INVITE ADMIN -->
    <div id="modal-invite-admin" class="modal-overlay" onclick="overlayClose(event, this)">
        <div class="modal">
            <div class="modal-header">
                <h2>Invite Admin User</h2>
                <button class="modal-close" onclick="closeModal('modal-invite-admin')">✕</button>
            </div>
            <div class="modal-body">
                <div class="form-section-title">User Information</div>
                <div class="form-row">
                    <div class="form-group">
                        <label>First Name *</label>
                        <input type="text" placeholder="e.g. Aisha">
                    </div>
                    <div class="form-group">
                        <label>Last Name *</label>
                        <input type="text" placeholder="e.g. Siddiqui">
                    </div>
                </div>
                <div class="form-row full">
                    <div class="form-group">
                        <label>Email Address *</label>
                        <input type="email" placeholder="admin@zainabcenter.com">
                        <span class="form-hint">An invitation email will be sent to this address.</span>
                    </div>
                </div>

                <div class="form-section-title">Role & Permissions</div>
                <div class="form-row full">
                    <div class="form-group">
                        <label>Role *</label>
                        <select>
                            <option>Super Admin</option>
                            <option>Admin</option>
                            <option>Academic Coordinator</option>
                            <option>Finance Manager</option>
                            <option>Enrollment Officer</option>
                            <option>Read-Only Staff</option>
                        </select>
                    </div>
                </div>
                <div style="background: var(--color-warm-ivory); border-radius: var(--radius-md); padding: 12px 16px; font-size: 13px; color: var(--color-body-gray); border: 1px solid var(--color-mid-gray);">
                    <strong style="color: var(--color-deep-navy);">Role permissions are predefined.</strong> You can customize permissions in Settings → Admin Roles after creating this user.
                </div>

                <div class="form-section-title" style="margin-top: 20px;">Message (optional)</div>
                <div class="form-row full">
                    <div class="form-group">
                        <label>Personal Note in Invite Email</label>
                        <textarea placeholder="Welcome to the team! We're glad to have you..."></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="closeModal('modal-invite-admin')">Cancel</button>
                <button class="btn btn-primary" onclick="saveAndClose('modal-invite-admin', 'Invitation sent successfully')">Send Invitation</button>
            </div>
        </div>
    </div>

    <!-- STUDENT PROFILE SLIDE-OVER -->
    <div id="student-profile-panel" style="position:fixed;inset:0;z-index:900;display:none;">
        <div onclick="closeStudentProfile()" style="position:absolute;inset:0;background:rgba(26,47,74,0.4);"></div>
        <div style="position:absolute;right:0;top:0;bottom:0;width:780px;max-width:95vw;background:var(--color-warm-ivory);overflow-y:auto;box-shadow:-8px 0 32px rgba(0,0,0,0.15);display:flex;flex-direction:column;">
            <!-- Header -->
            <div style="background:var(--color-deep-navy);color:white;padding:20px 28px;display:flex;align-items:center;gap:16px;flex-shrink:0;">
                <div style="width:52px;height:52px;border-radius:10px;background:var(--color-deep-teal);display:flex;align-items:center;justify-content:center;font-size:20px;font-weight:700;">FA</div>
                <div style="flex:1;">
                    <h2 style="font-family:'Inter';font-size:20px;font-weight:700;">Fatima Al-Hassan</h2>
                    <p style="font-size:13px;opacity:0.7;">Student · Arabic Language — Intermediate · Active</p>
                </div>
                <div class="flex gap-3">
                    <button class="btn btn-outline" style="color:white;border-color:rgba(255,255,255,0.4);font-size:13px;" onclick="openModal('modal-add-student')">Edit</button>
                    <button onclick="closeStudentProfile()" style="background:none;border:none;cursor:pointer;color:rgba(255,255,255,0.6);font-size:22px;">✕</button>
                </div>
            </div>
            <!-- Quick stats strip -->
            <div style="display:grid;grid-template-columns:repeat(4,1fr);background:white;border-bottom:1px solid var(--color-light-gray);">
                <div style="padding:16px 20px;text-align:center;border-right:1px solid var(--color-light-gray);"><div style="font-size:22px;font-weight:700;color:var(--color-deep-teal);">2</div><div style="font-size:11px;color:var(--color-body-gray);text-transform:uppercase;letter-spacing:0.05em;">Courses</div></div>
                <div style="padding:16px 20px;text-align:center;border-right:1px solid var(--color-light-gray);"><div style="font-size:22px;font-weight:700;color:var(--color-deep-teal);">91%</div><div style="font-size:11px;color:var(--color-body-gray);text-transform:uppercase;letter-spacing:0.05em;">Attendance</div></div>
                <div style="padding:16px 20px;text-align:center;border-right:1px solid var(--color-light-gray);"><div style="font-size:22px;font-weight:700;color:var(--color-deep-teal);">7/9</div><div style="font-size:11px;color:var(--color-body-gray);text-transform:uppercase;letter-spacing:0.05em;">Assignments</div></div>
                <div style="padding:16px 20px;text-align:center;"><div style="font-size:22px;font-weight:700;color:var(--color-mauve-rose);">$150</div><div style="font-size:11px;color:var(--color-body-gray);text-transform:uppercase;letter-spacing:0.05em;">Balance Due</div></div>
            </div>
            <!-- Tabs -->
            <div style="display:flex;border-bottom:2px solid var(--color-light-gray);background:white;padding:0 28px;" id="sp-tabs">
                <button onclick="switchSPTab(this,'sp-overview')" class="sp-tab" style="padding:12px 16px;background:none;border:none;cursor:pointer;font-weight:600;font-size:14px;color:var(--color-deep-teal);border-bottom:3px solid var(--color-deep-teal);margin-bottom:-2px;">Overview</button>
                <button onclick="switchSPTab(this,'sp-courses')" class="sp-tab" style="padding:12px 16px;background:none;border:none;cursor:pointer;font-size:14px;color:var(--color-body-gray);">Courses</button>
                <button onclick="switchSPTab(this,'sp-attendance')" class="sp-tab" style="padding:12px 16px;background:none;border:none;cursor:pointer;font-size:14px;color:var(--color-body-gray);">Attendance</button>
                <button onclick="switchSPTab(this,'sp-grades')" class="sp-tab" style="padding:12px 16px;background:none;border:none;cursor:pointer;font-size:14px;color:var(--color-body-gray);">Grades</button>
                <button onclick="switchSPTab(this,'sp-billing')" class="sp-tab" style="padding:12px 16px;background:none;border:none;cursor:pointer;font-size:14px;color:var(--color-body-gray);">Billing</button>
                <button onclick="switchSPTab(this,'sp-activity')" class="sp-tab" style="padding:12px 16px;background:none;border:none;cursor:pointer;font-size:14px;color:var(--color-body-gray);">Activity Log</button>
            </div>
            <!-- Tab content -->
            <div style="padding:28px;flex:1;">
                <!-- OVERVIEW -->
                <div id="sp-overview">
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:var(--space-4);">
                        <div class="card">
                            <h4 style="font-size:13px;font-weight:700;text-transform:uppercase;letter-spacing:0.05em;color:var(--color-deep-teal);margin-bottom:16px;">Personal Details</h4>
                            <div style="display:flex;flex-direction:column;gap:10px;font-size:14px;">
                                <div class="flex justify-between"><span style="color:var(--color-body-gray);">Email</span><span style="font-weight:500;">fatima@email.com</span></div>
                                <div class="flex justify-between"><span style="color:var(--color-body-gray);">Phone</span><span style="font-weight:500;">+1 (555) 204-8812</span></div>
                                <div class="flex justify-between"><span style="color:var(--color-body-gray);">Date of Birth</span><span style="font-weight:500;">Apr 14, 1992</span></div>
                                <div class="flex justify-between"><span style="color:var(--color-body-gray);">Country</span><span style="font-weight:500;">United States</span></div>
                                <div class="flex justify-between"><span style="color:var(--color-body-gray);">Gender</span><span style="font-weight:500;">Female</span></div>
                            </div>
                        </div>
                        <div class="card">
                            <h4 style="font-size:13px;font-weight:700;text-transform:uppercase;letter-spacing:0.05em;color:var(--color-deep-teal);margin-bottom:16px;">Enrollment</h4>
                            <div style="display:flex;flex-direction:column;gap:10px;font-size:14px;">
                                <div class="flex justify-between"><span style="color:var(--color-body-gray);">Status</span><span class="status-pill status-enrolled">Active</span></div>
                                <div class="flex justify-between"><span style="color:var(--color-body-gray);">Program</span><span style="font-weight:500;">Arabic Intermediate</span></div>
                                <div class="flex justify-between"><span style="color:var(--color-body-gray);">Track</span><span style="font-weight:500;">Part-time</span></div>
                                <div class="flex justify-between"><span style="color:var(--color-body-gray);">Term</span><span style="font-weight:500;">Spring 2026</span></div>
                                <div class="flex justify-between"><span style="color:var(--color-body-gray);">Enrolled</span><span style="font-weight:500;">Jan 8, 2026</span></div>
                                <div class="flex justify-between"><span style="color:var(--color-body-gray);">Expiry</span><span style="font-weight:500;">Jun 30, 2026</span></div>
                                <div class="flex justify-between"><span style="color:var(--color-body-gray);">How They Heard</span><span style="font-weight:500;">Friend / Family</span></div>
                            </div>
                        </div>
                        <div class="card">
                            <h4 style="font-size:13px;font-weight:700;text-transform:uppercase;letter-spacing:0.05em;color:var(--color-deep-teal);margin-bottom:16px;">Islamic Background</h4>
                            <div style="display:flex;flex-direction:column;gap:10px;font-size:14px;">
                                <div class="flex justify-between"><span style="color:var(--color-body-gray);">Quran Level</span><span style="font-weight:500;">Juz 6–15</span></div>
                                <div class="flex justify-between"><span style="color:var(--color-body-gray);">Prior Institution</span><span style="font-weight:500;">Al-Noor Academy</span></div>
                            </div>
                        </div>
                        <div class="card">
                            <h4 style="font-size:13px;font-weight:700;text-transform:uppercase;letter-spacing:0.05em;color:var(--color-deep-teal);margin-bottom:16px;">Guardian (Parent)</h4>
                            <div style="display:flex;flex-direction:column;gap:10px;font-size:14px;">
                                <div class="flex justify-between"><span style="color:var(--color-body-gray);">Name</span><span style="font-weight:500;">Zainab Al-Hassan</span></div>
                                <div class="flex justify-between"><span style="color:var(--color-body-gray);">Email</span><span style="font-weight:500;">zainab@email.com</span></div>
                                <div class="flex justify-between"><span style="color:var(--color-body-gray);">Access</span><span style="font-weight:500;">Portal enabled</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- COURSES -->
                <div id="sp-courses" style="display:none;">
                    <div class="card" style="padding:0;overflow:hidden;">
                        <table style="width:100%;border-collapse:collapse;">
                            <thead style="background:var(--color-light-gray);border-bottom:2px solid var(--color-mid-gray);">
                                <tr>
                                    <th style="padding:12px 20px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Course</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Teacher</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Progress</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:14px 20px;font-weight:600;">Arabic Grammar — Level 2</td>
                                    <td style="padding:14px 12px;font-size:13px;">Ustadha K. Nour</td>
                                    <td style="padding:14px 12px;"><div style="background:var(--color-light-gray);border-radius:99px;height:6px;width:120px;"><div style="background:var(--color-deep-teal);width:68%;height:6px;border-radius:99px;"></div></div><span style="font-size:11px;color:var(--color-body-gray);">68% complete</span></td>
                                    <td style="padding:14px 12px;"><span class="status-pill status-enrolled">Active</span></td>
                                </tr>
                                <tr>
                                    <td style="padding:14px 20px;font-weight:600;">Hanafi Fiqh — Fundamentals</td>
                                    <td style="padding:14px 12px;font-size:13px;">Sheikh Ahmad</td>
                                    <td style="padding:14px 12px;"><div style="background:var(--color-light-gray);border-radius:99px;height:6px;width:120px;"><div style="background:var(--color-deep-teal);width:42%;height:6px;border-radius:99px;"></div></div><span style="font-size:11px;color:var(--color-body-gray);">42% complete</span></td>
                                    <td style="padding:14px 12px;"><span class="status-pill status-enrolled">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- ATTENDANCE -->
                <div id="sp-attendance" style="display:none;">
                    <div class="card" style="padding:0;overflow:hidden;">
                        <table style="width:100%;border-collapse:collapse;">
                            <thead style="background:var(--color-light-gray);border-bottom:2px solid var(--color-mid-gray);">
                                <tr>
                                    <th style="padding:12px 20px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Session</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Date</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Course</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom:1px solid var(--color-light-gray);"><td style="padding:12px 20px;">Session 12</td><td style="padding:12px;font-size:13px;">Mar 15, 2026</td><td style="padding:12px;font-size:13px;">Arabic Grammar</td><td style="padding:12px;"><span style="background:#dcfce7;color:#16a34a;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Present</span></td></tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);"><td style="padding:12px 20px;">Session 11</td><td style="padding:12px;font-size:13px;">Mar 13, 2026</td><td style="padding:12px;font-size:13px;">Hanafi Fiqh</td><td style="padding:12px;"><span style="background:#dcfce7;color:#16a34a;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Present</span></td></tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);"><td style="padding:12px 20px;">Session 10</td><td style="padding:12px;font-size:13px;">Mar 11, 2026</td><td style="padding:12px;font-size:13px;">Arabic Grammar</td><td style="padding:12px;"><span style="background:#fee2e2;color:#dc2626;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Absent</span></td></tr>
                                <tr><td style="padding:12px 20px;">Session 9</td><td style="padding:12px;font-size:13px;">Mar 8, 2026</td><td style="padding:12px;font-size:13px;">Hanafi Fiqh</td><td style="padding:12px;"><span style="background:#fef9c3;color:#854d0e;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Excused</span></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- GRADES -->
                <div id="sp-grades" style="display:none;">
                    <div class="card" style="padding:0;overflow:hidden;">
                        <table style="width:100%;border-collapse:collapse;">
                            <thead style="background:var(--color-light-gray);border-bottom:2px solid var(--color-mid-gray);">
                                <tr>
                                    <th style="padding:12px 20px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Assessment</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Course</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Score</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom:1px solid var(--color-light-gray);"><td style="padding:12px 20px;font-weight:600;">Quiz 1 — Verb Conjugation</td><td style="padding:12px;font-size:13px;">Arabic Grammar</td><td style="padding:12px;font-weight:700;color:var(--color-deep-teal);">92%</td><td style="padding:12px;"><span style="background:#dcfce7;color:#16a34a;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Graded</span></td></tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);"><td style="padding:12px 20px;font-weight:600;">Assignment — Essay on Taharah</td><td style="padding:12px;font-size:13px;">Hanafi Fiqh</td><td style="padding:12px;font-weight:700;color:var(--color-deep-teal);">Pass</td><td style="padding:12px;"><span style="background:#dcfce7;color:#16a34a;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Graded</span></td></tr>
                                <tr><td style="padding:12px 20px;font-weight:600;">Quiz 2 — Sentence Structure</td><td style="padding:12px;font-size:13px;">Arabic Grammar</td><td style="padding:12px;color:var(--color-body-gray);">—</td><td style="padding:12px;"><span style="background:#fee2e2;color:#dc2626;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Not Submitted</span></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- BILLING -->
                <div id="sp-billing" style="display:none;">
                    <div class="card" style="padding:0;overflow:hidden;">
                        <table style="width:100%;border-collapse:collapse;">
                            <thead style="background:var(--color-light-gray);border-bottom:2px solid var(--color-mid-gray);">
                                <tr>
                                    <th style="padding:12px 20px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Invoice</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Amount</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Due</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom:1px solid var(--color-light-gray);"><td style="padding:12px 20px;font-weight:600;">INV-0091 · Tuition Mar</td><td style="padding:12px;">$150.00</td><td style="padding:12px;font-size:13px;">Mar 25, 2026</td><td style="padding:12px;"><span style="background:#fef3c7;color:#d97706;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Pending</span></td></tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);"><td style="padding:12px 20px;font-weight:600;">INV-0072 · Tuition Feb</td><td style="padding:12px;">$150.00</td><td style="padding:12px;font-size:13px;">Feb 25, 2026</td><td style="padding:12px;"><span class="status-pill status-enrolled">Paid</span></td></tr>
                                <tr><td style="padding:12px 20px;font-weight:600;">INV-0051 · Registration</td><td style="padding:12px;">$50.00</td><td style="padding:12px;font-size:13px;">Jan 8, 2026</td><td style="padding:12px;"><span class="status-pill status-enrolled">Paid</span></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- ACTIVITY LOG -->
                <div id="sp-activity" style="display:none;">
                    <div class="card">
                        <div style="display:flex;flex-direction:column;gap:16px;">
                            <div style="display:flex;gap:12px;align-items:flex-start;"><div style="width:8px;height:8px;border-radius:50%;background:var(--color-deep-teal);margin-top:5px;flex-shrink:0;"></div><div><p style="font-size:14px;"><strong>Grade recorded</strong> — Quiz 1 (Arabic Grammar): 92%</p><span style="font-size:12px;color:var(--color-body-gray);">Mar 14, 2026 · by Ustadha K. Nour</span></div></div>
                            <div style="display:flex;gap:12px;align-items:flex-start;"><div style="width:8px;height:8px;border-radius:50%;background:var(--color-deep-teal);margin-top:5px;flex-shrink:0;"></div><div><p style="font-size:14px;"><strong>Attendance marked</strong> — Session 12: Present</p><span style="font-size:12px;color:var(--color-body-gray);">Mar 15, 2026 · by Ustadha K. Nour</span></div></div>
                            <div style="display:flex;gap:12px;align-items:flex-start;"><div style="width:8px;height:8px;border-radius:50%;background:var(--color-mauve-rose);margin-top:5px;flex-shrink:0;"></div><div><p style="font-size:14px;"><strong>Payment received</strong> — INV-0072 ($150.00) via Stripe</p><span style="font-size:12px;color:var(--color-body-gray);">Feb 25, 2026 · automatic</span></div></div>
                            <div style="display:flex;gap:12px;align-items:flex-start;"><div style="width:8px;height:8px;border-radius:50%;background:var(--color-deep-teal);margin-top:5px;flex-shrink:0;"></div><div><p style="font-size:14px;"><strong>Enrolled</strong> — Arabic Intermediate + Hanafi Fiqh, Spring 2026</p><span style="font-size:12px;color:var(--color-body-gray);">Jan 8, 2026 · by Admin</span></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TOAST notification -->
    <div id="toast" class="toast">
        <span class="toast-icon">✓</span>
        <span id="toast-msg">Saved successfully</span>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        lucide.createIcons();

        function switchNotifTab(tab, el) {
            ['templates','rules','log'].forEach(t => {
                document.getElementById('notif-panel-' + t).style.display = 'none';
                document.getElementById('tab-' + t).style.borderBottom = 'none';
                document.getElementById('tab-' + t).style.color = 'var(--color-body-gray)';
            });
            document.getElementById('notif-panel-' + tab).style.display = 'block';
            el.style.borderBottom = '3px solid var(--color-deep-teal)';
            el.style.color = 'var(--color-deep-teal)';
        }

        function switchSettingsTab(tab, el) {
            ['general','academic','payments','portal','integrations'].forEach(t => {
                document.getElementById('settings-panel-' + t).style.display = 'none';
                document.getElementById('stab-' + t).style.borderBottom = 'none';
                document.getElementById('stab-' + t).style.color = 'var(--color-body-gray)';
            });
            document.getElementById('settings-panel-' + tab).style.display = 'block';
            el.style.borderBottom = '3px solid var(--color-deep-teal)';
            el.style.color = 'var(--color-deep-teal)';
        }

        /* ---- CRM Events sub-panels ---- */
        function showEventDetail(name) {
            document.getElementById('crm-events-list-panel').style.display = 'none';
            document.getElementById('crm-event-detail-panel').style.display = 'block';
            document.getElementById('event-detail-title').textContent = name;
            document.getElementById('event-detail-meta').textContent = 'Mar 28, 2026 · 6:30 PM – 10:00 PM · Main Hall · Paid ($50)';
            if (typeof lucide !== 'undefined') lucide.createIcons();
        }
        function hideEventDetail() {
            document.getElementById('crm-events-list-panel').style.display = 'block';
            document.getElementById('crm-event-detail-panel').style.display = 'none';
        }

        /* ---- Custom Fields entity tabs ---- */
        function switchCFEntity(btn, panelId) {
            document.querySelectorAll('.cf-tab').forEach(t => {
                t.style.color = 'var(--color-body-gray)';
                t.style.borderBottom = 'none';
            });
            btn.style.color = 'var(--color-deep-teal)';
            btn.style.borderBottom = '3px solid var(--color-deep-teal)';
            ['cf-student','cf-crm','cf-program','cf-course','cf-event'].forEach(id => {
                const el = document.getElementById(id);
                if (el) el.style.display = (id === panelId) ? 'block' : 'none';
            });
        }
        function toggleCFOptions(type) {
            const el = document.getElementById('cf-select-options');
            if (el) el.style.display = (type === 'select' || type === 'multiselect') ? 'block' : 'none';
        }

        /* ---- CMS page tab filter (stub) ---- */
        function filterPages(btn, filter) {
            document.querySelectorAll('.cms-tab').forEach(t => {
                t.style.color = 'var(--color-body-gray)';
                t.style.borderBottom = 'none';
                t.classList.remove('active-tab');
            });
            btn.style.color = 'var(--color-deep-teal)';
            btn.style.borderBottom = '3px solid var(--color-deep-teal)';
        }

        /* ---- Sidebar collapse ---- */
        function toggleSidebar() {
            const s = document.getElementById('sidebar');
            const m = document.querySelector('.main-content');
            s.classList.toggle('collapsed');
        }
        function copySchoolCode() {
            navigator.clipboard.writeText('ZC2026').catch(() => {});
            const el = document.getElementById('code-copied');
            el.style.display = 'inline';
            setTimeout(() => el.style.display = 'none', 1800);
        }

        /* ---- Quiz Builder ---- */
        function addQuizQuestion(type) {
            const container = document.getElementById('quiz-questions');
            if (!container) return;
            const qnum = container.querySelectorAll('.card').length + 1;
            const colors = { mcq: 'var(--color-deep-teal)', tf: 'var(--color-mauve-rose)', sa: '#6366f1' };
            const typeLabels = { mcq: 'Multiple Choice', tf: 'True / False', sa: 'Short Answer' };
            const selOpts = Object.entries(typeLabels).map(([k,v]) => `<option${type===k?' selected':''}>${v}</option>`).join('');
            const bodyHtml = type === 'tf'
                ? `<div class="flex gap-6"><label class="flex items-center gap-2" style="cursor:pointer;font-size:13px;"><input type="radio" name="q${qnum}-c" checked><span style="background:#f0fdf4;color:#16a34a;font-weight:700;padding:4px 16px;border-radius:6px;border:1px solid #86efac;">True ✓</span></label><label class="flex items-center gap-2" style="cursor:pointer;font-size:13px;"><input type="radio" name="q${qnum}-c"><span style="padding:4px 16px;border-radius:6px;border:1px solid var(--color-mid-gray);">False</span></label></div>`
                : type === 'sa'
                ? `<div style="background:var(--color-warm-ivory);border-radius:6px;padding:10px 14px;font-size:12px;color:var(--color-body-gray);">Students will type their answer. Grading is <strong>manual</strong>.</div>`
                : `<div style="display:flex;flex-direction:column;gap:8px;"><div class="flex items-center gap-3"><input type="radio" name="q${qnum}-c" checked><input type="text" placeholder="Correct answer" style="flex:1;padding:7px 10px;border:1px solid #86efac;background:#f0fdf4;border-radius:6px;font-size:13px;"></div><div class="flex items-center gap-3"><input type="radio" name="q${qnum}-c"><input type="text" placeholder="Wrong answer" style="flex:1;padding:7px 10px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;"></div></div>`;
            const div = document.createElement('div');
            div.className = 'card';
            div.style.cssText = `margin-bottom:var(--space-4);border-left:4px solid ${colors[type]};`;
            div.innerHTML = `<div class="flex justify-between items-start" style="margin-bottom:12px;"><div class="flex items-center gap-3"><span style="background:${colors[type]};color:white;width:24px;height:24px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;flex-shrink:0;">${qnum}</span><select style="padding:5px 10px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:12px;font-weight:600;color:${colors[type]};">${selOpts}</select><span style="font-size:12px;color:var(--color-body-gray);">Points:</span><input type="number" value="2" min="0" style="width:52px;padding:5px 8px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:12px;text-align:center;"></div><button onclick="this.closest('.card').remove()" style="background:none;border:none;cursor:pointer;color:#ef4444;font-size:18px;">×</button></div><textarea placeholder="Enter your question here…" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:13px;min-height:52px;resize:vertical;font-family:inherit;margin-bottom:12px;"></textarea>${bodyHtml}`;
            container.appendChild(div);
            if (typeof lucide !== 'undefined') lucide.createIcons();
        }

        /* ---- Invoice Creator ---- */
        function openInvoiceCreator() {
            const p = document.getElementById('invoice-creator-panel');
            if (p) { p.style.display = 'block'; document.body.style.overflow = 'hidden'; }
            if (typeof lucide !== 'undefined') lucide.createIcons();
        }
        function closeInvoiceCreator() {
            const p = document.getElementById('invoice-creator-panel');
            if (p) p.style.display = 'none';
            document.body.style.overflow = '';
        }
        function addInvLine(desc, price) {
            const tbody = document.getElementById('inv-lines');
            if (!tbody) return;
            const tr = document.createElement('tr');
            tr.setAttribute('data-line','');
            tr.style.borderBottom = '1px solid var(--color-light-gray)';
            tr.innerHTML = `
                <td style="padding:6px 4px;"><input type="text" value="${desc}" oninput="updateInvPreview()" style="width:100%;padding:5px 8px;border:1px solid var(--color-mid-gray);border-radius:4px;font-size:12px;"></td>
                <td style="padding:6px 4px;text-align:right;"><input type="number" value="1" min="1" oninput="updateInvPreview()" style="width:48px;padding:5px 8px;border:1px solid var(--color-mid-gray);border-radius:4px;font-size:12px;text-align:right;"></td>
                <td style="padding:6px 4px;text-align:right;"><input type="number" value="${price}" min="0" oninput="updateInvPreview()" style="width:72px;padding:5px 8px;border:1px solid var(--color-mid-gray);border-radius:4px;font-size:12px;text-align:right;"></td>
                <td style="padding:6px 4px;text-align:right;font-weight:600;" data-linetotal>$${parseFloat(price||0).toFixed(2)}</td>
                <td style="padding:6px 4px;text-align:center;"><button onclick="removeInvLine(this)" style="background:none;border:none;cursor:pointer;color:#ef4444;font-size:16px;">×</button></td>`;
            tbody.appendChild(tr);
            updateInvPreview();
        }
        function removeInvLine(btn) {
            const tr = btn.closest('tr');
            if (tr) tr.remove();
            updateInvPreview();
        }
        function updateInvPreview() {
            const lines = document.querySelectorAll('#inv-lines tr[data-line]');
            let subtotal = 0;
            const prevLines = document.getElementById('prev-lines');
            if (prevLines) prevLines.innerHTML = '';
            lines.forEach(tr => {
                const inputs = tr.querySelectorAll('input');
                const desc = inputs[0] ? inputs[0].value : '';
                const qty = parseFloat(inputs[1] ? inputs[1].value : 1) || 1;
                const price = parseFloat(inputs[2] ? inputs[2].value : 0) || 0;
                const total = qty * price;
                subtotal += total;
                const lt = tr.querySelector('[data-linetotal]');
                if (lt) lt.textContent = '$' + total.toFixed(2);
                if (prevLines) {
                    const row = document.createElement('tr');
                    row.style.borderBottom = '1px solid var(--color-light-gray)';
                    row.innerHTML = `<td style="padding:8px 0;">${desc||'—'}</td><td style="padding:8px 0;text-align:right;">${qty}</td><td style="padding:8px 0;text-align:right;">$${price.toFixed(2)}</td><td style="padding:8px 0;text-align:right;font-weight:600;">$${total.toFixed(2)}</td>`;
                    prevLines.appendChild(row);
                }
            });
            const st = document.getElementById('prev-subtotal');
            const tot = document.getElementById('prev-total');
            if (st) st.textContent = '$' + subtotal.toFixed(2);
            if (tot) tot.textContent = '$' + subtotal.toFixed(2);
            const ps = document.getElementById('prev-student');
            const sel = document.getElementById('inv-student');
            if (ps && sel) ps.textContent = sel.value ? sel.value.split('·')[0].trim() : '—';
            const due = document.getElementById('inv-due');
            const pd = document.getElementById('prev-due');
            if (due && pd && due.value) {
                const d = new Date(due.value + 'T00:00:00');
                pd.textContent = d.toLocaleDateString('en-US', { month:'short', day:'numeric', year:'numeric' });
            }
            const notes = document.getElementById('inv-notes');
            const pn = document.getElementById('prev-notes');
            if (notes && pn) {
                if (notes.value.trim()) { pn.style.display = 'block'; pn.textContent = notes.value; }
                else { pn.style.display = 'none'; }
            }
        }

        /* ---- Enrollment pipeline helpers ---- */
        function filterEnrollTab(btn, filter) {
            document.querySelectorAll('.enroll-tab').forEach(t => {
                t.style.color = 'var(--color-body-gray)';
                t.style.borderBottom = 'none';
                t.style.fontWeight = '';
                t.style.marginBottom = '';
            });
            btn.style.color = 'var(--color-deep-teal)';
            btn.style.fontWeight = '600';
            btn.style.borderBottom = '3px solid var(--color-deep-teal)';
            btn.style.marginBottom = '-2px';
        }
        function enrollAction(btn, status) {
            const colors = { Accepted: '#dcfce7|#16a34a', Waitlisted: '#fef9c3|#854d0e', Rejected: '#fee2e2|#dc2626', 'Under Review': '#dbeafe|#2563eb' };
            const row = btn.closest('tr');
            if (row) {
                const badge = row.querySelector('[style*="border-radius:20px"]');
                if (badge && colors[status]) {
                    const [bg, color] = colors[status].split('|');
                    badge.style.background = bg;
                    badge.style.color = color;
                    badge.textContent = status;
                }
            }
            saveAndClose('', 'Application ' + status.toLowerCase());
        }
        function openEnrollDetail(name, initials, avatarColor) {
            const panel = document.getElementById('enroll-detail-panel');
            if (!panel) return;
            const nm = panel.querySelector('#ed-name');
            if (nm) nm.textContent = name;
            const av = panel.querySelector('#ed-avatar');
            if (av) { av.textContent = initials; av.style.background = avatarColor || 'var(--color-deep-teal)'; }
            panel.style.display = 'block';
            document.body.style.overflow = 'hidden';
            if (typeof lucide !== 'undefined') lucide.createIcons();
        }
        function closeEnrollDetail() {
            const panel = document.getElementById('enroll-detail-panel');
            if (panel) panel.style.display = 'none';
            document.body.style.overflow = '';
        }
        function toggleEnrollment(el) {
            const label = document.getElementById('enroll-toggle-label');
            const isOpen = label.textContent === 'OPEN';
            el.style.background = isOpen ? '#9ca3af' : 'var(--color-deep-teal)';
            const knob = el.querySelector('div');
            if (knob) knob.style.transform = isOpen ? 'translateX(0)' : '';
            label.textContent = isOpen ? 'CLOSED' : 'OPEN';
            label.style.color = isOpen ? '#9ca3af' : 'var(--color-deep-teal)';
            saveAndClose('', 'Enrollment ' + (isOpen ? 'closed' : 'opened'));
        }

        /* ---- Student Profile slide-over ---- */
        function openStudentProfile(name, initials, avatarColor, subtitle) {
            const panel = document.getElementById('student-profile-panel');
            if (!panel) return;
            // Update header info
            const h2 = panel.querySelector('h2');
            if (h2) h2.textContent = name;
            const sub = panel.querySelector('p[style*="opacity:0.7"]');
            if (sub) sub.textContent = 'Student · ' + (subtitle || '');
            const av = panel.querySelector('[style*="width:52px"]');
            if (av) { av.textContent = initials || name.substring(0,2).toUpperCase(); av.style.background = avatarColor || 'var(--color-deep-teal)'; }
            // Reset to Overview tab
            panel.querySelectorAll('.sp-tab').forEach(t => {
                t.style.fontWeight = '';
                t.style.color = 'var(--color-body-gray)';
                t.style.borderBottom = 'none';
                t.style.marginBottom = '';
            });
            const firstTab = panel.querySelector('.sp-tab');
            if (firstTab) { firstTab.style.fontWeight = '600'; firstTab.style.color = 'var(--color-deep-teal)'; firstTab.style.borderBottom = '3px solid var(--color-deep-teal)'; firstTab.style.marginBottom = '-2px'; }
            ['sp-overview','sp-courses','sp-attendance','sp-grades','sp-billing','sp-activity'].forEach((id, i) => {
                const el = document.getElementById(id);
                if (el) el.style.display = i === 0 ? 'block' : 'none';
            });
            panel.style.display = 'block';
            document.body.style.overflow = 'hidden';
            if (typeof lucide !== 'undefined') lucide.createIcons();
        }
        function closeStudentProfile() {
            const panel = document.getElementById('student-profile-panel');
            if (panel) panel.style.display = 'none';
            document.body.style.overflow = '';
        }
        function switchSPTab(btn, panelId) {
            document.querySelectorAll('.sp-tab').forEach(t => {
                t.style.fontWeight = '';
                t.style.color = 'var(--color-body-gray)';
                t.style.borderBottom = 'none';
                t.style.marginBottom = '';
            });
            if (btn) { btn.style.fontWeight = '600'; btn.style.color = 'var(--color-deep-teal)'; btn.style.borderBottom = '3px solid var(--color-deep-teal)'; btn.style.marginBottom = '-2px'; }
            ['sp-overview','sp-courses','sp-attendance','sp-grades','sp-billing','sp-activity'].forEach(id => {
                const el = document.getElementById(id);
                if (el) el.style.display = (id === panelId) ? 'block' : 'none';
            });
        }

        /* ---- Modal helpers ---- */
        /* ---- Communications / Broadcast Center ---- */
        function openCompose() {
            const p = document.getElementById('compose-panel');
            if (p) { p.classList.remove('hidden'); p.scrollIntoView({ behavior:'smooth', block:'nearest' }); }
        }
        function closeCompose() {
            const p = document.getElementById('compose-panel');
            if (p) p.classList.add('hidden');
        }
        function updateRecipientCount() {
            const sel = document.getElementById('bc-audience');
            const el = document.getElementById('recipient-count');
            if (!sel || !el) return;
            const n = parseInt(sel.options[sel.selectedIndex].value) || 0;
            el.textContent = n.toLocaleString() + ' recipient' + (n === 1 ? '' : 's');
        }
        function sendBroadcast() {
            const subj = (document.getElementById('bc-subject') || {}).value || '';
            const body = (document.getElementById('bc-body') || {}).value || '';
            if (!subj.trim()) { showToast('Please add a subject before sending'); return; }
            if (!body.trim()) { showToast('Message body cannot be empty'); return; }
            closeCompose();
            showToast('Broadcast sent — "' + subj.substring(0, 40) + '"');
            // reset
            document.getElementById('bc-subject').value = '';
            document.getElementById('bc-body').value = '';
        }
        const templates = {
            'enrollment-welcome': { subject: 'Welcome to Zainab Center!', body: 'Assalamu Alaikum,\n\nWe are delighted to welcome you to Zainab Center. Your enrollment has been confirmed and your student portal is now active. Please log in at portal.zainabcenter.org to access your courses and schedule.\n\nJazakAllah Khayran,\nZainab Center Admin' },
            'payment-reminder':   { subject: 'Action Required: Payment Due Soon', body: 'Dear Student,\n\nThis is a reminder that your upcoming tuition installment is due on [DATE]. Please log into your portal to review your invoice and make payment at your earliest convenience.\n\nIf you have any questions, please contact us at info@zainabcenter.com.\n\nJazakAllah Khayran' },
            'class-cancellation': { subject: 'Notice: Class Cancelled — [Course Name]', body: 'Assalamu Alaikum,\n\nPlease be advised that [Course Name] scheduled for [DATE] at [TIME] has been cancelled. We apologize for the inconvenience.\n\nThe session will be rescheduled and you will be notified via the portal. Please check your portal for updates.\n\nJazakAllah Khayran' },
            'new-lesson':         { subject: 'New Lesson Available: [Lesson Title]', body: 'Assalamu Alaikum,\n\nA new lesson "[Lesson Title]" has been published in [Course Name]. Log in to your student portal to access it.\n\nPortal: portal.zainabcenter.org\n\nJazakAllah Khayran,\nZainab Center' },
            'event-invite':       { subject: 'You\'re Invited: [Event Name]', body: 'Assalamu Alaikum,\n\nYou are cordially invited to [Event Name] on [DATE] at [TIME].\n\nPlease RSVP by visiting our events page or replying to this email. Seats are limited.\n\nWe look forward to seeing you!\n\nJazakAllah Khayran,\nZainab Center' },
            'graduation':         { subject: 'Congratulations on Your Graduation!', body: 'Assalamu Alaikum,\n\nAlhamdulillah, congratulations on successfully completing [Program Name]! Your dedication and commitment to seeking Islamic knowledge is truly commendable.\n\nYour official certificate will be mailed to your registered address within 2–3 weeks.\n\nMay Allah bless you in your continued pursuit of knowledge.\n\nJazakAllah Khayran,\nZainab Center' },
        };
        function loadTemplate(key) {
            const t = templates[key];
            if (!t) return;
            openCompose();
            document.getElementById('bc-subject').value = t.subject;
            document.getElementById('bc-body').value = t.body;
            showToast('Template loaded — edit as needed');
        }

        /* ---- Reports ---- */
        function applyReportFilters() {
            const term = document.getElementById('rpt-term');
            const prog = document.getElementById('rpt-program');
            const badge = document.getElementById('rpt-filter-badge');
            if (!badge) return;
            const termLabel = term ? term.options[term.selectedIndex].text : 'All Terms';
            const progLabel = prog ? prog.options[prog.selectedIndex].text : 'All Programs';
            badge.textContent = termLabel + ' · ' + progLabel;
        }
        function generateReport(name) {
            const term = document.getElementById('rpt-term');
            const prog = document.getElementById('rpt-program');
            const fmt = document.getElementById('rpt-format');
            const termLabel = term ? term.options[term.selectedIndex].text : 'All Terms';
            const progLabel = prog ? prog.options[prog.selectedIndex].text : 'All Programs';
            const fmtLabel = fmt ? fmt.options[fmt.selectedIndex].text.split(' ')[0] : 'PDF';
            const genDiv = document.getElementById('rpt-generating');
            const genLabel = document.getElementById('rpt-generating-label');
            if (genDiv && genLabel) {
                genLabel.textContent = 'Generating ' + name + '…';
                genDiv.querySelector('span:last-child').textContent = termLabel + ' · ' + progLabel + ' · ' + fmtLabel;
                genDiv.classList.remove('hidden');
                setTimeout(() => {
                    genDiv.classList.add('hidden');
                    showToast(name + ' ready — ' + fmtLabel);
                    // add to history table
                    const tbody = document.getElementById('rpt-history-tbody');
                    if (tbody) {
                        const today = new Date().toLocaleDateString('en-US', { month:'short', day:'numeric', year:'numeric' });
                        const row = document.createElement('tr');
                        row.style.borderBottom = '1px solid var(--color-light-gray)';
                        row.style.background = '#f0fdf4';
                        row.innerHTML = `<td style="padding:10px 20px;font-weight:600;">${name}</td><td style="padding:10px;font-size:12px;color:var(--color-body-gray);">${termLabel} · ${progLabel}</td><td style="padding:10px;color:var(--color-body-gray);">You</td><td style="padding:10px;color:var(--color-body-gray);">${today}</td><td style="padding:10px;"><span class="badge ${fmtLabel==='PDF'?'badge-error':'badge-success'}">${fmtLabel}</span></td><td style="padding:10px 20px;"><button class="btn btn-outline" style="font-size:11px;padding:4px 10px;" onclick="showToast('Downloading ${name}…')">Download</button></td>`;
                        tbody.insertBefore(row, tbody.firstChild);
                        if (typeof lucide !== 'undefined') lucide.createIcons();
                    }
                }, 1800);
            }
        }
        function filterReportHistory(q) {
            const rows = document.querySelectorAll('#rpt-history-tbody tr');
            rows.forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(q.toLowerCase()) ? '' : 'none';
            });
        }

        /* CSS spin animation for loader */
        (function() {
            const s = document.createElement('style');
            s.textContent = '@keyframes spin { from { transform:rotate(0deg); } to { transform:rotate(360deg); } }';
            document.head.appendChild(s);
        })();

        /* Generic toast helper */
        function showToast(msg) {
            const toast = document.getElementById('toast');
            document.getElementById('toast-msg').textContent = msg;
            toast.classList.add('show');
            setTimeout(() => toast.classList.remove('show'), 3000);
        }

        /* ── Donations view ── */
        const CAT_COLORS = {
            sadaqah:    'background:#fdf4ff;color:#A85D88;',
            zakat:      'background:#dcfce7;color:#166534;',
            scholarship:'background:#dbeafe;color:#1d4ed8;',
            building:   'background:#fef3c7;color:#92400e;',
        };
        const CAT_LABELS = { sadaqah:'Sadaqah', zakat:'Zakat', scholarship:'Scholarship', building:'Building Fund' };
        const FREQ_LABELS = { once:'One-Time', monthly:'Monthly', annual:'Annual' };
        let _allDonations = [];
        let _donFilter = 'all';

        function loadDonationsView() {
            try { _allDonations = JSON.parse(localStorage.getItem('zc_donations') || '[]'); } catch(e) { _allDonations = []; }
            renderDonationsTable(_allDonations);
            updateDonationStats(_allDonations);
        }

        function renderDonationsTable(records) {
            const tbody  = document.getElementById('donations-tbody');
            const empty  = document.getElementById('donations-empty');
            if (!tbody) return;

            // Remove previously injected live rows (keep seed rows)
            tbody.querySelectorAll('.live-row').forEach(r => r.remove());

            if (records.length === 0) {
                // Show seed rows, hide empty message
                tbody.querySelectorAll('.seed-row').forEach(r => r.style.display = '');
                empty.style.display = 'none';
                return;
            }

            // Hide seed rows, show live data
            tbody.querySelectorAll('.seed-row').forEach(r => r.style.display = 'none');
            empty.style.display = 'none';

            records.forEach(d => {
                const date = new Date(d.date).toLocaleDateString('en-US', { month:'short', day:'numeric', year:'numeric' });
                const catStyle = CAT_COLORS[d.category] || 'background:#f3f4f6;color:#374151;';
                const catLabel = CAT_LABELS[d.category] || d.category;
                const freqLabel = FREQ_LABELS[d.frequency] || d.frequency;
                const amtFmt = '$' + (Number.isInteger(d.amount) ? d.amount : parseFloat(d.amount).toFixed(2)) + '.00';
                const tr = document.createElement('tr');
                tr.className = 'live-row';
                tr.dataset.category = d.category;
                tr.dataset.name = (d.name || '').toLowerCase();
                tr.dataset.email = (d.email || '').toLowerCase();
                tr.style.borderBottom = '1px solid var(--color-light-gray)';
                tr.innerHTML = `
                    <td style="padding:12px 20px;font-size:12px;color:var(--color-body-gray);font-weight:600;">${d.id || '—'}</td>
                    <td style="padding:12px;font-weight:600;">${d.name || '—'}</td>
                    <td style="padding:12px;font-size:13px;color:var(--color-body-gray);">${d.email || '—'}</td>
                    <td style="padding:12px;font-weight:700;color:var(--color-deep-teal);">${amtFmt}</td>
                    <td style="padding:12px;"><span style="${catStyle}font-size:11px;font-weight:700;padding:3px 9px;border-radius:10px;">${catLabel}</span></td>
                    <td style="padding:12px;font-size:13px;">${freqLabel}</td>
                    <td style="padding:12px;font-size:13px;color:var(--color-body-gray);">${date}</td>
                    <td style="padding:12px 20px;"><span class="status-pill status-enrolled">Received</span></td>`;
                tbody.appendChild(tr);
            });
        }

        function updateDonationStats(records) {
            const total   = records.reduce((s, d) => s + parseFloat(d.amount || 0), 0);
            const avg     = records.length ? (total / records.length) : 0;
            const monthly = records.filter(d => d.frequency === 'monthly').length;
            const countEl    = document.getElementById('stat-count');
            const avgEl      = document.getElementById('stat-avg');
            const recurEl    = document.getElementById('stat-recurring');
            const raisedEl   = document.getElementById('stat-total-raised');
            if (countEl) countEl.textContent = records.length || '—';
            if (avgEl)   avgEl.textContent   = records.length ? '$' + Math.round(avg) : '—';
            if (recurEl) recurEl.textContent  = monthly || '—';
            // Update total raised: base $48k + new donations
            if (raisedEl) {
                const grand = 48000 + total;
                raisedEl.textContent = grand >= 1000 ? '$' + (grand / 1000).toFixed(1) + 'K' : '$' + grand;
            }
        }

        function filterDonations(cat, btn) {
            _donFilter = cat;
            document.querySelectorAll('.don-filter-btn').forEach(b => b.classList.remove('active-filter'));
            if (btn) btn.classList.add('active-filter');
            applyDonationFilter();
        }

        function searchDonations() { applyDonationFilter(); }

        function applyDonationFilter() {
            const query = (document.getElementById('donation-search')?.value || '').toLowerCase();
            const rows = document.querySelectorAll('#donations-tbody tr');
            let visible = 0;
            rows.forEach(row => {
                const catMatch  = (_donFilter === 'all') || (row.dataset.category === _donFilter);
                const nameMatch = !query || (row.dataset.name || '').includes(query) || (row.dataset.email || '').includes(query);
                const show = catMatch && nameMatch;
                row.style.display = show ? '' : 'none';
                if (show) visible++;
            });
            const empty = document.getElementById('donations-empty');
            if (empty) empty.style.display = visible === 0 ? 'block' : 'none';
        }

        function exportDonationsCsv() {
            if (_allDonations.length === 0) { showToast('No new donations to export yet'); return; }
            const header = 'ID,Date,Name,Email,Amount,Category,Frequency,Designation,Anonymous';
            const rows = _allDonations.map(d => [
                d.id, new Date(d.date).toLocaleDateString(), d.name, d.email,
                d.amount, d.category, d.frequency, '"' + (d.designation || '') + '"', d.anonymous
            ].join(','));
            const csv = [header, ...rows].join('\n');
            const a = document.createElement('a');
            a.href = 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv);
            a.download = 'donations_' + new Date().toISOString().slice(0,10) + '.csv';
            a.click();
            showToast('Donations exported as CSV');
        }

        function openModal(id) {
            const el = document.getElementById(id);
            if (el) {
                el.classList.add('open');
                document.body.style.overflow = 'hidden';
                lucide.createIcons();
            }
        }
        function closeModal(id) {
            const el = document.getElementById(id);
            if (el) {
                el.classList.remove('open');
                document.body.style.overflow = '';
            }
        }
        /* Close when clicking the dark backdrop (not the modal itself) */
        function overlayClose(e, overlay) {
            if (e.target === overlay) closeModal(overlay.id);
        }
        /* Save mock + toast */
        function saveAndClose(modalId, msg) {
            closeModal(modalId);
            const toast = document.getElementById('toast');
            document.getElementById('toast-msg').textContent = msg;
            toast.classList.add('show');
            setTimeout(() => toast.classList.remove('show'), 3000);
        }
        /* Close on Escape key */
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') {
                document.querySelectorAll('.modal-overlay.open').forEach(m => {
                    m.classList.remove('open');
                    document.body.style.overflow = '';
                });
            }
        });
    </script>
</body>

</html>