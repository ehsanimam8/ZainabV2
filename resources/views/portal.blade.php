<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zainab Center - Student Portal</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        :root {
            /* Override for Portal */
            --color-primary-portal: #A85D88;
            /* Mauve Rose */
            --color-bg-portal: #F8F5E8;
            /* Warm Ivory */
        }

        body.portal {
            background-color: var(--color-bg-portal);
        }

        .portal-sidebar {
            background-color: var(--color-white);
            border-right: 1px solid var(--color-mid-gray);
            color: var(--color-deep-navy);
        }

        .portal .nav-item {
            color: var(--color-body-gray);
        }

        .portal .nav-item.active {
            color: var(--color-primary-portal);
            background-color: var(--color-blush);
            border-left-color: var(--color-primary-portal);
        }

        .portal .btn-primary {
            background-color: var(--color-primary-portal);
        }

        .course-card-portal {
            border: 1px solid var(--color-mid-gray);
            transition: transform 0.2s;
        }

        .course-card-portal:hover {
            transform: translateY(-4px);
            border-color: var(--color-primary-portal);
        }

        .progress-bar-portal {
            height: 6px;
            background: var(--color-light-gray);
            border-radius: 3px;
            overflow: hidden;
            margin-top: 8px;
        }

        .progress-fill-portal {
            height: 100%;
            background: var(--color-primary-portal);
        }

        /* Donation preset buttons */
        .donate-preset-btn {
            padding: 6px 14px;
            border: 1px solid var(--color-primary-portal);
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            background: white;
            color: var(--color-primary-portal);
            transition: background 0.15s, color 0.15s;
        }
        .donate-preset-btn:hover {
            background: var(--color-blush);
        }
        .donate-preset-selected {
            background: var(--color-primary-portal) !important;
            color: white !important;
        }
    </style>
</head>

