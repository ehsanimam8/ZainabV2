<div>
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
                    <select wire:model.live="category">
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
                    <select wire:model.live="level">
                        <option value="all">All Levels</option>
                        <option value="beginner">Beginner</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="advanced">Advanced</option>
                    </select>
                </div>
                <div class="filter-count">
                    Showing <strong>{{ count($programs) }}</strong> programs
                </div>
            </div>
        </div>
    </div>

    <!-- Programs Listing -->
    <section class="programs-listing">
        <div class="container">
            <div class="programs-full-grid">
                @forelse($programs as $program)
                <div class="prog-card">
                    <div class="prog-card-header bg-navy">
                        @if($program->is_coaching)
                        <div class="prog-badges"><span class="badge badge-popular">1-on-1 Coaching</span></div>
                        @endif
                        <i data-lucide="book-open" style="width:52px;height:52px;color:#1A2F4A;"></i>
                    </div>
                    <div class="prog-body">
                        <h3>{{ $program->name }}</h3>
                        <p>{{ Str::words(strip_tags($program->description), 20) }}</p>
                        <div class="prog-meta">
                            <span><i data-lucide="calendar" style="width:12px;"></i> {{ \Carbon\Carbon::parse($program->start_date)->format('M d') }}</span>
                            <span><i data-lucide="monitor" style="width:12px;"></i> Live Online</span>
                        </div>
                        <div class="prog-price">${{ $program->monthly_fee ?? $program->registration_fee ?? 0 }} <small>/ term</small></div>
                        <div class="prog-actions">
                            <a href="{{ url('/enroll') }}?program_id={{ $program->id }}" class="btn-enroll">Enroll Now</a>
                        </div>
                    </div>
                </div>
                @empty
                <!-- No results message -->
                <div style="text-align:center;padding:60px 0;color:#6B7280; grid-column: span 3;">
                    <i data-lucide="search-x" style="width:48px;height:48px;opacity:0.4;margin-bottom:16px;"></i>
                    <p style="font-size:16px;">No programs match your filters. <button wire:click="$set('category', 'all')" style="color:#1B6B72;font-weight:600; cursor:pointer; background:none; border:none;">Clear all filters</button></p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Bottom CTA -->
    <section class="cta-banner">
        <div class="container">
            <h2>Not sure which program is right for you?</h2>
            <p>Our admissions team will help you find the best fit based on your goals, schedule, and experience level.</p>
            <a href="{{ url('/#contact') }}" class="btn-cta-white">Talk to Admissions</a>
        </div>
    </section>

    <!-- Floating CTA -->
    <a href="{{ url('/enroll') }}" class="floating-enroll">Enroll Now</a>
</div>
