<div>
    <div style="text-align: center; padding: 28px 20px 0;">
        <a href="{{ url('/') }}" class="logo">Zainab Center</a>
    </div>

    <div class="enrollment-container">
        <div class="enrollment-card">

            <!-- Stepper -->
            <div class="stepper">
                <div class="stepper-progress" style="width: {{ (($step - 1) / ($totalSteps - 1)) * 100 }}%;"></div>
                @for ($i = 1; $i <= 5; $i++)
                <div class="step {{ $step == $i ? 'active' : '' }} {{ $step > $i ? 'completed' : '' }}">
                    <div class="step-circle">{{ $i }}</div>
                    <div class="step-label">
                        @switch($i)
                            @case(1) Start @break
                            @case(2) Who @break
                            @case(3) Program @break
                            @case(4) Profile @break
                            @case(5) Payment @break
                        @endswitch
                    </div>
                </div>
                @endfor
            </div>

            <!-- Step 1: Email / Returning Check -->
            @if($step == 1)
            <div class="enroll-step active">
                <h2 style="margin-bottom: 6px;">Welcome to Zainab Center</h2>
                <p style="color: #718096; margin-bottom: 28px;">Enter your email to get started. We'll check if you have an existing account.</p>
                <div class="form-group">
                    <label>Email Address <span class="required">*</span></label>
                    <input type="email" placeholder="you@example.com" wire:model.defer="email">
                    @error('email') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
                </div>

                @if($isReturning)
                <div class="returning-banner" style="display:block;">
                    <h4>👋 Welcome back!</h4>
                    <p>We found an existing account under this email. Your previous information has been pre-filled. You're enrolling as a <strong>returning student</strong>.</p>
                </div>
                @endif

                <div class="btn-row">
                    <button class="btn-next" wire:click="handleEmailContinue">Continue →</button>
                </div>
                <p style="text-align:center; font-size:13px; color:#718096; margin-top:20px;">
                    Already enrolled? <a href="{{ url('/portal') }}" style="color: var(--color-primary); font-weight:700;">Sign in to your portal</a>
                </p>
            </div>
            @endif

            <!-- Step 2: Who are you enrolling? -->
            @if($step == 2)
            <div class="enroll-step active">
                <h2 style="margin-bottom: 6px;">Who are you enrolling?</h2>
                <p style="color: #718096; margin-bottom: 28px;">This determines how the account will be set up.</p>
                <div class="type-cards">
                    <div class="type-card {{ $enrollee_type == 'self' ? 'selected' : '' }}" wire:click="selectEnrolleeType('self')">
                        <i data-lucide="user" style="width:36px; height:36px; display:block; margin:0 auto 10px;"></i>
                        <h3>Myself</h3>
                        <p>I'm enrolling for my own education. I'll have my own login and access.</p>
                    </div>
                    <div class="type-card {{ $enrollee_type == 'child' ? 'selected' : '' }}" wire:click="selectEnrolleeType('child')">
                        <i data-lucide="users" style="width:36px; height:36px; display:block; margin:0 auto 10px;"></i>
                        <h3>My Child / Dependent</h3>
                        <p>I'm enrolling on behalf of a child. The account will be linked to my household.</p>
                    </div>
                </div>

                @if($enrollee_type == 'child')
                <div id="child-fields">
                    <div style="background: #FFFBEB; border:1px solid #FEF3C7; border-radius:10px; padding:14px 16px; margin-bottom:20px; font-size:13px; color:#92400E;">
                        <strong>Parent account:</strong> We'll create a child account linked to your email. You can manage all your children from one parent login.
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="margin:0;">
                            <label>Child's First Name <span class="required">*</span></label>
                            <input type="text" placeholder="First name" wire:model.defer="child_first_name">
                            @error('child_first_name') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group" style="margin:0;">
                            <label>Child's Last Name <span class="required">*</span></label>
                            <input type="text" placeholder="Last name" wire:model.defer="child_last_name">
                            @error('child_last_name') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Child's Date of Birth <span class="required">*</span></label>
                        <input type="date" wire:model.defer="child_dob">
                        @error('child_dob') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
                    </div>
                </div>
                @endif

                <div class="btn-row">
                    <button class="btn-back" wire:click="prevStep">← Back</button>
                    <button class="btn-next" wire:click="nextStep">Next: Choose Program →</button>
                </div>
            </div>
            @endif

            <!-- Step 3: Program Selection -->
            @if($step == 3)
            <div class="enroll-step active">
                <h2 style="margin-bottom: 6px;">Choose a Program</h2>
                <p style="color: #718096; margin-bottom: 28px;">Select the program you'd like to enroll in. Your section will be assigned.</p>

                <div class="program-selection">
                    @foreach($programs as $program)
                    <div class="select-card {{ $program_id == $program->id ? 'selected' : '' }}" wire:click="selectProgram('{{ $program->id }}')">
                        <h3>{{ $program->name }}</h3>
                        <p>{{ Str::words(strip_tags($program->description), 8) }}</p>
                        <div class="price">${{ $program->monthly_fee ?? $program->registration_fee }} / term</div>
                    </div>
                    @endforeach
                </div>
                
                @error('program_id') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror

                <div class="btn-row">
                    <button class="btn-back" wire:click="prevStep">← Back</button>
                    <button class="btn-next" wire:click="nextStep">Next: Your Profile →</button>
                </div>
            </div>
            @endif

            <!-- Step 4: Profile Info -->
            @if($step == 4)
            <div class="enroll-step active">
                <h2 style="margin-bottom: 6px;">Your Profile</h2>
                <p style="color: #718096; margin-bottom: 28px;">Tell us a bit about yourself so we can set up your account.</p>
                <div class="form-row">
                    <div class="form-group" style="margin:0;">
                        <label>First Name <span class="required">*</span></label>
                        <input type="text" placeholder="Your first name" wire:model.defer="self_first_name">
                        @error('self_first_name') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group" style="margin:0;">
                        <label>Last Name <span class="required">*</span></label>
                        <input type="text" placeholder="Your last name" wire:model.defer="self_last_name">
                        @error('self_last_name') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group" style="margin-top:16px;">
                    <label>Phone Number <span class="required">*</span></label>
                    <input type="tel" placeholder="+1 (555) 000-0000" wire:model.defer="self_phone">
                    @error('self_phone') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>Date of Birth (Enrollee) <span class="required">*</span></label>
                    <input type="date" wire:model.defer="self_dob">
                    @error('self_dob') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>How did you hear about us?</label>
                    <select wire:model.defer="referral_source">
                        <option value="">— Select —</option>
                        <option value="friend">Friend / Family Referral</option>
                        <option value="social">Social Media</option>
                        <option value="search">Google / Web Search</option>
                        <option value="mosque">Mosque / Community Center</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="btn-row">
                    <button class="btn-back" wire:click="prevStep">← Back</button>
                    <button class="btn-next" wire:click="nextStep">Next: Payment →</button>
                </div>
            </div>
            @endif

            <!-- Step 5: Payment + Summary -->
            @if($step == 5)
            <div class="enroll-step active">
                <h2 style="margin-bottom: 6px;">Secure Checkout</h2>
                <p style="color: #718096; margin-bottom: 28px;">Review your enrollment summary and complete payment.</p>

                <!-- Order Summary -->
                <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:14px; padding:20px; margin-bottom:24px;">
                    <h4 style="font-size:13px; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; color:#718096; margin-bottom:14px;">Order Summary</h4>
                    <div style="display:flex; justify-content:space-between; margin-bottom:10px; font-size:14px;">
                        <span>Program {{ $program_id }}</span>
                        <span style="font-weight:700;">Variable</span>
                    </div>
                    <div style="display:flex; justify-content:space-between; margin-bottom:10px; font-size:13px; color:#718096;">
                        <span>Section to be assigned by admin</span>
                        <span>Spring 2026</span>
                    </div>
                    <div style="border-top:1px solid #E2E8F0; margin:14px 0;"></div>
                    <div style="display:flex; justify-content:space-between; font-size:15px; font-weight:700;">
                        <span>Total Due Today</span>
                        <span style="color: var(--color-primary);">--</span>
                    </div>
                </div>

                <!-- Payment Toggle -->
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:20px;">
                    <button wire:click="setPaymentType('full')"
                        style="padding:12px; border:2px solid {{ $payment_type == 'full' ? 'var(--color-primary)' : '#E2E8F0' }}; border-radius:10px; background:{{ $payment_type == 'full' ? 'rgba(27,107,114,0.06)' : 'white' }}; font-weight:700; font-size:13px; cursor:pointer; color: {{ $payment_type == 'full' ? 'var(--color-primary)' : '#4A5568' }};">
                        Pay in Full<br><span style="font-size:11px; font-weight:400;">Save 5%</span>
                    </button>
                    <button wire:click="setPaymentType('install')"
                        style="padding:12px; border:2px solid {{ $payment_type == 'install' ? 'var(--color-primary)' : '#E2E8F0' }}; border-radius:10px; background:{{ $payment_type == 'install' ? 'rgba(27,107,114,0.06)' : 'white' }}; font-weight:700; font-size:13px; cursor:pointer; color:{{ $payment_type == 'install' ? 'var(--color-primary)' : '#4A5568' }};">
                        Installments<br><span style="font-size:11px; font-weight:400;">Monthly</span>
                    </button>
                </div>

                <!-- Card Details Mock -->
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
                    <button class="btn-back" wire:click="prevStep">← Back</button>
                    <button class="btn-next" wire:click="submitEnrollment">Enroll &amp; Pay Now →</button>
                </div>
            </div>
            @endif

            <!-- Step 6: Confirmation -->
            @if($step == 6)
            <div class="enroll-step active">
                <div style="width: 80px; height: 80px; border-radius: 50%; background: #DCFCE7; color: #16A34A; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;">
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
                            <span>Your first class is on <strong>Monday at 6:00 PM</strong>. A calendar invite is on its way.</span>
                        </div>
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                    <a href="{{ url('/portal') }}" class="btn-next" style="text-decoration:none; text-align:center;">Go to Student Portal →</a>
                    <a href="{{ url('/') }}" class="btn-back" style="text-decoration:none; text-align:center; display:block;">Back to Home</a>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
