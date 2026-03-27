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
    @livewireStyles
<body class="teacher">
    {{ $slot }}
    @livewireScripts
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
