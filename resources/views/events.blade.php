<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events & Community | Zainab Center</title>
    <meta name="description" content="Upcoming events at Zainab Center — open lectures, Ramadan programs, graduation ceremonies, workshops, and community gatherings.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/public.css") }}">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        /* ── Page Hero ── */
        .page-hero {
            padding: 64px 0 56px;
            background: linear-gradient(135deg, #A85D88 0%, #1A2F4A 100%);
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
            opacity: 0.85;
            max-width: 560px;
            margin: 0 auto 12px;
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
        .filter-bar select:focus { outline: none; border-color: #A85D88; }
        .filter-count {
            margin-left: auto;
            font-size: 13px;
            color: #6B7280;
        }
        .filter-count strong { color: #1A2F4A; }

        /* ── Events Listing ── */
        .events-listing {
            padding: 56px 0 80px;
            background: #F8F5E8;
        }
        .events-full-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }
        @media (max-width: 960px) { .events-full-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 600px) { .events-full-grid { grid-template-columns: 1fr; } }

        /* Event Cards (expanded from public.html) */
        .event-card { background: white; border: 1px solid #E2E8F0; border-radius: 16px; overflow: hidden; transition: box-shadow 0.2s, transform 0.2s; display: flex; flex-direction: column; }
        .event-card:hover { box-shadow: 0 10px 32px rgba(0,0,0,0.09); transform: translateY(-4px); }
        .event-card-date { padding: 20px; text-align: center; color: white; flex-shrink: 0; }
        .event-card-date .month { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.12em; opacity: 0.85; }
        .event-card-date .day { font-size: 46px; font-weight: 900; line-height: 1; font-family: 'Playfair Display', serif; }
        .event-card-date .year { font-size: 12px; opacity: 0.75; margin-top: 2px; }
        .event-card-body { padding: 20px; display: flex; flex-direction: column; flex: 1; }
        .event-card-body h3 { font-family: 'Inter', sans-serif; font-size: 16px; font-weight: 700; margin-bottom: 8px; color: #1A2F4A; }
        .event-card-body p { font-size: 13px; color: #6B7280; line-height: 1.55; margin-bottom: 12px; flex: 1; }
        .event-meta { display: flex; gap: 10px; flex-wrap: wrap; font-size: 12px; color: #6B7280; margin-bottom: 14px; }
        .event-meta span { display: flex; align-items: center; gap: 4px; }
        .event-tag { display: inline-block; font-size: 11px; font-weight: 700; padding: 3px 10px; border-radius: 20px; }
        .event-tag.free   { background: #dcfce7; color: #16a34a; }
        .event-tag.paid   { background: #fce7f3; color: #9d174d; }
        .event-tag.online { background: #dbeafe; color: #1d4ed8; }
        .event-tag.inperson { background: #fef3c7; color: #92400e; }
        .event-tag.kids   { background: #d1fae5; color: #065f46; }
        .event-tags-row { display: flex; gap: 6px; flex-wrap: wrap; margin-bottom: 10px; }
        .event-register-btn {
            display: block; width: 100%; padding: 11px;
            background: #1B6B72; color: white;
            border: none; border-radius: 10px;
            font-family: inherit; font-size: 13px; font-weight: 700;
            cursor: pointer; text-align: center; text-decoration: none;
            transition: filter 0.2s; margin-top: auto;
        }
        .event-register-btn:hover { filter: brightness(0.92); }
        .event-register-btn.btn-navy  { background: #1A2F4A; }
        .event-register-btn.btn-mauve { background: #A85D88; }
        .event-register-btn.btn-sage  { background: #065f46; }

        /* Past event styling */
        .event-card.past-event { opacity: 0.55; pointer-events: none; }
        .event-card.past-event .event-register-btn { background: #9CA3AF; }

        /* ── Section Heading ── */
        .events-section-heading {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            color: #1A2F4A;
            margin: 40px 0 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid #E2E8F0;
        }
        .events-section-heading:first-child { margin-top: 0; }

        /* ── CTA Banner ── */
        .cta-banner {
            background: linear-gradient(135deg, #1A2F4A 0%, #1B6B72 100%);
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
        .cta-banner p { font-size: 16px; opacity: 0.85; max-width: 500px; margin: 0 auto 28px; line-height: 1.7; }
        .btn-cta-white {
            display: inline-block; background: white; color: #1A2F4A;
            padding: 14px 36px; border-radius: 30px; font-size: 15px; font-weight: 700;
            text-decoration: none; transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
        }
        .btn-cta-white:hover { transform: translateY(-2px); }

        /* ── Footer ── */
        footer { background: #1A2F4A; color: rgba(255,255,255,0.8); padding: 60px 0 30px; }
        .footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 40px; margin-bottom: 48px; }
        .footer-brand .logo { color: white !important; font-size: 22px; }
        .footer-brand p { font-size: 13px; margin-top: 14px; line-height: 1.7; opacity: 0.7; }
        .footer-col h4 { font-family: 'Inter', sans-serif; font-size: 12px; text-transform: uppercase; letter-spacing: 0.1em; color: rgba(255,255,255,0.5); margin-bottom: 16px; }
        .footer-col a { display: block; color: rgba(255,255,255,0.75); text-decoration: none; font-size: 13px; margin-bottom: 10px; transition: color 0.2s; }
        .footer-col a:hover { color: white; }
        .footer-bottom { border-top: 1px solid rgba(255,255,255,0.1); padding-top: 24px; display: flex; justify-content: space-between; align-items: center; font-size: 12px; color: rgba(255,255,255,0.45); }
        .social-links { display: flex; gap: 12px; }
        .social-links a { width: 34px; height: 34px; border-radius: 8px; background: rgba(255,255,255,0.08); display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.7); text-decoration: none; transition: background 0.2s; }
        .social-links a:hover { background: rgba(255,255,255,0.15); }

        /* Toast */
        .toast { display: none; position: fixed; bottom: 30px; right: 30px; background: #16A34A; color: white; padding: 14px 20px; border-radius: 12px; font-size: 14px; font-weight: 600; box-shadow: 0 8px 24px rgba(0,0,0,0.15); z-index: 999; }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="container">
        <header>
            <a href="{{ url('/') }}" class="logo">Zainab Center</a>
            <nav>
                <a href="public.html#about">About</a>
                <a href="{{ url('/programs') }}">Programs</a>
                <a href="{{ url('/events') }}" style="color:var(--color-secondary);">Events</a>
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
                <span>Events</span>
            </div>
            <h1>Events & Community</h1>
            <p>Open lectures, graduation ceremonies, Ramadan programs, workshops, and more — all part of our vibrant community.</p>
        </div>
    </section>

    <!-- Filter Bar -->
    <div class="filter-section">
        <div class="container">
            <div class="filter-bar">
                <div>
                    <label>Type</label>
                    <select id="filter-price" onchange="filterEvents()">
                        <option value="all">All Types</option>
                        <option value="free">Free</option>
                        <option value="paid">Paid</option>
                    </select>
                </div>
                <div>
                    <label>Format</label>
                    <select id="filter-format" onchange="filterEvents()">
                        <option value="all">All Formats</option>
                        <option value="online">Online</option>
                        <option value="inperson">In-Person</option>
                    </select>
                </div>
                <div>
                    <label>Month</label>
                    <select id="filter-month" onchange="filterEvents()">
                        <option value="all">All Months</option>
                        <option value="march">March 2026</option>
                        <option value="april">April 2026</option>
                        <option value="may">May 2026</option>
                        <option value="june">June 2026</option>
                        <option value="july">July 2026</option>
                    </select>
                </div>
                <div class="filter-count">
                    Showing <strong id="event-count">9</strong> events
                </div>
            </div>
        </div>
    </div>

    <!-- Events Listing -->
    <section class="events-listing">
        <div class="container">

            <h3 class="events-section-heading">Upcoming Events</h3>
            <div class="events-full-grid" id="events-grid">

                <!-- 1: Open Lecture: Science of Hadith -->
                <div class="event-card" data-price="free" data-format="online" data-month="march">
                    <div class="event-card-date" style="background:#1A2F4A;">
                        <div class="month">March</div>
                        <div class="day">22</div>
                        <div class="year">2026</div>
                    </div>
                    <div class="event-card-body">
                        <div class="event-tags-row">
                            <span class="event-tag free">Free</span>
                            <span class="event-tag online">Online · Zoom</span>
                        </div>
                        <h3>Open Lecture: The Science of Hadith</h3>
                        <p>An introductory lecture on Mustalah al-Hadith delivered by Sheikh Ahmad Ridha. Open to all students and the general public — no prior knowledge required.</p>
                        <div class="event-meta">
                            <span><i data-lucide="clock" style="width:13px;"></i> 7:00 – 9:00 PM EST</span>
                            <span><i data-lucide="users" style="width:13px;"></i> 200 spots</span>
                            <span><i data-lucide="user" style="width:13px;"></i> Sheikh Ahmad Ridha</span>
                        </div>
                        <a href="{{ url('/enroll') }}" class="event-register-btn btn-navy">Register Free →</a>
                    </div>
                </div>

                <!-- 2: Annual Iftar Fundraiser Gala -->
                <div class="event-card" data-price="paid" data-format="inperson" data-month="march">
                    <div class="event-card-date" style="background:#1B6B72;">
                        <div class="month">March</div>
                        <div class="day">28</div>
                        <div class="year">2026</div>
                    </div>
                    <div class="event-card-body">
                        <div class="event-tags-row">
                            <span class="event-tag paid">Paid · $50</span>
                            <span class="event-tag inperson">In-Person</span>
                        </div>
                        <h3>Annual Iftar Fundraiser Gala</h3>
                        <p>Our annual Ramadan fundraiser dinner with inspiring speakers, live recitation, and community celebration. Seats are limited — book early to avoid disappointment.</p>
                        <div class="event-meta">
                            <span><i data-lucide="clock" style="width:13px;"></i> 6:30 – 10:00 PM EST</span>
                            <span><i data-lucide="map-pin" style="width:13px;"></i> Main Hall</span>
                            <span><i data-lucide="users" style="width:13px;"></i> 120 seats</span>
                        </div>
                        <a href="{{ url('/enroll') }}" class="event-register-btn">Get Tickets · $50 →</a>
                    </div>
                </div>

                <!-- 3: Spring Graduation Ceremony -->
                <div class="event-card" data-price="free" data-format="online" data-month="april">
                    <div class="event-card-date" style="background:#A85D88;">
                        <div class="month">April</div>
                        <div class="day">12</div>
                        <div class="year">2026</div>
                    </div>
                    <div class="event-card-body">
                        <div class="event-tags-row">
                            <span class="event-tag free">Free</span>
                            <span class="event-tag online">Online · Zoom + YouTube</span>
                        </div>
                        <h3>Spring 2026 Graduation Ceremony</h3>
                        <p>Celebrate the achievements of our graduating class from the Islamic Theology and Arabic programs. All families and community members are warmly welcome.</p>
                        <div class="event-meta">
                            <span><i data-lucide="clock" style="width:13px;"></i> 5:00 – 7:00 PM EST</span>
                            <span><i data-lucide="monitor" style="width:13px;"></i> Zoom + YouTube Live</span>
                        </div>
                        <a href="{{ url('/enroll') }}" class="event-register-btn btn-mauve">Register to Attend →</a>
                    </div>
                </div>

                <!-- 4: Arabic Weekend Workshop -->
                <div class="event-card" data-price="paid" data-format="online" data-month="april">
                    <div class="event-card-date" style="background:#1A2F4A;">
                        <div class="month">April</div>
                        <div class="day">19</div>
                        <div class="year">2026</div>
                    </div>
                    <div class="event-card-body">
                        <div class="event-tags-row">
                            <span class="event-tag paid">Paid · $35</span>
                            <span class="event-tag online">Online</span>
                        </div>
                        <h3>Intensive Arabic Weekend Workshop</h3>
                        <p>A 2-day weekend immersion in conversational and Quranic Arabic. Perfect for beginners who want a structured jump-start before joining a full-term program.</p>
                        <div class="event-meta">
                            <span><i data-lucide="clock" style="width:13px;"></i> Sat–Sun · 10 AM – 4 PM</span>
                            <span><i data-lucide="monitor" style="width:13px;"></i> Zoom</span>
                            <span><i data-lucide="users" style="width:13px;"></i> 40 seats</span>
                        </div>
                        <a href="{{ url('/enroll') }}" class="event-register-btn btn-navy">Register · $35 →</a>
                    </div>
                </div>

                <!-- 5: Quran Recitation Competition -->
                <div class="event-card" data-price="free" data-format="online" data-month="may">
                    <div class="event-card-date" style="background:#1B6B72;">
                        <div class="month">May</div>
                        <div class="day">3</div>
                        <div class="year">2026</div>
                    </div>
                    <div class="event-card-body">
                        <div class="event-tags-row">
                            <span class="event-tag free">Free</span>
                            <span class="event-tag online">Online</span>
                            <span class="event-tag kids">All Ages</span>
                        </div>
                        <h3>Quran Recitation Competition</h3>
                        <p>Annual community Quran competition open to students of all ages and levels. Categories for children (ages 6–14), youth (15–25), and adults. Certificates and prizes awarded.</p>
                        <div class="event-meta">
                            <span><i data-lucide="clock" style="width:13px;"></i> 2:00 – 6:00 PM EST</span>
                            <span><i data-lucide="monitor" style="width:13px;"></i> Zoom</span>
                            <span><i data-lucide="award" style="width:13px;"></i> Prizes & Certificates</span>
                        </div>
                        <a href="{{ url('/enroll') }}" class="event-register-btn">Register to Compete →</a>
                    </div>
                </div>

                <!-- 6: Sisters' Halaqa -->
                <div class="event-card" data-price="free" data-format="online" data-month="may">
                    <div class="event-card-date" style="background:#A85D88;">
                        <div class="month">May</div>
                        <div class="day">10</div>
                        <div class="year">2026</div>
                    </div>
                    <div class="event-card-body">
                        <div class="event-tags-row">
                            <span class="event-tag free">Free</span>
                            <span class="event-tag online">Online</span>
                        </div>
                        <h3>Sisters' Halaqa: Spiritual Self-Care</h3>
                        <p>A monthly sisters-only gathering focused on spiritual nourishment and community connection. This session: "Balancing Family, Work, and Ibadah in the Modern World."</p>
                        <div class="event-meta">
                            <span><i data-lucide="clock" style="width:13px;"></i> 7:30 – 9:00 PM EST</span>
                            <span><i data-lucide="monitor" style="width:13px;"></i> Zoom (Sisters Only)</span>
                        </div>
                        <a href="{{ url('/enroll') }}" class="event-register-btn btn-mauve">Register Free →</a>
                    </div>
                </div>

                <!-- 7: Youth Summer Camp -->
                <div class="event-card" data-price="paid" data-format="inperson" data-month="june">
                    <div class="event-card-date" style="background:#065f46;">
                        <div class="month">June</div>
                        <div class="day">14</div>
                        <div class="year">2026</div>
                    </div>
                    <div class="event-card-body">
                        <div class="event-tags-row">
                            <span class="event-tag paid">Paid · $120</span>
                            <span class="event-tag inperson">In-Person</span>
                            <span class="event-tag kids">Ages 8–16</span>
                        </div>
                        <h3>Youth Islamic Studies Summer Camp</h3>
                        <p>A 3-day residential camp for children and teens combining Islamic studies, outdoor activities, Quran circles, and community service projects. A transformative experience.</p>
                        <div class="event-meta">
                            <span><i data-lucide="calendar" style="width:13px;"></i> June 14–16, 2026</span>
                            <span><i data-lucide="map-pin" style="width:13px;"></i> Camp Venue (TBA)</span>
                            <span><i data-lucide="users" style="width:13px;"></i> Limited spots</span>
                        </div>
                        <a href="{{ url('/enroll') }}" class="event-register-btn btn-sage">Register · $120 →</a>
                    </div>
                </div>

                <!-- 8: Summer Enrollment Open Day -->
                <div class="event-card" data-price="free" data-format="online" data-month="june">
                    <div class="event-card-date" style="background:#1A2F4A;">
                        <div class="month">June</div>
                        <div class="day">20</div>
                        <div class="year">2026</div>
                    </div>
                    <div class="event-card-body">
                        <div class="event-tags-row">
                            <span class="event-tag free">Free</span>
                            <span class="event-tag online">Online</span>
                        </div>
                        <h3>Summer 2026 Enrollment Open Day</h3>
                        <p>Meet our teachers, ask questions about programs, and get guidance on which track is right for you. New and prospective students are warmly invited to attend.</p>
                        <div class="event-meta">
                            <span><i data-lucide="clock" style="width:13px;"></i> 11:00 AM – 1:00 PM EST</span>
                            <span><i data-lucide="monitor" style="width:13px;"></i> Zoom</span>
                        </div>
                        <a href="{{ url('/enroll') }}" class="event-register-btn btn-navy">Register Free →</a>
                    </div>
                </div>

                <!-- 9: End-of-Year Community Celebration -->
                <div class="event-card" data-price="free" data-format="inperson" data-month="july">
                    <div class="event-card-date" style="background:#1B6B72;">
                        <div class="month">July</div>
                        <div class="day">5</div>
                        <div class="year">2026</div>
                    </div>
                    <div class="event-card-body">
                        <div class="event-tags-row">
                            <span class="event-tag free">Free</span>
                            <span class="event-tag inperson">In-Person</span>
                        </div>
                        <h3>End-of-Year Community Celebration</h3>
                        <p>An end-of-academic-year gathering for all students, families, and supporters. Includes student performances, teacher recognition, community picnic, and free food. All welcome.</p>
                        <div class="event-meta">
                            <span><i data-lucide="clock" style="width:13px;"></i> 4:00 – 8:00 PM EST</span>
                            <span><i data-lucide="map-pin" style="width:13px;"></i> Community Park (TBA)</span>
                            <span><i data-lucide="users" style="width:13px;"></i> Open to all</span>
                        </div>
                        <a href="{{ url('/enroll') }}" class="event-register-btn">RSVP Free →</a>
                    </div>
                </div>

            </div>

            <!-- No results message -->
            <div id="no-results" style="display:none;text-align:center;padding:60px 0;color:#6B7280;">
                <i data-lucide="calendar-x" style="width:48px;height:48px;opacity:0.4;margin-bottom:16px;display:block;margin:0 auto 16px;"></i>
                <p style="font-size:16px;">No events match your filters. <a href="#" onclick="clearFilters();return false;" style="color:#A85D88;font-weight:600;">Clear all filters</a></p>
            </div>

            <!-- Stay Updated Box -->
            <div style="margin-top:56px;background:white;border-radius:16px;padding:36px 40px;display:flex;align-items:center;justify-content:space-between;gap:32px;flex-wrap:wrap;border:1px solid #E2E8F0;">
                <div>
                    <h3 style="font-family:'Playfair Display',serif;font-size:22px;color:#1A2F4A;margin-bottom:8px;">Never miss an event</h3>
                    <p style="font-size:14px;color:#6B7280;max-width:420px;">Subscribe to our community newsletter and be the first to hear about new events, programs, and announcements.</p>
                </div>
                <div style="display:flex;gap:10px;flex-shrink:0;">
                    <input type="email" placeholder="your@email.com" style="padding:11px 16px;border:1px solid #D1D5DB;border-radius:10px;font-family:inherit;font-size:14px;width:220px;">
                    <button onclick="showToast('You\'re subscribed!')" style="padding:11px 20px;background:#A85D88;color:white;border:none;border-radius:10px;font-family:inherit;font-size:14px;font-weight:700;cursor:pointer;">Subscribe</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Bottom CTA -->
    <section class="cta-banner">
        <div class="container">
            <h2>Ready to join our community?</h2>
            <p>Enroll in a program and become part of a growing family of learners dedicated to sacred knowledge.</p>
            <a href="{{ url('/programs') }}" class="btn-cta-white">Explore Programs →</a>
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
                    <a href="{{ url('/events') }}">Events</a>
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

        function filterEvents() {
            const price  = document.getElementById('filter-price').value;
            const format = document.getElementById('filter-format').value;
            const month  = document.getElementById('filter-month').value;

            const cards = document.querySelectorAll('#events-grid .event-card');
            let visible = 0;

            cards.forEach(card => {
                const matchPrice  = (price  === 'all') || (card.dataset.price  === price);
                const matchFormat = (format === 'all') || (card.dataset.format === format);
                const matchMonth  = (month  === 'all') || (card.dataset.month  === month);
                const show = matchPrice && matchFormat && matchMonth;
                card.style.display = show ? '' : 'none';
                if (show) visible++;
            });

            document.getElementById('event-count').textContent = visible;
            document.getElementById('no-results').style.display = visible === 0 ? 'block' : 'none';
        }

        function clearFilters() {
            document.getElementById('filter-price').value  = 'all';
            document.getElementById('filter-format').value = 'all';
            document.getElementById('filter-month').value  = 'all';
            filterEvents();
        }
    </script>
</body>

</html>
