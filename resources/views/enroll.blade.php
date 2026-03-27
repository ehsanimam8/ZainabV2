<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enroll Now | Zainab Center</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/public.css") }}">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { background: #F8F5E8; }
        .enrollment-container {
            max-width: 760px;
            margin: 40px auto 80px;
            padding: 0 20px;
        }
        .enrollment-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 40px rgba(0,0,0,0.06);
        }
        /* Stepper */
        .stepper {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            position: relative;
        }
        .stepper::before {
            content: '';
            position: absolute;
            top: 15px; left: 0; right: 0;
            height: 2px;
            background: #E2E8F0;
            z-index: 1;
        }
        .stepper-progress {
            position: absolute;
            top: 15px; left: 0;
            height: 2px;
            background: var(--color-primary);
            z-index: 2;
            transition: width 0.4s ease;
        }
        .step {
            position: relative; z-index: 3;
            display: flex; flex-direction: column;
            align-items: center; gap: 8px;
            width: 80px;
        }
        .step-circle {
            width: 32px; height: 32px;
            border-radius: 50%;
            background: white;
            border: 2px solid #E2E8F0;
            display: flex; align-items: center; justify-content: center;
            font-weight: 700; color: #718096;
            font-size: 13px;
            transition: all 0.3s;
        }
        .step.active .step-circle {
            border-color: var(--color-primary);
            background: var(--color-primary);
            color: white;
        }
        .step.completed .step-circle {
            border-color: var(--color-primary);
            background: var(--color-primary);
            color: white;
        }
        .step-label {
            font-size: 10px; font-weight: 700;
            text-transform: uppercase; letter-spacing: 1px;
            color: #718096; text-align: center;
        }
        .step.active .step-label { color: var(--color-primary); }
        /* Steps */
        .enroll-step { display: none; animation: fadeIn 0.35s ease; }
        .enroll-step.active { display: block; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }
        /* Form elements */
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 20px; }
        .form-group { margin-bottom: 20px; }
        .form-group label {
            display: block; font-size: 13px; font-weight: 700;
            margin-bottom: 8px; color: #1A2F4A;
        }
        .form-group label .required { color: #DC2626; margin-left: 2px; }
        .form-group input, .form-group select {
            width: 100%; padding: 12px 16px;
            border: 1px solid #E2E8F0; border-radius: 10px;
            font-family: inherit; font-size: 14px;
            transition: border-color 0.2s;
        }
        .form-group input:focus, .form-group select:focus {
            outline: none; border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(27,107,114,0.12);
        }
        /* Enrollee type selector */
        .type-cards { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 24px; }
        .type-card {
            border: 2px solid #E2E8F0; border-radius: 14px;
            padding: 20px; cursor: pointer; transition: all 0.2s;
            text-align: center;
        }
        .type-card:hover { border-color: var(--color-accent); }
        .type-card.selected {
            border-color: var(--color-primary);
            background: rgba(27,107,114,0.04);
        }
        .type-card i { color: var(--color-primary); margin-bottom: 10px; }
        .type-card h3 { font-size: 15px; margin-bottom: 4px; }
        .type-card p { font-size: 12px; color: #718096; margin: 0; }
        /* Program selection */
        .program-selection { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 24px; }
        .select-card {
            border: 2px solid #E2E8F0; border-radius: 14px;
            padding: 18px; cursor: pointer; transition: all 0.2s;
        }
        .select-card:hover { border-color: var(--color-accent); }
        .select-card.selected {
            border-color: var(--color-primary);
            background: rgba(27,107,114,0.04);
        }
        .select-card h3 { font-size: 14px; margin-bottom: 4px; }
        .select-card p { font-size: 12px; color: #718096; margin: 0 0 8px; }
        .select-card .price { font-size: 15px; font-weight: 700; color: var(--color-primary); }
        /* Returning banner */
        .returning-banner {
            background: rgba(27,107,114,0.07); border: 1px solid rgba(27,107,114,0.2);
            border-radius: 12px; padding: 16px 20px; margin-bottom: 24px;
            display: none;
        }
        .returning-banner h4 { font-size: 14px; margin-bottom: 4px; color: var(--color-primary); }
        .returning-banner p { font-size: 13px; color: #718096; margin: 0; }
        /* Nav buttons */
        .btn-row { display: flex; gap: 12px; margin-top: 32px; }
        .btn-back {
            padding: 12px 24px; background: #EDF2F7; color: #4A5568;
            border: none; border-radius: 10px; font-family: inherit;
            font-size: 14px; font-weight: 700; cursor: pointer; transition: filter 0.2s;
        }
        .btn-next {
            flex: 1; padding: 14px 24px; background: var(--color-primary);
            color: white; border: none; border-radius: 10px;
            font-family: inherit; font-size: 14px; font-weight: 700;
            cursor: pointer; transition: filter 0.2s;
        }
        .btn-next:hover, .btn-back:hover { filter: brightness(0.93); }
        /* Confirmation */
        .confirm-icon {
            width: 80px; height: 80px; border-radius: 50%;
            background: #DCFCE7; color: #16A34A;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 24px;
        }
    </style>
</head>

<body>
    <div style="text-align: center; padding: 28px 20px 0;">
        <a href="{{ url('/') }}" class="logo">Zainab Center</a>
    </div>

    <div class="enrollment-container">
        <div class="enrollment-card">

            <!-- Stepper -->
            <div class="stepper" id="stepper">
                <div class="stepper-progress" id="stepper-progress" style="width: 0%;"></div>
                <div class="step active" id="step-ind-1">
                    <div class="step-circle">1</div>
                    <div class="step-label">Start</div>
                </div>
                <div class="step" id="step-ind-2">
                    <div class="step-circle">2</div>
                    <div class="step-label">Who</div>
                </div>
                <div class="step" id="step-ind-3">
                    <div class="step-circle">3</div>
                    <div class="step-label">Program</div>
                </div>
                <div class="step" id="step-ind-4">
                    <div class="step-circle">4</div>
                    <div class="step-label">Profile</div>
                </div>
                <div class="step" id="step-ind-5">
                    <div class="step-circle">5</div>
                    <div class="step-label">Payment</div>
                </div>
            </div>

            <!-- Step 1: Email / Returning Check -->
            <div class="enroll-step active" id="step1">
                <h2 style="margin-bottom: 6px;">Welcome to Zainab Center</h2>
                <p style="color: #718096; margin-bottom: 28px;">Enter your email to get started. We'll check if you have an existing account.</p>
                <div class="form-group">
                    <label>Email Address <span class="required">*</span></label>
                    <input type="email" placeholder="you@example.com" id="enroll-email">
                </div>

                <!-- Returning student banner (shown if email matches) -->
                <div class="returning-banner" id="returning-banner">
                    <h4>👋 Welcome back!</h4>
                    <p>We found an existing account under this email. Your previous information has been pre-filled. You're enrolling as a <strong>returning student</strong>.</p>
                </div>

                <div class="btn-row">
                    <button class="btn-next" onclick="handleEmailContinue()">Continue →</button>
                </div>
                <p style="text-align:center; font-size:13px; color:#718096; margin-top:20px;">
                    Already enrolled? <a href="{{ url('/portal') }}" style="color: var(--color-primary); font-weight:700;">Sign in to your portal</a>
                </p>
            </div>

            <!-- Step 2: Who are you enrolling? -->
            <div class="enroll-step" id="step2">
                <h2 style="margin-bottom: 6px;">Who are you enrolling?</h2>
                <p style="color: #718096; margin-bottom: 28px;">This determines how the account will be set up.</p>
                <div class="type-cards">
                    <div class="type-card" id="type-self" onclick="selectEnrolleeType('self')">
                        <i data-lucide="user" style="width:36px; height:36px; display:block; margin:0 auto 10px;"></i>
                        <h3>Myself</h3>
                        <p>I'm enrolling for my own education. I'll have my own login and access.</p>
                    </div>
                    <div class="type-card" id="type-child" onclick="selectEnrolleeType('child')">
                        <i data-lucide="users" style="width:36px; height:36px; display:block; margin:0 auto 10px;"></i>
                        <h3>My Child / Dependent</h3>
                        <p>I'm enrolling on behalf of a child. The account will be linked to my household.</p>
                    </div>
                </div>

                <!-- Child-specific fields (shown when "child" selected) -->
                <div id="child-fields" style="display:none;">
                    <div style="background: #FFFBEB; border:1px solid #FEF3C7; border-radius:10px; padding:14px 16px; margin-bottom:20px; font-size:13px; color:#92400E;">
                        <strong>Parent account:</strong> We'll create a child account linked to your email. You can manage all your children from one parent login.
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="margin:0;">
                            <label>Child's First Name <span class="required">*</span></label>
                            <input type="text" placeholder="First name">
                        </div>
                        <div class="form-group" style="margin:0;">
                            <label>Child's Last Name <span class="required">*</span></label>
                            <input type="text" placeholder="Last name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Child's Date of Birth <span class="required">*</span></label>
                        <input type="date" id="child-dob">
                        <div style="font-size:11px; color:#718096; margin-top:6px;">Used for age verification and appropriate program placement.</div>
                    </div>
                </div>

                <div class="btn-row">
                    <button class="btn-back" onclick="goToStep(1)">← Back</button>
                    <button class="btn-next" onclick="goToStep(3)">Next: Choose Program →</button>
                </div>
            </div>

            <!-- Step 3: Program Selection -->
            <div class="enroll-step" id="step3">
                <h2 style="margin-bottom: 6px;">Choose a Program</h2>
                <p style="color: #718096; margin-bottom: 28px;">Select the program you'd like to enroll in. Your section will be assigned by the admin team.</p>

                <div class="program-selection">
                    <div class="select-card" id="prog-theology" onclick="selectProgram('theology', 450)">
                        <h3>Islamic Theology</h3>
                        <p>Aqeedah, Fiqh, and Hadith. Available as full-time or part-time.</p>
                        <div class="price">From $300 / term</div>
                    </div>
                    <div class="select-card" id="prog-arabic" onclick="selectProgram('arabic', 299)">
                        <h3>Arabic Language</h3>
                        <p>Quranic Arabic from beginner to advanced.</p>
                        <div class="price">$299 / term</div>
                    </div>
                    <div class="select-card" id="prog-quran" onclick="selectProgram('quran', 350)">
                        <h3>Quranic Studies</h3>
                        <p>Hifz and Tajweed programs for all ages.</p>
                        <div class="price">$350 / term</div>
                    </div>
                    <div class="select-card" id="prog-coaching" onclick="selectProgram('coaching', 200)">
                        <h3>1-on-1 Coaching</h3>
                        <p>Personalized coaching sessions with a dedicated instructor.</p>
                        <div class="price">$200 / month</div>
                    </div>
                </div>

                <!-- Track picker — only visible when Islamic Theology is selected -->
                <div id="theology-track-picker" style="display:none; margin-top:20px; padding:18px 20px; background:#f8fafc; border:1px solid #e2e8f0; border-radius:12px;">
                    <p style="font-size:13px; font-weight:700; color:#2d3748; margin-bottom:12px;">Select your track for Islamic Theology:</p>
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                        <div id="track-fulltime" onclick="selectTrack('Full-time Islamic Theology', 450)" style="border:2px solid #e2e8f0; border-radius:10px; padding:14px; cursor:pointer; transition:border-color 0.15s;">
                            <div style="font-weight:700; font-size:14px; margin-bottom:4px;">Full-Time</div>
                            <div style="font-size:12px; color:#718096; margin-bottom:8px;">5 courses · Structured weekly schedule</div>
                            <div style="font-weight:700; color:#1B6B72;">$450 / term</div>
                        </div>
                        <div id="track-parttime" onclick="selectTrack('Part-time Islamic Theology', 300)" style="border:2px solid #e2e8f0; border-radius:10px; padding:14px; cursor:pointer; transition:border-color 0.15s;">
                            <div style="font-weight:700; font-size:14px; margin-bottom:4px;">Part-Time</div>
                            <div style="font-size:12px; color:#718096; margin-bottom:8px;">2–3 courses · Flexible pacing</div>
                            <div style="font-weight:700; color:#1B6B72;">$300 / term</div>
                        </div>
                    </div>
                </div>

                <div class="btn-row">
                    <button class="btn-back" onclick="goToStep(2)">← Back</button>
                    <button class="btn-next" onclick="goToStep(4)">Next: Your Profile →</button>
                </div>
            </div>

            <!-- Step 4: Profile Info -->
            <div class="enroll-step" id="step4">
                <h2 style="margin-bottom: 6px;">Your Profile</h2>
                <p style="color: #718096; margin-bottom: 28px;">Tell us a bit about yourself so we can set up your account.</p>
                <div class="form-row">
                    <div class="form-group" style="margin:0;">
                        <label>First Name <span class="required">*</span></label>
                        <input type="text" placeholder="Your first name" id="profile-first">
                    </div>
                    <div class="form-group" style="margin:0;">
                        <label>Last Name <span class="required">*</span></label>
                        <input type="text" placeholder="Your last name" id="profile-last">
                    </div>
                </div>
                <div class="form-group" style="margin-top:16px;">
                    <label>Phone Number <span class="required">*</span></label>
                    <input type="tel" placeholder="+1 (555) 000-0000">
                </div>
                <div class="form-group">
                    <label>Date of Birth (Enrollee) <span class="required">*</span></label>
                    <input type="date" id="self-dob">
                    <div style="font-size:11px; color:#718096; margin-top:6px;">Used for age-appropriate course placement. Not shared publicly.</div>
                </div>
                <div class="form-group">
                    <label>How did you hear about us?</label>
                    <select>
                        <option value="">— Select —</option>
                        <option>Friend / Family Referral</option>
                        <option>Social Media</option>
                        <option>Google / Web Search</option>
                        <option>Mosque / Community Center</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="btn-row">
                    <button class="btn-back" onclick="goToStep(3)">← Back</button>
                    <button class="btn-next" onclick="goToStep(5)">Next: Payment →</button>
                </div>
            </div>

            <!-- Step 5: Payment + Summary -->
            <div class="enroll-step" id="step5">
                <h2 style="margin-bottom: 6px;">Secure Checkout</h2>
                <p style="color: #718096; margin-bottom: 28px;">Review your enrollment summary and complete payment.</p>

                <!-- Order Summary -->
                <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:14px; padding:20px; margin-bottom:24px;">
                    <h4 style="font-size:13px; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; color:#718096; margin-bottom:14px;">Order Summary</h4>
                    <div style="display:flex; justify-content:space-between; margin-bottom:10px; font-size:14px;">
                        <span id="summary-program">Islamic Theology</span>
                        <span id="summary-price" style="font-weight:700;">$450.00</span>
                    </div>
                    <div style="display:flex; justify-content:space-between; margin-bottom:10px; font-size:13px; color:#718096;">
                        <span>Section to be assigned by admin</span>
                        <span>Spring 2026</span>
                    </div>
                    <div style="border-top:1px solid #E2E8F0; margin:14px 0;"></div>
                    <div style="display:flex; justify-content:space-between; font-size:15px; font-weight:700;">
                        <span>Total Due Today</span>
                        <span id="summary-total" style="color: var(--color-primary);">$450.00</span>
                    </div>
                    <div style="font-size:11px; color:#718096; margin-top:8px;">Installment plan available — split into 3 monthly payments of $150.</div>
                </div>

                <!-- Payment Toggle -->
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:20px;">
                    <button id="pay-full" onclick="setPaymentType('full', this)"
                        style="padding:12px; border:2px solid var(--color-primary); border-radius:10px; background:rgba(27,107,114,0.06); font-weight:700; font-size:13px; cursor:pointer; color: var(--color-primary);">
                        Pay in Full<br><span style="font-size:11px; font-weight:400;">Save 5%</span>
                    </button>
                    <button id="pay-install" onclick="setPaymentType('install', this)"
                        style="padding:12px; border:2px solid #E2E8F0; border-radius:10px; background:white; font-weight:700; font-size:13px; cursor:pointer; color:#4A5568;">
                        Installments<br><span style="font-size:11px; font-weight:400;">3 × $150/mo</span>
                    </button>
                </div>

                <!-- Card Details -->
                <div class="form-group">
                    <label>Card Number <span class="required">*</span></label>
                    <input type="text" placeholder="1234 5678 9012 3456" maxlength="19">
                </div>
                <div class="form-row">
                    <div class="form-group" style="margin:0;">
                        <label>Expiry <span class="required">*</span></label>
                        <input type="text" placeholder="MM / YY" maxlength="7">
                    </div>
                    <div class="form-group" style="margin:0;">
                        <label>CVV <span class="required">*</span></label>
                        <input type="text" placeholder="123" maxlength="4">
                    </div>
                </div>
                <div style="display:flex; align-items:center; gap:8px; font-size:12px; color:#718096; margin-bottom:8px;">
                    <i data-lucide="lock" style="width:14px;"></i> Payments secured by Stripe. Your data is never stored on our servers.
                </div>
                <div class="btn-row">
                    <button class="btn-back" onclick="goToStep(4)">← Back</button>
                    <button class="btn-next" onclick="finishEnrollment()">Enroll &amp; Pay Now →</button>
                </div>
            </div>

            <!-- Step 6: Confirmation -->
            <div class="enroll-step" id="step6">
                <div class="confirm-icon">
                    <i data-lucide="check" style="width:40px; height:40px;"></i>
                </div>
                <h2 style="text-align:center; margin-bottom:8px;">You're Enrolled!</h2>
                <p style="text-align:center; color:#718096; margin-bottom:32px;">Welcome to Zainab Center. Your account is being set up and you'll receive a welcome email shortly.</p>

                <div style="background:#F0FFF4; border:1px solid #BBFBD0; border-radius:14px; padding:20px; margin-bottom:24px;">
                    <h4 style="font-size:14px; margin-bottom:12px; color:#166534;">What happens next:</h4>
                    <div style="display:grid; gap:10px;">
                        <div style="display:flex; gap:12px; align-items:flex-start; font-size:13px;">
                            <div style="width:22px; height:22px; border-radius:50%; background:#16A34A; color:white; display:flex; align-items:center; justify-content:center; font-size:11px; font-weight:700; flex-shrink:0;">1</div>
                            <span>Check your inbox — a <strong>magic link</strong> will arrive to access your student portal for the first time.</span>
                        </div>
                        <div style="display:flex; gap:12px; align-items:flex-start; font-size:13px;">
                            <div style="width:22px; height:22px; border-radius:50%; background:#16A34A; color:white; display:flex; align-items:center; justify-content:center; font-size:11px; font-weight:700; flex-shrink:0;">2</div>
                            <span>Your first class is on <strong>Monday, March 17 at 6:00 PM</strong>. A calendar invite is on its way.</span>
                        </div>
                        <div style="display:flex; gap:12px; align-items:flex-start; font-size:13px;">
                            <div style="width:22px; height:22px; border-radius:50%; background:#16A34A; color:white; display:flex; align-items:center; justify-content:center; font-size:11px; font-weight:700; flex-shrink:0;">3</div>
                            <span>Your receipt has been sent to your email. Your next installment will be auto-charged on April 25.</span>
                        </div>
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                    <a href="{{ url('/portal') }}" class="btn-next" style="text-decoration:none; text-align:center;">Go to Student Portal →</a>
                    <a href="{{ url('/') }}" class="btn-back" style="text-decoration:none; text-align:center; display:block;">Back to Home</a>
                </div>
            </div>

        </div>
    </div>

    <script>
        lucide.createIcons();

        let currentStep = 1;
        let enrolleeType = null;
        let selectedProgram = null;
        let selectedPrice = 0;
        const totalSteps = 5;

        function updateStepper(step) {
            for (let i = 1; i <= totalSteps; i++) {
                const el = document.getElementById('step-ind-' + i);
                if (!el) continue;
                el.classList.remove('active', 'completed');
                if (i < step) el.classList.add('completed');
                else if (i === step) el.classList.add('active');
            }
            // Progress bar (between steps 1–5)
            const pct = ((step - 1) / (totalSteps - 1)) * 100;
            document.getElementById('stepper-progress').style.width = pct + '%';
        }

        function goToStep(step) {
            document.querySelectorAll('.enroll-step').forEach(s => s.classList.remove('active'));
            const target = document.getElementById('step' + step);
            if (target) {
                target.classList.add('active');
                currentStep = step;
                updateStepper(step);
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
            lucide.createIcons();
        }

        function handleEmailContinue() {
            const email = document.getElementById('enroll-email').value;
            // Simulate returning student detection (email contains "returning")
            if (email && email.includes('returning')) {
                document.getElementById('returning-banner').style.display = 'block';
            }
            goToStep(2);
        }

        function selectEnrolleeType(type) {
            enrolleeType = type;
            document.querySelectorAll('.type-card').forEach(c => c.classList.remove('selected'));
            document.getElementById('type-' + type).classList.add('selected');
            document.getElementById('child-fields').style.display = type === 'child' ? 'block' : 'none';
        }

        let selectedTrack = null;

        function selectProgram(prog, price) {
            selectedProgram = prog;
            selectedPrice = price;
            selectedTrack = null;
            document.querySelectorAll('.select-card').forEach(c => c.classList.remove('selected'));
            document.getElementById('prog-' + prog).classList.add('selected');

            // Show track picker only for Islamic Theology
            const trackPicker = document.getElementById('theology-track-picker');
            if (prog === 'theology') {
                trackPicker.style.display = 'block';
                // Reset track selection
                document.getElementById('track-fulltime').style.borderColor = '#e2e8f0';
                document.getElementById('track-parttime').style.borderColor = '#e2e8f0';
                document.getElementById('summary-program').textContent = 'Islamic Theology';
                document.getElementById('summary-price').textContent = 'Select track →';
            } else {
                trackPicker.style.display = 'none';
                const names = { arabic: 'Arabic Language', quran: 'Quranic Studies', coaching: '1-on-1 Coaching' };
                document.getElementById('summary-program').textContent = names[prog] || prog;
                document.getElementById('summary-price').textContent = '$' + price + '.00';
            }
        }

        function selectTrack(trackName, price) {
            selectedTrack = trackName;
            selectedPrice = price;
            document.getElementById('track-fulltime').style.borderColor = trackName.includes('Full') ? '#1B6B72' : '#e2e8f0';
            document.getElementById('track-parttime').style.borderColor = trackName.includes('Part') ? '#1B6B72' : '#e2e8f0';
            document.getElementById('summary-program').textContent = trackName;
            document.getElementById('summary-price').textContent = '$' + price + '.00';
        }

        function setPaymentType(type, el) {
            document.getElementById('pay-full').style.borderColor = '#E2E8F0';
            document.getElementById('pay-full').style.background = 'white';
            document.getElementById('pay-full').style.color = '#4A5568';
            document.getElementById('pay-install').style.borderColor = '#E2E8F0';
            document.getElementById('pay-install').style.background = 'white';
            document.getElementById('pay-install').style.color = '#4A5568';
            el.style.borderColor = 'var(--color-primary)';
            el.style.background = 'rgba(27,107,114,0.06)';
            el.style.color = 'var(--color-primary)';
        }

        function finishEnrollment() {
            goToStep(6);
            // Update stepper to show all done
            for (let i = 1; i <= totalSteps; i++) {
                const el = document.getElementById('step-ind-' + i);
                if (el) { el.classList.remove('active'); el.classList.add('completed'); }
            }
            document.getElementById('stepper-progress').style.width = '100%';
        }

        // Pre-fill summary when moving to step 5
        document.addEventListener('DOMContentLoaded', () => {
            updateStepper(1);
        });
    </script>
</body>

</html>
