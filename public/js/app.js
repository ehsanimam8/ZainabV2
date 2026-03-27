/* =============================================
   ADMIN PANEL ROUTING  (index.html)
   ============================================= */
function initAdminRouting() {
    const viewMap = {
        'dashboard':     'view-dashboard',
        'admins':        'view-admins',
        'teachers':      'view-teachers',
        'students':      'view-students',
        'parents':       'view-parents',
        'enrollment':    'view-enrollment',
        'programs':      'view-programs',
        'courses':       'view-courses',
        'attendance':    'view-attendance',
        'lessons':       'view-lessons',
        'grades':        'view-grades',
        'calendar':      'view-calendar',
        'billing':       'view-billing',
        'crm':           'view-crm',
        'notifications': 'view-notifications',
        'announcements': 'view-communications',
        'communications':'view-communications',
        'reports':       'view-reports',
        'settings':      'view-settings',
        'crm-detail':       'view-crm',
        'crm-events':       'view-crm-events',
        'donations':        'view-donations',
        'cms-pages':        'view-cms-pages',
        'cms-posts':        'view-cms-posts',
        'cms-nav-builder':  'view-cms-nav-builder',
        'custom-fields':    'view-custom-fields',
        'quiz-builder':     'view-quiz-builder',
        'assignment-detail':'view-assignment-detail',
    };

    const breadcrumbLabels = {
        'dashboard':     'Home',
        'admins':        'People · Admin Users',
        'teachers':      'People · Teachers',
        'students':      'People · Students',
        'parents':       'People · Parent Households',
        'enrollment':    'Enrollment',
        'programs':      'Academic · Programs',
        'courses':       'Academic · Courses',
        'attendance':    'Academic · Attendance',
        'lessons':       'LMS · Lessons',
        'grades':        'LMS · Gradebook',
        'calendar':      'LMS · Calendar',
        'billing':       'Operations · Billing & Payments',
        'crm':           'Operations · CRM',
        'notifications': 'Operations · Notification Center',
        'announcements':    'Operations · Announcements',
        'crm-events':       'Operations · Events',
        'donations':        'Operations · Donations',
        'reports':          'Reports',
        'settings':         'Settings',
        'cms-pages':        'Content · Pages',
        'cms-posts':        'Content · Posts & Blog',
        'cms-nav-builder':  'Content · Navigation Builder',
        'custom-fields':    'Content · Custom Fields',
        'quiz-builder':     'LMS · Quiz Builder',
        'assignment-detail':'LMS · Assignment Detail',
    };

    // Collect all content-view section IDs
    const allViewIds = Object.values(viewMap).filter((v, i, a) => a.indexOf(v) === i);
    const dashboardInner = document.getElementById('dashboard-inner');

    function switchView(viewId) {
        const targetId = viewMap[viewId] || 'view-dashboard';

        // Hide every content-view section by ID using classList
        // (style.display cannot override .hidden { display:none !important })
        allViewIds.forEach(id => {
            const el = document.getElementById(id);
            if (el) el.classList.add('hidden');
        });

        // Handle dashboard's inner content separately
        if (dashboardInner) {
            dashboardInner.style.display = (viewId === 'dashboard') ? '' : 'none';
        }

        // Always show view-dashboard as the shell container (it wraps all views)
        const dashSection = document.getElementById('view-dashboard');
        if (dashSection) dashSection.classList.remove('hidden');

        // Show the target view
        const target = document.getElementById(targetId);
        if (target) target.classList.remove('hidden');

        // Breadcrumbs
        const bc = document.getElementById('breadcrumbs');
        if (bc) {
            const label = breadcrumbLabels[viewId] || viewId.replace(/-/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
            if (viewId === 'dashboard') {
                bc.innerHTML = `<span style="color:var(--color-deep-teal);font-weight:600;">Home</span>`;
            } else {
                bc.innerHTML = `<a href="#dashboard">Dashboard</a> <span class="separator">›</span> <span>${label}</span>`;
            }
        }

        // Update nav active state
        document.querySelectorAll('.nav-item[data-view]').forEach(item => {
            item.classList.toggle('active', item.dataset.view === viewId);
        });

        if (typeof lucide !== 'undefined') lucide.createIcons();

        // View-specific init hooks
        if (viewId === 'donations' && typeof loadDonationsView === 'function') {
            loadDonationsView();
        }
    }

    // Nav click handlers
    document.querySelectorAll('.nav-item[data-view]').forEach(item => {
        item.addEventListener('click', (e) => {
            const viewId = item.dataset.view;
            if (viewId) switchView(viewId);
        });
    });

    // Hash-based routing
    const initialView = window.location.hash ? window.location.hash.substring(1) : 'dashboard';
    switchView(initialView);

    window.addEventListener('hashchange', () => {
        switchView(window.location.hash.substring(1));
    });

    // People nav group open by default
    const peopleGroup = document.getElementById('nav-group-people');
    if (peopleGroup) peopleGroup.classList.add('open');
}


/* =============================================
   PORTAL ROUTING  (portal.html)
   ============================================= */
function initPortalRouting() {
    const portalViewMap = {
        'dashboard':             'view-dashboard',
        'courses':               'view-courses',
        'schedule':              'view-schedule',
        'quizzes':               'view-quizzes',
        'assignments':           'view-assignments',
        'grades':                'view-grades',
        'transcript':            'view-transcript',
        'portal-notifications':  'view-portal-notifications',
        'billing':               'view-billing',
        'profile':               'view-profile',
        'parent-dashboard':      'view-parent-dashboard',
        'resume-enrollment':     'view-resume-enrollment',
    };

    function switchPortalView(viewId) {
        const targetId = portalViewMap[viewId] || 'view-dashboard';
        document.querySelectorAll('.content-view').forEach(v => v.classList.add('hidden'));
        const target = document.getElementById(targetId);
        if (target) target.classList.remove('hidden');

        document.querySelectorAll('.nav-item[data-view]').forEach(item => {
            item.classList.toggle('active', item.dataset.view === viewId);
        });

        const bc = document.getElementById('breadcrumbs');
        if (bc && viewId !== 'dashboard') {
            const label = viewId.replace(/-/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
            bc.innerHTML = `<a href="#dashboard">Home</a> <span class="separator">›</span> <span>${label}</span>`;
        }

        if (typeof lucide !== 'undefined') lucide.createIcons();
    }

    document.querySelectorAll('.nav-item[data-view]').forEach(item => {
        item.addEventListener('click', () => {
            const viewId = item.dataset.view;
            if (viewId) switchPortalView(viewId);
        });
    });

    const hash = window.location.hash ? window.location.hash.substring(1) : 'dashboard';
    switchPortalView(hash);

    window.addEventListener('hashchange', () => {
        switchPortalView(window.location.hash.substring(1));
    });
}


/* =============================================
   BOOTSTRAP — detect which page and init
   ============================================= */
document.addEventListener('DOMContentLoaded', () => {
    if (document.body.classList.contains('portal')) {
        initPortalRouting();
    } else {
        initAdminRouting();
    }
});


/* =============================================
   SHARED UTILITIES
   ============================================= */
function showCRMDetail(name) {
    location.hash = 'crm';
}

function toggleNavGroup(groupId) {
    const group = document.getElementById('nav-group-' + groupId);
    if (!group) return;
    group.classList.toggle('open');
    if (typeof lucide !== 'undefined') lucide.createIcons();
}
