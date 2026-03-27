<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programs & Courses | Zainab Center</title>
    <meta name="description" content="Explore all Islamic education programs at Zainab Center — Theology, Arabic, Quran, Tajweed, Seerah, and more. Flexible online learning for all ages and levels.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/public.css") }}">
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

        /* ── Footer (copied from public.html) ── */
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
</head>

<body>
    <!-- Navbar -->
    <div class="container">
        <header>
            <a href="{{ url('/') }}" class="logo">Zainab Center</a>
            <nav>
                <a href="public.html#about">About</a>
                <a href="{{ url('/programs') }}" style="color:var(--color-primary);">Programs</a>
                <a href="{{ url('/events') }}">Events</a>
                <a href="public.html#contact">Contact</a>
                <a href="{{ url('/admin') }}" class="btn-login">Portal Login</a>
            </nav>
        </header>
    </div>

    <!-- Page Hero -->
    <section class="page-hero">
        <div class="container">
            <div class="breadcrumb-bar">
                <a href="{{ url('/') }}">Home</a>
                <span>›</span>
                <span>Programs</span>
            </div>
            <h1>Our Programs</h1>
            <p>Authentic Islamic education for every age, level, and schedule. All programs delivered live online by qualified scholars.</p>
            <a href="{{ url('/enroll') }}" class="btn-cta">Enroll Today →</a>
        </div>
    </section>

    <!-- Filter Bar -->
    <div class="filter-section">
        <div class="container">
            <div class="filter-bar">
                <div>
                    <label>Category</label>
                    <select id="filter-category" onchange="filterPrograms()">
                        <option value="all">All Categories</option>
                        <option value="quran">Quran</option>
                        <option value="theology">Theology</option>
                        <option value="arabic">Arabic</option>
                        <option value="history">History & Seerah</option>
                        <option value="spirituality">Spirituality</option>
                        <option value="coaching">Coaching</option>
                        <option value="kids">Children's</option>
                    </select>
                </div>
                <div>
                    <label>Level</label>
                    <select id="filter-level" onchange="filterPrograms()">
                        <option value="all">All Levels</option>
                        <option value="beginner">Beginner</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="advanced">Advanced</option>
                    </select>
                </div>
                <div>
                    <label>Format</label>
                    <select id="filter-format" onchange="filterPrograms()">
                        <option value="all">All Formats</option>
                        <option value="group">Group Class</option>
                        <option value="1on1">1-on-1</option>
                        <option value="selfpaced">Self-Paced</option>
                    </select>
                </div>
                <div class="filter-count">
                    Showing <strong id="prog-count">8</strong> programs
                </div>
            </div>
        </div>
    </div>

    <!-- Programs Listing -->
    <section class="programs-listing">
        <div class="container">
            <div class="programs-full-grid" id="programs-grid">

                <!-- 1. Islamic Theology -->
                <div class="prog-card" data-category="theology" data-level="advanced" data-format="group">
                    <div class="prog-card-header bg-navy">
                        <div class="prog-badges"><span class="badge badge-popular">Most Popular</span></div>
                        <i data-lucide="book-open" style="width:52px;height:52px;color:#1A2F4A;"></i>
                    </div>
                    <div class="prog-body">
                        <h3>Islamic Theology</h3>
                        <p>A comprehensive study of Aqeedah, Fiqh, and Hadith methodology. Available in full-time and part-time tracks with structured assessments and certificates.</p>
                        <div class="prog-meta">
                            <span><i data-lucide="users" style="width:12px;"></i> Group Class</span>
                            <span><i data-lucide="signal" style="width:12px;"></i> Intermediate – Advanced</span>
                            <span><i data-lucide="calendar" style="width:12px;"></i> 12 weeks / term</span>
                            <span><i data-lucide="monitor" style="width:12px;"></i> Live Online</span>
                        </div>
                        <div class="prog-price">$450 <small>/ term</small></div>
                        <div class="prog-actions">
                            <a href="{{ url('/enroll') }}" class="btn-enroll">Enroll Now</a>
                            <button class="btn-learn" onclick="showToast('More details coming soon')">Learn More</button>
                        </div>
                    </div>
                </div>

                <!-- 2. Arabic Language -->
                <div class="prog-card" data-category="arabic" data-level="beginner" data-format="group">
                    <div class="prog-card-header bg-teal">
                        <div class="prog-badges"><span class="badge badge-online">All Levels</span></div>
                        <i data-lucide="languages" style="width:52px;height:52px;color:#1B6B72;"></i>
                    </div>
                    <div class="prog-body">
                        <h3>Arabic Language</h3>
                        <p>Master the language of the Quran from beginner to advanced. Learn grammar (Nahw), morphology (Sarf), and classical vocabulary with expert linguists.</p>
                        <div class="prog-meta">
                            <span><i data-lucide="users" style="width:12px;"></i> Group Class</span>
                            <span><i data-lucide="signal" style="width:12px;"></i> Beginner – Advanced</span>
                            <span><i data-lucide="calendar" style="width:12px;"></i> 12 weeks / term</span>
                            <span><i data-lucide="monitor" style="width:12px;"></i> Live Online</span>
                        </div>
                        <div class="prog-price">$299 <small>/ term</small></div>
                        <div class="prog-actions">
                            <a href="{{ url('/enroll') }}" class="btn-enroll">Enroll Now</a>
                            <button class="btn-learn" onclick="showToast('More details coming soon')">Learn More</button>
                        </div>
                    </div>
                </div>

                <!-- 3. Quranic Studies -->
                <div class="prog-card" data-category="quran" data-level="beginner" data-format="group">
                    <div class="prog-card-header bg-warm">
                        <div class="prog-badges"><span class="badge badge-popular">Top Rated</span></div>
                        <i data-lucide="scroll" style="width:52px;height:52px;color:#92400e;"></i>
                    </div>
                    <div class="prog-body">
                        <h3>Quranic Studies (Hifz & Tajweed)</h3>
                        <p>Structured memorization (Hifz) and recitation (Tajweed) programs for children and adults. Personalized tracking and monthly milestone celebrations.</p>
                        <div class="prog-meta">
                            <span><i data-lucide="users" style="width:12px;"></i> Group + 1-on-1</span>
                            <span><i data-lucide="signal" style="width:12px;"></i> All Levels</span>
                            <span><i data-lucide="calendar" style="width:12px;"></i> Ongoing</span>
                            <span><i data-lucide="monitor" style="width:12px;"></i> Live Online</span>
                        </div>
                        <div class="prog-price">$350 <small>/ term</small></div>
                        <div class="prog-actions">
                            <a href="{{ url('/enroll') }}" class="btn-enroll">Enroll Now</a>
                            <button class="btn-learn" onclick="showToast('More details coming soon')">Learn More</button>
                        </div>
                    </div>
                </div>

                <!-- 4. Tajweed & Recitation -->
                <div class="prog-card" data-category="quran" data-level="beginner" data-format="group">
                    <div class="prog-card-header bg-sage">
                        <div class="prog-badges"><span class="badge badge-new">New</span></div>
                        <i data-lucide="mic" style="width:52px;height:52px;color:#065f46;"></i>
                    </div>
                    <div class="prog-body">
                        <h3>Tajweed & Recitation</h3>
                        <p>A focused course on mastering the rules of Tajweed with practical application. Perfect for those who want to recite with precision and beauty without full Hifz commitment.</p>
                        <div class="prog-meta">
                            <span><i data-lucide="users" style="width:12px;"></i> Group Class</span>
                            <span><i data-lucide="signal" style="width:12px;"></i> Beginner – Intermediate</span>
                            <span><i data-lucide="calendar" style="width:12px;"></i> 8 weeks / term</span>
                            <span><i data-lucide="monitor" style="width:12px;"></i> Live Online</span>
                        </div>
                        <div class="prog-price">$199 <small>/ term</small></div>
                        <div class="prog-actions">
                            <a href="{{ url('/enroll') }}" class="btn-enroll">Enroll Now</a>
                            <button class="btn-learn" onclick="showToast('More details coming soon')">Learn More</button>
                        </div>
                    </div>
                </div>

                <!-- 5. Islamic History & Seerah -->
                <div class="prog-card" data-category="history" data-level="beginner" data-format="group">
                    <div class="prog-card-header bg-teal">
                        <div class="prog-badges"><span class="badge badge-online">All Ages</span></div>
                        <i data-lucide="landmark" style="width:52px;height:52px;color:#1B6B72;"></i>
                    </div>
                    <div class="prog-body">
                        <h3>Islamic History & Seerah</h3>
                        <p>An engaging journey through the life of the Prophet ﷺ and the major epochs of Islamic civilization. Combines narrative history with contemporary relevance.</p>
                        <div class="prog-meta">
                            <span><i data-lucide="users" style="width:12px;"></i> Group Class</span>
                            <span><i data-lucide="signal" style="width:12px;"></i> All Levels</span>
                            <span><i data-lucide="calendar" style="width:12px;"></i> 10 weeks / term</span>
                            <span><i data-lucide="monitor" style="width:12px;"></i> Live Online</span>
                        </div>
                        <div class="prog-price">$249 <small>/ term</small></div>
                        <div class="prog-actions">
                            <a href="{{ url('/enroll') }}" class="btn-enroll">Enroll Now</a>
                            <button class="btn-learn" onclick="showToast('More details coming soon')">Learn More</button>
                        </div>
                    </div>
                </div>

                <!-- 6. Islamic Ethics & Spirituality -->
                <div class="prog-card" data-category="spirituality" data-level="intermediate" data-format="group">
                    <div class="prog-card-header bg-mauve">
                        <div class="prog-badges"><span class="badge badge-new">New</span></div>
                        <i data-lucide="heart" style="width:52px;height:52px;color:#A85D88;"></i>
                    </div>
                    <div class="prog-body">
                        <h3>Islamic Ethics & Spirituality</h3>
                        <p>An in-depth study of Tazkiyah and Ihsan — purification of the heart, virtuous character, and the inner dimensions of worship. Based on classical texts with modern application.</p>
                        <div class="prog-meta">
                            <span><i data-lucide="users" style="width:12px;"></i> Group Class</span>
                            <span><i data-lucide="signal" style="width:12px;"></i> Intermediate</span>
                            <span><i data-lucide="calendar" style="width:12px;"></i> 10 weeks / term</span>
                            <span><i data-lucide="monitor" style="width:12px;"></i> Live Online</span>
                        </div>
                        <div class="prog-price">$199 <small>/ term</small></div>
                        <div class="prog-actions">
                            <a href="{{ url('/enroll') }}" class="btn-enroll">Enroll Now</a>
                            <button class="btn-learn" onclick="showToast('More details coming soon')">Learn More</button>
                        </div>
                    </div>
                </div>

                <!-- 7. Children's Weekend School -->
                <div class="prog-card" data-category="kids" data-level="beginner" data-format="group">
                    <div class="prog-card-header bg-sage">
                        <div class="prog-badges"><span class="badge badge-kids">Ages 6–14</span></div>
                        <i data-lucide="star" style="width:52px;height:52px;color:#065f46;"></i>
                    </div>
                    <div class="prog-body">
                        <h3>Children's Weekend School</h3>
                        <p>A fun, structured weekend program covering Quran reading, basic Aqeedah, Islamic manners (Adab), and Seerah stories. Designed for ages 6–14 with age-appropriate tracks.</p>
                        <div class="prog-meta">
                            <span><i data-lucide="users" style="width:12px;"></i> Group Class</span>
                            <span><i data-lucide="signal" style="width:12px;"></i> Ages 6–14</span>
                            <span><i data-lucide="calendar" style="width:12px;"></i> Saturdays · Ongoing</span>
                            <span><i data-lucide="monitor" style="width:12px;"></i> Live Online</span>
                        </div>
                        <div class="prog-price">$150 <small>/ term</small></div>
                        <div class="prog-actions">
                            <a href="{{ url('/enroll') }}" class="btn-enroll">Enroll Child</a>
                            <button class="btn-learn" onclick="showToast('More details coming soon')">Learn More</button>
                        </div>
                    </div>
                </div>

                <!-- 8. 1-on-1 Coaching -->
                <div class="prog-card" data-category="coaching" data-level="beginner" data-format="1on1">
                    <div class="prog-card-header bg-gold">
                        <div class="prog-badges"><span class="badge badge-popular">Flexible</span></div>
                        <i data-lucide="user-check" style="width:52px;height:52px;color:#92400e;"></i>
                    </div>
                    <div class="prog-body">
                        <h3>1-on-1 Private Coaching</h3>
                        <p>Personalized instruction tailored to your goals — whether it's Quran memorization, Arabic fluency, Fiqh review, or general Islamic studies. Any level, any subject.</p>
                        <div class="prog-meta">
                            <span><i data-lucide="user" style="width:12px;"></i> 1-on-1</span>
                            <span><i data-lucide="signal" style="width:12px;"></i> All Levels</span>
                            <span><i data-lucide="calendar" style="width:12px;"></i> Flexible Schedule</span>
                            <span><i data-lucide="monitor" style="width:12px;"></i> Live Online</span>
                        </div>
                        <div class="prog-price">Custom <small>pricing</small></div>
                        <div class="prog-actions">
                            <a href="public.html#contact" class="btn-enroll">Request a Session</a>
                            <button class="btn-learn" onclick="showToast('More details coming soon')">Learn More</button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- No results message -->
            <div id="no-results" style="display:none;text-align:center;padding:60px 0;color:#6B7280;">
                <i data-lucide="search-x" style="width:48px;height:48px;opacity:0.4;margin-bottom:16px;"></i>
                <p style="font-size:16px;">No programs match your filters. <a href="#" onclick="clearFilters();return false;" style="color:#1B6B72;font-weight:600;">Clear all filters</a></p>
            </div>
        </div>
    </section>

    <!-- Bottom CTA -->
    <section class="cta-banner">
        <div class="container">
            <h2>Not sure which program is right for you?</h2>
            <p>Our admissions team will help you find the best fit based on your goals, schedule, and experience level.</p>
            <a href="public.html#contact" class="btn-cta-white">Talk to Admissions</a>
        </div>
    </section>

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
                    <a href="public.html#about">About Us</a>
                    <a href="public.html#contact">Contact</a>
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

    <!-- Floating CTA -->
    <a href="{{ url('/enroll') }}" class="floating-enroll">Enroll Now</a>

    <!-- Toast -->
    <div class="toast" id="toast"></div>

    <script>
        lucide.createIcons();

        function showToast(msg) {
            const t = document.getElementById('toast');
            t.textContent = '✓ ' + msg;
            t.style.display = 'block';
            setTimeout(() => { t.style.display = 'none'; }, 3500);
        }

        function filterPrograms() {
            const cat    = document.getElementById('filter-category').value;
            const level  = document.getElementById('filter-level').value;
            const format = document.getElementById('filter-format').value;

            const cards = document.querySelectorAll('.prog-card');
            let visible = 0;

            cards.forEach(card => {
                const matchCat    = (cat    === 'all') || (card.dataset.category === cat);
                const matchLevel  = (level  === 'all') || (card.dataset.level    === level);
                const matchFormat = (format === 'all') || (card.dataset.format   === format);
                const show = matchCat && matchLevel && matchFormat;
                card.style.display = show ? '' : 'none';
                if (show) visible++;
            });

            document.getElementById('prog-count').textContent = visible;
            document.getElementById('no-results').style.display = visible === 0 ? 'block' : 'none';
        }

        function clearFilters() {
            document.getElementById('filter-category').value = 'all';
            document.getElementById('filter-level').value = 'all';
            document.getElementById('filter-format').value = 'all';
            filterPrograms();
        }
    </script>
</body>

</html>
