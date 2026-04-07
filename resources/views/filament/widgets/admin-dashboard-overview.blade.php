<x-filament::widget>
    {{-- We will inject the HTML dashboard mockup styles and content here --}}
    <style>
        /* Dashboard Container Constraints */
        .custom-dash-wrapper {
            font-family: 'Inter', sans-serif;
            color: #1A2F4A;
        }

        .custom-dash-wrapper .card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            border: 1px solid #E5E7EB;
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
            border-left: 4px solid #1B6B72;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
            transition: transform 0.2s;
        }

        .custom-dash-wrapper .stat-card:hover {
            transform: translateY(-2px);
        }

        .custom-dash-wrapper .stat-label {
            font-size: 13px;
            font-weight: 600;
            color: #4B5563;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .custom-dash-wrapper .stat-value {
            font-size: 32px;
            font-weight: 800;
            color: #1A2F4A;
            margin-top: 8px;
            font-family: 'Playfair Display', serif;
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
            border: 1px solid #E5E7EB;
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
            border-color: #1B6B72;
            background: #f0fdfa;
        }

        .custom-dash-wrapper .action-card span {
            font-size: 11px;
            font-weight: 600;
            color: #4B5563;
        }

        .custom-dash-wrapper .flex { display: flex; }
        .custom-dash-wrapper .justify-between { justify-content: space-between; }
        .custom-dash-wrapper .items-center { align-items: center; }
        .custom-dash-wrapper .gap-4 { gap: 16px; }
        .custom-dash-wrapper .gap-6 { gap: 24px; }
    </style>

    <div class="custom-dash-wrapper">
        <div class="flex justify-between items-center" style="margin-bottom: 24px;">
            <div>
                <p style="color: #4B5563;">Welcome back, {{ auth()->user()->roles->pluck('name')->map(function($role) { return str($role)->replace('_', ' ')->title(); })->join(', ') }}.</p>
            </div>
        </div>

        <!-- Admin Profile Card -->
        <div class="card flex justify-between items-center">
            <div class="flex items-center gap-4">
                <div style="width: 64px; height: 64px; border-radius: 8px; background: #1B6B72; color: white; display: flex; align-items: center; justify-content: center; font-size: 24px; font-weight: bold;">
                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                </div>
                <div>
                    <h2 style="font-size: 20px; font-family: 'Inter'; font-weight: 700; margin:0;">{{ auth()->user()->name }}</h2>
                    <p style="color: #4B5563; font-size: 14px; margin:0;">System Administrator at Zainab Center</p>
                    <div class="flex gap-4" style="margin-top: 4px; font-size: 13px; color: #4B5563;">
                        <span>{{ auth()->user()->email }}</span>
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
                <div class="stat-value">{{ number_format($students) }}</div>
            </div>
            <div class="stat-card">
                <div class="flex justify-between items-start">
                    <span class="stat-label">Teachers</span>
                </div>
                <div class="stat-value">{{ number_format($teachers) }}</div>
            </div>
            <div class="stat-card" style="border-left-color: #C28E18;">
                <div class="flex justify-between items-start">
                    <span class="stat-label">Active Courses</span>
                </div>
                <div class="stat-value">{{ number_format($courses) }}</div>
            </div>
            <div class="stat-card" style="border-left-color: #A85D88;">
                <div class="flex justify-between items-start">
                    <span class="stat-label">Pending Apps</span>
                </div>
                <div class="stat-value" style="color: #A85D88;">{{ number_format($pending_apps) }}</div>
            </div>
        </div>

        <!-- Quick Actions Grid -->
        <h3 style="font-family: 'Playfair Display', serif; font-weight: 700; font-size: 16px; margin-bottom: 16px; margin-top: 32px;">⚡ Quick Actions</h3>
        <div class="quick-actions-grid">
            <a href="{{ \App\Filament\Resources\Enrollments\EnrollmentResource::getUrl('create') }}" class="action-card" style="text-decoration:none;">
                <div style="font-size:24px;">👤</div>
                <span>Enroll Student</span>
            </a>
            <a href="{{ \App\Filament\Resources\Teachers\TeacherResource::getUrl('create') }}" class="action-card" style="text-decoration:none;">
                <div style="font-size:24px;">👨‍🏫</div>
                <span>Add Teacher</span>
            </a>
            <a href="{{ \App\Filament\Resources\Courses\CourseResource::getUrl('create') }}" class="action-card" style="text-decoration:none;">
                <div style="font-size:24px;">📚</div>
                <span>Create Course</span>
            </a>
            <a href="{{ \App\Filament\Resources\Announcements\AnnouncementResource::getUrl('create') }}" class="action-card" style="text-decoration:none;">
                <div style="font-size:24px;">📢</div>
                <span>Announcement</span>
            </a>
            <a href="{{ \App\Filament\Resources\Courses\CourseResource::getUrl('index') }}" class="action-card" style="text-decoration:none;">
                <div style="font-size:24px;">✅</div>
                <span>Attendance</span>
            </a>
            <a href="{{ \App\Filament\Resources\Events\EventResource::getUrl('index') }}" class="action-card" style="text-decoration:none;">
                <div style="font-size:24px;">📅</div>
                <span>Calendar</span>
            </a>
            <a href="{{ url('/admin/reportings') }}" class="action-card" style="text-decoration:none;">
                <div style="font-size:24px;">📊</div>
                <span>Report</span>
            </a>
            <a href="{{ \App\Filament\Resources\Invoices\InvoiceResource::getUrl('index') }}" class="action-card" style="text-decoration:none;">
                <div style="font-size:24px;">💳</div>
                <span>Billing</span>
            </a>
        </div>
    </div>
</x-filament::widget>
