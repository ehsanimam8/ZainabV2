<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Zainab Center | Authentic Online Islamic Education' }}</title>
    <meta name="description" content="Explore all Islamic education programs at Zainab Center — Theology, Arabic, Quran, Tajweed, Seerah, and more. Flexible online learning for all ages and levels.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/public.css') }}">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        /* ── Page Hero ── */
        .page-hero {
            padding: 64px 0 56px;
            background: linear-gradient(135deg, #1A2F4A 0%, #1B6B72 100%);
            color: white;
            text-align: center;
        }
        .page-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 52px;
            margin-bottom: 16px;
            color: white;
        }
        .page-hero p {
            font-size: 17px;
            opacity: 0.8;
            max-width: 560px;
            margin: 0 auto 28px;
            line-height: 1.7;
        }
        .breadcrumb-bar {
            font-size: 13px;
            opacity: 0.65;
            margin-bottom: 20px;
        }
        .breadcrumb-bar a { color: white; text-decoration: none; }
        .breadcrumb-bar a:hover { text-decoration: underline; }
        .breadcrumb-bar span { margin: 0 8px; }

        /* ── Filter Bar ── */
        .filter-section {
            background: white;
            border-bottom: 1px solid #E2E8F0;
            position: sticky;
            top: 0;
            z-index: 50;
        }
        .filter-bar {
            display: flex;
            gap: 16px;
            align-items: center;
            padding: 16px 0;
            flex-wrap: wrap;
        }
        .filter-bar label {
            font-size: 12px;
            font-weight: 700;
            color: #6B7280;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-right: 4px;
        }
        .filter-bar select {
            padding: 8px 14px;
            border: 1px solid #D1D5DB;
            border-radius: 8px;
            font-family: inherit;
            font-size: 13px;
            color: #1A2F4A;
            background: white;
            cursor: pointer;
        }
        .filter-bar select:focus { outline: none; border-color: #1B6B72; }
        .filter-count {
            margin-left: auto;
            font-size: 13px;
            color: #6B7280;
        }
        .filter-count strong { color: #1A2F4A; }

        /* ── Programs Listing ── */
        .programs-listing {
            padding: 56px 0 80px;
        }
        .programs-full-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }
        @media (max-width: 960px) { .programs-full-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 600px) { .programs-full-grid { grid-template-columns: 1fr; } }

        .prog-card {
            background: white;
            border-radius: 20px;
            border: 1px solid #EDEDED;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .prog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 40px rgba(0,0,0,0.09);
        }
        .prog-card.hidden-card { display: none; }

        .prog-card-header {
            height: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .prog-card-header.bg-teal    { background: linear-gradient(135deg,#e6f4f5,#cce9eb); }
        .prog-card-header.bg-navy    { background: linear-gradient(135deg,#e6eaf0,#cdd5e0); }
        .prog-card-header.bg-mauve   { background: linear-gradient(135deg,#f5e8ef,#edd4e4); }
        .prog-card-header.bg-warm    { background: linear-gradient(135deg,#fdf5e8,#f4e4c3); }
        .prog-card-header.bg-sage    { background: linear-gradient(135deg,#e8f5ee,#c9e8d8); }
        .prog-card-header.bg-gold    { background: linear-gradient(135deg,#fdf8e8,#f5e6b8); }

        .prog-badges {
            position: absolute;
            top: 12px;
            left: 12px;
            display: flex;
            gap: 6px;
        }
        .badge {
            font-size: 11px;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 20px;
        }
        .badge-new     { background: #fce7f3; color: #9d174d; }
        .badge-popular { background: #fef3c7; color: #92400e; }
        .badge-online  { background: #dbeafe; color: #1d4ed8; }
        .badge-kids    { background: #d1fae5; color: #065f46; }

        .prog-body {
            padding: 24px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }
        .prog-body h3 {
            font-family: 'Playfair Display', serif;
            font-size: 19px;
            color: #1A2F4A;
            margin-bottom: 8px;
        }
        .prog-body p {
            font-size: 13px;
            color: #6B7280;
            line-height: 1.65;
            flex: 1;
            margin-bottom: 16px;
        }
        .prog-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 16px;
            font-size: 12px;
            color: #4A5568;
        }
        .prog-meta span {
            display: flex;
            align-items: center;
            gap: 5px;
            background: #F7FAFC;
            padding: 4px 10px;
            border-radius: 6px;
        }
        .prog-price {
            font-size: 18px;
            font-weight: 800;
            color: #1B6B72;
            margin-bottom: 16px;
        }
        .prog-price small {
            font-size: 12px;
            font-weight: 500;
            color: #9CA3AF;
        }
        .prog-actions {
            display: flex;
            gap: 10px;
        }
        .btn-enroll {
            flex: 1;
            padding: 11px;
            background: #1B6B72;
            color: white;
            border: none;
            border-radius: 10px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: filter 0.2s;
        }
        .btn-enroll:hover { filter: brightness(0.9); }
        .btn-learn {
            padding: 11px 16px;
            border: 1px solid #D1D5DB;
            background: white;
            color: #4A5568;
            border-radius: 10px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: border-color 0.2s, color 0.2s;
        }
        .btn-learn:hover { border-color: #1B6B72; color: #1B6B72; }

        /* ── Bottom CTA Banner ── */
        .cta-banner {
            background: linear-gradient(135deg, #1A2F4A 0%, #A85D88 100%);
            padding: 64px 0;
            text-align: center;
            color: white;
        }
        .cta-banner h2 {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            margin-bottom: 16px;
            color: white;
        }
        .cta-banner p {
            font-size: 16px;
            opacity: 0.85;
            max-width: 500px;
            margin: 0 auto 28px;
            line-height: 1.7;
        }
        .btn-cta-white {
            display: inline-block;
            background: white;
            color: #1A2F4A;
            padding: 14px 36px;
            border-radius: 30px;
            font-size: 15px;
            font-weight: 700;
            text-decoration: none;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
        }
        .btn-cta-white:hover { transform: translateY(-2px); box-shadow: 0 12px 32px rgba(0,0,0,0.2); }

        /* ── Footer ── */
        footer {
            background: #1A2F4A;
            color: rgba(255,255,255,0.8);
            padding: 60px 0 30px;
        }
        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px;
            margin-bottom: 48px;
        }
        .footer-brand .logo { color: white !important; font-size: 22px; }
        .footer-brand p { font-size: 13px; margin-top: 14px; line-height: 1.7; opacity: 0.7; }
        .footer-col h4 { font-family: 'Inter', sans-serif; font-size: 12px; text-transform: uppercase; letter-spacing: 0.1em; color: rgba(255,255,255,0.5); margin-bottom: 16px; }
        .footer-col a { display: block; color: rgba(255,255,255,0.75); text-decoration: none; font-size: 13px; margin-bottom: 10px; transition: color 0.2s; }
        .footer-col a:hover { color: white; }
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 24px;
            display: flex; justify-content: space-between;
            align-items: center; font-size: 12px;
            color: rgba(255,255,255,0.45);
        }
        .social-links { display: flex; gap: 12px; }
        .social-links a {
            width: 34px; height: 34px; border-radius: 8px;
            background: rgba(255,255,255,0.08);
            display: flex; align-items: center; justify-content: center;
            color: rgba(255,255,255,0.7); text-decoration: none;
            transition: background 0.2s;
        }
        .social-links a:hover { background: rgba(255,255,255,0.15); }

        /* Toast */
        .toast {
            display: none;
            position: fixed; bottom: 30px; right: 30px;
            background: #16A34A; color: white; padding: 14px 20px;
            border-radius: 12px; font-size: 14px; font-weight: 600;
            box-shadow: 0 8px 24px rgba(0,0,0,0.15); z-index: 999;
        }
    </style>
    @livewireStyles
</head>

<body>
    <!-- Navbar -->
    <div class="container">
        <header>
            <a href="{{ url('/') }}" class="logo">Zainab Center</a>
            <nav>
                <a href="{{ url('/#about') }}">About</a>
                <a href="{{ url('/programs') }}" class="{{ request()->is('programs') ? 'text-primary font-bold' : '' }}" style="{{ request()->is('programs') ? 'color:var(--color-primary);' : '' }}">Programs</a>
                <a href="{{ url('/events') }}" class="{{ request()->is('events') ? 'text-primary font-bold' : '' }}" style="{{ request()->is('events') ? 'color:var(--color-primary);' : '' }}">Events</a>
                <a href="{{ url('/#contact') }}">Contact</a>
                <a href="{{ url('/admin') }}" class="btn-login">Portal Login</a>
            </nav>
        </header>
    </div>

    {{ $slot }}

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="{{ url('/') }}" class="logo" style="font-size:20px;">Zainab Center</a>
                    <p>Dedicated to making authentic Islamic education accessible to all. Join over 1,000 students learning with us from across the world.</p>
                    <div class="social-links" style="margin-top:20px;">
                        <a href="#" title="Instagram"><i data-lucide="instagram" style="width:16px;"></i></a>
                        <a href="#" title="YouTube"><i data-lucide="youtube" style="width:16px;"></i></a>
                        <a href="#" title="Facebook"><i data-lucide="facebook" style="width:16px;"></i></a>
                        <a href="#" title="WhatsApp"><i data-lucide="message-circle" style="width:16px;"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Programs</h4>
                    <a href="{{ url('/programs') }}">All Programs</a>
                    <a href="{{ url('/enroll') }}">Islamic Theology</a>
                    <a href="{{ url('/enroll') }}">Arabic Language</a>
                    <a href="{{ url('/enroll') }}">Quranic Studies</a>
                    <a href="{{ url('/enroll') }}">1-on-1 Coaching</a>
                </div>
                <div class="footer-col">
                    <h4>Institution</h4>
                    <a href="{{ url('/#about') }}">About Us</a>
                    <a href="{{ url('/#contact') }}">Contact</a>
                    <a href="#">Our Teachers</a>
                    <a href="#">Community</a>
                </div>
                <div class="footer-col">
                    <h4>Student</h4>
                    <a href="{{ url('/portal') }}">Student Portal</a>
                    <a href="{{ url('/enroll') }}">Enroll Now</a>
                    <a href="#">Fees & Scholarships</a>
                    <a href="#">FAQs</a>
                </div>
            </div>
            <div class="footer-bottom">
                <span>© 2026 Zainab Center. All rights reserved.</span>
                <span>Privacy Policy · Terms of Use</span>
            </div>
        </div>
    </footer>

    <!-- Toast -->
    <div class="toast" id="toast"></div>

    @livewireScripts
    <script>
        lucide.createIcons();
        function showToast(msg) {
            const t = document.getElementById('toast');
            t.textContent = '✓ ' + msg;
            t.style.display = 'block';
            setTimeout(() => { t.style.display = 'none'; }, 3500);
        }
    </script>
</body>
</html>
