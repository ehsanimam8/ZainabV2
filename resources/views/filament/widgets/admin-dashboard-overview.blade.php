<x-filament::widget>
    {{-- We will inject the HTML dashboard mockup styles and content here --}}
    <style>
        :root {
            --color-deep-teal: #1B6B72;
            --color-deep-navy: #1A2F4A;
            --color-mauve-rose: #A85D88;
            --color-warm-ivory: #F8F7F4;
            --color-burnt-gold: #C28E18;
            --color-body-gray: #4B5563;
            --color-light-gray: #F3F4F6;
            --color-mid-gray: #E5E7EB;
            --space-2: 8px;
            --space-4: 16px;
            --space-6: 24px;
            --space-8: 32px;
        }
        
        /* Dashboard Container Constraints */
        .custom-dash-wrapper {
            font-family: 'Inter', sans-serif;
            background-color: var(--color-warm-ivory);
            padding: 24px;
            border-radius: 12px;
            color: var(--color-deep-navy);
        }

        .custom-dash-wrapper .card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            border: 1px solid var(--color-mid-gray);
        }

        .custom-dash-wrapper .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            margin-top: 24px;
        }

        .custom-dash-wrapper .stat-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            border-left: 4px solid var(--color-deep-teal);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
            transition: transform 0.2s;
        }

        .custom-dash-wrapper .stat-card:hover {
            transform: translateY(-2px);
        }

        .custom-dash-wrapper .stat-label {
            font-size: 13px;
            font-weight: 600;
            color: var(--color-body-gray);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .custom-dash-wrapper .stat-value {
            font-size: 32px;
            font-weight: 800;
            color: var(--color-deep-navy);
            margin-top: 8px;
            font-family: 'Inter';
        }

        .custom-dash-wrapper .quick-actions-grid {
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            gap: 16px;
        }

        .custom-dash-wrapper .action-card {
            background: white;
            padding: 16px 12px;
            border-radius: 12px;
            border: 1px solid var(--color-mid-gray);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            transition: all 0.2s;
            text-align: center;
        }

        .custom-dash-wrapper .action-card:hover {
            border-color: var(--color-deep-teal);
            background: #f0fdfa;
        }

        .custom-dash-wrapper .action-card span {
            font-size: 11px;
            font-weight: 600;
            color: var(--color-body-gray);
        }

        .custom-dash-wrapper .flex { display: flex; }
        .custom-dash-wrapper .justify-between { justify-content: space-between; }
        .custom-dash-wrapper .items-center { align-items: center; }
        .custom-dash-wrapper .gap-4 { gap: 16px; }
        .custom-dash-wrapper .gap-6 { gap: 24px; }
    </style>

    <div class="custom-dash-wrapper">
        <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
            <div>
                <h1 style="font-size: 28px; font-weight: 800; font-family: 'Inter';">Dashboard</h1>
                <p style="color: var(--color-body-gray);">Welcome back, Administrator.</p>
            </div>
        </div>

        <!-- Admin Profile Card -->
        <div class="card flex justify-between items-center">
            <div class="flex items-center gap-4">
                <div style="width: 64px; height: 64px; border-radius: 8px; background: var(--color-deep-teal); color: white; display: flex; align-items: center; justify-content: center; font-size: 24px; font-weight: bold;">
                    AD
                </div>
                <div>
                    <h2 style="font-size: 20px; font-family: 'Inter'; font-weight: 700; margin:0;">Admin User</h2>
                    <p style="color: var(--color-body-gray); font-size: 14px; margin:0;">Administrator at Zainab Center</p>
                    <div class="flex gap-4" style="margin-top: 4px; font-size: 13px; color: var(--color-body-gray);">
                        <span>admin@example.com</span>
                        <span>Main Campus</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Bar -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="flex justify-between items-start">
                    <span class="stat-label">Students</span>
                </div>
                <div class="stat-value">1,024</div>
            </div>
            <div class="stat-card">
                <div class="flex justify-between items-start">
                    <span class="stat-label">Teachers</span>
                </div>
                <div class="stat-value">48</div>
            </div>
            <div class="stat-card" style="border-left-color: var(--color-burnt-gold);">
                <div class="flex justify-between items-start">
                    <span class="stat-label">Active Courses</span>
                </div>
                <div class="stat-value">32</div>
            </div>
            <div class="stat-card" style="border-left-color: var(--color-mauve-rose);">
                <div class="flex justify-between items-start">
                    <span class="stat-label">Pending Apps</span>
                </div>
                <div class="stat-value" style="color: var(--color-mauve-rose);">12</div>
            </div>
        </div>

        <!-- Quick Actions Grid -->
        <h3 style="font-family: 'Inter'; font-weight: 700; font-size: 16px; margin-bottom: var(--space-4); margin-top: var(--space-8);">⚡ Quick Actions</h3>
        <div class="quick-actions-grid">
            <div class="action-card">
                <div style="font-size:24px;">👤</div>
                <span>Enroll Student</span>
            </div>
            <div class="action-card">
                <div style="font-size:24px;">👨‍🏫</div>
                <span>Add Teacher</span>
            </div>
            <div class="action-card">
                <div style="font-size:24px;">📚</div>
                <span>Create Course</span>
            </div>
            <div class="action-card">
                <div style="font-size:24px;">📢</div>
                <span>Announcement</span>
            </div>
            <div class="action-card">
                <div style="font-size:24px;">✅</div>
                <span>Attendance</span>
            </div>
            <div class="action-card">
                <div style="font-size:24px;">📅</div>
                <span>Calendar</span>
            </div>
            <div class="action-card">
                <div style="font-size:24px;">📊</div>
                <span>Report</span>
            </div>
            <div class="action-card">
                <div style="font-size:24px;">💳</div>
                <span>Billing</span>
            </div>
        </div>
    </div>
</x-filament::widget>