<body class="portal">
    <div class="app-container">
        <!-- Sidebar -->
        <aside class="sidebar portal-sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="flex items-center gap-4">
                    <div class="logo-placeholder" style="background: var(--color-primary-portal);">ZC</div>
                    <span class="nav-text brand-font" style="font-size: 18px; color: var(--color-deep-navy);">Zainab
                        Center</span>
                </div>
            </div>

            <nav class="nav-group">
                <a href="#dashboard" class="nav-item active" data-view="dashboard">
                    <span class="nav-icon"><i data-lucide="home"></i></span>
                    <span class="nav-text">Home</span>
                </a>
                <a href="#courses" class="nav-item" data-view="courses">
                    <span class="nav-icon"><i data-lucide="book-open"></i></span>
                    <span class="nav-text">My Courses</span>
                </a>
                <a href="#schedule" class="nav-item" data-view="schedule">
                    <span class="nav-icon"><i data-lucide="calendar"></i></span>
                    <span class="nav-text">Schedule</span>
                </a>
                <a href="#quizzes" class="nav-item" data-view="quizzes">
                    <span class="nav-icon"><i data-lucide="help-circle"></i></span>
                    <span class="nav-text">Quizzes</span>
                </a>
                <a href="#assignments" class="nav-item" data-view="assignments">
                    <span class="nav-icon"><i data-lucide="clipboard-list"></i></span>
                    <span class="nav-text">Assignments</span>
                </a>
                <a href="#grades" class="nav-item" data-view="grades">
                    <span class="nav-icon"><i data-lucide="award"></i></span>
                    <span class="nav-text">Grades</span>
                </a>
                <a href="#transcript" class="nav-item" data-view="transcript">
                    <span class="nav-icon"><i data-lucide="scroll"></i></span>
                    <span class="nav-text">Transcript</span>
                </a>
                <a href="#portal-notifications" class="nav-item" data-view="portal-notifications">
                    <span class="nav-icon"><i data-lucide="bell"></i></span>
                    <span class="nav-text">Notifications</span>
                </a>
                <a href="#billing" class="nav-item" data-view="billing">
                    <span class="nav-icon"><i data-lucide="credit-card"></i></span>
                    <span class="nav-text">My Balance</span>
                </a>
                <a href="#profile" class="nav-item" data-view="profile">
                    <span class="nav-icon"><i data-lucide="user-circle"></i></span>
                    <span class="nav-text">Profile</span>
                </a>
                <a href="#billing" class="nav-item" data-view="resume-enrollment" id="nav-resume-enrollment" style="display:none;">
                    <span class="nav-icon"><i data-lucide="rotate-ccw"></i></span>
                    <span class="nav-text">Continue Enrollment</span>
                </a>
                <a href="#parent-dashboard" class="nav-item" data-view="parent-dashboard" id="nav-parent-dashboard" style="display:none;">
                    <span class="nav-icon"><i data-lucide="users"></i></span>
                    <span class="nav-text">Parent Dashboard</span>
                </a>
            </nav>

            <div class="sidebar-footer"
                style="padding: var(--space-4); border-top: 1px solid rgba(0,0,0,0.05); margin-top: auto;">
                <button class="btn btn-outline"
                    style="width: 100%; border-color: var(--color-primary-portal); color: var(--color-primary-portal); font-size: 11px;"
                    onclick="switchMode('parent')">
                    <i data-lucide="shield-check" style="width: 14px; vertical-align: middle;"></i> Switch to Parent
                    Mode
                </button>
                <a href="{{ url('/admin') }}" class="nav-item" style="padding: 8px 0px; margin-top: 12px;">
                    <span class="nav-icon"><i data-lucide="layout-dashboard"></i></span>
                    <span class="nav-text" style="font-size: 12px;">Admin Portal</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div id="breadcrumbs" class="breadcrumb-trail" style="margin-bottom: var(--space-4);"></div>
            <!-- View: Student Dashboard -->
            <section id="view-dashboard" class="content-view">
                <div style="margin-bottom: var(--space-8);">
                    <h1 class="brand-font" style="font-size: 32px; color: var(--color-deep-navy);">Welcome back, Zainab.
                    </h1>
                    <p style="color: var(--color-body-gray);">It's Saturday, March 14, 2026</p>
                </div>

                <div style="display: grid; grid-template-columns: 2fr 1fr; gap: var(--space-8);">
                    <!-- Left Column -->
                    <div>
                        <h3 class="brand-font" style="margin-bottom: var(--space-4);">My Active Courses</h3>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4);">
                            <div class="card course-card-portal">
                                <span
                                    style="font-size: 11px; font-weight: 700; color: var(--color-primary-portal);">Hanafi
                                    Fiqh</span>
                                <h4 style="margin: 4px 0 8px; font-family: 'Inter';">Hanafi Fiqh — Fundamentals</h4>
                                <div class="flex items-center gap-2"
                                    style="font-size: 12px; color: var(--color-body-gray);">
                                    <i data-lucide="clock" style="width: 14px;"></i> Next: Sunday @ 9:00 PM
                                </div>
                                <div class="progress-bar-portal">
                                    <div class="progress-fill-portal" style="width: 65%;"></div>
                                </div>
                                <div
                                    style="font-size: 11px; margin-top: 4px; text-align: right; color: var(--color-body-gray);">
                                    65% Complete</div>
                            </div>
                            <div class="card course-card-portal">
                                <span
                                    style="font-size: 11px; font-weight: 700; color: var(--color-primary-portal);">Arabic
                                    Grammar</span>
                                <h4 style="margin: 4px 0 8px; font-family: 'Inter';">Arabic Grammar — Level 2</h4>
                                <div class="flex items-center gap-2"
                                    style="font-size: 12px; color: var(--color-body-gray);">
                                    <i data-lucide="clock" style="width: 14px;"></i> Next: Tuesday @ 7:00 PM
                                </div>
                                <div class="progress-bar-portal">
                                    <div class="progress-fill-portal" style="width: 20%;"></div>
                                </div>
                                <div
                                    style="font-size: 11px; margin-top: 4px; text-align: right; color: var(--color-body-gray);">
                                    20% Complete</div>
                            </div>
                        </div>

                        <h3 class="brand-font" style="margin-top: var(--space-8); margin-bottom: var(--space-4);">
                            Student Feed</h3>
                        <div style="display: grid; gap: var(--space-3);">
                            <!-- Feed Item: Lesson Published -->
                            <div class="card flex gap-4" style="border-left: 4px solid var(--color-deep-teal);">
                                <div
                                    style="min-width: 40px; height: 40px; border-radius: 50%; background: #dcfce7; color: #166534; display: flex; align-items: center; justify-content: center;">
                                    <i data-lucide="play" style="width: 18px;"></i>
                                </div>
                                <div style="flex: 1;">
                                    <div class="flex justify-between">
                                        <h4 style="font-family: 'Inter'; font-size: 15px;">New Lesson: The Pillars of
                                            Salah (Part 2)</h4>
                                        <span style="font-size: 11px; color: var(--color-body-gray);">Just now</span>
                                    </div>
                                    <p style="font-size: 13px; color: var(--color-body-gray); margin-top: 4px;">Teacher
                                        Amina published a new video lesson in Hanafi Fiqh.</p>
                                    <button class="btn btn-outline"
                                        style="font-size: 11px; padding: 4px 10px; margin-top: 8px;"
                                        onclick="window.location.hash = 'courses'">Watch Video</button>
                                </div>
                            </div>
                            <!-- Feed Item: Graded Assessment -->
                            <div class="card flex gap-4" style="border-left: 4px solid var(--color-mauve-rose);">
                                <div
                                    style="min-width: 40px; height: 40px; border-radius: 50%; background: #fee2e2; color: #dc2626; display: flex; align-items: center; justify-content: center;">
                                    <i data-lucide="award" style="width: 18px;"></i>
                                </div>
                                <div style="flex: 1;">
                                    <div class="flex justify-between">
                                        <h4 style="font-family: 'Inter'; font-size: 15px;">Quiz Graded: Quiz 2 — Verb Conjugation
                                        </h4>
                                        <span style="font-size: 11px; color: var(--color-body-gray);">2 hours ago</span>
                                    </div>
                                    <p style="font-size: 13px; color: var(--color-body-gray); margin-top: 4px;">Score:
                                        80%. "Good work — keep practicing your verb patterns!"</p>
                                    <button class="btn btn-outline"
                                        style="font-size: 11px; padding: 4px 10px; margin-top: 8px;"
                                        onclick="window.location.hash = 'grades'">View Feedback</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div>
                        <div class="card" style="background: var(--color-primary-portal); color: white;">
                            <h3 style="font-family: 'Inter'; font-size: 16px; margin-bottom: 4px;">My Balance</h3>
                            <div style="font-size: 28px; font-weight: 700;">$50.00</div>
                            <p style="font-size: 12px; opacity: 0.8; margin-bottom: 16px;">Next installment due Mar 25
                            </p>
                            <button class="btn"
                                style="background: white; color: var(--color-primary-portal); width: 100%;">Pay
                                Now</button>
                        </div>

                        <h3 class="brand-font" style="margin-top: var(--space-6); margin-bottom: var(--space-4);">
                            Upcoming Deadlines</h3>
                        <div style="display: grid; gap: var(--space-3);">
                            <div class="flex items-center gap-3 p-3"
                                style="background: white; border-radius: 8px; border: 1px solid var(--color-mid-gray);">
                                <div
                                    style="text-align: center; padding-right: 12px; border-right: 1px solid var(--color-mid-gray);">
                                    <div style="font-size: 14px; font-weight: 700;">18</div>
                                    <div style="font-size: 10px; text-transform: uppercase;">Mar</div>
                                </div>
                                <div>
                                    <div style="font-size: 13px; font-weight: 600;">Quiz 1: Pillars of Salah</div>
                                    <div style="font-size: 11px; color: #ca8a04;">Due in 2 days</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 p-3"
                                style="background: white; border-radius: 8px; border: 1px solid var(--color-mid-gray);">
                                <div
                                    style="text-align: center; padding-right: 12px; border-right: 1px solid var(--color-mid-gray);">
                                    <div style="font-size: 14px; font-weight: 700;">20</div>
                                    <div style="font-size: 10px; text-transform: uppercase;">Mar</div>
                                </div>
                                <div>
                                    <div style="font-size: 13px; font-weight: 600;">Essay on Taharah</div>
                                    <div style="font-size: 11px; color: var(--color-body-gray);">Due in 4 days</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- View: Course Detail -->
            <section id="view-courses" class="content-view hidden">
                <div style="margin-bottom: var(--space-8);">
                    <button class="btn btn-outline" style="padding: 4px 12px; font-size: 12px; margin-bottom: 12px;"
                        onclick="window.location.hash = 'dashboard'"><i data-lucide="arrow-left"
                            style="width: 14px; vertical-align: middle;"></i> Back to Home</button>
                    <h1 class="brand-font" style="font-size: 32px; color: var(--color-deep-navy);">Hanafi Fiqh — Fundamentals</h1>
                    <p style="color: var(--color-body-gray);">Term: Fall 2026 | Instructor: Ustadha K. Nour</p>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 300px; gap: var(--space-8);">
                    <div>
                        <div class="card"
                            style="padding: 0; overflow: hidden; height: 400px; background: #000; display: flex; align-items: center; justify-content: center; position: relative;">
                            <i data-lucide="play-circle"
                                style="width: 64px; height: 64px; color: white; opacity: 0.8; cursor: pointer;"></i>
                            <div
                                style="position: absolute; bottom: 0; left: 0; right: 0; padding: var(--space-4); background: linear-gradient(transparent, rgba(0,0,0,0.7)); color: white; font-size: 14px;">
                                Lesson 4: The Pillars of Salah (Part 1)
                            </div>
                        </div>

                        <div style="margin-top: var(--space-6);">
                            <h3 class="brand-font">Lesson Notes</h3>
                            <p style="font-size: 15px; color: var(--color-body-gray); margin-top: 12px;">In this lesson,
                                we explore the internal and external obligations of prayer according to the Hanafi
                                school of thought. Key topics include...</p>
                        </div>
                    </div>

                    <div>
                        <h3 class="brand-font" style="margin-bottom: var(--space-4);">Curriculum</h3>
                        <div style="display: grid; gap: var(--space-2);">
                            <div class="p-3 flex items-center gap-3"
                                style="background: white; border-radius: 8px; border-left: 4px solid var(--color-primary-portal);">
                                <i data-lucide="check-circle"
                                    style="width: 16px; color: var(--color-primary-portal);"></i>
                                <span style="font-size: 13px;">1. Introduction to Fiqh</span>
                            </div>
                            <div class="p-3 flex items-center gap-3"
                                style="background: white; border-radius: 8px; border-left: 4px solid var(--color-primary-portal);">
                                <i data-lucide="check-circle"
                                    style="width: 16px; color: var(--color-primary-portal);"></i>
                                <span style="font-size: 13px;">2. Purification (Taharah)</span>
                            </div>
                            <div class="p-3 flex items-center gap-3"
                                style="background: white; border-radius: 8px; border-left: 4px solid var(--color-primary-portal);">
                                <i data-lucide="play" style="width: 16px; color: var(--color-primary-portal);"></i>
                                <span style="font-size: 13px; font-weight: 700;">3. The Pillars of Salah</span>
                            </div>
                            <div class="p-3 flex items-center gap-3"
                                style="background: var(--color-bg-portal); border-radius: 8px; opacity: 0.6;">
                                <i data-lucide="lock" style="width: 16px;"></i>
                                <span style="font-size: 13px;">4. Fasting (Sawm)</span>
                            </div>
                        </div>

                        <div class="card" style="margin-top: var(--space-6); background: var(--color-blush);">
                            <h4 style="font-family: 'Inter'; font-size: 14px; margin-bottom: 8px;">Assessment</h4>
                            <p style="font-size: 12px; margin-bottom: 12px;">Complete the quiz to unlock the next
                                module.</p>
                            <button class="btn btn-primary" style="width: 100%; font-size: 12px;"
                                onclick="goToQuiz()">Take Quiz</button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- View: Quiz Taking -->
            <section id="view-quizzes" class="content-view hidden">
                <div style="margin-bottom: var(--space-8); text-align: center;">
                    <h1 class="brand-font" style="font-size: 32px; color: var(--color-deep-navy);">Quiz 1: Pillars of
                        Salah</h1>
                    <p style="color: var(--color-body-gray);">Time Remaining: 09:45</p>
                </div>

                <div class="card" style="max-width: 600px; margin: 0 auto;">
                    <p style="font-weight: 600; margin-bottom: var(--space-6);">Question 1: Which of the following is
                        considered an internal pillar (Arkan) of Salah?</p>

                    <div style="display: grid; gap: var(--space-3);">
                        <label
                            style="display: flex; align-items: center; gap: var(--space-3); border: 1px solid var(--color-mid-gray); border-radius: 8px; cursor: pointer; padding: var(--space-3);">
                            <input type="radio" name="q1">
                            <span>Wudu (Purification)</span>
                        </label>
                        <label
                            style="display: flex; align-items: center; gap: var(--space-3); border: 2px solid var(--color-primary-portal); background: var(--color-blush); border-radius: 8px; cursor: pointer; padding: var(--space-3);">
                            <input type="radio" name="q1" checked>
                            <span>Ruku (Bowing)</span>
                        </label>
                        <label
                            style="display: flex; align-items: center; gap: var(--space-3); border: 1px solid var(--color-mid-gray); border-radius: 8px; cursor: pointer; padding: var(--space-3);">
                            <input type="radio" name="q1">
                            <span>Facing the Qiblah</span>
                        </label>
                    </div>

                    <div style="margin-top: var(--space-8); display: flex; justify-content: space-between;">
                        <button class="btn btn-outline">Save for later</button>
                        <button class="btn btn-primary">Submit Answer</button>
                    </div>
                </div>
            </section>
            <!-- View: Assignments List -->
            <section id="view-assignments" class="content-view hidden">
                <div style="margin-bottom: var(--space-8);">
                    <h1 class="brand-font" style="font-size: 32px; color: var(--color-deep-navy);">My Assignments</h1>
                    <p style="color: var(--color-body-gray);">Written assignments and projects across all your courses.</p>
                </div>

                <!-- Filter Bar -->
                <div class="flex gap-3" style="margin-bottom: var(--space-6);">
                    <button class="btn btn-outline active-filter" onclick="filterAssignments(this,'all')" style="font-size:12px; border-color: var(--color-primary-portal); color: var(--color-primary-portal);">All</button>
                    <button class="btn btn-outline" onclick="filterAssignments(this,'pending')" style="font-size:12px;">Pending</button>
                    <button class="btn btn-outline" onclick="filterAssignments(this,'submitted')" style="font-size:12px;">Submitted</button>
                    <button class="btn btn-outline" onclick="filterAssignments(this,'graded')" style="font-size:12px;">Graded</button>
                </div>

                <!-- Assignment Cards -->
                <div style="display: grid; gap: var(--space-4);">

                    <!-- Pending assignment -->
                    <div class="card" data-status="pending" style="border-left: 4px solid #d97706;">
                        <div class="flex justify-between items-start">
                            <div style="flex: 1;">
                                <div style="font-size: 11px; font-weight: 700; color: var(--color-primary-portal); text-transform: uppercase; margin-bottom: 4px;">Hanafi Fiqh — Fundamentals</div>
                                <h3 style="font-family:'Inter'; font-size: 17px; font-weight: 700; margin-bottom: 6px;">Essay on Taharah</h3>
                                <p style="font-size: 13px; color: var(--color-body-gray); margin-bottom: 12px;">Write a 500-word essay explaining the concept of Taharah and its importance in Islamic worship according to the Hanafi school.</p>
                                <div class="flex gap-4" style="font-size: 12px; color: var(--color-body-gray);">
                                    <span><i data-lucide="calendar" style="width:13px; vertical-align:middle; margin-right:3px;"></i>Due: March 20, 2026</span>
                                    <span><i data-lucide="star" style="width:13px; vertical-align:middle; margin-right:3px;"></i>20 pts</span>
                                    <span><i data-lucide="file-text" style="width:13px; vertical-align:middle; margin-right:3px;"></i>Written submission</span>
                                </div>
                            </div>
                            <div style="text-align: right; flex-shrink: 0; margin-left: var(--space-6);">
                                <span class="status-pill" style="background:#fef3c7; color:#d97706; margin-bottom: 12px; display:inline-block;">Due Soon</span>
                                <br>
                                <button class="btn btn-primary" style="font-size: 12px; background: var(--color-primary-portal);" onclick="openSubmitModal('Essay on Taharah')">Submit Work</button>
                            </div>
                        </div>
                    </div>

                    <!-- Graded assignment -->
                    <div class="card" data-status="graded" style="border-left: 4px solid #16a34a;">
                        <div class="flex justify-between items-start">
                            <div style="flex: 1;">
                                <div style="font-size: 11px; font-weight: 700; color: var(--color-primary-portal); text-transform: uppercase; margin-bottom: 4px;">Hanafi Fiqh — Fundamentals</div>
                                <h3 style="font-family:'Inter'; font-size: 17px; font-weight: 700; margin-bottom: 6px;">Assignment 1: Fiqh Concepts Summary</h3>
                                <p style="font-size: 13px; color: var(--color-body-gray); margin-bottom: 12px;">Summarise the key definitions covered in Lessons 1–2: fiqh, ijtihad, madhhab, and taqlid.</p>
                                <div class="flex gap-4" style="font-size: 12px; color: var(--color-body-gray);">
                                    <span><i data-lucide="calendar" style="width:13px; vertical-align:middle; margin-right:3px;"></i>Submitted: Mar 5, 2026</span>
                                    <span><i data-lucide="star" style="width:13px; vertical-align:middle; margin-right:3px;"></i>20 pts</span>
                                </div>
                            </div>
                            <div style="text-align: right; flex-shrink: 0; margin-left: var(--space-6);">
                                <span class="status-pill" style="background:#dcfce7; color:#166534; margin-bottom: 8px; display:inline-block;">Graded</span>
                                <div style="font-size: 22px; font-weight: 800; color: #16a34a;">20 / 20</div>
                                <div style="font-size: 11px; color: var(--color-body-gray);">100% · A+</div>
                                <button class="btn btn-outline" style="font-size: 11px; margin-top: 8px; border-color: var(--color-primary-portal); color: var(--color-primary-portal);" onclick="portalToast('Feedback: Excellent work — thorough and well-structured.')">View Feedback</button>
                            </div>
                        </div>
                    </div>

                    <!-- Upcoming assignment -->
                    <div class="card" data-status="pending" style="border-left: 4px solid var(--color-mid-gray);">
                        <div class="flex justify-between items-start">
                            <div style="flex: 1;">
                                <div style="font-size: 11px; font-weight: 700; color: var(--color-primary-portal); text-transform: uppercase; margin-bottom: 4px;">Arabic Grammar — Level 2</div>
                                <h3 style="font-family:'Inter'; font-size: 17px; font-weight: 700; margin-bottom: 6px;">Sentence Analysis: Al-Baqarah Excerpt</h3>
                                <p style="font-size: 13px; color: var(--color-body-gray); margin-bottom: 12px;">Perform a full grammatical (i'rab) analysis of the assigned Quranic excerpt, identifying all nouns, verbs, and particles.</p>
                                <div class="flex gap-4" style="font-size: 12px; color: var(--color-body-gray);">
                                    <span><i data-lucide="calendar" style="width:13px; vertical-align:middle; margin-right:3px;"></i>Due: April 1, 2026</span>
                                    <span><i data-lucide="star" style="width:13px; vertical-align:middle; margin-right:3px;"></i>25 pts</span>
                                    <span><i data-lucide="file-text" style="width:13px; vertical-align:middle; margin-right:3px;"></i>Written submission</span>
                                </div>
                            </div>
                            <div style="text-align: right; flex-shrink: 0; margin-left: var(--space-6);">
                                <span class="status-pill status-pending" style="margin-bottom: 12px; display:inline-block;">Upcoming</span>
                                <br>
                                <button class="btn btn-outline" style="font-size: 12px;" disabled>Not Yet Open</button>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Submit Assignment Modal -->
            <div id="modal-submit-assignment" class="modal-overlay" onclick="if(event.target===this)closeSubmitModal()">
                <div class="modal" style="max-width:520px;">
                    <div class="modal-header">
                        <h2 id="submit-modal-title">Submit Assignment</h2>
                        <button class="modal-close" onclick="closeSubmitModal()">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group" style="margin-bottom: var(--space-4);">
                            <label>Your Response</label>
                            <textarea rows="8" placeholder="Type your essay or written response here..." style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit; resize:vertical;"></textarea>
                        </div>
                        <div class="form-group" style="margin-bottom: var(--space-4);">
                            <label>Attach File (optional)</label>
                            <div style="border:2px dashed var(--color-mid-gray); border-radius:8px; padding:20px; text-align:center; color: var(--color-body-gray); font-size:13px; cursor:pointer;" onclick="portalToast('File picker opened')">
                                <i data-lucide="upload-cloud" style="width:24px; display:block; margin:0 auto 8px;"></i>
                                Click to upload PDF, Word, or image
                            </div>
                        </div>
                        <div style="font-size:12px; color: var(--color-body-gray); background: var(--color-light-gray); padding:10px; border-radius:8px;">
                            <strong>Note:</strong> Once submitted, your teacher will be notified and will grade your work. You can re-submit until the deadline.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline" onclick="closeSubmitModal()">Cancel</button>
                        <button class="btn btn-primary" style="background: var(--color-primary-portal);" onclick="submitAssignment()">Submit Assignment</button>
                    </div>
                </div>
            </div>

            <!-- View: Parent Dashboard -->
            <section id="view-parent-dashboard" class="content-view hidden">
                <div style="margin-bottom: var(--space-8);">
                    <h1 class="brand-font" style="font-size: 32px; color: var(--color-deep-navy);">The Ahmed Family</h1>
                    <p style="color: var(--color-body-gray);">Manage your children's enrollment and progress.</p>
                </div>

                <div class="flex gap-4" style="margin-bottom: var(--space-8);">
                    <div class="card active"
                        style="border: 2px solid var(--color-primary-portal); flex: 1; cursor: pointer;">
                        <div class="flex items-center gap-4">
                            <div
                                style="width: 48px; height: 48px; border-radius: 50%; background: var(--color-primary-portal); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                ZA</div>
                            <div>
                                <h4 style="font-family: 'Inter';">Zainab Ahmed</h4>
                                <p style="font-size: 12px; color: var(--color-body-gray);">Primary Student</p>
                            </div>
                        </div>
                    </div>
                    <div class="card"
                        style="border: 1px solid var(--color-mid-gray); flex: 1; cursor: pointer; opacity: 0.7;">
                        <div class="flex items-center gap-4">
                            <div
                                style="width: 48px; height: 48px; border-radius: 50%; background: var(--color-mid-gray); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                SA</div>
                            <div>
                                <h4 style="font-family: 'Inter';">Sara Ahmed</h4>
                                <p style="font-size: 12px; color: var(--color-body-gray);">Student</p>
                            </div>
                        </div>
                    </div>
                    <div class="card"
                        style="border: 1px dashed var(--color-primary-portal); flex: 1; cursor: pointer; display: flex; align-items: center; justify-content: center; color: var(--color-primary-portal); font-weight: 700;">
                        + Enroll Another Child
                    </div>
                </div>

                <div class="card">
                    <h3 class="brand-font" style="margin-bottom: var(--space-4);">Academic Progress: Zainab</h3>
                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-4);">
                        <div class="p-4"
                            style="background: var(--color-bg-portal); border-radius: 8px; text-align: center;">
                            <div style="font-size: 24px; font-weight: 700; color: var(--color-primary-portal);">94%
                            </div>
                            <div style="font-size: 11px; text-transform: uppercase; color: var(--color-body-gray);">
                                Attendance</div>
                        </div>
                        <div class="p-4"
                            style="background: var(--color-bg-portal); border-radius: 8px; text-align: center;">
                            <div style="font-size: 24px; font-weight: 700; color: var(--color-primary-portal);">8/8
                            </div>
                            <div style="font-size: 11px; text-transform: uppercase; color: var(--color-body-gray);">
                                Assignments</div>
                        </div>
                        <div class="p-4"
                            style="background: var(--color-bg-portal); border-radius: 8px; text-align: center;">
                            <div style="font-size: 24px; font-weight: 700; color: var(--color-primary-portal);">Pass
                            </div>
                            <div style="font-size: 11px; text-transform: uppercase; color: var(--color-body-gray);">
                                Current Status</div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- View: Grades -->
            <section id="view-grades" class="content-view hidden">
                <div style="margin-bottom: var(--space-8);">
                    <h1 class="brand-font" style="font-size: 32px; color: var(--color-deep-navy);">My Grades</h1>
                    <p style="color: var(--color-body-gray);">Track your academic performance and feedback.</p>
                </div>
                <div class="card" style="padding:0; overflow:hidden;">
                    <table class="data-table">
                        <thead>
                            <tr style="text-align: left; background: var(--color-blush);">
                                <th style="padding: 12px 16px;">Course</th>
                                <th style="padding: 12px 16px;">Assessment</th>
                                <th style="padding: 12px 16px;">Score</th>
                                <th style="padding: 12px 16px;">Out of</th>
                                <th style="padding: 12px 16px;">%</th>
                                <th style="padding: 12px 16px;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom: 1px solid var(--color-light-gray);">
                                <td style="padding: 12px 16px;">Hanafi Fiqh — Fundamentals</td>
                                <td style="padding: 12px 16px;">Quiz 1: Pillars of Salah</td>
                                <td style="padding: 12px 16px; font-weight: 700;">9</td>
                                <td style="padding: 12px 16px; color: var(--color-body-gray);">10</td>
                                <td style="padding: 12px 16px; font-weight: 700; color: #16a34a;">90%</td>
                                <td style="padding: 12px 16px;"><span class="badge badge-success">Passed</span></td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--color-light-gray);">
                                <td style="padding: 12px 16px;">Hanafi Fiqh — Fundamentals</td>
                                <td style="padding: 12px 16px;">Assignment 1: Fiqh Concepts</td>
                                <td style="padding: 12px 16px; font-weight: 700;">20</td>
                                <td style="padding: 12px 16px; color: var(--color-body-gray);">20</td>
                                <td style="padding: 12px 16px; font-weight: 700; color: #16a34a;">100%</td>
                                <td style="padding: 12px 16px;"><span class="badge badge-success">Excellent</span></td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--color-light-gray);">
                                <td style="padding: 12px 16px;">Arabic Grammar — Level 2</td>
                                <td style="padding: 12px 16px;">Quiz 2: Verb Conjugation</td>
                                <td style="padding: 12px 16px; font-weight: 700;">8</td>
                                <td style="padding: 12px 16px; color: var(--color-body-gray);">10</td>
                                <td style="padding: 12px 16px; font-weight: 700; color: #ca8a04;">80%</td>
                                <td style="padding: 12px 16px;"><span class="badge badge-info">Passed</span></td>
                            </tr>
                            <tr>
                                <td style="padding: 12px 16px;">Essay on Taharah</td>
                                <td style="padding: 12px 16px;">Assignment 2: Written Essay</td>
                                <td style="padding: 12px 16px; color: var(--color-body-gray);">—</td>
                                <td style="padding: 12px 16px; color: var(--color-body-gray);">20</td>
                                <td style="padding: 12px 16px; color: var(--color-body-gray);">—</td>
                                <td style="padding: 12px 16px;"><span class="badge badge-warning">Pending</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- View: Billing (Parent Household Ledger) -->
            <section id="view-billing" class="content-view hidden">
                <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                    <div>
                        <h1 class="brand-font" style="font-size: 32px; color: var(--color-deep-navy);">Household Billing</h1>
                        <p style="color: var(--color-body-gray);">Tuition, invoices, and payment history for the Ahmed Family.</p>
                    </div>
                    <button class="btn btn-outline" style="font-size:13px;" onclick="portalToast('Annual tax receipt downloaded')"><i data-lucide="download" style="width:14px;vertical-align:middle;margin-right:6px;"></i>Download Tax Receipt</button>
                </div>

                <!-- Enrollment payment state banner -->
                <div id="portal-billing-banner" style="background:linear-gradient(135deg,#f0fdfa,var(--color-blush));border-radius:12px;padding:16px 20px;margin-bottom:var(--space-6);display:flex;align-items:center;gap:16px;border:1px solid rgba(168,93,136,0.2);">
                    <div style="width:44px;height:44px;border-radius:50%;background:var(--color-primary-portal);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i data-lucide="shield-check" style="width:22px;color:white;"></i>
                    </div>
                    <div style="flex:1;">
                        <div style="font-weight:700;font-size:15px;color:var(--color-deep-navy);">Enrollment Status: <span style="color:#16a34a;">Active</span></div>
                        <div style="font-size:13px;color:var(--color-body-gray);margin-top:2px;">Full-time Islamic Theology · Next payment of <strong>$150.00</strong> due <strong>March 25, 2026</strong></div>
                    </div>
                    <button class="btn btn-primary" style="font-size:13px;background:var(--color-primary-portal);" onclick="openPortalPayModal()"><i data-lucide="credit-card" style="width:14px;vertical-align:middle;margin-right:6px;"></i>Pay Now</button>
                </div>

                <!-- Summary stats -->
                <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:var(--space-4);margin-bottom:var(--space-6);">
                    <div class="card" style="border-left:4px solid #16a34a;padding:14px 16px;">
                        <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.06em;color:var(--color-body-gray);margin-bottom:4px;">Paid This Year</div>
                        <div style="font-size:28px;font-weight:700;color:#16a34a;">$449.00</div>
                        <div style="font-size:11px;color:var(--color-body-gray);margin-top:2px;">2 invoices</div>
                    </div>
                    <div class="card" style="border-left:4px solid #d97706;padding:14px 16px;">
                        <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.06em;color:var(--color-body-gray);margin-bottom:4px;">Upcoming</div>
                        <div style="font-size:28px;font-weight:700;color:#d97706;">$150.00</div>
                        <div style="font-size:11px;color:var(--color-body-gray);margin-top:2px;">Due Mar 25</div>
                    </div>
                    <div class="card" style="border-left:4px solid var(--color-primary-portal);padding:14px 16px;">
                        <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.06em;color:var(--color-body-gray);margin-bottom:4px;">Donations (2026)</div>
                        <div style="font-size:28px;font-weight:700;color:var(--color-primary-portal);">$500.00</div>
                        <div style="font-size:11px;color:var(--color-body-gray);margin-top:2px;">Jazakumullah Khairan</div>
                    </div>
                </div>

                <!-- Invoice Table + Sidebar -->
                <div style="display:grid;grid-template-columns:1fr 280px;gap:var(--space-6);">
                    <div class="card" style="padding:0;overflow:hidden;">
                        <div style="padding:14px 20px;border-bottom:1px solid var(--color-light-gray);display:flex;justify-content:space-between;align-items:center;">
                            <h3 class="brand-font" style="font-size:18px;">Invoice History</h3>
                            <select style="padding:6px 10px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:12px;">
                                <option>All Students</option>
                                <option>Zainab Ahmed</option>
                                <option>Sara Ahmed</option>
                            </select>
                        </div>
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Invoice #</th>
                                    <th>Description</th>
                                    <th>Student</th>
                                    <th>Amount</th>
                                    <th>Due</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="font-weight:600;font-size:12px;color:var(--color-body-gray);">#INV-0091</td>
                                    <td>Fall Term Tuition — Installment 1</td>
                                    <td>Zainab Ahmed</td>
                                    <td style="font-weight:700;">$150.00</td>
                                    <td style="font-size:12px;color:var(--color-body-gray);">Mar 01</td>
                                    <td><span class="status-pill" style="background:#dcfce7;color:#166534;">Paid</span></td>
                                    <td><button class="btn btn-outline" style="font-size:11px;padding:3px 9px;" onclick="portalToast('Receipt for #INV-0091 downloaded')">Receipt</button></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:600;font-size:12px;color:var(--color-body-gray);">#INV-0083</td>
                                    <td>Arabic Foundations — Registration Fee</td>
                                    <td>Sara Ahmed</td>
                                    <td style="font-weight:700;">$299.00</td>
                                    <td style="font-size:12px;color:var(--color-body-gray);">Mar 01</td>
                                    <td><span class="status-pill" style="background:#dcfce7;color:#166534;">Paid</span></td>
                                    <td><button class="btn btn-outline" style="font-size:11px;padding:3px 9px;" onclick="portalToast('Receipt for #INV-0083 downloaded')">Receipt</button></td>
                                </tr>
                                <tr style="background:#fffbeb;">
                                    <td style="font-weight:600;font-size:12px;color:var(--color-body-gray);">#INV-0097</td>
                                    <td>Fall Term Tuition — Installment 2</td>
                                    <td>Zainab Ahmed</td>
                                    <td style="font-weight:700;">$150.00</td>
                                    <td style="font-size:12px;color:#d97706;font-weight:600;">Mar 25 ⟲</td>
                                    <td><span class="status-pill status-pending">Upcoming</span></td>
                                    <td><button class="btn btn-primary" style="font-size:11px;padding:3px 9px;background:var(--color-primary-portal);" onclick="openPortalPayModal()">Pay Early</button></td>
                                </tr>
                                <tr style="opacity:0.6;">
                                    <td style="font-weight:600;font-size:12px;color:var(--color-body-gray);">#INV-0102</td>
                                    <td>Fall Term Tuition — Installment 3</td>
                                    <td>Zainab Ahmed</td>
                                    <td style="font-weight:700;">$150.00</td>
                                    <td style="font-size:12px;color:var(--color-body-gray);">Apr 25</td>
                                    <td><span class="status-pill" style="background:#f3f4f6;color:#6b7280;">Scheduled</span></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Sidebar -->
                    <div style="display:flex;flex-direction:column;gap:var(--space-4);">
                        <!-- Payment method -->
                        <div class="card">
                            <h4 style="font-family:'Inter';font-weight:700;font-size:14px;margin-bottom:var(--space-3);">Payment Method</h4>
                            <div style="display:flex;align-items:center;gap:10px;padding:10px;background:var(--color-light-gray);border-radius:8px;font-size:13px;">
                                <i data-lucide="credit-card" style="width:18px;color:var(--color-primary-portal);"></i>
                                <div>
                                    <div style="font-weight:600;">Visa •••• 4242</div>
                                    <div style="font-size:11px;color:var(--color-body-gray);">Expires 08 / 2027</div>
                                </div>
                            </div>
                            <button class="btn btn-outline" style="width:100%;margin-top:10px;font-size:12px;padding:7px;" onclick="portalToast('Opening payment method settings…')">Update Card</button>
                        </div>
                        <!-- Auto-pay -->
                        <div class="card">
                            <div class="flex justify-between items-center" style="margin-bottom:8px;">
                                <h4 style="font-family:'Inter';font-weight:700;font-size:14px;">Auto-Pay</h4>
                                <div onclick="this.classList.toggle('off'); portalToast(this.classList.contains('off') ? 'Auto-pay disabled' : 'Auto-pay enabled')" style="width:42px;height:22px;border-radius:99px;background:var(--color-primary-portal);cursor:pointer;position:relative;transition:background 0.2s;" title="Toggle auto-pay">
                                    <div style="position:absolute;right:3px;top:3px;width:16px;height:16px;border-radius:50%;background:white;transition:transform 0.2s;"></div>
                                </div>
                            </div>
                            <p style="font-size:12px;color:var(--color-body-gray);">Next charge of $150.00 on March 25, 2026 via Visa •••• 4242.</p>
                        </div>
                        <!-- Donate -->
                        <div class="card" style="background:linear-gradient(135deg,var(--color-blush),#fdf4ff);">
                            <h4 class="brand-font" style="font-size:16px;margin-bottom:6px;">Make a Donation</h4>
                            <p style="font-size:12px;color:var(--color-body-gray);margin-bottom:var(--space-3);">Support our students and faculty with a sadaqah contribution.</p>
                            <div id="donate-presets" class="flex gap-2" style="margin-bottom:10px;flex-wrap:wrap;">
                                <button onclick="selectDonationAmount(this, 25)"  class="donate-preset-btn">$25</button>
                                <button onclick="selectDonationAmount(this, 50)"  class="donate-preset-btn">$50</button>
                                <button onclick="selectDonationAmount(this, 100)" class="donate-preset-btn donate-preset-selected">$100</button>
                                <button onclick="selectDonationAmount(this, 'custom')" class="donate-preset-btn" id="donate-custom-btn">Other</button>
                            </div>
                            <div id="donate-custom-wrap" style="display:none;margin-bottom:10px;">
                                <div style="position:relative;">
                                    <span style="position:absolute;left:10px;top:50%;transform:translateY(-50%);font-size:13px;font-weight:700;color:var(--color-primary-portal);">$</span>
                                    <input id="donate-custom-input" type="number" min="1" placeholder="Enter amount" oninput="updateDonateButton()"
                                        style="width:100%;padding:8px 12px 8px 22px;border:1px solid var(--color-primary-portal);border-radius:8px;font-size:13px;font-family:inherit;">
                                </div>
                            </div>
                            <button id="donate-submit-btn" class="btn" style="width:100%;background:var(--color-primary-portal);color:white;font-size:12px;padding:8px;" onclick="openDonateModal()">Donate $100</button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Pay Now Modal -->
            <div id="portal-pay-modal" class="modal-overlay" onclick="if(event.target===this) this.classList.remove('open')">
                <div class="modal" style="max-width:440px;">
                    <div class="modal-header">
                        <h2>Pay Invoice #INV-0097</h2>
                        <button class="modal-close" onclick="document.getElementById('portal-pay-modal').classList.remove('open')">×</button>
                    </div>
                    <div class="modal-body">
                        <div style="background:var(--color-light-gray);border-radius:8px;padding:14px 16px;margin-bottom:var(--space-4);">
                            <div class="flex justify-between" style="font-size:13px;margin-bottom:4px;"><span>Fall Term Tuition — Installment 2</span><span style="font-weight:700;">$150.00</span></div>
                            <div style="font-size:12px;color:var(--color-body-gray);">Zainab Ahmed · Due Mar 25, 2026</div>
                        </div>
                        <div class="form-group" style="margin-bottom:var(--space-4);">
                            <label>Pay With</label>
                            <select style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:14px;font-family:inherit;">
                                <option>Visa •••• 4242 (default)</option>
                                <option>Add new card</option>
                            </select>
                        </div>
                        <div style="background:#fffbeb;border-radius:8px;padding:10px 14px;font-size:12px;color:#854d0e;margin-bottom:var(--space-4);">
                            <strong>You are paying 10 days early.</strong> Your next installment will remain scheduled for April 25, 2026.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline" onclick="document.getElementById('portal-pay-modal').classList.remove('open')">Cancel</button>
                        <button class="btn btn-primary" style="background:var(--color-primary-portal);" onclick="document.getElementById('portal-pay-modal').classList.remove('open'); portalToast('Payment of $150.00 processed — receipt sent to email')">Confirm Payment · $150.00</button>
                    </div>
                </div>
            </div>
            <!-- Donate Modal -->
            <div id="portal-donate-modal" class="modal-overlay" onclick="if(event.target===this) this.classList.remove('open')">
                <div class="modal" style="max-width:420px;">
                    <div class="modal-header">
                        <h2>Confirm Donation</h2>
                        <button class="modal-close" onclick="document.getElementById('portal-donate-modal').classList.remove('open')">×</button>
                    </div>
                    <div class="modal-body">
                        <div style="text-align:center;margin-bottom:var(--space-4);">
                            <div style="width:56px;height:56px;border-radius:50%;background:linear-gradient(135deg,var(--color-blush),#fdf4ff);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;">
                                <i data-lucide="heart" style="width:24px;color:var(--color-primary-portal);"></i>
                            </div>
                            <div style="font-size:36px;font-weight:800;color:var(--color-deep-navy);" id="donate-modal-amount">$100</div>
                            <div style="font-size:13px;color:var(--color-body-gray);margin-top:4px;">Sadaqah to Zainab Center</div>
                        </div>
                        <div style="background:var(--color-light-gray);border-radius:8px;padding:12px 16px;margin-bottom:var(--space-3);">
                            <div class="flex justify-between" style="font-size:13px;margin-bottom:6px;">
                                <span style="color:var(--color-body-gray);">Payment method</span>
                                <span style="font-weight:600;">Visa •••• 4242</span>
                            </div>
                            <div class="flex justify-between" style="font-size:13px;">
                                <span style="color:var(--color-body-gray);">Category</span>
                                <span style="font-weight:600;">General Sadaqah</span>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom:0;">
                            <label>Designate this gift (optional)</label>
                            <select style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:14px;font-family:inherit;">
                                <option>General Sadaqah</option>
                                <option>Student Scholarship Fund</option>
                                <option>Teacher Support</option>
                                <option>Zakat (Eligible Recipients)</option>
                                <option>Building Fund</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline" onclick="document.getElementById('portal-donate-modal').classList.remove('open')">Cancel</button>
                        <button class="btn btn-primary" id="donate-modal-confirm-btn" style="background:var(--color-primary-portal);" onclick="confirmDonation()">Donate $100</button>
                    </div>
                </div>
            </div>

            <!-- View: Schedule -->
            <section id="view-schedule" class="content-view hidden">
                <div style="margin-bottom: var(--space-8);">
                    <h1 class="brand-font" style="font-size: 32px; color: var(--color-deep-navy);">My Schedule</h1>
                    <p style="color: var(--color-body-gray);">Week of March 15 – 21, 2026</p>
                </div>
                <div class="card" style="padding:0; overflow:hidden;">
                    <div style="display:grid; grid-template-columns: 60px repeat(7,1fr); background: var(--color-deep-navy); color:white; font-size:12px; font-weight:700;">
                        <div style="padding:12px;"></div>
                        <div style="padding:12px; text-align:center;">SUN<br><span style="font-weight:400; opacity:0.7;">15</span></div>
                        <div style="padding:12px; text-align:center;">MON<br><span style="font-weight:400; opacity:0.7;">16</span></div>
                        <div style="padding:12px; text-align:center; background:rgba(168,93,136,0.4);">TUE<br><span style="font-weight:400; opacity:0.7;">17</span></div>
                        <div style="padding:12px; text-align:center;">WED<br><span style="font-weight:400; opacity:0.7;">18</span></div>
                        <div style="padding:12px; text-align:center; background:rgba(168,93,136,0.4);">THU<br><span style="font-weight:400; opacity:0.7;">19</span></div>
                        <div style="padding:12px; text-align:center;">FRI<br><span style="font-weight:400; opacity:0.7;">20</span></div>
                        <div style="padding:12px; text-align:center;">SAT<br><span style="font-weight:400; opacity:0.7;">21</span></div>
                    </div>
                    <!-- Time slots: Hanafi Fiqh = Sun/Thu 9–10 PM | Arabic Grammar = Sun/Tue 7–8:30 PM -->
                    <div style="display:grid; grid-template-columns: 60px repeat(7,1fr);">
                        <!-- 6 PM row (empty buffer) -->
                        <div style="font-size:11px; color: var(--color-body-gray); padding:16px 8px 0; text-align:right; border-top:1px solid var(--color-light-gray);">6 PM</div>
                        <div style="border:1px solid var(--color-light-gray); min-height:50px;"></div>
                        <div style="border:1px solid var(--color-light-gray); min-height:50px;"></div>
                        <div style="border:1px solid var(--color-light-gray); min-height:50px;"></div>
                        <div style="border:1px solid var(--color-light-gray); min-height:50px;"></div>
                        <div style="border:1px solid var(--color-light-gray); min-height:50px;"></div>
                        <div style="border:1px solid var(--color-light-gray); min-height:50px;"></div>
                        <div style="border:1px solid var(--color-light-gray); min-height:50px;"></div>

                        <!-- 7 PM row: Arabic Grammar on Sun (15) and Tue (17) -->
                        <div style="font-size:11px; color: var(--color-body-gray); padding:16px 8px 0; text-align:right; border-top:1px solid var(--color-light-gray);">7 PM</div>
                        <div style="border:1px solid var(--color-light-gray); min-height:70px; padding:4px;">
                            <div style="background: rgba(168,93,136,0.15); border-left: 3px solid var(--color-primary-portal); border-radius:4px; padding:4px 6px; font-size:11px; color: var(--color-primary-portal); font-weight:700;">Arabic Grammar<br><span style="font-weight:400; color: var(--color-body-gray);">7–8:30 PM</span></div>
                        </div>
                        <div style="border:1px solid var(--color-light-gray); min-height:70px;"></div>
                        <div style="border:1px solid var(--color-light-gray); min-height:70px; padding:4px;">
                            <div style="background: rgba(168,93,136,0.15); border-left: 3px solid var(--color-primary-portal); border-radius:4px; padding:4px 6px; font-size:11px; color: var(--color-primary-portal); font-weight:700;">Arabic Grammar<br><span style="font-weight:400; color: var(--color-body-gray);">7–8:30 PM</span></div>
                        </div>
                        <div style="border:1px solid var(--color-light-gray); min-height:70px;"></div>
                        <div style="border:1px solid var(--color-light-gray); min-height:70px;"></div>
                        <div style="border:1px solid var(--color-light-gray); min-height:70px;"></div>
                        <div style="border:1px solid var(--color-light-gray); min-height:70px;"></div>

                        <!-- 8 PM row (buffer) -->
                        <div style="font-size:11px; color: var(--color-body-gray); padding:16px 8px 0; text-align:right; border-top:1px solid var(--color-light-gray);">8 PM</div>
                        <div style="border:1px solid var(--color-light-gray); min-height:50px;"></div>
                        <div style="border:1px solid var(--color-light-gray); min-height:50px;"></div>
                        <div style="border:1px solid var(--color-light-gray); min-height:50px;"></div>
                        <div style="border:1px solid var(--color-light-gray); min-height:50px;"></div>
                        <div style="border:1px solid var(--color-light-gray); min-height:50px;"></div>
                        <div style="border:1px solid var(--color-light-gray); min-height:50px;"></div>
                        <div style="border:1px solid var(--color-light-gray); min-height:50px;"></div>

                        <!-- 9 PM row: Hanafi Fiqh on Sun (15) and Thu (19) -->
                        <div style="font-size:11px; color: var(--color-body-gray); padding:16px 8px 0; text-align:right; border-top:1px solid var(--color-light-gray);">9 PM</div>
                        <div style="border:1px solid var(--color-light-gray); min-height:70px; padding:4px;">
                            <div style="background: rgba(27,107,114,0.1); border-left: 3px solid var(--color-deep-teal); border-radius:4px; padding:4px 6px; font-size:11px; color: var(--color-deep-teal); font-weight:700;">Hanafi Fiqh<br><span style="font-weight:400; color: var(--color-body-gray);">9–10 PM</span></div>
                        </div>
                        <div style="border:1px solid var(--color-light-gray); min-height:70px;"></div>
                        <div style="border:1px solid var(--color-light-gray); min-height:70px;"></div>
                        <div style="border:1px solid var(--color-light-gray); min-height:70px;"></div>
                        <div style="border:1px solid var(--color-light-gray); min-height:70px; padding:4px;">
                            <div style="background: rgba(27,107,114,0.1); border-left: 3px solid var(--color-deep-teal); border-radius:4px; padding:4px 6px; font-size:11px; color: var(--color-deep-teal); font-weight:700;">Hanafi Fiqh<br><span style="font-weight:400; color: var(--color-body-gray);">9–10 PM</span></div>
                        </div>
                        <div style="border:1px solid var(--color-light-gray); min-height:70px;"></div>
                        <div style="border:1px solid var(--color-light-gray); min-height:70px;"></div>
                    </div>
                </div>
            </section>

            <!-- View: Transcript -->
            <section id="view-transcript" class="content-view hidden">
                <div style="margin-bottom: var(--space-8);">
                    <h1 class="brand-font" style="font-size: 32px; color: var(--color-deep-navy);">My Transcript</h1>
                    <p style="color: var(--color-body-gray);">Academic record for completed programs. Transcript is scoped per program.</p>
                </div>

                <!-- Completed Program -->
                <div class="card" style="border-top: 4px solid var(--color-primary-portal);">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-4);">
                        <div>
                            <h3 class="brand-font" style="font-size:20px;">Arabic Language — Foundations</h3>
                            <p style="font-size:13px; color: var(--color-body-gray); margin-top:4px;">Term: Fall 2025 · Instructor: Ustadh Tariq · Status: <span style="color:#059669; font-weight:700;">Completed</span></p>
                        </div>
                        <button class="btn btn-primary" style="background: var(--color-primary-portal);">
                            <i data-lucide="download" style="width:14px; vertical-align:middle; margin-right:6px;"></i>Download PDF
                        </button>
                    </div>
                    <table style="width:100%; border-collapse:collapse; font-size:13px; margin-bottom: var(--space-4);">
                        <thead>
                            <tr style="background: var(--color-blush); color: var(--color-deep-navy);">
                                <th style="padding:10px 16px; text-align:left;">Assessment</th>
                                <th style="padding:10px; text-align:center;">Type</th>
                                <th style="padding:10px; text-align:center;">Score</th>
                                <th style="padding:10px; text-align:center;">Max</th>
                                <th style="padding:10px; text-align:center;">Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom:1px solid var(--color-light-gray);">
                                <td style="padding:10px 16px;">Module 1 Quiz — Introduction to Arabic</td>
                                <td style="padding:10px; text-align:center;"><span class="badge badge-info">Quiz</span></td>
                                <td style="padding:10px; text-align:center; font-weight:700;">9</td>
                                <td style="padding:10px; text-align:center; color: var(--color-body-gray);">10</td>
                                <td style="padding:10px; text-align:center;"><span class="badge badge-success">A</span></td>
                            </tr>
                            <tr style="border-bottom:1px solid var(--color-light-gray);">
                                <td style="padding:10px 16px;">Assignment 1 — Nahw Exercises</td>
                                <td style="padding:10px; text-align:center;"><span class="badge badge-warning">HW</span></td>
                                <td style="padding:10px; text-align:center; font-weight:700;">18</td>
                                <td style="padding:10px; text-align:center; color: var(--color-body-gray);">20</td>
                                <td style="padding:10px; text-align:center;"><span class="badge badge-success">A-</span></td>
                            </tr>
                            <tr style="border-bottom:1px solid var(--color-light-gray);">
                                <td style="padding:10px 16px;">Module 2 Quiz — Morphology</td>
                                <td style="padding:10px; text-align:center;"><span class="badge badge-info">Quiz</span></td>
                                <td style="padding:10px; text-align:center; font-weight:700;">8</td>
                                <td style="padding:10px; text-align:center; color: var(--color-body-gray);">10</td>
                                <td style="padding:10px; text-align:center;"><span class="badge badge-success">B+</span></td>
                            </tr>
                            <tr style="background: var(--color-blush);">
                                <td style="padding:10px 16px; font-weight:700;">Final Grade</td>
                                <td colspan="2" style="padding:10px;"></td>
                                <td style="padding:10px;"></td>
                                <td style="padding:10px; text-align:center; font-size:16px; font-weight:900; color: var(--color-primary-portal);">A–</td>
                            </tr>
                        </tbody>
                    </table>
                    <p style="font-size:12px; color: var(--color-body-gray); padding: 0 4px;">Certificate of Completion issued on December 15, 2025.</p>
                </div>

                <!-- In-progress note -->
                <div class="card" style="background: var(--color-warm-ivory); border: 1px dashed var(--color-mid-gray);">
                    <p style="font-size:13px; color: var(--color-body-gray); text-align:center;">
                        <i data-lucide="clock" style="width:14px; vertical-align:middle; margin-right:4px;"></i>
                        Transcripts for <strong>Hanafi Fiqh</strong> will be available upon program completion.
                    </p>
                </div>
            </section>

            <!-- View: Notifications -->
            <section id="view-portal-notifications" class="content-view hidden">
                <div style="margin-bottom: var(--space-8);">
                    <div class="flex justify-between items-center">
                        <h1 class="brand-font" style="font-size: 32px; color: var(--color-deep-navy);">Notifications</h1>
                        <button class="btn btn-outline" style="font-size:12px; border-color: var(--color-primary-portal); color: var(--color-primary-portal);">Mark all read</button>
                    </div>
                </div>
                <div style="display:grid; gap: var(--space-3);">
                    <!-- Unread -->
                    <div class="card flex gap-4" style="border-left: 4px solid var(--color-primary-portal); background: var(--color-blush);">
                        <div style="min-width:40px; height:40px; border-radius:50%; background: var(--color-primary-portal); color:white; display:flex; align-items:center; justify-content:center;">
                            <i data-lucide="award" style="width:18px;"></i>
                        </div>
                        <div style="flex:1;">
                            <div class="flex justify-between">
                                <h4 style="font-family:'Inter'; font-size:14px;">Quiz Graded: Pillars of Salah</h4>
                                <span style="font-size:11px; color: var(--color-body-gray);">Just now</span>
                            </div>
                            <p style="font-size:13px; color: var(--color-body-gray); margin-top:4px;">Your score: <strong>90%</strong>. Feedback from Ustadha K. Nour is available.</p>
                        </div>
                        <div style="width:8px; height:8px; border-radius:50%; background: var(--color-primary-portal); margin-top:6px; flex-shrink:0;"></div>
                    </div>
                    <div class="card flex gap-4" style="border-left: 4px solid var(--color-deep-teal); background: rgba(27,107,114,0.04);">
                        <div style="min-width:40px; height:40px; border-radius:50%; background: rgba(27,107,114,0.15); color: var(--color-deep-teal); display:flex; align-items:center; justify-content:center;">
                            <i data-lucide="play" style="width:18px;"></i>
                        </div>
                        <div style="flex:1;">
                            <div class="flex justify-between">
                                <h4 style="font-family:'Inter'; font-size:14px;">New Lesson: Taharah — Part 3</h4>
                                <span style="font-size:11px; color: var(--color-body-gray);">2 hours ago</span>
                            </div>
                            <p style="font-size:13px; color: var(--color-body-gray); margin-top:4px;">Ustadha K. Nour published a new video in Hanafi Fiqh.</p>
                        </div>
                        <div style="width:8px; height:8px; border-radius:50%; background: var(--color-deep-teal); margin-top:6px; flex-shrink:0;"></div>
                    </div>
                    <!-- Read -->
                    <div class="card flex gap-4">
                        <div style="min-width:40px; height:40px; border-radius:50%; background: var(--color-light-gray); color: var(--color-body-gray); display:flex; align-items:center; justify-content:center;">
                            <i data-lucide="credit-card" style="width:18px;"></i>
                        </div>
                        <div style="flex:1;">
                            <div class="flex justify-between">
                                <h4 style="font-family:'Inter'; font-size:14px; color: var(--color-body-gray);">Payment Reminder</h4>
                                <span style="font-size:11px; color: var(--color-mid-gray);">Mar 12</span>
                            </div>
                            <p style="font-size:13px; color: var(--color-body-gray); margin-top:4px;">Your next installment of $150 is due on March 25, 2026.</p>
                        </div>
                    </div>
                    <div class="card flex gap-4">
                        <div style="min-width:40px; height:40px; border-radius:50%; background: var(--color-light-gray); color: var(--color-body-gray); display:flex; align-items:center; justify-content:center;">
                            <i data-lucide="megaphone" style="width:18px;"></i>
                        </div>
                        <div style="flex:1;">
                            <div class="flex justify-between">
                                <h4 style="font-family:'Inter'; font-size:14px; color: var(--color-body-gray);">Announcement: Ramadan Break</h4>
                                <span style="font-size:11px; color: var(--color-mid-gray);">Mar 10</span>
                            </div>
                            <p style="font-size:13px; color: var(--color-body-gray); margin-top:4px;">Classes will resume on April 14 after the Ramadan break. Ramadan Mubarak!</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- View: Profile / Settings -->
            <section id="view-profile" class="content-view hidden">
                <div style="margin-bottom: var(--space-8);">
                    <h1 class="brand-font" style="font-size: 32px; color: var(--color-deep-navy);">My Profile</h1>
                    <p style="color: var(--color-body-gray);">Manage your personal information and account settings.</p>
                </div>
                <div style="display:grid; grid-template-columns: 1fr 300px; gap: var(--space-8);">
                    <div>
                        <div class="card">
                            <h3 class="brand-font" style="margin-bottom: var(--space-6);">Personal Information</h3>
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:var(--space-4);">
                                <div>
                                    <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">First Name</label>
                                    <input type="text" value="Zainab" style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                </div>
                                <div>
                                    <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Last Name</label>
                                    <input type="text" value="Ahmed" style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                </div>
                                <div>
                                    <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Email Address</label>
                                    <input type="email" value="zainab@email.com" style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                </div>
                                <div>
                                    <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Phone</label>
                                    <input type="tel" value="+1 (416) 555-0123" style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                </div>
                            </div>
                            <button class="btn btn-primary" style="background: var(--color-primary-portal); margin-top: var(--space-6);">Save Changes</button>
                        </div>

                        <div class="card" style="margin-top: var(--space-6);">
                            <h3 class="brand-font" style="margin-bottom: var(--space-4);">Notification Preferences</h3>
                            <div style="display:grid; gap:var(--space-3);">
                                <div class="flex justify-between items-center p-3" style="background: var(--color-warm-ivory); border-radius:8px;">
                                    <div>
                                        <div style="font-size:13px; font-weight:700;">Grade notifications</div>
                                        <div style="font-size:11px; color: var(--color-body-gray);">When a quiz or assignment is graded</div>
                                    </div>
                                    <div style="width:44px; height:24px; background: var(--color-primary-portal); border-radius:12px; cursor:pointer; position:relative; flex-shrink:0;">
                                        <div style="width:18px; height:18px; background:white; border-radius:50%; position:absolute; top:3px; right:3px;"></div>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center p-3" style="background: var(--color-warm-ivory); border-radius:8px;">
                                    <div>
                                        <div style="font-size:13px; font-weight:700;">New lesson published</div>
                                        <div style="font-size:11px; color: var(--color-body-gray);">When a teacher publishes a new lesson</div>
                                    </div>
                                    <div style="width:44px; height:24px; background: var(--color-primary-portal); border-radius:12px; cursor:pointer; position:relative; flex-shrink:0;">
                                        <div style="width:18px; height:18px; background:white; border-radius:50%; position:absolute; top:3px; right:3px;"></div>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center p-3" style="background: var(--color-warm-ivory); border-radius:8px;">
                                    <div>
                                        <div style="font-size:13px; font-weight:700;">Payment reminders</div>
                                        <div style="font-size:11px; color: var(--color-body-gray);">3 days before a payment is due</div>
                                    </div>
                                    <div style="width:44px; height:24px; background: var(--color-primary-portal); border-radius:12px; cursor:pointer; position:relative; flex-shrink:0;">
                                        <div style="width:18px; height:18px; background:white; border-radius:50%; position:absolute; top:3px; right:3px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="card" style="text-align:center;">
                            <div style="width:80px; height:80px; border-radius:50%; background: var(--color-primary-portal); color:white; display:flex; align-items:center; justify-content:center; font-size:28px; font-weight:700; margin: 0 auto var(--space-4);">ZA</div>
                            <h3 style="font-family:'Inter'; font-size:16px; font-weight:700;">Zainab Ahmed</h3>
                            <p style="font-size:12px; color: var(--color-body-gray); margin-top:4px;">Student</p>
                            <span class="badge badge-success" style="margin-top:8px;">Active Enrollment</span>
                            <div style="margin-top: var(--space-4); padding-top: var(--space-4); border-top: 1px solid var(--color-light-gray); text-align:left;">
                                <div style="font-size:12px; color: var(--color-body-gray); margin-bottom:8px;">Member since: Sep 2025</div>
                                <div style="font-size:12px; color: var(--color-body-gray); margin-bottom:8px;">Programs: 2 active</div>
                                <div style="font-size:12px; color: var(--color-body-gray);">Account type: <strong>Student</strong></div>
                            </div>
                        </div>
                        <div class="card" style="margin-top: var(--space-4);">
                            <h4 class="brand-font" style="margin-bottom: var(--space-3);">Account Security</h4>
                            <p style="font-size:12px; color: var(--color-body-gray); margin-bottom: var(--space-3);">This account uses magic link login. No password required.</p>
                            <button class="btn btn-outline" style="width:100%; font-size:12px; border-color: var(--color-primary-portal); color: var(--color-primary-portal);">Send Login Link to Email</button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- View: Resume Enrollment (deep link landing) -->
            <section id="view-resume-enrollment" class="content-view hidden">
                <div style="max-width:560px; margin: var(--space-12) auto; text-align:center;">
                    <div style="width:80px; height:80px; border-radius:50%; background: var(--color-blush); display:flex; align-items:center; justify-content:center; margin:0 auto var(--space-6);">
                        <i data-lucide="rotate-ccw" style="width:36px; height:36px; color: var(--color-primary-portal);"></i>
                    </div>
                    <h1 class="brand-font" style="font-size:28px; color: var(--color-deep-navy); margin-bottom: var(--space-3);">Resume Your Enrollment</h1>
                    <p style="color: var(--color-body-gray); margin-bottom: var(--space-8);">You previously started an enrollment for <strong>Islamic Theology</strong> but didn't complete it. Pick up right where you left off — your progress has been saved.</p>
                    <div class="card" style="text-align:left; margin-bottom: var(--space-6);">
                        <div class="flex justify-between items-center">
                            <div>
                                <div style="font-size:13px; color: var(--color-body-gray);">Program</div>
                                <div style="font-size:16px; font-weight:700; margin-top:2px;">Islamic Theology</div>
                            </div>
                            <span class="badge badge-warning">Step 3 of 5</span>
                        </div>
                        <div style="margin-top: var(--space-4); height:6px; background: var(--color-light-gray); border-radius:3px; overflow:hidden;">
                            <div style="width:60%; height:100%; background: var(--color-primary-portal);"></div>
                        </div>
                        <div style="font-size:11px; text-align:right; margin-top:4px; color: var(--color-body-gray);">Profile step remaining</div>
                    </div>
                    <button class="btn btn-primary" style="width:100%; padding:14px; font-size:15px; background: var(--color-primary-portal);"
                        onclick="window.location.href='public_enroll.html#step3'">Continue Enrollment →</button>
                    <p style="font-size:12px; color: var(--color-body-gray); margin-top: var(--space-4);">Questions? <a href="#" style="color: var(--color-primary-portal);">Contact us</a></p>
                </div>
            </section>

        </main>
    </div>


    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        lucide.createIcons();
        function portalToast(msg) {
            const toast = document.getElementById('toast');
            const toastMsg = document.getElementById('toast-msg');
            if (!toast || !toastMsg) return;
            toastMsg.textContent = msg;
            toast.classList.add('show');
            setTimeout(() => toast.classList.remove('show'), 3000);
        }

        function openPortalPayModal() {
            const m = document.getElementById('portal-pay-modal');
            if (m) { m.classList.add('open'); document.body.style.overflow = 'hidden'; }
        }

        /* ── Donation logic ── */
        let _donationAmount = 100; // default

        function selectDonationAmount(btn, amount) {
            // Deselect all presets via CSS class
            document.querySelectorAll('.donate-preset-btn').forEach(b => {
                b.classList.remove('donate-preset-selected');
            });
            // Select this one via CSS class
            btn.classList.add('donate-preset-selected');

            const customWrap = document.getElementById('donate-custom-wrap');
            if (amount === 'custom') {
                customWrap.style.display = 'block';
                const val = parseFloat(document.getElementById('donate-custom-input').value);
                _donationAmount = (val && val > 0) ? val : null;
            } else {
                customWrap.style.display = 'none';
                _donationAmount = amount;
            }
            updateDonateButton();
        }

        function updateDonateButton() {
            const customVal = parseFloat(document.getElementById('donate-custom-input').value);
            if (customVal && customVal > 0) _donationAmount = customVal;
            const btn = document.getElementById('donate-submit-btn');
            if (_donationAmount && _donationAmount > 0) {
                btn.textContent = 'Donate $' + _donationAmount;
                btn.disabled = false;
                btn.style.opacity = '1';
            } else {
                btn.textContent = 'Enter an amount';
                btn.disabled = true;
                btn.style.opacity = '0.5';
            }
        }

        function openDonateModal() {
            if (!_donationAmount || _donationAmount <= 0) return;
            document.getElementById('donate-modal-amount').textContent = '$' + _donationAmount;
            document.getElementById('donate-modal-confirm-btn').textContent = 'Donate $' + _donationAmount;
            const m = document.getElementById('portal-donate-modal');
            if (m) { m.classList.add('open'); document.body.style.overflow = 'hidden'; }
        }

        function confirmDonation() {
            const m = document.getElementById('portal-donate-modal');
            if (m) { m.classList.remove('open'); document.body.style.overflow = ''; }
            portalToast('JazakAllah Khayran — $' + _donationAmount + ' donation received! Receipt sent to your email.');
            // Update the donations stat card
            const statEl = document.querySelector('#view-billing .card [style*="Donations"]');
        }

        function switchMode(mode) {
            const parentNav = document.getElementById('nav-parent-dashboard');
            const resumeNav = document.getElementById('nav-resume-enrollment');
            if (mode === 'parent') {
                if (parentNav) parentNav.style.display = '';
                window.location.hash = 'parent-dashboard';
            } else {
                window.location.hash = 'dashboard';
            }
        }

        function showResumeEnrollment() {
            const resumeNav = document.getElementById('nav-resume-enrollment');
            if (resumeNav) resumeNav.style.display = '';
            window.location.hash = 'resume-enrollment';
        }

        function goToQuiz() {
            window.location.hash = 'quizzes';
        }

        function openSubmitModal(assignmentTitle) {
            document.getElementById('submit-modal-title').textContent = 'Submit: ' + assignmentTitle;
            const m = document.getElementById('modal-submit-assignment');
            if (m) { m.style.display = 'flex'; document.body.style.overflow = 'hidden'; }
        }

        function closeSubmitModal() {
            const m = document.getElementById('modal-submit-assignment');
            if (m) { m.style.display = 'none'; document.body.style.overflow = ''; }
        }

        function submitAssignment() {
            closeSubmitModal();
            portalToast('Assignment submitted — your teacher has been notified.');
        }

        function filterAssignments(btn, status) {
            document.querySelectorAll('#view-assignments .btn').forEach(b => b.classList.remove('active-filter'));
            btn.classList.add('active-filter');
            btn.style.borderColor = 'var(--color-primary-portal)';
            btn.style.color = 'var(--color-primary-portal)';
            document.querySelectorAll('#view-assignments [data-status]').forEach(card => {
                card.style.display = (status === 'all' || card.dataset.status === status) ? '' : 'none';
            });
        }
    </script>

    <!-- Toast notification -->
    <div id="toast" class="toast">
        <span class="toast-icon"><i data-lucide="check-circle" style="width:16px;"></i></span>
        <span id="toast-msg"></span>
    </div>
</body>

</html>