<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zainab Center | Sacred Knowledge for All</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/public.css") }}">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        /* About Section */
        .about {
            padding: 80px 0;
            background: white;
        }
        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }
        .about-visual {
            background: linear-gradient(135deg, #1A2F4A 0%, #1B6B72 100%);
            border-radius: 20px;
            padding: 48px 40px;
            color: white;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }
        .about-stat { text-align: center; }
        .about-stat .num { font-size: 40px; font-weight: 900; font-family: 'Playfair Display', serif; }
        .about-stat .lbl { font-size: 12px; text-transform: uppercase; letter-spacing: 0.1em; opacity: 0.75; margin-top: 4px; }
        .about-text h2 { font-family: 'Playfair Display', serif; font-size: 36px; color: var(--color-primary); margin-bottom: 16px; }
        .about-text p { font-size: 15px; color: #4A5568; line-height: 1.75; margin-bottom: 16px; }
        .about-text ul { padding-left: 20px; }
        .about-text ul li { font-size: 14px; color: #4A5568; margin-bottom: 8px; line-height: 1.6; }

        /* Contact Section */
        .contact {
            padding: 80px 0;
            background: var(--color-bg);
        }
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
        }
        .contact-info h2 { font-family: 'Playfair Display', serif; font-size: 34px; color: var(--color-primary); margin-bottom: 16px; }
        .contact-info p { font-size: 15px; color: #4A5568; margin-bottom: 28px; line-height: 1.7; }
        .contact-detail { display: flex; gap: 14px; align-items: flex-start; margin-bottom: 20px; }
        .contact-detail .icon-wrap { width: 40px; height: 40px; border-radius: 10px; background: rgba(27,107,114,0.1); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .contact-detail .icon-wrap i { color: var(--color-primary); }
        .contact-detail h4 { font-size: 13px; font-weight: 700; margin-bottom: 2px; color: #1A2F4A; }
        .contact-detail p { font-size: 13px; color: #4A5568; margin: 0; }
        .contact-form { background: white; border-radius: 20px; padding: 36px; box-shadow: 0 4px 24px rgba(0,0,0,0.06); }
        .contact-form h3 { font-family: 'Playfair Display', serif; font-size: 22px; color: #1A2F4A; margin-bottom: 24px; }
        .cform-group { margin-bottom: 18px; }
        .cform-group label { display: block; font-size: 13px; font-weight: 700; margin-bottom: 7px; color: #1A2F4A; }
        .cform-group input, .cform-group select, .cform-group textarea {
            width: 100%; padding: 12px 16px;
            border: 1px solid #E2E8F0; border-radius: 10px;
            font-family: inherit; font-size: 14px;
        }
        .cform-group textarea { resize: vertical; min-height: 100px; }
        .cform-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
        .btn-submit {
            width: 100%; padding: 14px;
            background: var(--color-primary); color: white;
            border: none; border-radius: 10px; font-family: inherit;
            font-size: 14px; font-weight: 700; cursor: pointer;
            transition: filter 0.2s;
        }
        .btn-submit:hover { filter: brightness(0.92); }

        /* Footer */
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

        /* Events section */
        .events-section { padding: 80px 0; background: white; }
        .events-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; margin-top: 48px; }
        @media (max-width: 768px) { .events-grid { grid-template-columns: 1fr; } }
        .event-card { border: 1px solid var(--color-mid-gray, #D9D9D9); border-radius: 12px; overflow: hidden; transition: box-shadow 0.2s, transform 0.2s; }
        .event-card:hover { box-shadow: 0 8px 24px rgba(0,0,0,0.08); transform: translateY(-3px); }
        .event-card-date { background: var(--color-deep-teal, #1B6B72); color: white; padding: 16px 20px; text-align: center; }
        .event-card-date .month { font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; opacity: 0.8; }
        .event-card-date .day { font-size: 40px; font-weight: 800; line-height: 1; }
        .event-card-body { padding: 20px; }
        .event-card-body h3 { font-family: 'Inter', sans-serif; font-size: 16px; font-weight: 700; margin-bottom: 8px; color: #1A2F4A; }
        .event-card-body p { font-size: 13px; color: #6B7280; line-height: 1.5; margin-bottom: 12px; }
        .event-meta { display: flex; gap: 12px; flex-wrap: wrap; font-size: 12px; color: #6B7280; margin-bottom: 16px; }
        .event-meta span { display: flex; align-items: center; gap: 4px; }
        .event-tag { display: inline-block; font-size: 11px; font-weight: 700; padding: 3px 10px; border-radius: 20px; }
        .event-tag.free { background: #dcfce7; color: #16a34a; }
        .event-tag.paid { background: #fce7f3; color: #9d174d; }
        .event-tag.online { background: #dbeafe; color: #1d4ed8; }
        .event-register-btn { display: block; width: 100%; padding: 10px; background: var(--color-deep-teal, #1B6B72); color: white; border: none; border-radius: 8px; font-size: 13px; font-weight: 700; cursor: pointer; text-align: center; text-decoration: none; transition: opacity 0.2s; }
        .event-register-btn:hover { opacity: 0.9; }
        .event-register-btn.free-btn { background: #1A2F4A; }

        /* Success toast */
        .toast {
            display: none;
            position: fixed; bottom: 30px; right: 30px;
            background: #16A34A; color: white; padding: 14px 20px;
            border-radius: 12px; font-size: 14px; font-weight: 600;
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
            z-index: 999;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="container">
        <header>
            <a href="{{ url('/') }}" class="logo">Zainab Center</a>
            <nav>
                <a href="#about">About</a>
                <a href="#programs">Programs</a>
                <a href="#events">Events</a>
                <a href="#contact">Contact</a>
                <a href="{{ url('/donate') }}" style="color:#A85D88;font-weight:700;">Donate</a>
                <a href="{{ url('/admin') }}" class="btn-login">Portal Login</a>
            </nav>
        </header>
    </div>

    <!-- Hero -->
    <section class="hero">
        <div class="container">
            <h1>Illuminate Your Path with Sacred Knowledge</h1>
            <p>Experience a modern, transformative Islamic education designed for the 21st-century student. Join our community of lifelong learners.</p>
            <a href="{{ url('/enroll') }}" class="btn-cta">Start Your Journey</a>
        </div>
    </section>

    <!-- Programs -->
    <section class="programs" id="programs">
        <div class="container">
            <div style="display:flex;align-items:baseline;justify-content:space-between;margin-bottom:0;">
                <h2 class="section-title" style="margin-bottom:0;">Explore Our Programs</h2>
                <a href="{{ url('/programs') }}" style="font-size:14px;font-weight:700;color:var(--color-primary);text-decoration:none;white-space:nowrap;margin-left:24px;">View All Programs →</a>
            </div>
            <p style="text-align:center;color:#718096;font-size:14px;margin:8px 0 48px;">Showing 3 of 8 programs</p>
            <div class="programs-grid">
                @forelse($programs as $program)
                <div class="program-card">
                    <div class="program-image">
                        <i data-lucide="{{ ['book-open', 'languages', 'scroll'][crc32($program->id) % 3] }}" style="width: 48px; height: 48px; color: var(--color-primary);"></i>
                    </div>
                    <div class="program-content">
                        <h3>{{ $program->name }}</h3>
                        <p>{{ Str::words(strip_tags($program->description), 12) }}</p>
                        <div style="font-size: 13px; font-weight: 700; color: var(--color-primary); margin-bottom: 12px;">${{ number_format($program->monthly_fee ?? $program->registration_fee, 0) }} / term</div>
                        <a href="{{ url('/enroll') }}?program_id={{ $program->id }}" class="enroll-link">Enroll Now →</a>
                    </div>
                </div>
                @empty
                <p style="text-align:center;color:#718096;grid-column:1/-1;">No active programs found.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- About -->
    <section class="about" id="about">
        <div class="container">
            <div class="about-grid">
                <div class="about-visual">
                    <div class="about-stat">
                        <div class="num">1,024</div>
                        <div class="lbl">Active Students</div>
                    </div>
                    <div class="about-stat">
                        <div class="num">48</div>
                        <div class="lbl">Expert Teachers</div>
                    </div>
                    <div class="about-stat">
                        <div class="num">12</div>
                        <div class="lbl">Years of Service</div>
                    </div>
                    <div class="about-stat">
                        <div class="num">8</div>
                        <div class="lbl">Programs Offered</div>
                    </div>
                </div>
                <div class="about-text">
                    <h2>Who We Are</h2>
                    <p>Zainab Center is a community-focused Islamic education institution dedicated to making authentic sacred knowledge accessible to all. Founded over a decade ago, we have grown from a small circle of students into a thriving learning community.</p>
                    <p>Our approach blends traditional Islamic scholarship with modern pedagogy — live online classes, structured curricula, and personalized coaching for every level of learner.</p>
                    <ul>
                        <li>Accredited scholars and experienced educators</li>
                        <li>Flexible scheduling for adults, families, and children</li>
                        <li>Supportive community environment with parent involvement</li>
                        <li>Transparent tuition with installment options</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Events -->
    <section class="events-section" id="events">
        <div class="container">
            <div style="display:flex;align-items:baseline;justify-content:space-between;margin-bottom:4px;">
                <h2 class="section-title" style="text-align:left;margin-bottom:0;">Upcoming Events</h2>
                <a href="{{ url('/events') }}" style="font-size:14px;font-weight:700;color:var(--color-secondary, #A85D88);text-decoration:none;white-space:nowrap;margin-left:24px;">View All Events →</a>
            </div>
            <p style="color:#6B7280;max-width:560px;margin:0 0 0;">Join our community events — open lectures, graduation ceremonies, Ramadan programs, and more.</p>
            <p style="font-size:13px;color:#9CA3AF;margin:6px 0 0;">Showing 3 of 9 upcoming events</p>

            <div class="events-grid">
                @forelse($events as $event)
                @php
                    $isPast = $event->start_date && $event->start_date->isPast();
                    // Color styling hash based on ID for visual variety like the static mockup
                    $colors = ['#1A2F4A', '#1B6B72', '#A85D88', '#065f46'];
                    $bgColor = $colors[$event->id % count($colors)];
                    
                    $isFree = $event->pricing_type === 'free';
                    $isOnline = str_contains(strtolower($event->location), 'online') || str_contains(strtolower($event->location), 'zoom');
                @endphp
                <div class="event-card">
                    <div class="event-card-date" style="background: {{ $bgColor }};">
                        <div class="month">{{ $event->start_date ? $event->start_date->format('F') : 'TBA' }}</div>
                        <div class="day">{{ $event->start_date ? $event->start_date->format('d') : '--' }}</div>
                        <div style="font-size:12px;opacity:0.8;margin-top:2px;">{{ $event->start_date ? $event->start_date->format('Y') : '----' }}</div>
                    </div>
                    <div class="event-card-body">
                        <div style="display:flex;gap:6px;margin-bottom:10px;">
                            @if($isFree)
                                <span class="event-tag free">Free</span>
                            @else
                                <span class="event-tag paid">Paid · ${{ number_format($event->ticket_price, 0) }}</span>
                            @endif
                            @if($isOnline)
                                <span class="event-tag online">Online</span>
                            @endif
                        </div>
                        <h3>{{ $event->title }}</h3>
                        <p>{{ Str::words(strip_tags($event->description), 14) }}</p>
                        <div class="event-meta">
                            <span><i data-lucide="clock" style="width:13px;"></i> {{ $event->start_date ? $event->start_date->format('g:i A') : 'TBD' }}</span>
                            <span><i data-lucide="{{ $isOnline ? 'monitor' : 'map-pin' }}" style="width:13px;"></i> {{ Str::limit($event->location, 20) }}</span>
                        </div>
                        <a href="{{ url('/enroll') }}" class="event-register-btn {{ $isFree ? 'free-btn' : '' }}" {{ $isFree ? 'style=background:'.$bgColor : '' }}>
                            {{ $isFree ? 'Register Free →' : 'Get Tickets · $'.number_format($event->ticket_price, 0).' →' }}
                        </a>
                    </div>
                </div>
                @empty
                <p style="text-align:center;color:#718096;grid-column:1/-1;">No upcoming events at this time.</p>
                @endforelse
            </div>

            <div style="text-align:center;margin-top:40px;">
                <a href="{{ url('/events') }}" style="display:inline-block;padding:13px 32px;border:2px solid var(--color-secondary,#A85D88);color:var(--color-secondary,#A85D88);border-radius:30px;font-size:14px;font-weight:700;text-decoration:none;transition:background 0.2s,color 0.2s;" onmouseover="this.style.background='#A85D88';this.style.color='white';" onmouseout="this.style.background='';this.style.color='#A85D88';">See All 9 Upcoming Events →</a>
            </div>
        </div>
    </section>

    <!-- Donate CTA Section -->
    <section id="donate" style="padding:80px 0;background:linear-gradient(135deg,#1A2F4A 0%,#A85D88 100%);color:white;overflow:hidden;position:relative;">
        <!-- decorative circles -->
        <div style="position:absolute;width:400px;height:400px;border-radius:50%;background:rgba(255,255,255,0.04);top:-120px;right:-80px;pointer-events:none;"></div>
        <div style="position:absolute;width:240px;height:240px;border-radius:50%;background:rgba(255,255,255,0.05);bottom:-60px;left:60px;pointer-events:none;"></div>
        <div class="container" style="position:relative;">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center;">
                <!-- Left: text -->
                <div>
                    <div style="font-size:12px;text-transform:uppercase;letter-spacing:0.12em;opacity:0.65;margin-bottom:14px;font-weight:700;">Sadaqah Jariyah</div>
                    <h2 style="font-family:'Playfair Display',serif;font-size:42px;color:white;margin-bottom:16px;line-height:1.2;">Support Sacred<br>Knowledge</h2>
                    <p style="font-size:15px;opacity:0.85;line-height:1.8;margin-bottom:28px;max-width:440px;">Your donation funds student scholarships, supports dedicated scholars, and ensures no one is turned away from Islamic education due to financial hardship.</p>
                    <div style="display:flex;gap:12px;flex-wrap:wrap;margin-bottom:32px;">
                        <a href="{{ url('/donate') }}" style="display:inline-block;background:white;color:#A85D88;padding:14px 32px;border-radius:30px;font-size:15px;font-weight:700;text-decoration:none;box-shadow:0 8px 24px rgba(0,0,0,0.2);transition:transform 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform=''">Donate Now →</a>
                        <a href="{{ url('/donate') }}" style="display:inline-block;border:2px solid rgba(255,255,255,0.5);color:white;padding:14px 28px;border-radius:30px;font-size:14px;font-weight:700;text-decoration:none;transition:border-color 0.2s;" onmouseover="this.style.borderColor='white'" onmouseout="this.style.borderColor='rgba(255,255,255,0.5)'">Pay Zakat</a>
                    </div>
                    <p style="font-size:12px;opacity:0.55;font-style:italic;">"The believer's shade on the Day of Resurrection will be their charity." — Tirmidhi</p>
                </div>
                <!-- Right: impact stats -->
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
                    <div style="background:rgba(255,255,255,0.1);border-radius:16px;padding:24px;backdrop-filter:blur(4px);">
                        <div style="font-size:40px;font-weight:900;font-family:'Playfair Display',serif;">142</div>
                        <div style="font-size:12px;text-transform:uppercase;letter-spacing:0.08em;opacity:0.7;margin-top:6px;">Students Supported</div>
                    </div>
                    <div style="background:rgba(255,255,255,0.1);border-radius:16px;padding:24px;backdrop-filter:blur(4px);">
                        <div style="font-size:40px;font-weight:900;font-family:'Playfair Display',serif;">$48K</div>
                        <div style="font-size:12px;text-transform:uppercase;letter-spacing:0.08em;opacity:0.7;margin-top:6px;">Raised This Year</div>
                    </div>
                    <div style="background:rgba(255,255,255,0.1);border-radius:16px;padding:24px;backdrop-filter:blur(4px);">
                        <div style="font-size:40px;font-weight:900;font-family:'Playfair Display',serif;">38</div>
                        <div style="font-size:12px;text-transform:uppercase;letter-spacing:0.08em;opacity:0.7;margin-top:6px;">Full Scholarships</div>
                    </div>
                    <div style="background:rgba(255,255,255,0.15);border-radius:16px;padding:24px;backdrop-filter:blur(4px);border:1px solid rgba(255,255,255,0.2);">
                        <div style="font-size:15px;font-weight:700;margin-bottom:6px;">Monthly Giving</div>
                        <div style="font-size:12px;opacity:0.75;line-height:1.6;">Set up recurring giving and earn ongoing reward for every lesson taught.</div>
                        <a href="{{ url('/donate') }}" style="display:inline-block;margin-top:10px;font-size:12px;font-weight:700;color:white;text-decoration:underline;">Start monthly →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section class="contact" id="contact">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-info">
                    <h2>Get in Touch</h2>
                    <p>Have questions about our programs, enrollment process, or fees? We'd love to hear from you. Our admissions team typically responds within 1 business day.</p>
                    <div class="contact-detail">
                        <div class="icon-wrap"><i data-lucide="mail" style="width:18px;"></i></div>
                        <div>
                            <h4>Email</h4>
                            <p>info@zainabcenter.com</p>
                        </div>
                    </div>
                    <div class="contact-detail">
                        <div class="icon-wrap"><i data-lucide="phone" style="width:18px;"></i></div>
                        <div>
                            <h4>Phone / WhatsApp</h4>
                            <p>+1 (416) 555-0100</p>
                        </div>
                    </div>
                    <div class="contact-detail">
                        <div class="icon-wrap"><i data-lucide="clock" style="width:18px;"></i></div>
                        <div>
                            <h4>Office Hours</h4>
                            <p>Mon–Fri, 10:00 AM – 6:00 PM EST</p>
                        </div>
                    </div>
                    <div class="contact-detail">
                        <div class="icon-wrap"><i data-lucide="globe" style="width:18px;"></i></div>
                        <div>
                            <h4>Classes</h4>
                            <p>All classes held online via Google Meet</p>
                        </div>
                    </div>
                </div>

                <div class="contact-form">
                    <h3>Send an Inquiry</h3>
                    <div class="cform-row">
                        <div class="cform-group">
                            <label>First Name</label>
                            <input type="text" placeholder="Your first name">
                        </div>
                        <div class="cform-group">
                            <label>Last Name</label>
                            <input type="text" placeholder="Your last name">
                        </div>
                    </div>
                    <div class="cform-group">
                        <label>Email Address</label>
                        <input type="email" placeholder="you@example.com">
                    </div>
                    <div class="cform-group">
                        <label>Program of Interest</label>
                        <select>
                            <option value="">— Select a program —</option>
                            <option>Islamic Theology</option>
                            <option>Arabic Language</option>
                            <option>Quranic Studies</option>
                            <option>1-on-1 Coaching</option>
                            <option>General Inquiry</option>
                        </select>
                    </div>
                    <div class="cform-group">
                        <label>Message</label>
                        <textarea placeholder="Tell us about yourself or ask a question…"></textarea>
                    </div>
                    <button class="btn-submit" onclick="submitInquiry()">Send Inquiry</button>
                </div>
            </div>
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
                    <a href="#about">About Us</a>
                    <a href="{{ url('/events') }}">Events</a>
                    <a href="#contact">Contact</a>
                    <a href="#">Our Teachers</a>
                    <a href="#">Community</a>
                </div>
                <div class="footer-col">
                    <h4>Student</h4>
                    <a href="{{ url('/portal') }}">Student Portal</a>
                    <a href="{{ url('/enroll') }}">Enroll Now</a>
                    <a href="{{ url('/donate') }}">Donate</a>
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

    <!-- Toast notification -->
    <div class="toast" id="toast">✓ Inquiry sent! We'll be in touch within 1 business day.</div>

    <script>
        lucide.createIcons();
        function submitInquiry() {
            const toast = document.getElementById('toast');
            toast.style.display = 'block';
            setTimeout(() => { toast.style.display = 'none'; }, 4000);
        }
    </script>
</body>

</html>
