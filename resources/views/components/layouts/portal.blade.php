<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zainab Center - Student Portal</title>
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
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
    @livewireStyles
</head>

<body class="portal">

    {{ $slot }}

    <script src="{{ asset("js/app.js") }}"></script>
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
    @livewireScripts
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('quiz-submitted', () => {
                portalToast('Quiz Submitted Successfully!');
                setTimeout(() => {
                    window.location.hash = 'dashboard';
                }, 1500);
            });
        });
    </script>
</body>

</html>
