<div>
    <style>
        /* Page Hero */
        .page-hero {
            padding: 64px 0 56px;
            background: linear-gradient(135deg, #1A2F4A 0%, #A85D88 100%);
            color: white;
            text-align: center;
        }
        .page-hero h1 { font-family:'Playfair Display',serif; font-size:52px; margin-bottom:16px; color:white; }
        .page-hero p  { font-size:17px; opacity:0.85; max-width:520px; margin:0 auto; line-height:1.7; }
        .breadcrumb-bar { font-size:13px; opacity:0.65; margin-bottom:20px; }
        .breadcrumb-bar a { color:white; text-decoration:none; }
        .breadcrumb-bar a:hover { text-decoration:underline; }
        .breadcrumb-bar span { margin:0 8px; }

        /* Ayah banner */
        .ayah-bar {
            background: #f8f5e8;
            border-top: 3px solid #A85D88;
            padding: 20px 0;
            text-align: center;
        }
        .ayah-bar blockquote {
            font-family: 'Playfair Display', serif;
            font-size: 16px;
            color: #1A2F4A;
            font-style: italic;
            margin: 0;
        }
        .ayah-bar cite { font-size:12px; color:#6B7280; font-style:normal; display:block; margin-top:6px; }

        /* Main layout */
        .donate-section { padding: 56px 0 80px; background: #F8F5E8; }
        .donate-grid {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 32px;
            align-items: start;
        }
        @media (max-width: 900px) { .donate-grid { grid-template-columns: 1fr; } }

        /* Donation form card */
        .donate-form-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.07);
            overflow: hidden;
        }
        .donate-form-header {
            padding: 28px 32px 20px;
            border-bottom: 1px solid #F3F4F6;
        }
        .donate-form-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            color: #1A2F4A;
            margin-bottom: 6px;
        }
        .donate-form-header p { font-size:13px; color:#6B7280; }
        .donate-form-body { padding: 28px 32px; }

        /* Category tabs */
        .donate-tabs {
            display: flex;
            gap: 8px;
            margin-bottom: 28px;
            background: #F3F4F6;
            padding: 4px;
            border-radius: 12px;
        }
        .donate-tab {
            flex: 1;
            padding: 10px;
            border: none;
            background: transparent;
            border-radius: 9px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            color: #6B7280;
            cursor: pointer;
            transition: background 0.15s, color 0.15s;
        }
        .donate-tab.active {
            background: white;
            color: #A85D88;
            box-shadow: 0 1px 4px rgba(0,0,0,0.08);
        }

        /* Category description */
        .category-note {
            background: #FDF4FF;
            border-left: 3px solid #A85D88;
            border-radius: 0 8px 8px 0;
            padding: 10px 14px;
            font-size: 12px;
            color: #6B7280;
            margin-bottom: 24px;
            line-height: 1.6;
        }
        .category-note strong { color: #1A2F4A; }

        /* Amount presets */
        .amount-label {
            font-size:13px; font-weight:700; color:#1A2F4A; margin-bottom:10px; display:block;
        }
        .amount-presets {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
            margin-bottom: 14px;
        }
        .amount-btn {
            padding: 12px 8px;
            border: 2px solid #E5E7EB;
            border-radius: 10px;
            background: white;
            font-family: inherit;
            font-size: 14px;
            font-weight: 700;
            color: #4A5568;
            cursor: pointer;
            transition: border-color 0.15s, background 0.15s, color 0.15s;
            text-align: center;
        }
        .amount-btn:hover { border-color: #A85D88; color: #A85D88; }
        .amount-btn.selected { border-color: #A85D88; background: #A85D88; color: white; }

        .custom-amount-wrap {
            position: relative;
            margin-bottom: 24px;
        }
        .custom-amount-wrap .prefix {
            position: absolute; left:14px; top:50%; transform:translateY(-50%);
            font-size:16px; font-weight:700; color:#9CA3AF;
        }
        .custom-amount-wrap input {
            width: 100%;
            padding: 13px 16px 13px 32px;
            border: 2px solid #E5E7EB;
            border-radius: 10px;
            font-family: inherit;
            font-size: 16px;
            font-weight: 700;
            color: #1A2F4A;
            transition: border-color 0.15s;
        }
        .custom-amount-wrap input:focus { outline: none; border-color: #A85D88; }
        .custom-amount-wrap input::placeholder { font-weight: 400; color: #D1D5DB; }

        /* Frequency toggle */
        .freq-toggle { display:flex; gap:8px; margin-bottom:24px; }
        .freq-btn {
            flex:1; padding:9px;
            border:2px solid #E5E7EB;
            border-radius:9px;
            font-family:inherit; font-size:13px; font-weight:600;
            color:#6B7280; background:white; cursor:pointer;
            transition:all 0.15s;
        }
        .freq-btn.active { border-color:#1A2F4A; background:#1A2F4A; color:white; }

        /* Designation */
        .form-label { font-size:13px; font-weight:700; color:#1A2F4A; margin-bottom:7px; display:block; }
        .form-select, .form-input {
            width:100%; padding:11px 14px;
            border:1px solid #D1D5DB; border-radius:10px;
            font-family:inherit; font-size:14px; color:#1A2F4A;
            background:white; margin-bottom:18px;
        }
        .form-select:focus, .form-input:focus { outline:none; border-color:#A85D88; }

        /* Donor info */
        .form-row { display:grid; grid-template-columns:1fr 1fr; gap:14px; }

        /* Summary bar */
        .donate-summary {
            background: linear-gradient(135deg, #fdf4ff, #f8f5e8);
            border-radius: 12px;
            padding: 16px 20px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid rgba(168,93,136,0.2);
        }
        .donate-summary .label { font-size:13px; color:#6B7280; }
        .donate-summary .total { font-size:28px; font-weight:800; color:#A85D88; font-family:'Playfair Display',serif; }
        .donate-summary .freq-note { font-size:12px; color:#9CA3AF; margin-top:2px; }

        /* Submit button */
        .btn-donate-submit {
            width:100%; padding:16px;
            background: #A85D88; color:white;
            border:none; border-radius:12px;
            font-family:inherit; font-size:16px; font-weight:700;
            cursor:pointer; transition:filter 0.2s;
        }
        .btn-donate-submit:hover { filter:brightness(0.92); }
        .btn-donate-submit:disabled { background:#D1D5DB; cursor:not-allowed; filter:none; }

        .secure-note {
            text-align:center; font-size:12px; color:#9CA3AF;
            margin-top:12px; display:flex; align-items:center; justify-content:center; gap:6px;
        }

        /* Sidebar cards */
        .donate-sidebar { display:flex; flex-direction:column; gap:20px; }

        .sidebar-impact-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.05);
        }
        .sidebar-impact-card h3 {
            font-family:'Playfair Display',serif;
            font-size:18px; color:#1A2F4A; margin-bottom:16px;
        }
        .impact-item {
            display:flex; gap:12px; align-items:flex-start; margin-bottom:14px;
        }
        .impact-item:last-child { margin-bottom:0; }
        .impact-icon {
            width:36px; height:36px; border-radius:8px;
            background:#FDF4FF; display:flex; align-items:center; justify-content:center;
            flex-shrink:0;
        }
        .impact-icon i { color:#A85D88; }
        .impact-item h4 { font-size:13px; font-weight:700; color:#1A2F4A; margin-bottom:2px; }
        .impact-item p  { font-size:12px; color:#6B7280; line-height:1.5; }

        .sidebar-stats-card {
            background: linear-gradient(135deg, #1A2F4A 0%, #A85D88 100%);
            border-radius: 16px;
            padding: 24px;
            color: white;
        }
        .sidebar-stats-card h3 { font-family:'Playfair Display',serif; font-size:18px; color:white; margin-bottom:16px; }
        .stat-row { display:grid; grid-template-columns:1fr 1fr; gap:12px; }
        .stat-item { text-align:center; }
        .stat-item .num { font-size:28px; font-weight:900; font-family:'Playfair Display',serif; }
        .stat-item .lbl { font-size:11px; text-transform:uppercase; letter-spacing:0.08em; opacity:0.7; margin-top:2px; }

        .sidebar-zakat-card {
            background: #fffbeb;
            border: 1px solid #fde68a;
            border-radius: 16px;
            padding: 20px;
        }
        .sidebar-zakat-card h3 { font-family:'Playfair Display',serif; font-size:16px; color:#92400e; margin-bottom:8px; }
        .sidebar-zakat-card p  { font-size:12px; color:#78350f; line-height:1.6; }

        /* Thank you overlay */
        .thankyou-overlay {
            display:none; position:fixed; inset:0;
            background:rgba(26,47,74,0.6); z-index:1000;
            align-items:center; justify-content:center;
        }
        .thankyou-overlay.show { display:flex; }
        .thankyou-card {
            background:white; border-radius:20px;
            padding:48px 40px; max-width:440px; width:90%;
            text-align:center;
        }
        .thankyou-card .check-circle {
            width:72px; height:72px; border-radius:50%;
            background:linear-gradient(135deg,#dcfce7,#bbf7d0);
            display:flex; align-items:center; justify-content:center;
            margin:0 auto 20px;
        }
        .thankyou-card h2 { font-family:'Playfair Display',serif; font-size:28px; color:#1A2F4A; margin-bottom:8px; }
        .thankyou-card p  { font-size:14px; color:#6B7280; line-height:1.7; margin-bottom:24px; }
        .thankyou-card .amount-display { font-size:40px; font-weight:900; color:#A85D88; font-family:'Playfair Display',serif; margin:12px 0; }
        .btn-thankyou-close {
            padding:12px 32px; background:#1A2F4A; color:white;
            border:none; border-radius:30px; font-family:inherit;
            font-size:14px; font-weight:700; cursor:pointer;
        }

        /* Footer */
        footer { background:#1A2F4A; color:rgba(255,255,255,0.8); padding:60px 0 30px; }
        .footer-grid { display:grid; grid-template-columns:2fr 1fr 1fr 1fr; gap:40px; margin-bottom:48px; }
        .footer-brand .logo { color:white !important; font-size:22px; }
        .footer-brand p { font-size:13px; margin-top:14px; line-height:1.7; opacity:0.7; }
        .footer-col h4 { font-family:'Inter',sans-serif; font-size:12px; text-transform:uppercase; letter-spacing:0.1em; color:rgba(255,255,255,0.5); margin-bottom:16px; }
        .footer-col a { display:block; color:rgba(255,255,255,0.75); text-decoration:none; font-size:13px; margin-bottom:10px; transition:color 0.2s; }
        .footer-col a:hover { color:white; }
        .footer-bottom { border-top:1px solid rgba(255,255,255,0.1); padding-top:24px; display:flex; justify-content:space-between; align-items:center; font-size:12px; color:rgba(255,255,255,0.45); }
        .social-links { display:flex; gap:12px; }
        .social-links a { width:34px; height:34px; border-radius:8px; background:rgba(255,255,255,0.08); display:flex; align-items:center; justify-content:center; color:rgba(255,255,255,0.7); text-decoration:none; transition:background 0.2s; }
        .social-links a:hover { background:rgba(255,255,255,0.15); }
    </style>
    <!-- Page Hero -->
    <section class="page-hero">
        <div class="container">
            <div class="breadcrumb-bar">
                <a href="{{ url('/') }}">Home</a>
                <span>›</span>
                <span>Donate</span>
            </div>
            <h1>Support Sacred Knowledge</h1>
            <p>Your generosity funds scholarships, supports our teachers, and keeps Islamic education accessible to every student.</p>
        </div>
    </section>

    <!-- Ayah -->
    <div class="ayah-bar">
        <div class="container">
            <blockquote>"The example of those who spend their wealth in the way of Allah is like a seed of grain that sprouts seven spikes, in every spike a hundred grains."</blockquote>
            <cite>Surah Al-Baqarah, 2:261</cite>
        </div>
    </div>

    <!-- Donation Form -->
    <section class="donate-section">
        <div class="container">
            <div class="donate-grid">

                <!-- Left: Donation Form -->
                <div class="donate-form-card">
                    <div class="donate-form-header">
                        <h2>Make a Contribution</h2>
                        <p>All donations are processed securely. You will receive a receipt by email.</p>
                    </div>
                    <div class="donate-form-body">

                        @if($currentStep === 1)
                        <!-- Category Tabs -->
                        <div class="donate-tabs">
                            <button class="donate-tab {{ $type === 'Sadaqah' ? 'active' : '' }}" wire:click="$set('type', 'Sadaqah')">Sadaqah</button>
                            <button class="donate-tab {{ $type === 'Zakat' ? 'active' : '' }}" wire:click="$set('type', 'Zakat')">Zakat</button>
                            <button class="donate-tab {{ $type === 'Scholarship' ? 'active' : '' }}" wire:click="$set('type', 'Scholarship')">Scholarship</button>
                            <button class="donate-tab {{ $type === 'Building Fund' ? 'active' : '' }}" wire:click="$set('type', 'Building Fund')">Building Fund</button>
                        </div>

                        <!-- Category note -->
                        <div class="category-note">
                            @if($type === 'Zakat')
                            <strong>Zakat</strong> — distributed exclusively to eligible recipients according to Sharia guidelines. Your Zakat reaches those truly in need.
                            @elseif($type === 'Scholarship')
                            <strong>Scholarship Fund</strong> — directly subsidizes tuition for students who cannot afford full fees. You are investing in their knowledge.
                            @elseif($type === 'Building Fund')
                            <strong>Building Fund</strong> — supports infrastructure improvements, technology upgrades, and expanding our capacity to serve more students.
                            @else
                            <strong>General Sadaqah</strong> — supports daily operations, teacher salaries, and general student needs. Every dollar goes directly to the mission.
                            @endif
                        </div>

                        <!-- Frequency -->
                        <div class="freq-toggle">
                            <button class="freq-btn {{ $recurrence === 'one_time' ? 'active' : '' }}" wire:click="$set('recurrence', 'one_time')">One-Time</button>
                            <button class="freq-btn {{ $recurrence === 'monthly' ? 'active' : '' }}" wire:click="$set('recurrence', 'monthly')">Monthly</button>
                            <button class="freq-btn {{ $recurrence === 'annual' ? 'active' : '' }}" wire:click="$set('recurrence', 'annual')">Annual</button>
                        </div>

                        <!-- Amount -->
                        <span class="amount-label">Choose an amount</span>
                        <div class="amount-presets">
                            <button class="amount-btn {{ $amount == 25 ? 'selected' : '' }}" wire:click="$set('amount', 25)">$25</button>
                            <button class="amount-btn {{ $amount == 50 ? 'selected' : '' }}" wire:click="$set('amount', 50)">$50</button>
                            <button class="amount-btn {{ $amount == 100 ? 'selected' : '' }}" wire:click="$set('amount', 100)">$100</button>
                            <button class="amount-btn {{ $amount == 250 ? 'selected' : '' }}" wire:click="$set('amount', 250)">$250</button>
                            <button class="amount-btn {{ $amount == 500 ? 'selected' : '' }}" wire:click="$set('amount', 500)">$500</button>
                            <button class="amount-btn {{ $amount == 1000 ? 'selected' : '' }}" wire:click="$set('amount', 1000)">$1,000</button>
                            <button class="amount-btn {{ $amount == 2500 ? 'selected' : '' }}" wire:click="$set('amount', 2500)">$2,500</button>
                        </div>
                        <div class="custom-amount-wrap" style="margin-top:14px; margin-bottom: 24px;">
                            <span class="prefix">$</span>
                            <input type="number" min="1" placeholder="Enter custom amount" wire:model.live="amount">
                        </div>

                        <!-- Summary -->
                        <div class="donate-summary">
                            <div>
                                <div class="label">Your contribution</div>
                                <div class="total">${{ number_format($amount ?: 0, 2) }}</div>
                                <div class="freq-note">{{ ucfirst(str_replace('_', '-', $recurrence)) }} donation</div>
                            </div>
                            <div style="text-align:right;">
                                <div style="font-size:12px;color:#6B7280;margin-bottom:4px;">Category</div>
                                <div style="font-size:13px;font-weight:700;color:#A85D88;">{{ $type }}</div>
                            </div>
                        </div>

                        @error('amount') <span style="color:red;font-size:12px;margin-bottom:12px;display:block;">{{ $message }}</span> @enderror

                        <!-- Designation -->
                        <label class="form-label">Designate your gift</label>
                        <select class="form-select" wire:model="type">
                            <option value="Sadaqah">General Sadaqah — unrestricted</option>
                            <option value="Scholarship">Student Scholarship Fund</option>
                            <option value="Teacher Support">Teacher Support & Development</option>
                            <option value="Building Fund">Technology & Infrastructure</option>
                            <option value="Community Events">Community Events</option>
                        </select>

                        <!-- Donor info -->
                        <label class="form-label">Your information</label>
                        <div class="form-row" style="margin-bottom:14px;">
                            <input type="text" class="form-input" placeholder="First name" wire:model.live="firstName" style="margin-bottom:0;" {{ $isAnonymous ? 'disabled' : '' }}>
                            <input type="text" class="form-input" placeholder="Last name" wire:model.live="lastName" style="margin-bottom:0;" {{ $isAnonymous ? 'disabled' : '' }}>
                        </div>
                        @error('firstName') <span style="color:red;font-size:12px;">{{ $message }}</span> @enderror

                        <input type="email" class="form-input" placeholder="Email address (for receipt)" wire:model.live="email" {{ $isAnonymous ? 'disabled' : '' }}>
                        @error('email') <span style="color:red;font-size:12px;margin-bottom:12px;display:block;">{{ $message }}</span> @enderror

                        <input type="text" class="form-input" placeholder="Phone (optional)" wire:model.live="phone" {{ $isAnonymous ? 'disabled' : '' }}>

                        <!-- Anonymous option -->
                        <label style="display:flex;align-items:center;gap:10px;font-size:13px;color:#4A5568;margin-bottom:24px;cursor:pointer;">
                            <input type="checkbox" wire:model.live="isAnonymous" style="width:16px;height:16px;accent-color:#A85D88;">
                            Make this donation anonymous
                        </label>

                        <!-- Submit -->
                        <button class="btn-donate-submit" wire:click="processDonation" wire:loading.attr="disabled">
                            <span wire:loading.remove>Donate ${{ number_format($amount ?: 0, 2) }} →</span>
                            <span wire:loading>Processing...</span>
                        </button>
                        <div class="secure-note">
                            <i data-lucide="lock" style="width:13px;"></i>
                            Secured with 256-bit SSL encryption
                        </div>
                        @elseif($currentStep === 3)
                        <!-- Thank you state within the body -->
                        <div style="text-align:center; padding: 40px 0;">
                            <div style="width:72px; height:72px; border-radius:50%; background:linear-gradient(135deg,#dcfce7,#bbf7d0); display:flex; align-items:center; justify-content:center; margin:0 auto 20px;">
                                <i data-lucide="check" style="width:32px;color:#16a34a;stroke-width:3;"></i>
                            </div>
                            <h2 style="font-family:'Playfair Display',serif; font-size:28px; color:#1A2F4A; margin-bottom:8px;">JazakAllah Khayran!</h2>
                            <div style="font-size:40px; font-weight:900; color:#A85D88; font-family:'Playfair Display',serif; margin:12px 0;">${{ number_format($amount ?: 0, 2) }}</div>
                            <p style="font-size:14px; color:#6B7280; line-height:1.7; margin-bottom:24px;">Your {{ strtolower($type) }} has been received. A receipt and tax letter will be sent to your email within 24 hours. May Allah accept from you.</p>
                            <button class="btn-donate-submit" wire:click="$set('currentStep', 1)" style="max-width:200px; margin: 0 auto; background:#1A2F4A;">Make Another Gift</button>
                        </div>
                        @endif

                    </div>
                </div>

                <!-- Right: Sidebar -->
                <div class="donate-sidebar">

                    <!-- Impact card -->
                    <div class="sidebar-impact-card">
                        <h3>Your Impact</h3>
                        <div class="impact-item">
                            <div class="impact-icon"><i data-lucide="user" style="width:18px;"></i></div>
                            <div>
                                <h4>$25 — One month of materials</h4>
                                <p>Covers workbooks, digital resources, and printing for one student for a full month.</p>
                            </div>
                        </div>
                        <div class="impact-item">
                            <div class="impact-icon"><i data-lucide="book-open" style="width:18px;"></i></div>
                            <div>
                                <h4>$100 — Full term scholarship</h4>
                                <p>Subsidizes one term of tuition for a student who cannot afford full fees.</p>
                            </div>
                        </div>
                        <div class="impact-item">
                            <div class="impact-icon"><i data-lucide="users" style="width:18px;"></i></div>
                            <div>
                                <h4>$500 — Teacher support</h4>
                                <p>Contributes to a month of instructor compensation, keeping qualified scholars teaching.</p>
                            </div>
                        </div>
                        <div class="impact-item">
                            <div class="impact-icon"><i data-lucide="graduation-cap" style="width:18px;"></i></div>
                            <div>
                                <h4>$1,000 — Full year scholarship</h4>
                                <p>Fully funds an entire year of Islamic education for one deserving student.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Stats card -->
                    <div class="sidebar-stats-card">
                        <h3>Where Your Money Goes</h3>
                        <div style="margin-bottom:16px;">
                            <div style="display:flex;justify-content:space-between;font-size:12px;margin-bottom:5px;">
                                <span>Teacher Salaries</span><span style="font-weight:700;">52%</span>
                            </div>
                            <div style="background:rgba(255,255,255,0.2);border-radius:4px;height:6px;">
                                <div style="background:white;width:52%;height:100%;border-radius:4px;"></div>
                            </div>
                        </div>
                        <div style="margin-bottom:16px;">
                            <div style="display:flex;justify-content:space-between;font-size:12px;margin-bottom:5px;">
                                <span>Student Scholarships</span><span style="font-weight:700;">28%</span>
                            </div>
                            <div style="background:rgba(255,255,255,0.2);border-radius:4px;height:6px;">
                                <div style="background:#EDD4E4;width:28%;height:100%;border-radius:4px;"></div>
                            </div>
                        </div>
                        <div style="margin-bottom:16px;">
                            <div style="display:flex;justify-content:space-between;font-size:12px;margin-bottom:5px;">
                                <span>Technology & Ops</span><span style="font-weight:700;">14%</span>
                            </div>
                            <div style="background:rgba(255,255,255,0.2);border-radius:4px;height:6px;">
                                <div style="background:#EDD4E4;width:14%;height:100%;border-radius:4px;"></div>
                            </div>
                        </div>
                        <div>
                            <div style="display:flex;justify-content:space-between;font-size:12px;margin-bottom:5px;">
                                <span>Administration</span><span style="font-weight:700;">6%</span>
                            </div>
                            <div style="background:rgba(255,255,255,0.2);border-radius:4px;height:6px;">
                                <div style="background:#EDD4E4;width:6%;height:100%;border-radius:4px;"></div>
                            </div>
                        </div>
                        <div style="border-top:1px solid rgba(255,255,255,0.15);margin-top:20px;padding-top:16px;">
                            <div class="stat-row">
                                <div class="stat-item">
                                    <div class="num">142</div>
                                    <div class="lbl">Students Supported</div>
                                </div>
                                <div class="stat-item">
                                    <div class="num">$48K</div>
                                    <div class="lbl">Raised This Year</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Zakat note -->
                    <div class="sidebar-zakat-card">
                        <h3>A Note on Zakat</h3>
                        <p>If you select the Zakat category, your gift will be directed exclusively to eligible recipients — students and families who qualify under Sharia criteria. Please consult your local scholar if you have questions about your Zakat obligation.</p>
                    </div>

                    <!-- Contact -->
                    <div style="background:white;border-radius:16px;padding:20px;box-shadow:0 2px 12px rgba(0,0,0,0.05);">
                        <h3 style="font-family:'Playfair Display',serif;font-size:16px;color:#1A2F4A;margin-bottom:10px;">Need help?</h3>
                        <p style="font-size:13px;color:#6B7280;line-height:1.6;margin-bottom:12px;">For large gifts, wire transfers, or to set up recurring giving, contact our development office.</p>
                        <a href="{{ url('/#contact') }}" style="font-size:13px;font-weight:700;color:#A85D88;text-decoration:none;">Contact Us →</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
