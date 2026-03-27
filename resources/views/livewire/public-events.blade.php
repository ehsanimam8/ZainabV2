<div>
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
                    <select wire:model.live="type">
                        <option value="all">All Types</option>
                        <option value="free">Free</option>
                        <option value="paid">Paid</option>
                    </select>
                </div>
                <div>
                    <label>Format</label>
                    <select wire:model.live="format">
                        <option value="all">All Formats</option>
                        <option value="online">Online</option>
                        <option value="inperson">In-Person</option>
                    </select>
                </div>
                <div>
                    <label>Month</label>
                    <select wire:model.live="month">
                        <option value="all">All Months</option>
                        <option value="january">January 2026</option>
                        <option value="february">February 2026</option>
                        <option value="march">March 2026</option>
                        <option value="april">April 2026</option>
                        <option value="may">May 2026</option>
                        <option value="june">June 2026</option>
                        <option value="july">July 2026</option>
                        <option value="august">August 2026</option>
                        <option value="september">September 2026</option>
                        <option value="october">October 2026</option>
                        <option value="november">November 2026</option>
                        <option value="december">December 2026</option>
                    </select>
                </div>
                <div class="filter-count">
                    Showing <strong wire:loading.remove>{{ $events->count() }}</strong>
                    <strong wire:loading>...</strong> events
                </div>
            </div>
        </div>
    </div>

    <!-- Events Listing -->
    <section class="events-listing">
        <div class="container">

            <h3 class="events-section-heading">Upcoming Events</h3>
            <div class="events-full-grid">

                @forelse($events as $event)
                    @php
                        $isPast = $event->start_date && $event->start_date->isPast();
                        // Color styling hash based on ID for visual variety like the static mockup
                        $colors = ['#1A2F4A', '#1B6B72', '#A85D88', '#065f46'];
                        $bgColor = $colors[crc32($event->id) % count($colors)];
                        
                        $isFree = $event->pricing_type === 'free';
                        $isOnline = str_contains(strtolower($event->location), 'online') || str_contains(strtolower($event->location), 'zoom');
                    @endphp

                    <div class="event-card {{ $isPast ? 'past-event' : '' }}">
                        <div class="event-card-date" style="background:{{ $bgColor }};">
                            <div class="month">{{ $event->start_date ? $event->start_date->format('F') : 'TBA' }}</div>
                            <div class="day">{{ $event->start_date ? $event->start_date->format('d') : '--' }}</div>
                            <div class="year">{{ $event->start_date ? $event->start_date->format('Y') : '----' }}</div>
                        </div>
                        <div class="event-card-body">
                            <div class="event-tags-row">
                                @if($isFree)
                                    <span class="event-tag free">Free</span>
                                @else
                                    <span class="event-tag paid">Paid · ${{ number_format($event->ticket_price, 0) }}</span>
                                @endif
                                
                                @if($isOnline)
                                    <span class="event-tag online">Online</span>
                                @else
                                    <span class="event-tag inperson">In-Person</span>
                                @endif
                                
                                @if(str_contains(strtolower($event->title), 'youth') || str_contains(strtolower($event->title), 'kids'))
                                    <span class="event-tag kids">Youth/Kids</span>
                                @endif
                            </div>
                            <h3>{{ $event->title }}</h3>
                            <p>{{ Str::limit(strip_tags($event->description), 140) }}</p>
                            <div class="event-meta">
                                <span>
                                    <i data-lucide="clock" style="width:13px;"></i> 
                                    {{ $event->start_date ? $event->start_date->format('g:i A') : 'TBD' }}
                                    @if($event->end_date)
                                      – {{ $event->end_date->format('g:i A T') }}
                                    @endif
                                </span>
                                <span><i data-lucide="{{ $isOnline ? 'monitor' : 'map-pin' }}" style="width:13px;"></i> {{ Str::limit($event->location, 20) }}</span>
                            </div>
                            
                            @if($isPast)
                                <button class="event-register-btn" disabled>Event Completed</button>
                            @else
                                <a href="{{ url('/enroll') }}" class="event-register-btn" style="background:{{ $bgColor }}; border-color:{{ $bgColor }};">{{ $isFree ? 'Register Free →' : 'Get Tickets →' }}</a>
                            @endif
                        </div>
                    </div>
                @empty
                    <div style="grid-column: 1 / -1; text-align:center; padding:60px 0; color:#6B7280;">
                        <i data-lucide="calendar-x" style="width:48px;height:48px;opacity:0.4;margin-bottom:16px;display:block;margin:0 auto 16px;"></i>
                        <p style="font-size:16px;">No events match your filters. <a href="#" wire:click.prevent="$set('type', 'all'); $set('format', 'all'); $set('month', 'all');" style="color:#A85D88;font-weight:600;">Clear all filters</a></p>
                    </div>
                @endforelse

            </div>

            <!-- Stay Updated Box -->
            <div style="margin-top:56px;background:white;border-radius:16px;padding:36px 40px;display:flex;align-items:center;justify-content:space-between;gap:32px;flex-wrap:wrap;border:1px solid #E2E8F0;">
                <div>
                    <h3 style="font-family:'Playfair Display',serif;font-size:22px;color:#1A2F4A;margin-bottom:8px;">Never miss an event</h3>
                    <p style="font-size:14px;color:#6B7280;max-width:420px;">Subscribe to our community newsletter and be the first to hear about new events, programs, and announcements.</p>
                </div>
                <div style="display:flex;gap:10px;flex-shrink:0;">
                    <input type="email" placeholder="your@email.com" style="padding:11px 16px;border:1px solid #D1D5DB;border-radius:10px;font-family:inherit;font-size:14px;width:220px;">
                    <button onclick="alert('Demo: Subscribed!')" style="padding:11px 20px;background:#A85D88;color:white;border:none;border-radius:10px;font-family:inherit;font-size:14px;font-weight:700;cursor:pointer;">Subscribe</button>
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
</div>
